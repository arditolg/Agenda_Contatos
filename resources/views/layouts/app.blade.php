<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        h1 {
            margin: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav li {
            display: inline-block;
            margin-right: 20px;
        }

        nav li:last-child {
            margin-right: 0;
        }

        nav a {
            color: #fff;
            text-decoration: none;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007BFF;
        }

        .btn-danger {
            background-color: #DC3545;
        }

        .mb-2 {
            margin-bottom: 16px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .alert {
            padding: 10px;
            border: 1px solid #28A745;
            border-radius: 4px;
            background-color: #D4EDDA;
            color: #155724;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div id="app">
        <header>
            <h1>Minha Agenda de Contatos</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('contacts.index') }}">Contatos</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>