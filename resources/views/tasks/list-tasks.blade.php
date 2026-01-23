<div class="row ">
        <h1>All Tasks</h1>
        <div class="col">
            <p><a href="/task/create" class="btn btn-success btn-sm">Create task</a></p>

            <table class="table table-bordered">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Assigned to</th>
                    <th scope="col">Deadline</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->title}}</td>
                            <td>{{$statuses[$task->status]}}</td>
                            <td>{{$task->user->name}}</td>
                            <td>{{$task->deadline_at}}</td>
                            <td>
                                @if($task->user->id === auth()->user()->id)
                                <a href="/task/edit/{{$task->id}}" class="btn btn-warning d-inline" role="button">Edit</a>
                                <form action="/task/delete/{{$task->id}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @else
                                    <a href="/task/read/{{$task->id}}" class="btn btn-primary d-inline" role="button">Read</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

