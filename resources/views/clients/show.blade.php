@extends('layouts.app')

@section('content')

<div class="space-y-6">

    {{-- Client Info --}}
    <div class="rounded-xl border border-slate-800 bg-slate-900 p-6">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                    Client
                </p>

                <h1 class="mt-1 text-2xl font-semibold text-white">
                    {{ $client->name }}
                </h1>

                <p class="mt-1 text-sm text-slate-400">
                    {{ $client->company ?? 'No company listed' }}
                </p>
            </div>

            <a
                href="{{ route('clients.edit', $client) }}"
                class="inline-flex rounded-lg border border-slate-700 px-4 py-2 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white"
            >
                Edit Client
            </a>

        </div>


        <div class="mt-6 grid gap-4 border-t border-slate-800 pt-5 sm:grid-cols-2">

            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                    Email
                </p>

                <a
                    href="mailto:{{ $client->email }}"
                    class="mt-1 block text-sm font-medium text-slate-200 hover:text-white"
                >
                    {{ $client->email }}
                </a>
            </div>


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


    {{-- Sites --}}
    <div>

        <div class="mb-4 flex items-center justify-between">

            <div>
                <h2 class="text-lg font-semibold text-white">
                    Sites
                </h2>

                <p class="mt-1 text-sm text-slate-400">
                    Websites managed for {{ $client->name }}.
                </p>
            </div>

            <a
                href="{{ route('sites.create', $client) }}"
                class="rounded-lg bg-slate-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-600"
            >
                Add Site
            </a>

        </div>


        @if ($client->sites->isEmpty())

            <div class="rounded-xl border border-slate-800 bg-slate-900 p-6">
                <p class="text-sm text-slate-400">
                    No sites have been added for this client.
                </p>
            </div>

        @else

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($client->sites as $site)

                    <div class="flex min-h-52 flex-col rounded-xl border border-slate-800 bg-slate-900 p-6 transition hover:border-slate-700">

                        <div class="flex items-start justify-between gap-4">

                            <div class="min-w-0">

                                <a
                                    href="{{ route('sites.show', [$client, $site]) }}"
                                    class="text-lg font-semibold text-white transition hover:text-slate-300"
                                >
                                    {{ $site->name }}
                                </a>

                                <a
                                    href="{{ $site->url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="mt-1 block truncate text-sm text-slate-400 hover:text-slate-200"
                                >
                                    {{ $site->url }}
                                </a>

                            </div>

                            <x-site-status :status="$site->status" />

                        </div>


                        <div class="mt-5">

                            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                                Hosting Provider
                            </p>

                            <p class="mt-1 text-sm font-semibold text-slate-200">
                                {{ $site->hostingProvider?->name ?? 'No Hosting Provider' }}
                            </p>

                        </div>


                        <div class="mt-auto pt-6">

                            <a
                                href="{{ route('sites.show', [$client, $site]) }}"
                                class="text-sm font-medium text-slate-400 transition hover:text-white"
                            >
                                View Site →
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>


   {{-- Delete Client --}}
<div class="rounded-xl border border-red-950 bg-slate-900 p-6">

    <details class="group">

        <summary
            class="inline-flex cursor-pointer list-none items-center rounded-lg border border-red-800 px-4 py-2 text-sm font-medium text-red-400 transition hover:bg-red-950 hover:text-red-300"
        >
            Delete Client
        </summary>

        <div class="mt-5 rounded-lg border border-red-900/50 bg-red-950/20 p-4">

            <h2 class="text-sm font-semibold text-red-400">
                Are you sure?
            </h2>

            <p class="mt-1 text-sm text-slate-400">
                This will permanently delete {{ $client->name }} and their associated data.
                This action cannot be undone.
            </p>

            <div class="mt-4 flex items-center gap-3">

                <form
                    method="POST"
                    action="{{ route('clients.destroy', $client) }}"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="rounded-lg bg-red-900 px-4 py-2 text-sm font-medium text-red-100 transition hover:bg-red-800"
                    >
                        Yes, Delete Client
                    </button>

                </form>

            </div>

        </div>

    </details>

</div>

</div>

@endsection
