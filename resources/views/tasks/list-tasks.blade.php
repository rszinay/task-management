<p><a href="/create-task">Create task</a></p>

<div style="border: 3px black solid;">
    <h2>All Tasks</h2>
    @foreach($tasks as $task)
        <div style="background-color: gray; padding: 10px; margin: 10px;">
            <h3>{{$task['title']}} <small>by {{$task->user->name}}</small></h3>
            {{$task['description']}}
            <p><a href="/edit-task/{{$task->id}}">Edit</a></p>
            <form action="/delete-task/{{$task->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
    @endforeach
</div>
