<div style="border: 3px black solid;">
    <h2>Login</h2>
    <form action="/login" method="POST">
        @csrf
        <input name="name" type="text" placeholder="name">
        <input name="password" type="password" placeholder="password">
        <button>Log in</button>
    </form>
    <p><a href="/register">Register User</a></p>
</div>
