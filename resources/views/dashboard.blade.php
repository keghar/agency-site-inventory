@extends('layouts.app')

@section('content')


<div>
 <h1> Dashboard: {{ $title }}</h1>
 <div>
    There are {{ $clientCount }} clients and {{ $siteCount }} sites.
 </div>

 <div>

    @if ($recentSites->isEmpty())
    <p>No sites found.</p>
@else
    @foreach ($recentSites as $site)
        <p><a href="{{ route('sites.show', [$site->client, $site] ) }}">{{ $site->name }}</a></p>
    @endforeach
@endif



 </div>
</div>
@endsection
