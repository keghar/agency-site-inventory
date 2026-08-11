<div>
    <h1>Edit Client {{ $client->name }}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
    <form method="POST" action="{{ route('clients.update', $client) }}">
        @csrf
        @method('PATCH')

     <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $client->name }}"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $client->email }}"><br>

        <label for="company">Company:</label>
        <input type="text" name="company" id="company" value="{{ $client->company }}"><br>

        <button type="submit">Update Client</button>

    </form>

</div>
