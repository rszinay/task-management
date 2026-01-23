@include('main.header')

    <div class="container vh-100">
        <div class="row h-50 justify-content-center align-items-center">
            <div class="col-10 col-md-6 col-lg-4">
                <h2>Create Task</h2>
                <form action="/task/create" method="POST" class="border p-4 rounded bg-light">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="10" aria-describedby="descriptionHelp" >{{ old('description') }}</textarea>
                        <div id="descriptionHelp" class="form-text">Description requires minimum 10 characters.</div>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select form-select mb-3" name="status" id="status">
                            <option value="" {{ old('status') == "" ? 'selected' : '' }}>-- Select --</option>
                            @foreach($statuses as $status)
                                <option value="{{$status['id']}}" {{ old('status') == $status['id'] ? 'selected' : '' }}>
                                    {{$status['label']}}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deadline_at" class="form-label">Deadline at</label>
                        <input type="date" class="form-control" id="deadline_at" name="deadline_at" value="{{ old('deadline_at') }}">
                        @error('deadline_at')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Assigned to</label>
                        <select class="form-select form-select mb-3" name="user_id" id="user_id">
                            <option value="" {{ old('user_id') == "" ? 'selected' : '' }}>-- Select --</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{$user->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save Task</button>
                    <a href="/" class="btn btn-outline-primary btn">Back</a>
                </form>
            </div>
        </div>
    </div>

@include('main.footer')
