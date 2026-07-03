<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Todo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{ background:#f5f7fb; }
        .card{ border:none; border-radius:15px; box-shadow:0 5px 20px rgba(0,0,0,.08); }
        h1{ font-weight:700; }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Edit Todo</h1>
            <p class="text-muted mb-0">Update the task</p>
        </div>
        <a class="btn btn-outline-secondary" href="{{ route('todos.index') }}">Back to list</a>
    </div>

    <div class="card">
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('todos.update', $todo) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        class="form-control"
                        value="{{ old('title', $todo->title) }}"
                        required
                        maxlength="255"
                    >
                </div>

                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input
                        id="deadline"
                        name="deadline"
                        type="date"
                        class="form-control"
                        value="{{ old('deadline', optional($todo->deadline)->format('Y-m-d')) }}"
                    >
                </div>

                <div class="form-check mb-3">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="completed"
                        name="completed"
                        value="1"
                        {{ old('completed', $todo->completed) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="completed">Completed</label>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</div>

</body>
</html>

