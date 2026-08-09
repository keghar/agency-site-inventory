<div>
    <h1>Create Client</h1>
    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required><br>

        <label for="company">Company:</label>
        <input type="text" name="company" id="company"><br>

        <button type="submit">Create Client</button>
</div>
@error('email')
    <p>{{ $message }}</p>
@enderror
@error('name')
    <p>{{ $message }}</p>
@enderror
@error('company')
    <p>{{ $message }}</p>
@enderror

