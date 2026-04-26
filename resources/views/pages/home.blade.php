@extends('layouts.app')

@section('title', 'Empowering Sikh Education | Comprehensive School Management SaaS')

@section('content')
<style>
    /* Custom Animation for Icon Hovers */
    .icon-hover-animate:hover .icon-bounce {
        animation: bounce 1s infinite;
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(-10%); animation-timing-function: cubic-bezier(0.8,0,1,1); }
        50% { transform: translateY(0); animation-timing-function: cubic-bezier(0,0,0.2,1); }
    }
</style>

<section class="relative bg-slate-50 overflow-hidden pt-16 pb-20 px-6">
    <div class="container mx-auto grid md:grid-cols-12 gap-12 items-center">
        <div class="md:col-span-6 text-left animate__animated animate__fadeInLeft">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold bg-amber-100 text-amber-700 mb-6">
                Chardi Kala. The Modern Era of Schooling.
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-sikh-blue leading-tight mb-6">
                Ethical SaaS for the <span class="text-amber-600">Future</span> of Sikh Education.
            </span>
            </h1>
            <p class="text-xl text-slate-600 mb-10 leading-relaxed">
                We provide the most comprehensive, secure, and technologically advanced platform designed specifically for Sikh Educational Institutions. Manage academic excellence while nurturing spiritual growth and a strong community.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#request-demo" class="flex items-center justify-center bg-amber-600 text-white px-8 py-4 rounded-xl text-lg font-bold hover:bg-amber-700 hover:scale-105 transition transform shadow-lg group">
                    Request a Demo
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
                <a href="#" class="flex items-center justify-center border-2 border-sikh-blue text-sikh-blue px-8 py-4 rounded-xl text-lg font-bold hover:bg-slate-100 transition shadow-sm group">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"></path></svg>
                    Watch Video
                </a>
            </div>
        </div>
        <div class="md:col-span-6 animate__animated animate__fadeInRight animate__delay-1s relative">
            <div class="absolute inset-0 bg-amber-500 rounded-full blur-3xl opacity-20 transform scale-150"></div>
            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=800" alt="Student with Tablet" class="w-full rounded-3xl shadow-2xl">
            
        </div>
    </div>
</section>

