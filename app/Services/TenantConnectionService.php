<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class TenantConnectionService
{
    /**
     * Default schema
     */
    protected string $defaultSchema = 'public';

    /**
     * Get sanitized schema name
     */
    public function sanitizeSchema(string $schema): string
    {
        return Str::slug($schema, '_');
    }

    /**
     * Check if schema exists
     */
    public function schemaExists(string $schema): bool
    {
        $schema = $this->sanitizeSchema($schema);

        $result = DB::selectOne("
            SELECT schema_name
            FROM information_schema.schemata
            WHERE schema_name = ?
        ", [$schema]);

        return !is_null($result);
    }

    /**
     * Create new schema
     */
    public function createSchema(string $schema): bool
    {
        $schema = $this->sanitizeSchema($schema);

        if ($this->schemaExists($schema)) {
            return true;
        }

        DB::statement("CREATE SCHEMA {$schema}");

        return true;
    }

    /**
     * Drop schema
     */
    public function dropSchema(string $schema, bool $cascade = true): bool
    {
        $schema = $this->sanitizeSchema($schema);

        $cascadeSql = $cascade ? 'CASCADE' : 'RESTRICT';

        DB::statement("DROP SCHEMA IF EXISTS {$schema} {$cascadeSql}");

        return true;
    }

    /**
     * Switch database schema
     */
    public function switchSchema(string $schema): void
    {
        $schema = $this->sanitizeSchema($schema);

        config([
            'database.connections.pgsql.search_path' => $schema
        ]);

        DB::purge('pgsql');
        DB::reconnect('pgsql');
    }

    /**
     * Reset back to public schema
     */
    public function resetSchema(): void
    {
        config([
            'database.connections.pgsql.search_path' => $this->defaultSchema
        ]);

        DB::purge('pgsql');
        DB::reconnect('pgsql');
    }

    /**
     * Get current schema
     */
    public function currentSchema(): string
    {
        $result = DB::selectOne("SELECT current_schema() AS schema");

        return $result->schema;
    }

    /**
     * Run tenant migrations
     */
    public function runTenantMigrations(
        string $schema,
        string $path = 'database/migrations'
    ): void {

        $this->switchSchema($schema);

        Artisan::call('migrate', [
            '--database' => 'pgsql',
            '--path' => $path,
            '--force' => true,
        ]);

        $this->resetSchema();
    }

    /**
     * Fresh migrate tenant schema
     */
    public function freshMigrateTenant(
        string $schema,
        string $path = 'database/migrations'
    ): void {

        $this->switchSchema($schema);

        Artisan::call('migrate:fresh', [
            '--database' => 'pgsql',
            '--path' => $path,
            '--force' => true,
        ]);

        $this->resetSchema();
    }

    /**
     * Seed tenant schema
     */
    public function seedTenant(
        string $schema,
        string $class = null
    ): void {

        $this->switchSchema($schema);

        $params = [
            '--database' => 'pgsql',
            '--force' => true,
        ];

        if ($class) {
            $params['--class'] = $class;
        }

        Artisan::call('db:seed', $params);

        $this->resetSchema();
    }

    /**
     * Create full tenant setup
     */
    public function setupTenant(
        string $schema,
        bool $seed = false,
        ?string $seederClass = null
    ): void {

        $schema = $this->sanitizeSchema($schema);

        DB::beginTransaction();

        try {

            // create schema
            $this->createSchema($schema);

            // migrate
            $this->runTenantMigrations($schema);

            // optional seed
            if ($seed) {
                $this->seedTenant($schema, $seederClass);
            }

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            // cleanup failed schema
            $this->dropSchema($schema);

            // reset connection
            $this->resetSchema();

            throw $e;
        }
    }

    /**
     * Execute callback inside tenant schema
     */
    public function tenant(string $schema, callable $callback)
    {
        try {

            $this->switchSchema($schema);

            return $callback();

        } finally {

            $this->resetSchema();
        }
    }
}