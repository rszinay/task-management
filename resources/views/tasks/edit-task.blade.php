@include('main.header')

    <h1>Edit Task</h1>
    <form action="/edit-task/{{$task->id}}" method="POST">
        @csrf
        @method('PUT')
        <input name="title" value="{{$task->title}}">
        <textarea name="description">{{$task->description}}</textarea>
        <button>Save Changes</button>
    </form>

@include('main.footer')
