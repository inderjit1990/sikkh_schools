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
     * Cache current schema per request
     */
    protected static ?string $currentSchema = null;

    /**
     * Sanitize schema name
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

        return DB::table('information_schema.schemata')
            ->where('schema_name', $schema)
            ->exists();
    }

    /**
     * Create schema
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
     * Switch to tenant schema (OPTIMIZED)
     */
    public function switchSchema(string $schema): void
    {
        $schema = $this->sanitizeSchema($schema);

        // ✅ avoid switching again in same request
        if (self::$currentSchema === $schema) {
            return;
        }

        DB::statement("SET search_path TO {$schema}");

        self::$currentSchema = $schema;
    }

    /**
     * Reset to default schema
     */
    public function resetSchema(): void
    {
        if (self::$currentSchema === $this->defaultSchema) {
            return;
        }

        DB::statement("SET search_path TO {$this->defaultSchema}");

        self::$currentSchema = $this->defaultSchema;
    }

    /**
     * Get current schema
     */
    public function currentSchema(): string
    {
        return DB::selectOne("SELECT current_schema() AS schema")->schema;
    }

    /**
     * Run migrations inside tenant schema
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
    }

    /**
     * Seed tenant schema
     */
    public function seedTenant(
        string $schema,
        ?string $class = null
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
    }

    /**
     * Full tenant setup (schema + migrate + seed)
     */
    public function setupTenant(
        string $schema,
        bool $seed = false,
        ?string $seederClass = null
    ): void {
        $schema = $this->sanitizeSchema($schema);

        try {
            // create schema
            $this->createSchema($schema);

            // migrate
            $this->runTenantMigrations($schema);

            // seed
            if ($seed) {
                $this->seedTenant($schema, $seederClass);
            }

        } catch (\Throwable $e) {

            // cleanup failed schema
            $this->dropSchema($schema);

            $this->resetSchema();

            throw $e;
        }
    }

    /**
     * Execute logic inside tenant context (SAFE wrapper)
     */
    public function tenant(string $schema, callable $callback)
    {
        $previous = self::$currentSchema;

        try {
            $this->switchSchema($schema);

            return $callback();

        } finally {

            if ($previous) {
                DB::statement("SET search_path TO {$previous}");
                self::$currentSchema = $previous;
            } else {
                $this->resetSchema();
            }
        }
    }
}