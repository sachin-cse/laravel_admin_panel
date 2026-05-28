<x-admin.layout title="Users" heading="Add User">
    <div class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
        <section class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-stone-200 lg:p-8">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">User Form</p>
                    <h3 class="mt-2 text-3xl font-semibold text-slate-950">Add new user</h3>
                </div>
                <span class="rounded-full bg-emerald-50 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">HTML Only</span>
            </div>

            <form action="#" method="POST" class="mt-8 grid gap-5 md:grid-cols-2">
                <div>
                    <label for="name" class="text-sm font-medium text-slate-700">Full Name</label>
                    <input id="name" name="name" type="text" placeholder="John Doe" class="mt-2 w-full rounded-2xl border border-stone-200 bg-stone-50 px-4 py-3.5 text-sm outline-none transition focus:border-amber-400 focus:bg-white">
                </div>
                <div>
                    <label for="email" class="text-sm font-medium text-slate-700">Email Address</label>
                    <input id="email" name="email" type="email" placeholder="john@example.com" class="mt-2 w-full rounded-2xl border border-stone-200 bg-stone-50 px-4 py-3.5 text-sm outline-none transition focus:border-amber-400 focus:bg-white">
                </div>
                <div>
                    <label for="phone" class="text-sm font-medium text-slate-700">Phone Number</label>
                    <input id="phone" name="phone" type="text" placeholder="+91 98765 43210" class="mt-2 w-full rounded-2xl border border-stone-200 bg-stone-50 px-4 py-3.5 text-sm outline-none transition focus:border-amber-400 focus:bg-white">
                </div>
                <div>
                    <label for="role" class="text-sm font-medium text-slate-700">Role</label>
                    <select id="role" name="role" class="mt-2 w-full rounded-2xl border border-stone-200 bg-stone-50 px-4 py-3.5 text-sm outline-none transition focus:border-amber-400 focus:bg-white">
                        <option>Admin</option>
                        <option>Editor</option>
                        <option>Manager</option>
                        <option>User</option>
                    </select>
                </div>
                <div>
                    <label for="password" class="text-sm font-medium text-slate-700">Password</label>
                    <input id="password" name="password" type="password" placeholder="Create password" class="mt-2 w-full rounded-2xl border border-stone-200 bg-stone-50 px-4 py-3.5 text-sm outline-none transition focus:border-amber-400 focus:bg-white">
                </div>
                <div>
                    <label for="status" class="text-sm font-medium text-slate-700">Status</label>
                    <select id="status" name="status" class="mt-2 w-full rounded-2xl border border-stone-200 bg-stone-50 px-4 py-3.5 text-sm outline-none transition focus:border-amber-400 focus:bg-white">
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label for="address" class="text-sm font-medium text-slate-700">Address</label>
                    <textarea id="address" name="address" rows="4" placeholder="Enter user address" class="mt-2 w-full rounded-2xl border border-stone-200 bg-stone-50 px-4 py-3.5 text-sm outline-none transition focus:border-amber-400 focus:bg-white"></textarea>
                </div>
                <div class="md:col-span-2 flex flex-wrap gap-3">
                    <button type="submit" class="rounded-2xl bg-slate-950 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-slate-800">Save User</button>
                    <button type="reset" class="rounded-2xl bg-stone-100 px-6 py-3.5 text-sm font-semibold text-slate-900 transition hover:bg-stone-200">Reset Form</button>
                </div>
            </form>
        </section>

        <section class="space-y-6">
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-stone-200">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Instructions</p>
                <div class="mt-5 space-y-4 text-sm leading-7 text-slate-600">
                    <p>Use this page as your admin user create screen.</p>
                    <p>Add your own route, controller, validation, and database save logic when you are ready.</p>
                    <p>The design matches the sidebar dashboard layout so the panel feels consistent.</p>
                </div>
            </div>

            <div class="rounded-[2rem] bg-slate-950 p-6 text-white shadow-xl">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-amber-300">Quick Menu</p>
                <div class="mt-5 grid gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="rounded-2xl bg-white/10 px-4 py-3 text-sm font-medium">Back to Dashboard</a>
                    <a href="{{ route('admin.pages') }}" class="rounded-2xl bg-white/10 px-4 py-3 text-sm font-medium">Open Pages</a>
                </div>
            </div>
        </section>
    </div>
</x-admin.layout>
