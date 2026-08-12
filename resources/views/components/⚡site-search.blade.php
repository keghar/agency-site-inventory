<?php

use App\Models\Site;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public string $search = '';
    public string $status = '';

    #[Computed]
    public function sites()
    {
        return Site::with('client')
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('url', 'like', "%{$this->search}%");
                });
            })->when($this->status, function ($query) {

    // Filter by status if a status is selected
                $query->where('status', $this->status);

})
            ->get();
    }
};
?>
<div>
<div class="max-w-lg">
    <input
        type="text"
        wire:model.live="search"
        placeholder="Search sites..."
    >
    <select wire:model.live="status">
    <option value="">All Statuses</option>
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
    <option value="pending">Pending</option>
</select>


        <label for="search" class="sr-only">
            Search sites
        </label>

        <div class="flex gap-2">

            <input
                type="text"
                wire:model.live="search"
                id="search"
                name="search"
                placeholder="Search sites..."

                class="w-full rounded-lg border border-slate-700 bg-slate-900 px-4 py-2 text-white placeholder-slate-500 outline-none focus:border-blue-500"
            >
            <select
    name="status"
    class="rounded-lg border border-slate-700 bg-slate-900 px-4 py-2 text-white outline-none focus:border-blue-500" wire:model.live="status"
>
      <option value="">All Statuses</option>

    <option value="active">
        Active
    </option>

    <option value="inactive">
        Inactive
    </option>

    <option value="pending">
        Pending
    </option>
</select>

</div>

        </div>




        {{-- Sites --}}
    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3 mt-10">

        @forelse ($this->sites as $site)

            <div class="min-h-40 min-w-64 rounded-xl border border-slate-800 bg-slate-900 p-6">

                <div class="flex w-full justify-between">

                <a
                    href="{{ route('sites.show', [$site->client, $site]) }}"
                    class="text-lg font-semibold text-white hover:text-blue-400"
                >
                    {{ $site->name }}
                </a>
                  <x-site-status :status="$site->status" />
                     </div>


                <div class="mt-5 space-y-2 text-sm">

                    <p class="text-slate-400">
                        Client:
                        <span class="text-slate-200">
                            {{ $site->client->name }}
                        </span>
                    </p>


                    <p class="text-slate-400">
                        URL:
                        <span class="text-slate-200">
                            {{ $site->url }}
                        </span>
                    </p>

                </div>

            </div>

        @empty

            <div class="min-h-40 min-w-64 rounded-xl border border-slate-800 bg-slate-900 p-6">
                <p class="text-slate-400">
                    No sites found.
                </p>
            </div>

        @endforelse

    </div>

</div>
