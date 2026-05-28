<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin Login - {{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Bootstrap CSS -->
        <link href="{{ myAssets('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        {{-- toastr cdn --}}
        <link href="{{ myAssets('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_top,_#fef3c7,_#f8fafc_42%,_#e2e8f0)] text-slate-900">
        <div class="flex min-h-screen items-center justify-center bg-slate-100 px-4">
            <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-xl">
                
                <p class="text-xs font-semibold uppercase tracking-widest text-amber-600 text-center">
                    Sign In
                </p>

                <h2 class="mt-3 text-2xl font-bold text-center text-slate-900">
                    Welcome back
                </h2>

                <p class="mt-2 text-sm text-center text-slate-500">
                    Enter your credentials to continue
                </p>

                <form action="{{ route('admin.auth.login') }}" method="POST" class="mt-6 space-y-4"     enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label class="text-sm font-medium text-slate-700">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" data-validate="required" placeholder="admin@example.com"
                            class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-amber-400 focus:ring-0" name="email">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-700">Password<span class="text-danger">*</span></label>
                        <input type="password" name="password" data-validate="required|min-8" placeholder="Enter password"
                            class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:border-amber-400 focus:ring-0" name="password">
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-slate-600">
                            <input type="checkbox" class="rounded border-slate-300 text-amber-500">
                            Remember
                        </label>
                        <a href="javascript:void(0);" class="text-slate-600 hover:text-slate-900">
                            Forgot Password?
                        </a>
                    </div>

                    <button type="button"
                        class="w-full rounded-xl bg-slate-900 py-2.5 text-sm font-semibold text-white hover:bg-slate-800 save_ajax_form">
                        Login
                    </button>
                </form>

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