<section class="bg-white py-20 px-6">
    <div class="container mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-600 font-bold uppercase tracking-widest text-sm">The Gurmat Approach</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-sikh-blue mt-2 mb-6">Nurturing Spiritual & Academic Growth</h2>
            <p class="text-lg text-slate-600">Our platform isn't just a database; it’s a digital ecosystem designed to embody the core principles of Sikhism while maintaining world-class educational standards.</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-10">
            <div class="group bg-slate-50 p-8 rounded-2xl border border-slate-100 transition hover:shadow-2xl hover:border-amber-200">
                <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 mb-6 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-sikh-blue mb-3">Academic Excellence</h3>
                <p class="text-slate-600 leading-relaxed">Integrated curriculum management, standardized testing, and robust grading systems meet modern educational benchmarks.</p>
            </div>
            
            <div class="group bg-slate-50 p-8 rounded-2xl border border-slate-100 transition hover:shadow-2xl hover:border-amber-200">
                <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 mb-6 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13.478 14.893a6.004 6.004 0 00-1.231.329m3.31-3.31a6.003 6.003 0 00-.012 1.861m-.012-1.861L18 13.593"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-sikh-blue mb-3">Strong Saangat</h3>
                <p class="text-slate-600 leading-relaxed">Dedicated portals connect parents, teachers, and administrators, fostering a collaborative, supportive educational community.</p>
            </div>
            
            <div class="group bg-slate-50 p-8 rounded-2xl border border-slate-100 transition hover:shadow-2xl hover:border-amber-200">
                <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 mb-6 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.674M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2H10a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-sikh-blue mb-3">Gurmat Nurturing</h3>
                <p class="text-slate-600 leading-relaxed">Unique modules manage Gurbani, Gurmukhi, and Kirtan instruction, tracking the core spiritual journey of students.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-50 py-20 px-6">
    <div class="container mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-600 font-bold uppercase tracking-widest text-sm">What We Provide</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-sikh-blue mt-2 mb-6">A Complete Digital Backbone for Your School</h2>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-x-12 gap-y-16 items-center">
            
            <div class="space-y-12">
                <div class="flex items-start gap-6 group">
                    <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-sikh-blue shadow-lg group-hover:bg-sikh-blue group-hover:text-white transition">
                        <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-sikh-blue mb-1">Total Academic Lifecycle</h4>
                        <p class="text-slate-600">From admissions to dynamic timetables, digital gradebooks, and report card generation.</p>
                    </div>
                </div>

                <div class="flex items-start gap-6 group">
                    <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-sikh-blue shadow-lg group-hover:bg-sikh-blue group-hover:text-white transition">
                        <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 012-2h2a2 2 0 012 2v1m-4 0a2 2 0 012 2v2m-6 0a2 2 0 002 2h6a2 2 0 002-2V8m-6 0l4 4m0 0l-4 4m4-4H6"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-sikh-blue mb-1">Human Resource Management</h4>
                        <p class="text-slate-600">Manage teacher recruitment, digital attendance, dynamic payrolls, and professional evaluations.</p>
                    </div>
                </div>

                <div class="flex items-start gap-6 group">
                    <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-sikh-blue shadow-lg group-hover:bg-sikh-blue group-hover:text-white transition">
                        <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-sikh-blue mb-1">Automated Fee Collections</h4>
                        <p class="text-slate-600">Secure online payments, automated invoicing, reminder notifications, and insightful financial reporting.</p>
                    </div>
                </div>
            </div>
            
            <div class="relative rounded-3xl overflow-hidden shadow-2xl animate__animated animate__pulse animate__infinite animate__slower">
               <img src="https://picsum.photos/id/24/800/600" alt="Schooling" class="relative z-10 w-full rounded-2xl shadow-2xl">
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-20 px-6">
    <div class="container mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-600 font-bold uppercase tracking-widest text-sm">Unique Specializations</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-sikh-blue mt-2 mb-6">Designed with Our Roots in Mind</h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <div class="border border-slate-100 p-8 rounded-2xl hover:bg-amber-50 icon-hover-animate transition cursor-pointer">
                <div class="w-12 h-12 text-amber-600 mb-6 icon-bounce">
                   <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                </div>
                <h5 class="text-xl font-bold text-sikh-blue mb-2">Gurmukhi Mastery</h5>
                <p class="text-slate-600 text-sm">Special tracking for alphabet acquisition, phonetic understanding, and reading proficiency.</p>
            </div>
            
            <div class="border border-slate-100 p-8 rounded-2xl hover:bg-amber-50 icon-hover-animate transition cursor-pointer">
                <div class="w-12 h-12 text-amber-600 mb-6 icon-bounce">
                   <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.44-.617L3 16V9l1.44-1.44L3 9h8a2 2 0 012 2v2"></path></svg>
                </div>
                <h5 class="text-xl font-bold text-sikh-blue mb-2">Nitnem Tracking</h5>
                <p class="text-slate-600 text-sm">A digital checklist to encourage and monitor students' daily devotional practice (Nitnem).</p>
            </div>
            
            <div class="border border-slate-100 p-8 rounded-2xl hover:bg-amber-50 icon-hover-animate transition cursor-pointer">
                <div class="w-12 h-12 text-amber-600 mb-6 icon-bounce">
                   <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4l4 4m-4 10a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h5 class="text-xl font-bold text-sikh-blue mb-2">Itihas Modules</h5>
                <p class="text-slate-600 text-sm">Structured lessons and assessments on the glorious history of the Sikh Gurus and heroes.</p>
            </div>
            
            <div class="border border-slate-100 p-8 rounded-2xl hover:bg-amber-50 icon-hover-animate transition cursor-pointer">
                <div class="w-12 h-12 text-amber-600 mb-6 icon-bounce">
                   <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 00-1 1v1a2 2 0 11-4 0v-1a1 1 0 00-1-1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                </div>
                <h5 class="text-xl font-bold text-sikh-blue mb-2">Service Learning</h5>
                <p class="text-slate-600 text-sm">Tracking students' mandatory volunteer hours for community seva initiatives (Sarbat da Bhala).</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-900 text-slate-100 py-24 px-6 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        </div>
    <div class="container mx-auto grid md:grid-cols-2 gap-16 items-center relative z-10">
        <div class="animate__animated animate__fadeInLeft">
            <span class="text-amber-500 font-bold uppercase tracking-widest text-sm">Connected Saangat App</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mt-2 mb-6">Real-Time Community Engagement in Your Pocket</h2>
            <p class="text-lg text-slate-300 mb-10 leading-relaxed">Our unified mobile application ensures that parents, students, and teachers stay seamlessly connected, fostering transparency and active participation.</p>
            
            <ul class="space-y-6 text-lg">
                <li class="flex items-center gap-4">
                    <div class="w-6 h-6 rounded-full bg-amber-500 flex items-center justify-center text-slate-900">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </div>
                    <span>Instant Attendance & Academic Progress Alerts.</span>
                </li>
                <li class="flex items-center gap-4">
                    <div class="w-6 h-6 rounded-full bg-amber-500 flex items-center justify-center text-slate-900">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </div>
                    <span>Digital Report Card & Certificate Downloads.</span>
                </li>
                <li class="flex items-center gap-4">
                    <div class="w-6 h-6 rounded-full bg-amber-500 flex items-center justify-center text-slate-900">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </div>
                    <span>Secure In-App Fee Payment Gateway.</span>
                </li>
                <li class="flex items-center gap-4">
                    <div class="w-6 h-6 rounded-full bg-amber-500 flex items-center justify-center text-slate-900">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </div>
                    <span>School Announcements & Events Notifications.</span>
                </li>
            </ul>
        </div>
        
        <div class="animate__animated animate__fadeInRight animate__delay-1s">
           <img src="https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&q=80&w=800" alt="Mobile App Usage" class="w-full rounded-2xl shadow-xl">
        </div>
    </div>
