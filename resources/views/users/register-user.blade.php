@include('main.header')

    <div class="container vh-100">
        <div class="row h-50 justify-content-center align-items-center">
            <div class="col-10 col-md-6 col-lg-4">
                <h2>Register User</h2>
                <form action="/register" method="POST" class="border p-4 rounded bg-light">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="{{ old('name') }}">
                        <div id="nameHelp" class="form-text">User name requires minimum 3 characters.</div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="/" class="btn btn-outline-primary btn">Back</a>
                </form>
            </div>
        </div>
    </div>

@include('main.footer')
