
@extends ("layouts.app")

@section('content')
<body>
<div class="container">
    
Edit post

<form action="/posts/{{$post['id']}}" method="Post">
@csrf
@method('PUt')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="Title" name="title" class="form-control" value="{{ old('title', $post['title']) }}" id="exampleInputTitle1" aria-describedby="TitleHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputBody1" class="form-label">Body</label>
    <input type="Body" name="body" class="form-control" value="{{ old('body', $post['body']) }}" id="exampleInputBody1">
  </div>
  <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <br>
                @if ($post['image'])
                    <img src="{{ asset('storage/' . $post['image']) }}" class="img-thumbnail" width="200" alt="Current Image">
                @endif
                <br>
                <input type="file" class="form-control" id="image" name="image">
            </div>

  <button type="submit" class="btn btn-primary">Edit Post</button>
  
</div>
</form>

<div class="container ">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
</body>
@endSection
