<x-admin.layout title="Dashboard" heading="Dashboard Overview">
    <div class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
        <section class="space-y-6">
            <div class="overflow-hidden rounded-[2rem] bg-slate-950 p-8 text-white shadow-xl">
                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-amber-300">Overview</p>
                <h3 class="mt-4 text-4xl font-semibold tracking-tight">Modern admin dashboard layout.</h3>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-300">
                    This is a clean static dashboard screen with a sidebar and content cards. You can now attach your own charts, counts, tables, and database data.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('admin.users') }}" class="rounded-full bg-amber-400 px-5 py-3 text-sm font-semibold text-slate-950">Open User Form</a>
                    <a href="{{ route('admin.pages') }}" class="rounded-full border border-white/15 px-5 py-3 text-sm font-semibold text-white">Open Pages</a>
                </div>
            </div>

            <div class="grid gap-5 md:grid-cols-3">
                <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-stone-200">
                    <p class="text-sm text-slate-500">Total Users</p>
                    <p class="mt-4 text-4xl font-semibold text-slate-950">1,248</p>
                    <p class="mt-3 text-sm text-emerald-600">+12% this month</p>
                </div>
                <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-stone-200">
                    <p class="text-sm text-slate-500">Published Pages</p>
                    <p class="mt-4 text-4xl font-semibold text-slate-950">36</p>
                    <p class="mt-3 text-sm text-sky-600">8 drafts waiting</p>
                </div>
                <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-stone-200">
                    <p class="text-sm text-slate-500">Server Status</p>
                    <p class="mt-4 text-4xl font-semibold text-slate-950">99.9%</p>
                    <p class="mt-3 text-sm text-amber-600">Stable monitoring</p>
                </div>
            </div>

            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-stone-200">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Recent Activity</p>
                        <h3 class="mt-2 text-2xl font-semibold text-slate-950">Admin timeline</h3>
                    </div>
                    <span class="rounded-full bg-stone-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-600">Static Preview</span>
                </div>

                <div class="mt-6 grid gap-4">
                    <div class="rounded-2xl bg-stone-50 p-4">
                        <p class="text-sm font-semibold text-slate-900">New user onboarding layout prepared</p>
                        <p class="mt-1 text-sm text-slate-500">Use the user page to add form fields and save logic.</p>
                    </div>
                    <div class="rounded-2xl bg-stone-50 p-4">
                        <p class="text-sm font-semibold text-slate-900">Page management section ready</p>
                        <p class="mt-1 text-sm text-slate-500">The pages screen includes simple cards you can convert to CRUD later.</p>
                    </div>
                    <div class="rounded-2xl bg-stone-50 p-4">
                        <p class="text-sm font-semibold text-slate-900">Sidebar reduced to requested menus</p>
                        <p class="mt-1 text-sm text-slate-500">Only Dashboard, Users, and Pages are shown.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="space-y-6">
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-stone-200">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Admin Profile</p>
                <div class="mt-5 flex items-center gap-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-amber-100 text-xl font-semibold text-amber-700">A</div>
                    <div>
                        <h3 class="text-xl font-semibold text-slate-950">Admin Name</h3>
                        <p class="text-sm text-slate-500">admin@example.com</p>
                    </div>
                </div>
                <div class="mt-6 grid gap-3">
                    <div class="flex items-center justify-between rounded-2xl bg-stone-50 px-4 py-3">
                        <span class="text-sm text-slate-500">Role</span>
                        <span class="text-sm font-semibold text-slate-900">Super Admin</span>
                    </div>
                    <div class="flex items-center justify-between rounded-2xl bg-stone-50 px-4 py-3">
                        <span class="text-sm text-slate-500">Last Login</span>
                        <span class="text-sm font-semibold text-slate-900">18 Apr 2026</span>
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-stone-200">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Shortcuts</p>
                <div class="mt-5 grid gap-3">
                    {{-- <a href="{{ route('admin.users') }}" class="rounded-2xl bg-slate-950 px-4 py-4 text-sm font-semibold text-white">Add New User</a>
                    <a href="{{ route('admin.pages') }}" class="rounded-2xl bg-stone-100 px-4 py-4 text-sm font-semibold text-slate-900">Manage Pages</a> --}}
                    <a href="{{ route('admin.auth.login') }}" class="rounded-2xl bg-stone-100 px-4 py-4 text-sm font-semibold text-slate-900">Return to Login</a>
                </div>
            </div>
        </section>
    </div>
</x-admin.layout>
