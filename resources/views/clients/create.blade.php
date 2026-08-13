@extends('layouts.app')

@section('content')

<div class="max-w-2xl rounded-xl border border-slate-800 bg-slate-900 p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-white">
            Create Client
        </h1>

        <p class="mt-1 text-sm text-slate-400">
            Add a new client to your agency.
        </p>
    </div>

    <div class="space-y-5">

        {{-- Name --}}
        <div>
            <label
                for="name"
                class="mb-2 block text-sm font-medium text-slate-300"
            >
                Name
            </label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                required
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition placeholder:text-slate-500 focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
                placeholder="John Smith"
            >
        </div>

        {{-- Email --}}
        <div>
            <label
                for="email"
                class="mb-2 block text-sm font-medium text-slate-300"
            >
                Email
            </label>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                required
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition placeholder:text-slate-500 focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
                placeholder="john@example.com"
            >
        </div>

        {{-- Phone --}}
        <div>
            <label
                for="phone"
                class="mb-2 block text-sm font-medium text-slate-300"
            >
                Phone
            </label>

            <input
                type="text"
                name="phone"
                id="phone"
                value="{{ old('phone') }}"
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition placeholder:text-slate-500 focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
                placeholder="251-555-1234"
            >
        </div>

        {{-- Company --}}
        <div>
            <label
                for="company"
                class="mb-2 block text-sm font-medium text-slate-300"
            >
                Company
            </label>

            <input
                type="text"
                name="company"
                id="company"
                value="{{ old('company') }}"
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition placeholder:text-slate-500 focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
                placeholder="Smith Construction"
            >
        </div>

        <div class="flex items-center gap-3 border-t border-slate-800 pt-5">

            <button
                type="submit"
                class="rounded-lg bg-slate-700 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-slate-600"
            >
                Create Client
            </button>

            <a
                href="{{ route('clients.index') }}"
                class="rounded-lg border border-slate-700 px-5 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white"
            >
                Cancel
            </a>

        </div>

    </div>

</div>
@endsection
