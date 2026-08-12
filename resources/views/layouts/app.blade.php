<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agency Site Inventory</title>
</head>
<body>

    <nav>
        <a href="{{ route('dashboard.index') }}">Dashboard</a>
        <a href="{{ route('clients.index') }}">Clients</a>
        <a href="{{ route('clients.create') }}">Add Client</a>
    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>
