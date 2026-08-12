@extends('layouts.app')

@section('content')

<div>

    {{-- Dashboard Header --}}
    <div class="mb-10">
        <h1 class="text-3xl font-bold text-white">
            Dashboard: {{ $title }}
        </h1>

        <p class="mt-2 text-slate-400">
            There are {{ $clientCount }} clients and {{ $siteCount }} sites.
        </p>
    </div>


    {{-- Sites Section --}}
    <section class="mb-12">

        <h2 class="mb-5 text-xl font-semibold text-white">
            Sites
        </h2>

        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">

            @forelse ($recentSites as $site)

                <div class="min-h-40 min-w-64 rounded-xl border border-slate-800 bg-slate-900 p-6">

                    <a
                        href="{{ route('sites.show', [$site->client, $site]) }}"
                        class="text-lg font-semibold text-white hover:text-blue-400"
                    >
                        {{ $site->name }}
                    </a>

                </div>

            @empty

                <div class="min-h-40 min-w-64 rounded-xl border border-slate-800 bg-slate-900 p-6">
                    <p class="text-slate-400">
                        No sites found.
                    </p>
                </div>

            @endforelse

        </div>

    </section>


    {{-- Clients Section --}}
    <section>

        <h2 class="mb-5 text-xl font-semibold text-white">
            Clients
        </h2>

        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">

            <div class="min-h-40 min-w-64 rounded-xl border border-slate-800 bg-slate-900 p-6">
            </div>

            <div class="min-h-40 min-w-64 rounded-xl border border-slate-800 bg-slate-900 p-6">
            </div>

            <div class="min-h-40 min-w-64 rounded-xl border border-slate-800 bg-slate-900 p-6">
            </div>

        </div>

    </section>

</div>

@endsection


