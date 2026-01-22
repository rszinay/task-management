@include('main.header')

    <div class="container vh-100">
        <div class="row h-50 justify-content-center align-items-center">
            <div class="col-10 col-md-6 col-lg-4">
                <form action="/register" method="POST" class="border p-4 rounded bg-light">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                        <div id="nameHelp" class="form-text">User name requires minimum 3 characters.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

@include('main.footer')
