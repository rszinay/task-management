<div class="container vh-100">
    <div class="row h-50 justify-content-center align-items-center">
        <div class="col-10 col-md-6 col-lg-4">

            <form action="/login" method="POST" class="border p-4 rounded bg-light">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">User name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="row">
                    <p>
                        <a href="/register">Register User</a>
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
        </div>
    </div>
</div>
