<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadLog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background:#f5f5f5;
        }
        .card{
            border:none;
            border-radius:15px;
        }
        .title{
            font-weight:bold;
            font-size:35px;
        }
        .subtitle{
            color:gray;
            margin-top:-8px;
        }
        .btn-dark{
            border-radius:10px;
        }
        table{
            margin-top:20px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card shadow p-4">
        <h1 class="title">ReadLog</h1>
        <p class="subtitle">Keep Track of Your Reading Journey</p>
        <a href="/create" class="btn btn-dark mb-3">
            + Add Reading
        </a>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($readings as $reading)
                <tr>
                    <td>{{ $reading->title }}</td>
                    <td>{{ $reading->type }}</td>
                    <td>{{ $reading->status }}</td>
                    <td>
                        <form action="/delete/{{ $reading->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No reading list yet
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>