

@extends('layouts.app')

@section('content')

<div class="max-w-2xl rounded-xl border border-slate-800 bg-slate-900 p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-white">
            Edit Client
        </h1>

        <p class="mt-1 text-sm text-slate-400">
            Update client information.
        </p>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-lg border border-red-900 bg-red-950/40 p-4">
            <p class="mb-2 text-sm font-medium text-red-400">
                Please fix the following:
            </p>

            <ul class="list-inside list-disc space-y-1 text-sm text-red-300">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('clients.update', $client) }}"
        class="space-y-5"
    >
        @csrf
        @method('PATCH')

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
                value="{{ old('name', $client->name) }}"
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
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
                value="{{ old('email', $client->email) }}"
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
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
                value="{{ old('phone', $client->phone) }}"
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
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
                value="{{ old('company', $client->company) }}"
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
            >
        </div>

        <div class="flex items-center gap-3 border-t border-slate-800 pt-5">

            <button
                type="submit"
                class="rounded-lg bg-slate-700 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-slate-600"
            >
                Update Client
            </button>

            <a
                href="{{ route('clients.show', $client) }}"
                class="rounded-lg border border-slate-700 px-5 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white"
            >
                Cancel
            </a>

        </div>

    </form>

</div>
@endsection
