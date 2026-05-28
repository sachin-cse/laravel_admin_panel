@props([
    'title' => 'Admin Panel',
    'heading' => 'Dashboard',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title }} - {{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Bootstrap CSS -->
        <link href="{{ myAssets('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        {{-- toastr cdn --}}
        <link href="{{ myAssets('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
    </head>
    <body class="min-h-screen bg-stone-100 text-slate-900">
        <div class="flex min-h-screen">
            <aside class="hidden w-72 shrink-0 bg-slate-950 px-6 py-8 text-white lg:flex lg:flex-col">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-300">Admin Panel</p>
                    <h1 class="mt-4 text-3xl font-semibold">Control Room</h1>
                    <p class="mt-3 text-sm leading-6 text-slate-400">Fresh static HTML screens for your Laravel admin area.</p>
                </div>

                <nav class="mt-10 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-amber-400 text-slate-950' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }} flex items-center rounded-2xl px-4 py-3 text-sm font-medium transition">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users') ? 'bg-amber-400 text-slate-950' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }} flex items-center rounded-2xl px-4 py-3 text-sm font-medium transition">
                        Users
                    </a>
                    <a href="{{ route('admin.pages') }}" class="{{ request()->routeIs('admin.pages') ? 'bg-amber-400 text-slate-950' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }} flex items-center rounded-2xl px-4 py-3 text-sm font-medium transition">
                        Pages
                    </a>
                </nav>

                <div class="mt-auto rounded-3xl border border-slate-800 bg-slate-900 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Demo</p>
                    <p class="mt-3 text-lg font-semibold">HTML Only</p>
                    <p class="mt-2 text-sm leading-6 text-slate-400">Forms and menus are ready for you to connect with your own controllers and database logic.</p>
                </div>
            </aside>

            <div class="flex min-h-screen flex-1 flex-col">
                <header class="border-b border-stone-200 bg-white/90 px-5 py-4 backdrop-blur lg:px-8">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Admin Workspace</p>
                            <h2 class="mt-1 text-2xl font-semibold text-slate-900">{{ $heading }}</h2>
                        </div>
                        <a href="{{ route('admin.auth.logout') }}" class="logout_system inline-flex items-center rounded-full border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-slate-950 hover:text-slate-950">
                            Login Screen
                        </a>
                    </div>
                </header>

                <main class="flex-1 px-5 py-6 lg:px-8">
                    <div class="mx-auto max-w-7xl">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
        <script src="{{ myAssets('plugins/jquery/jquery.min.js') }}" defer></script>
        <!-- Bootstrap JS (includes Popper) -->
        <script src="{{ myAssets('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        {{-- sweetalert2 --}}
        <script src="{{ myAssets('plugins/sweetalert2/sweetalert2.js') }}" defer></script>
        {{-- toastr cdn --}}
        <script src="{{ myAssets('plugins/toastr/js/toastr.min.js') }}" defer></script>
        {{-- jquery validation --}}
        <script src="{{ myAssets('plugins/jquery_validation/jquery.validate.min.js') }}" defer></script>
        <script src="{{ myAssets('assets/js/custom.js') }}" defer></script>
    </body>
</html>
