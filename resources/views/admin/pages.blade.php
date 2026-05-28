<x-admin.layout title="Pages" heading="Pages">
    <div class="space-y-6">
        <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-stone-200 lg:p-8">
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Pages Menu</p>
            <div class="mt-3 flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <h3 class="text-3xl font-semibold text-slate-950">Manage your page list</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-500">A simple static pages area you can later convert into CRUD screens.</p>
                </div>
                <a href="#" class="inline-flex rounded-2xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white">Add New Page</a>
            </div>
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            <article class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-stone-200">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-emerald-600">Published</p>
                <h4 class="mt-3 text-xl font-semibold text-slate-950">Home Page</h4>
                <p class="mt-2 text-sm leading-6 text-slate-500">Main landing page content, hero section, and call-to-action blocks.</p>
                <div class="mt-6 flex gap-3">
                    <a href="#" class="rounded-full bg-stone-100 px-4 py-2 text-sm font-medium text-slate-900">Edit</a>
                    <a href="#" class="rounded-full bg-stone-100 px-4 py-2 text-sm font-medium text-slate-900">Preview</a>
                </div>
            </article>

            <article class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-stone-200">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-amber-600">Draft</p>
                <h4 class="mt-3 text-xl font-semibold text-slate-950">About Us</h4>
                <p class="mt-2 text-sm leading-6 text-slate-500">Company overview page with story, mission, and team information.</p>
                <div class="mt-6 flex gap-3">
                    <a href="#" class="rounded-full bg-stone-100 px-4 py-2 text-sm font-medium text-slate-900">Edit</a>
                    <a href="#" class="rounded-full bg-stone-100 px-4 py-2 text-sm font-medium text-slate-900">Preview</a>
                </div>
            </article>

            <article class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-stone-200">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-sky-600">Review</p>
                <h4 class="mt-3 text-xl font-semibold text-slate-950">Contact Page</h4>
                <p class="mt-2 text-sm leading-6 text-slate-500">Contact details, map, form layout, and support information blocks.</p>
                <div class="mt-6 flex gap-3">
                    <a href="#" class="rounded-full bg-stone-100 px-4 py-2 text-sm font-medium text-slate-900">Edit</a>
                    <a href="#" class="rounded-full bg-stone-100 px-4 py-2 text-sm font-medium text-slate-900">Preview</a>
                </div>
            </article>
        </div>
    </div>
</x-admin.layout>
