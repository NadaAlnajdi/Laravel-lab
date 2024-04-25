
@extends ("layouts.app")

@section('content')
<body>
<div class="container">
    <h1>Add Comment</h1>
    @dump($post)
<form action="/posts/{{$post->id}}/comments" method="POST">
    @csrf
    <div class="form-group">
        <label for="content">Comment:</label>
        <textarea name="body" id="content" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
@endSection