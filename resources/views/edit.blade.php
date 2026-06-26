<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reading</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container mt-5">
<div class="card shadow-lg p-4 main-card">
    <div class="title">
        Edit Reading
    </div>
    <div class="subtitle mb-4">
        Update your reading information
    </div>
    <form action="/update/{{ $reading->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">
                Title
            </label>
            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ $reading->title }}"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">
                Type
            </label>
            <select name="type" class="form-select">
                <option {{ $reading->type=='Manga' ? 'selected' : '' }}>Manga</option>
                <option {{ $reading->type=='Manhwa' ? 'selected' : '' }}>Manhwa</option>
                <option {{ $reading->type=='Manhua' ? 'selected' : '' }}>Manhua</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">
                Status
            </label>
            <select name="status" class="form-select">
                <option {{ $reading->status=='Ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option {{ $reading->status=='Completed' ? 'selected' : '' }}>Completed</option>
                <option {{ $reading->status=='Waiting' ? 'selected' : '' }}>Waiting</option>
            </select>
        </div>
        <button class="btn btn-save">
            Update Reading
        </button>
        <a href="/" class="btn btn-secondary btn-back">
            Back
        </a>
    </form>
</div>
</div>
</body>
</html>