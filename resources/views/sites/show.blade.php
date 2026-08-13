@extends('layouts.app')

@section('content')


<div class="max-w-2xl rounded-xl border border-slate-800 bg-slate-900 p-6">

    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-xl font-semibold text-white">
                {{ $site->name }}
            </h1>

            <a
                href="{{ $site->url }}"
                target="_blank"
                rel="noopener noreferrer"
                class="mt-1 inline-block text-sm text-slate-400 hover:text-white"
            >
                {{ $site->url }}
            </a>
        </div>
        #display hosting provider if it exists

    <div class="mt-4 inline-flex items-center gap-3 rounded-lg border border-slate-700 bg-slate-800/60 px-4 py-3">

        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-700 text-slate-300">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                class="h-5 w-5"
            >
                <path stroke-linecap="round" stroke-linejoin="round"
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

        <x-site-status :status="$site->status" />
    </div>

    <div class="mt-6 border-t border-slate-800 pt-5">

        <div class="mb-5">
            <p class="text-xs font-medium uppercase tracking-wide text-slate-500">
                Client
            </p>

            <p class="mt-1 text-sm text-slate-200">
                {{ $client->name }}
            </p>
        </div>

        <div>
            <p class="text-xs font-medium uppercase tracking-wide text-slate-500">
                Notes
            </p>

            <p class="mt-1 text-sm leading-6 text-slate-300">
                {{ $site->notes ?: 'No notes added.' }}
            </p>
        </div>

    </div>

    <div class="mt-6 flex items-center gap-3 border-t border-slate-800 pt-5">

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

@endsection
