@include('main.header')
    <div style="border: 3px black solid;">
        <h2>Create a new task</h2>
        <form action="/create-task" method="POST">
            @csrf
            <input name="title" type="text" placeholder="task title">
            <textarea name="description" placeholder="task description"></textarea>
            <select name="status">
                <option value="1">todo</option>
                <option value="2">doing</option>
                <option value="3">done</option>
            </select>
            <input name="deadline_at" placeholder="deadline">
            <select name="user_id">
                <option value="1">robi</option>
                <option value="2">robi2</option>
            </select>
            <button>Save Task</button>
        </form>
    </div>
@include('main.footer')
