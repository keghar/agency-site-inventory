@extends('layouts.app')

@section('content')

<div class="space-y-6">

    {{-- Top Section --}}
    <div class="grid gap-6 lg:grid-cols-2">

        {{-- Site Information --}}
        <div class="rounded-xl border border-slate-800 bg-slate-900 p-6">

            <div class="mb-5">
                <x-site-status :status="$site->status" />
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                    Site
                </p>

                <h1 class="mt-1 text-2xl font-semibold text-white">
                    {{ $site->name }}
                </h1>

                <a
                    href="{{ $site->url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="mt-1 inline-block text-sm text-slate-400 transition hover:text-white"
                >
                    {{ $site->url }}
                </a>
            </div>


            {{-- Hosting Provider --}}
            <div class="mt-6 inline-flex items-center gap-3 rounded-lg border border-slate-700 bg-slate-800/60 px-4 py-3">

                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-700 text-slate-300">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                        class="h-5 w-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 5.25A2.25 2.25 0 0 1 6 3h12a2.25 2.25 0 0 1 2.25 2.25v3A2.25 2.25 0 0 1 18 10.5H6A2.25 2.25 0 0 1 3.75 8.25v-3Zm0 10.5A2.25 2.25 0 0 1 6 13.5h12a2.25 2.25 0 0 1 2.25 2.25v3A2.25 2.25 0 0 1 18 21H6a2.25 2.25 0 0 1-2.25-2.25v-3Z"
                        />
                    </svg>
                </div>

                <div>
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                        Hosting Provider
                    </p>

                    <p class="mt-0.5 text-sm font-semibold text-slate-100">
                        {{ $site->hostingProvider?->name ?? 'No Hosting Provider' }}
                    </p>
                </div>

            </div>

        </div>


        {{-- Client Information --}}
        <div class="rounded-xl border border-slate-800 bg-slate-900 p-6">

            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                Client
            </p>

            <a
                href="{{ route('clients.show', $client) }}"
                class="mt-1 inline-block text-xl font-semibold text-white transition hover:text-slate-300"
            >
                {{ $client->name }}
            </a>

            <p class="mt-1 text-sm text-slate-400">
                {{ $client->company ?? 'No company listed' }}
            </p>


            <div class="mt-6 space-y-5 border-t border-slate-800 pt-5">

                {{-- Email --}}
                <div>
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                        Email
                    </p>

                    <a
                        href="mailto:{{ $client->email }}"
                        class="mt-1 inline-block text-sm font-medium text-slate-200 transition hover:text-white"
                    >
                        {{ $client->email }}
                    </a>
                </div>


                {{-- Phone --}}
                <div>
                    <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                        Phone
                    </p>

                    <p class="mt-1 text-sm font-medium text-slate-200">
                        {{ $client->phone ?? 'No phone number' }}
                    </p>
                </div>

            </div>

        </div>

    </div>


   {{-- Site Links --}}
<div
    class="rounded-xl border border-slate-800 bg-slate-900 p-6"
    x-data="{ addingLink: false }"
