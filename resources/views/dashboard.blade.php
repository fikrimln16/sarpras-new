<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    @if(session('status'))
        <h1>{{ session('status') }}</h1>
    @endif
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
