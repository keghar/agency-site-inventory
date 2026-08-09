<div>
 {{ $site->name }} | {{ $site->url }} | {{ $site->status }} | {{ $site->notes }} | {{ $client->name}}

 <br>
    <a href="{{ route('sites.edit', [$client, $site]) }}">Edit Site</a>
        </div>


 <br>

 <form method="POST" action="{{ route('sites.destroy', [$client, $site]) }}">
    @csrf
    @method('DELETE')

    <button type="submit">Delete Site</button>
</form>
</div>
