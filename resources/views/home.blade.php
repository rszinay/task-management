{{-- Start html page --}}
@include('main.header')

{{-- Check user logged in --}}
@auth

    @include('tasks.list-tasks')

@else

    @include('users.login')

@endauth

{{-- End of html page --}}
@include('main.footer')
