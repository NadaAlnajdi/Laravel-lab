
@extends ("layouts.app")

@section('content')
<body>
    <div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">user_created</th>

      <th colspan="3" scope="col" class="text-center">Actions</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
        <tr>
            <td>{{ $post['id'] }}</td>
            <td>{{ $post['title'] }}</td>
            <td>{{ $post['body'] }}</td>
            <td>{{ $post->user->name }}</td>


            <td>
            <a href="/posts/{{ $post['id'] }}" class="btn btn-warning " type="submit">Show</a>

            </td>
            <td>
            <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-info " type="submit">Edit</a>

            </td>
            
                
                   <td>
                    <form action="/posts/{{ $post['id'] }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

  </tbody>
</table>
<div class="d-flex justify-content-center">
{{ $posts->links() }}
</div>
<a class="btn btn-outline-success" href="/posts/create" type="submit" >Add Post</a>
</div>

</body>

@endSection

