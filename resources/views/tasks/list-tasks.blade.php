<div class="row ">
        <h1>All Tasks</h1>
        <div class="col">
            <p><a href="/create-task" class="btn btn-success btn-sm">Create task</a></p>

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
                            <td>{{$task->statusLabel}}</td>
                            <td>{{$task->user->name}}</td>
                            <td>{{$task->deadline_at}}</td>
                            <td>
                                <a href="/edit-task/{{$task->id}}" class="btn btn-warning d-inline" role="button">Edit</a>
                                <form action="/delete-task/{{$task->id}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

