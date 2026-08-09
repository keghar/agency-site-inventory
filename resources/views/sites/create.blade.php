<h1>Add Site</h1>

<p>Adding a site for: {{ $client->name }}</p>

<div>
    <form method="POST" action="{{ route('sites.store', $client) }}">
        @csrf
        <label for="name">Site Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="url">Site URL:</label>
        <input type="url" name="url" id="url" required><br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="pending">Pending</option>
        </select><br>

        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes"></textarea><br>

        <button type="submit">Create Site</button>
    </form>
