{{-- Start html page --}}
@include('main.header')

{{-- Check user logged in --}}
@auth
    <p>Logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>

    @include('tasks.list-tasks')

@else

    @include('users.login')

@endauth

{{-- End of html page --}}
@include('main.footer')
