<div>
    <h1>Edit Site</h1>
    <p> Client: {{ $client->name }}</p>
    <p> Site: {{ $site->name }}</p>

    <form method="POST" action="{{ route('sites.update', [$client, $site]) }}">
        @csrf
        @method('PATCH')
        <label for="name">Site Name:</label>
        <input type="text" name="name" id="name" value="{{ $site->name }}"><br>

        <label for="url">Site URL:</label>
        <input type="url" name="url" id="url" value="{{ $site->url }}"><br>

        <label for="status">Status:</label>
        <select name="status" id="status">
           <option value="active" @selected($site->status === 'active')>Active</option>
    <option value="inactive" @selected($site->status === 'inactive')>Inactive</option>
    <option value="pending" @selected($site->status === 'pending')>Pending</option>
        </select><br>

        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes">{{ $site->notes }}</textarea><br>

        <button type="submit">Update Site</button>
    </form>

</div>
