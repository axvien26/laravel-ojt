<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fb;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .table td,
        .table th{
            vertical-align:middle;
        }

        h1{
            font-weight:700;
        }

        .badge{
            font-size:.85rem;
        }
    </style>

</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>Todo List</h1>
            <p class="text-muted mb-0">
                Manage your daily tasks
            </p>
        </div>

        <a class="btn btn-primary" href="{{ route('todos.create') }}">
            + Add Todo
        </a>


    </div>

    <div class="card">

        <div class="card-header bg-white">

            <h4 class="mb-0">
                All Tasks
            </h4>

        </div>

        <div class="card-body p-0">

            <table class="table table-hover mb-0">

                <thead class="table-light">

                <tr>

                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Deadline</th>
                    <th width="160">Actions</th>

                </tr>

                </thead>

                <tbody>

                @foreach($todos as $todo)

                <tr>

                    <td>{{ $todo->id }}</td>

                    <td>{{ $todo->title }}</td>

                    <td>

                        @if($todo->completed)

                            <span class="badge bg-success">
                                Completed
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Pending
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($todo->deadline)
                            {{ \Carbon\Carbon::parse($todo->deadline)->format('M d, Y') }}
                        @else
                            <span class="text-muted">—</span>
                        @endif

                    </td>


                    <td>

                        <a class="btn btn-warning btn-sm" href="{{ route('todos.edit', $todo) }}">
                            Edit
                        </a>

                        <form
                            action="{{ route('todos.destroy', $todo) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Delete this todo?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>

                    </td>


                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>
