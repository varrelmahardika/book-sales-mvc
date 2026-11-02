<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Book Sales</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        nav a { margin-right: 15px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #4472c4; color: #fff; }
    </style>
</head>
<body>
    <nav>
        <a href="/genres">Genre</a>
        <a href="/authors">Author</a>
    </nav>
    @yield('content')
</body>
</html>