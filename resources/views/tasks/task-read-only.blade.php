@include('main.header')

<div class="container vh-100">
    <div class="row h-50 justify-content-center align-items-center">
        <div class="col-10 col-md-6 col-lg-4 shadow p-3 mb-5 bg-body-tertiary rounded">
            <table class="table">
                <tr>
                    <th class="bg-body-tertiary">Title</th>
                    <td class="bg-body-tertiary">{{$task->title}}</td>
                </tr>
                <tr>
                    <th class="bg-body-tertiary">Description</th>
                    <td class="bg-body-tertiary">{{$task->description}}</td>
                </tr>
                <tr>
                    <th class="bg-body-tertiary">Status</th>
                    <td class="bg-body-tertiary">{{$statuses[$task->status]}}</td>
                </tr>
                <tr>
                    <th class="bg-body-tertiary">Deadline at</th>
                    <td class="bg-body-tertiary">{{$task->deadline_at}}</td>
                </tr>
                <tr>
                    <th class="bg-body-tertiary">Assigned to</th>
                    <td class="bg-body-tertiary">{{$task->user->name}}</td>
                </tr>
            </table>
            <p><a href="/" class="btn btn-outline-primary btn-sm">Back</a></p>
        </div>
    </div>
</div>

@include('main.footer')
