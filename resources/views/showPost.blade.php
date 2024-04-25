
@extends ("layouts.app")

@section('content')
<body>
<div class="container">
    Post Data
<ul>


    <li>{{$post['id']}}</li>
    <li>{{$post['title']}}</li>
    <li>{{$post['body']}}</li>
    <li>{{$post['user_id']}}</li> 
    @if($post['image'])
                    <li class="list-group-item">
                        
                        <img src="{{ asset('storage/' . $post['image']) }}" class="img-fluid" alt="Post Image">
                    </li>
                @endif


                <h2>Comments</h2>
<ul>
    @foreach ($comments as $comment)
        <li>{{ $comment->body }}</li>
    @endforeach
</ul>
    <ul>

    <a href="/posts/{{$post->id}}/comments/create" class="btn btn-primary">Add Comment</a>

</div>
</body>
@endSection