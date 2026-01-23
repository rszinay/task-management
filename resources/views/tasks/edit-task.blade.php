@include('main.header')

    <div class="container vh-100">
        <div class="row h-50 justify-content-center align-items-center">
            <div class="col-10 col-md-6 col-lg-4">
                <form action="/task/edit/{{$task->id}}" method="POST" class="border p-4 rounded bg-light">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title', $task->title)}}">
                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="10" aria-describedby="descriptionHelp" >{{old('description', $task->description)}}</textarea>
                        <div id="descriptionHelp" class="form-text">Description requires minimum 10 characters.</div>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select form-select mb-3" name="status" id="status">
                            @foreach($statuses as $status)
                                <option value="{{$status['id']}}" {{ $status['id'] === $task->status ? 'selected' : '' }}>
                                    {{$status['label']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deadline_at" class="form-label">Deadline at</label>
                        <input type="date" class="form-control" id="deadline_at" name="deadline_at" value="{{old('deadline_at', $task->deadline_at)}}">
                        @error('deadline_at')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Assigned to</label>
                        <select class="form-select form-select mb-3" name="user_id" id="user_id">
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{$user->id === $task->user_id ? 'selected' : ''}}>
                                    {{$user->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Task</button>
                    <a href="/" class="btn btn-outline-primary btn">Back</a>
                </form>
            </div>
        </div>
    </div>

@include('main.footer')
