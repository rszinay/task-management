<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Task Management</title>
</head>
<body>


{{-- Header nav bar --}}
<div class="container">
    <nav class="navbar bg-body-tertiary " role="navigation">
        <div class="container-fluid">
            <a class="navbar-brand">Task Management</a>

            @auth
                <form action="/logout" method="POST" class="d-flex column-gap-3" role="search">
                    @csrf
                    <span class="navbar-text">
                      Logged in:
                      {{auth()->user()->name}}
                    </span>
                    <button class="btn btn-outline-primary btn-sm">Logout</button>
                </form>
            @endauth

        </div>
    </nav>
</div>

{{-- Start main container --}}
<div class="container">
