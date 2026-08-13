@extends('layouts.app')

@section('content')

<div>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-white">
                Clients
            </h1>

            <p class="mt-1 text-sm text-slate-400">
                Manage your agency clients.
            </p>
        </div>

        <a
            href="{{ route('clients.create') }}"
            class="rounded-lg bg-slate-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-600"
        >
            Add Client
        </a>
    </div>

    @if($clients->isEmpty())

        <div class="rounded-xl border border-slate-800 bg-slate-900 p-6">
            <p class="text-sm text-slate-400">
                No clients found.
            </p>
        </div>

    @else

        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">

            @foreach ($clients as $client)

                <div class="flex min-h-56 flex-col rounded-xl border border-slate-800 bg-slate-900 p-6 transition hover:border-slate-700">

                    {{-- Client Header --}}
                    <div class="flex items-start justify-between gap-4">

                        <div>
                            <a
                                href="{{ route('clients.show', $client) }}"
                                class="text-lg font-semibold text-white transition hover:text-slate-300"
                            >
                                {{ $client->name }}
                            </a>

                            <p class="mt-1 text-sm text-slate-500">
                                {{ $client->company ?? 'No company' }}
                            </p>
                        </div>

                        <a
                            href="{{ route('clients.edit', $client) }}"
                            class="rounded-lg border border-slate-700 px-3 py-1.5 text-xs font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white"
                        >
                            Edit
                        </a>

                    </div>

                    {{-- Client Details --}}
                    <div class="mt-6 space-y-4">

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                                Email
                            </p>

                            <a
                                href="mailto:{{ $client->email }}"
                                class="mt-1 block text-sm text-slate-200 hover:text-white"
                            >
                                {{ $client->email }}
                            </a>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                                Phone
                            </p>

                            <p class="mt-1 text-sm text-slate-200">
                                {{ $client->phone ?? 'No phone number' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
                                Company
                            </p>

                            <p class="mt-1 text-sm text-slate-200">
                                {{ $client->company ?? 'No company' }}
                            </p>
                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="mt-auto pt-6">
                        <a
                            href="{{ route('clients.show', $client) }}"
                            class="text-sm font-medium text-slate-400 transition hover:text-white"
                        >
                            View Client →
                        </a>
                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection
