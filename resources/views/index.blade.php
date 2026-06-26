<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ReadLog</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
<div class="main-card shadow-lg">
<div class="hero-box">
<div class="left-box">
<div class="logo">
Reader's Companion
</div>
<p class="subtitle">
Every story needs a reader. Every reader deserves a place to remember the stories they love
</p>
<a href="/create" class="btn btn-add">
+ Add Reading
</a>
<form method="GET" action="/">
<div class="filter-card">
<div class="row align-items-end">
<div class="col-md-4">
<label class="form-label fw-bold">
Status
</label>
<select name="status" class="form-select">
<option value="All">All</option>
<option value="Ongoing"
{{ request('status')=='Ongoing' ? 'selected' : '' }}>
Ongoing
</option>
<option value="Completed"
{{ request('status')=='Completed' ? 'selected' : '' }}>
Completed
</option>
<option value="Waiting"
{{ request('status')=='Waiting' ? 'selected' : '' }}>
Waiting
</option>
</select>
</div>
<div class="col-md-4">
<label class="form-label fw-bold">
Type

</label>

<select name="type" class="form-select">

<option value="All">All</option>

<option value="Manga"
{{ request('type')=='Manga' ? 'selected' : '' }}>
Manga
</option>

<option value="Manhwa"
{{ request('type')=='Manhwa' ? 'selected' : '' }}>
Manhwa
</option>

<option value="Manhua"
{{ request('type')=='Manhua' ? 'selected' : '' }}>
Manhua
</option>

</select>

</div>

<div class="col-md-4">

<button class="btn btn-dark w-100">

Filter

</button>

</div>

</div>

</div>

</form>

</div>

<div class="right-box">

<div>

<img src="{{ asset('images/hero.jpg') }}" class="hero-img">

<p class="text-center text-muted mt-3">
Your Reading Companion
</p>

</div>

</div>

</div>

<hr class="my-4">

<div class="row g-3">

<div class="col-md-4">

<div class="stats-card">

<small>Total</small>

<h3>{{ $total ?? 0 }}</h3>

</div>

</div>

<div class="col-md-4">

<div class="stats-card">

<small>Ongoing</small>

<h3>{{ $ongoing ?? 0 }}</h3>

</div>

</div>

<div class="col-md-4">

<div class="stats-card">

<small>Completed</small>

<h3>{{ $completed ?? 0 }}</h3>

</div>

</div>

</div>

<table class="table table-hover align-middle">

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

<td>

<strong>

{{ $reading->title }}

</strong>

</td>

<td>

<span class="type-text">
    {{ $reading->type }}
</span>

</td>

<td>

<span class="status-text">
    {{ $reading->status }}
</span>

</td>

<td>

<a href="/edit/{{ $reading->id }}" class="btn btn-edit btn-sm">

Edit

</a>

<form action="/delete/{{ $reading->id }}" method="POST" style="display:inline;">

@csrf

@method('DELETE')

<button
class="btn btn-delete btn-sm"
onclick="return confirm('Delete this reading?')">

Delete

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="4" class="text-center py-5">

<h4>

No Reading Yet 📚

</h4>

<p class="text-muted">

Click <b>Add Reading</b> to start your reading collection.

</p>

</td>

</tr>
@endforelse
</tbody>
</table>
</div>
</div>
</body>
</html>