<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reading</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container mt-5">
<div class="card shadow-lg p-4 main-card">
    <div class="title">
        Add Reading
    </div>
    <div class="subtitle mb-4">
        Add a new manga, manhwa, or manhua to your reading list.
    </div>
    <form action="/store" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">
                Title
            </label>
            <input
                type="text"
                name="title"
                class="form-control"
                placeholder="Enter title..."
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">
                Type
            </label>
            <select name="type" class="form-select">
                <option>Manga</option>
                <option>Manhwa</option>
                <option>Manhua</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">
                Status
            </label>
            <select name="status" class="form-select">
                <option>Ongoing</option>
                <option>Completed</option>
                <option>Waiting</option>
            </select>
        </div>
        <button class="btn btn-save">
            Save Reading
        </button>
        <a href="/" class="btn btn-secondary btn-back">
            Back
        </a>
    </form>
</div>
</div>
</body>
</html>