<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
              <a href="{{ url('add-data') }}" class="btn btn-success my-3">Add Data</a>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Description</th>
                        <th scope="col">Create Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($posts as $key=>$post)
                       <tr>
                           <td>{{ $key+1 }}</td>
                           <td>{{ Str::limit($post->title,10) }}</td>
                           <td>{{ $post->status }}</td>
                           <td>{{ Str::limit($post->description,50) }}</td>
                           <td>
                             {{ $post->created_at->toDateString() }}
                            </td>
                            <td>
                              <a href="{{ url('edit-data/'.$post->id) }}" class="btn btn-sm btn-success">Edit</a>
                              <a href="{{ url('delete-data/'.$post->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                       </tr>
                      @endforeach 
                    </tbody>
                  </table>
                  {{ $posts->links() }}
            </div>
        </div>

        {{-- //soft delete --}}
        <div class="row my-5">
          <div class="col-sm-12">
            <a href="#" class="btn btn-success my-3">Trash List</a>
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Status</th>
                      <th scope="col">Description</th>
                      <th scope="col">Create Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trashPosts as $key=>$post)
                     <tr>
                         <td>{{ $key+1 }}</td>
                         <td>{{ Str::limit($post->title,10) }}</td>
                         <td>{{ $post->status }}</td>
                         <td>{{ Str::limit($post->description,50) }}</td>
                         <td>
                           {{ $post->created_at->toDateString() }}
                          </td>
                          <td>
                            <a href="{{ url('restore-data/'.$post->id) }}" class="btn btn-sm btn-success">Restore</a>
                            <a href="{{ url('permanent-delete-data/'.$post->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger">Delete</a>
                          </td>
                     </tr>
                    @endforeach 
                  </tbody>
                </table>
          </div>
      </div>
    </div>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
  </body>
</html>