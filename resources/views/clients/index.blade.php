@extends('layouts.app')

@section('content')

                    <h1 class="mb-1 font-medium">Clients</h1><div>
                    @if($clients->isEmpty())
                        <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">No clients found.</p>
                    @else
                    @foreach ($clients as $client)
                        <a href="{{ route('clients.show', $client) }}"><p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">{{ $client->name }}</p></a>
                    @endforeach
                    @endif</div>
@endsection
