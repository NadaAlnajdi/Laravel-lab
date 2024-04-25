
@extends ("layouts.app")

@section('content')
<body>
<div class="container">
    
Create new post

<form action="/posts" method="POST" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input name="title" type="Title" class="form-control" id="exampleInputTitle1" aria-describedby="TitleHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputBody1" class="form-label">Body</label>
    <input type="Body" name="body" class="form-control" id="exampleInputBody1">
  </div>
  <div class="mb-3">
    <label for="exampleInputBody1" class="form-label">user_id</label>
    <input type="Body" name="user_id" class="form-control" id="exampleInputBody1">
  </div>

  <div class="mb-3">
    <label for="exampleInputImage1" class="form-label">image</label>
    <input type="file" name="image" class="form-control" id="exampleInputImage1">
  </div>

  <button type="submit" class="btn btn-primary">Create Post</button>
  
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