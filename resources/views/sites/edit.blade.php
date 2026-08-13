
@extends('layouts.app')

@section('content')

<div class="max-w-2xl rounded-xl border border-slate-800 bg-slate-900 p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-white">
            Edit Site: {{ $site->name }}
        </h1>

        <div class="mt-2 text-sm text-slate-400">
            <p>
                Client:
                <span class="text-slate-200">{{ $client->name }}</span>
            </p>


        </div>
    </div>

    <form
        method="POST"
        action="{{ route('sites.update', [$client, $site]) }}"
        class="space-y-5"
    >
        @csrf
        @method('PATCH')

        {{-- Site Name --}}
        <div>
            <label
                for="name"
                class="mb-2 block text-sm font-medium text-slate-300"
            >
                Site Name
            </label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $site->name) }}"
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition placeholder:text-slate-500 focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
            >
        </div>

        {{-- Site URL --}}
        <div>
            <label
                for="url"
                class="mb-2 block text-sm font-medium text-slate-300"
            >
                Site URL
            </label>

            <input
                type="url"
                name="url"
                id="url"
                value="{{ old('url', $site->url) }}"
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition placeholder:text-slate-500 focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
            >
        </div>

        {{-- Hosting Provider --}}
        <div>
            <label
                for="hosting_provider_id"
                class="mb-2 block text-sm font-medium text-slate-300"
            >
                Hosting Provider
            </label>

            <select
                name="hosting_provider_id"
                id="hosting_provider_id"
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
            >
                <option value=""disabled>Select a Hosting Provider</option>

                @foreach ($hostingProviders as $provider)
                    <option
                        value="{{ $provider->id }}"
                        @selected(old('hosting_provider_id', $site->hosting_provider_id) == $provider->id)
                    >
                        {{ $provider->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status --}}
        <div>
            <label
                for="status"
                class="mb-2 block text-sm font-medium text-slate-300"
            >
                Status
            </label>

            <select
                name="status"
                id="status"
                class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
            >
                <option
                    value="active"
                    @selected(old('status', $site->status) === 'active')
                >
                    Active
                </option>

                <option
                    value="inactive"
                    @selected(old('status', $site->status) === 'inactive')
                >
                    Inactive
                </option>

                <option
                    value="pending"
                    @selected(old('status', $site->status) === 'pending')
                >
                    Pending
                </option>
            </select>
        </div>

        {{-- Notes --}}
        <div>
            <label
                for="notes"
                class="mb-2 block text-sm font-medium text-slate-300"
            >
                Notes
            </label>

            <textarea
                name="notes"
                id="notes"
                rows="5"
                class="w-full resize-none rounded-lg border border-slate-700 bg-slate-800 px-4 py-2.5 text-white outline-none transition placeholder:text-slate-500 focus:border-slate-500 focus:ring-2 focus:ring-slate-700"
            >{{ old('notes', $site->notes) }}</textarea>
        </div>

        <div class="flex items-center gap-3 border-t border-slate-800 pt-5">

            <button
                type="submit"
                class="rounded-lg bg-slate-700 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-slate-600"
            >
                Update Site
            </button>

            <a
                href="{{ route('sites.show', [$client, $site]) }}"
                class="rounded-lg border border-slate-700 px-5 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection
