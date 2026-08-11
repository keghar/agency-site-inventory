<div>
    <h1>Client</h1>
 {{$client->name}} | {{ $client->email }} | {{ $client->company }}

<h2>Client Sites</h2>
@foreach ($client->sites as $site)
    <p><a href="{{ route('sites.show', [$client, $site]) }}">{{ $site->name }}</a></p>



@endforeach
 <div>
        <a href="{{ route('sites.create', $client) }}">Add Site</a>
        </div>
</div><br>
   <form method="POST" action="{{ route('clients.destroy', $client) }}">
    @csrf
    @method('DELETE')

    <button type="submit">Delete Client</button>
</form>