>

    {{-- Header --}}
    <div class="mb-5 flex items-center justify-between">

        <div>
            <h2 class="text-lg font-semibold text-white">
                Site Links
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Useful links associated with this website.
            </p>
        </div>

        <button
            type="button"
            x-on:click="addingLink = ! addingLink"
            class="rounded-lg border border-slate-700 px-3 py-2 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white"
        >
            + Add Link
        </button>

    </div>


    {{-- Add Link Form --}}
    <div
        x-show="addingLink"
        x-cloak
        class="mb-6 rounded-lg border border-slate-700 bg-slate-800/50 p-4"
    >

        <h3 class="mb-4 text-sm font-medium text-slate-200">
            Add Site Link
        </h3>

        <form
            method="POST"
            action="{{ route('site_links.store', [$client, $site]) }}"
        >
            @csrf

            <div class="space-y-4">

                {{-- Label --}}
                <div>
                    <label
                        for="new-link-label"
                        class="block text-sm font-medium text-slate-300"
                    >
                        Label
                    </label>

                    <input
                        type="text"
                        name="label"
                        id="new-link-label"
                        value="{{ old('label') }}"
                        required
                        class="mt-1 block w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-sm text-slate-200"
                    >
                </div>


                {{-- URL --}}
                <div>
                    <label
                        for="new-link-url"
                        class="block text-sm font-medium text-slate-300"
                    >
                        URL
                    </label>

                    <input
                        type="url"
                        name="url"
                        id="new-link-url"
                        value="{{ old('url') }}"
                        required
                        class="mt-1 block w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-sm text-slate-200"
                    >
                </div>


                {{-- Type --}}
                <div>
                    <label
                        for="new-link-type"
                        class="block text-sm font-medium text-slate-300"
                    >
                        Type
                    </label>

                    <input
                        type="text"
                        name="type"
                        id="new-link-type"
                        value="{{ old('type') }}"
                        required
                        class="mt-1 block w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-sm text-slate-200"
                    >
                </div>

            </div>


            <div class="mt-4 flex items-center gap-3">

                <button
                    type="submit"
                    class="rounded-lg bg-slate-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-600"
                >
                    Add Link
                </button>

                <button
                    type="button"
                    x-on:click="addingLink = false"
                    class="text-sm text-slate-500 transition hover:text-white"
                >
                    Cancel
                </button>

            </div>

        </form>

    </div>


    {{-- Existing Links --}}
    <ul class="divide-y divide-slate-800">

        @forelse ($site->links as $link)

            <li
                x-data="{ menuOpen: false, editing: false }"
                class="py-4 first:pt-0 last:pb-0"
            >

                {{-- Link Row --}}
                <div class="flex items-center justify-between gap-4">

                    {{-- Link Info --}}
                    <div class="min-w-0">

                        <a
                            href="{{ $link->url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group inline-flex items-center gap-2"
                        >
                            <span class="text-sm font-medium text-slate-200 transition group-hover:text-white">
                                {{ $link->label }}
                            </span>

                            <span class="rounded-md bg-slate-800 px-2 py-0.5 text-xs text-slate-500">
                                {{ ucfirst($link->type) }}
                            </span>
                        </a>

                        <p class="mt-1 truncate text-xs text-slate-600">
                            {{ $link->url }}
                        </p>

                    </div>


                    {{-- Three Dot Menu --}}
                    <div class="relative">

                        <button
                            type="button"
                            x-on:click="menuOpen = ! menuOpen"
                            class="flex h-10 w-10 items-center justify-center rounded-lg text-lg text-slate-400 transition hover:bg-slate-800 hover:text-white"
                        >
                            ⋮
                        </button>


                        {{-- Dropdown --}}
                        <div
                            x-show="menuOpen"
                            x-cloak
                            x-on:click.outside="menuOpen = false"
                            class="absolute right-0 z-10 mt-2 w-32 rounded-lg border border-slate-700 bg-slate-900 p-1 shadow-xl"
                        >

                            <button
                                type="button"
                                x-on:click="
                                    editing = true;
                                    menuOpen = false;
                                "
                                class="block w-full rounded-md px-3 py-2 text-left text-sm text-slate-300 transition hover:bg-slate-800 hover:text-white"
                            >
                                Edit
                            </button>


                            <form
                                method="POST"
                                action="{{ route('site_links.destroy', [$client, $site, $link]) }}"
                                onsubmit="return confirm('Are you sure you want to delete this link?');"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="block w-full rounded-md px-3 py-2 text-left text-sm text-red-400 transition hover:bg-slate-800 hover:text-red-300"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>


                {{-- Inline Edit Form --}}
                <div
                    x-show="editing"
                    x-cloak
                    class="mt-4 rounded-lg border border-slate-700 bg-slate-800/50 p-4"
                >

                    <p class="mb-4 text-sm font-medium text-slate-300">
                        Edit Link
                    </p>

                    <form
                        method="POST"
                        action="{{ route('site_links.update', [$client, $site, $link]) }}"
                    >
                        @csrf
                        @method('PATCH')


                        {{-- Label --}}
                        <div class="mb-4">

                            <label
                                for="label-{{ $link->id }}"
                                class="block text-sm font-medium text-slate-300"
                            >
                                Label
                            </label>

                            <input
                                type="text"
                                name="label"
                                id="label-{{ $link->id }}"
                                value="{{ old('label', $link->label) }}"
                                class="mt-1 block w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-sm text-slate-200"
                            >

                        </div>


                        {{-- URL --}}
                        <div class="mb-4">

                            <label
                                for="url-{{ $link->id }}"
                                class="block text-sm font-medium text-slate-300"
                            >
                                URL
                            </label>

                            <input
                                type="url"
                                name="url"
                                id="url-{{ $link->id }}"
                                value="{{ old('url', $link->url) }}"
                                class="mt-1 block w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-sm text-slate-200"
                            >

                        </div>


                        {{-- Type --}}
                        <div class="mb-4">

                            <label
                                for="type-{{ $link->id }}"
                                class="block text-sm font-medium text-slate-300"
                            >
                                Type
                            </label>

                            <input
                                type="text"
                                name="type"
                                id="type-{{ $link->id }}"
                                value="{{ old('type', $link->type) }}"
                                class="mt-1 block w-full rounded-lg border border-slate-700 bg-slate-800 px-3 py-2 text-sm text-slate-200"
                            >

                        </div>


                        <div class="flex items-center gap-3">

                            <button
                                type="submit"
                                class="rounded-lg bg-slate-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-600"
                            >
                                Update Link
                            </button>

                            <button
                                type="button"
                                x-on:click="editing = false"
                                class="text-sm text-slate-500 transition hover:text-white"
                            >
                                Cancel
                            </button>

                        </div>

                    </form>

                </div>

            </li>

        @empty

            <li class="py-4">
                <p class="text-sm text-slate-400">
                    No links added yet.
                </p>
            </li>

        @endforelse

    </ul>

</div>


    {{-- Notes --}}
    <div class="rounded-xl border border-slate-800 bg-slate-900 p-6 mt-7">

        <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
            Site Notes
        </p>

        <p class="mt-2 text-sm leading-6 text-slate-300">
            {{ $site->notes ?: 'No notes added.' }}
        </p>

    </div>


    {{-- Actions --}}
    <div class="flex items-center justify-between border-t border-slate-800 pt-6">

        <a
            href="{{ route('clients.show', $client) }}"
            class="text-sm font-medium text-slate-500 transition hover:text-white"
        >
            ← Back to {{ $client->name }}
        </a>

        <div class="flex items-center gap-3">

            <a
                href="{{ route('sites.edit', [$client, $site]) }}"
                class="rounded-lg bg-slate-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-600"
            >
                Edit Site
            </a>

            <form
                method="POST"
                action="{{ route('sites.destroy', [$client, $site]) }}"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-lg border border-red-800 px-4 py-2 text-sm font-medium text-red-400 transition hover:bg-red-950 hover:text-red-300"
                >
                    Delete Site
                </button>

            </form>

        </div>

    </div>

</div>

@endsection