</section>

<section class="bg-slate-50 py-20 px-6">
    <div class="container mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-600 font-bold uppercase tracking-widest text-sm">Built for Enterprise</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-sikh-blue mt-2 mb-6">Advanced Multi-Tenant Security</h2>
            <p class="text-lg text-slate-600">We utilize cutting-edge database isolation technology. Your school's data isn't just secure; it’s logically and physically separated from other institutions, guaranteeing complete privacy.</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                <div class="w-16 h-16 bg-sikh-blue/10 rounded-full flex items-center justify-center mx-auto mb-6 text-sikh-blue">
                    <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h5 class="text-xl font-bold text-sikh-blue mb-2">Total Data Isolation</h5>
                <p class="text-slate-600 text-sm">Every school instance uses a unique database schema. Cross-school data leaks are technically impossible.</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 relative">
                <div class="absolute -top-4 -right-4 bg-amber-500 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase rotate-12 shadow-lg">Cloud</div>
                <div class="w-16 h-16 bg-sikh-blue/10 rounded-full flex items-center justify-center mx-auto mb-6 text-sikh-blue">
                    <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                </div>
                <h5 class="text-xl font-bold text-sikh-blue mb-2">Scalable Infrastructure</h5>
                <p class="text-slate-600 text-sm">Our Kubernetes-driven environment automatically scales resources based on your school's usage, ensuring high availability.</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                <div class="w-16 h-16 bg-sikh-blue/10 rounded-full flex items-center justify-center mx-auto mb-6 text-sikh-blue">
                    <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h5 class="text-xl font-bold text-sikh-blue mb-2">Advanced Access Controls</h5>
                <p class="text-slate-600 text-sm">Define granular roles for admins, teachers, and staff, managing exactly who can access sensitive data.</p>
            </div>
        </div>
    </div>
</section>

<section id="request-demo" class="bg-white py-24 px-6 relative">
    <div class="container mx-auto max-w-5xl bg-sikh-blue p-12 md:p-16 rounded-3xl shadow-2xl grid md:grid-cols-12 gap-12 items-center">
        <div class="md:col-span-6 text-slate-100">
            <h3 class="text-3xl md:text-4xl font-extrabold mb-4 leading-tight">Ready to Transform Your Educational Mission?</h3>
            <p class="text-lg text-slate-300 leading-relaxed mb-8">Schedule a personalized, one-on-one session with our experts. We'll show you exactly how our platform can streamline your administration and nurture your students.</p>
        </div>
        
        <div class="md:col-span-6 animate__animated animate__zoomIn">
            <form action="#" method="POST" class="bg-white p-8 rounded-2xl shadow-lg space-y-4">
                @csrf
                <div>
                    <input type="text" name="name" placeholder="Contact Person" class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition text-slate-800" required>
                </div>
                <div>
                    <input type="text" name="school_name" placeholder="School/Institution Name" class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition text-slate-800" required>
                </div>
                <div>
                    <input type="email" name="email" placeholder="Work Email" class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition text-slate-800" required>
                </div>
                <button type="submit" class="w-full bg-amber-600 text-white py-4 rounded-lg font-bold text-lg hover:bg-amber-700 transition transform hover:scale-[1.02]">Schedule My Demo</button>
            </form>
        </div>
    </div>
</section>

@endsection