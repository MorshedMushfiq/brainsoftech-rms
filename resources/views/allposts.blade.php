<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    @include('layouts.header')
</head>
<body>
    
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

                @if(Session::has("success"))
                <p class='alert alert-success my-2'>{{Session::get("success")}} <button class='close' data-dismiss="alert">&times;</button> </p>

                @endif
                <p class="card-title mb-0">My Blogs</p>

                @if(Auth::user()->user_roles=='admin' || Auth::user()->user_roles=='super admin')

                @if(Auth::user()->user_roles=='super admin')
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary btn-sm my-2" data-toggle="modal" data-target="#addnewmodal">
                    Add New Post
                </button>

                <!-- The Modal -->
                <div class="modal" id="addnewmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                
                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Add New Post</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                    
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{route('blog.upload')}}" method='POST' enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Post Title:</label>
                                        <input type="text" value="" name='post_title' placeholder='Post Title' class='form-control'>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="">Post Description:</label>
                                        <textarea type="text" name='post_description' placeholder='Post Description' class='form-control'></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value='Upload Post' class='btn btn-info'>
                                    </div>
                                </form>
                            </div>
                
                        </div>
                    </div>
                </div>
              @endif
              <div class="table-responsive">
                <table style='overflow-x: visiable;' class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>#.</th>
                      <th>Post Title</th>
                      <th>description</th>
                      <th>Action</th>
                    </tr>  
                  </thead>
                  <tbody>
                    @php
                        $i=0;
                    @endphp

                    @foreach($blog as $post)
                   

                    @php
                        $i++;
                    @endphp
                    <tr>
                      <td>1</td>
                      <td>{{$post->title}}</td>
                      <td style='width: 100%;'><p>{{$post->description}}</p></td>
                      <td>
                     

                      <button type="button" class="btn btn-primary btn-sm my-2" data-toggle="modal" data-target="#addnewmodal{{$i}}">
                        Edit your Post
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="addnewmodal{{$i}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                    
                                <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">Edit Post</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                        
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{route('update.post', $post->id)}}" method='POST' enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Post Title:</label>
                                            <input type="text" value="{{$post->title}}" name='post_title' placeholder='Post Title' class='form-control'>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="">Post Description:</label>
                                            <textarea type="text" name='post_description' placeholder='Post Description' class='form-control'>{{$post->description}}</textarea>
                                        </div>
                                       
                                        <div class="form-group">
                                            <input type="submit" value='Update Post' class='btn btn-primary'>
                                        </div>
                                    </form>
                                </div>
                    
                            </div>
                        </div>
                    </div>

                        @if(Auth::user()->user_roles=="super admin")
                        <a href="{{route('delete.post', $post->id)}}" class='btn btn-danger btn-sm'>Delete</a>
                        @endif
                      </td>    
                    </tr>
                 
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    @endif
    <h4 class='bg-dark text-light rounded p-3 my-2 text-center'>See All Blogs</h4>
    <div class="d-flex justify-content-between row my-2">
        @foreach($blog as $posts)
        <div class="col-md-5 border border-warning my-2">
            <div class="d-flex flex-column comment-section">
                
                <div class="mt-2">
                    <p class="display-4">{{$posts->title}}</p>
                </div>
              
                <div class="bg-white">
                    <div class="d-flex flex-row fs-12">{{$posts->description}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>

    

    @include('layouts.script')
</body>
</html>