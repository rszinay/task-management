@include('main.header')

    <div class="container vh-100">
        <div class="row h-50 justify-content-center align-items-center">
            <div class="col-10 col-md-6 col-lg-4">
                <form action="/create-task" method="POST" class="border p-4 rounded bg-light">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="10" aria-describedby="descriptionHelp" ></textarea>
                        <div id="descriptionHelp" class="form-text">Description requires minimum 10 characters.</div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select form-select mb-3" name="status" id="status">
                            <option selected>-- Select --</option>
                            <option value="1">Todo</option>
                            <option value="2">Doing</option>
                            <option value="3">Done</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deadline_at" class="form-label">Deadline at</label>
                        <input type="date" class="form-control" id="deadline_at" name="deadline_at">
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Assigned to</label>
                        <select class="form-select form-select mb-3" name="user_id" id="user_id">
                            <option selected>-- Select --</option>
                            <option value="1">robi</option>
                            <option value="2">robi2</option>
                            <option value="3">robi3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Task</button>
                </form>
            </div>
        </div>
    </div>

@include('main.footer')
