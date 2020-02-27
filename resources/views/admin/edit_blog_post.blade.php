@extends('admin.template')
@section('content')
    <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Update Post</h1>

          <div>
            <form action="/update_blog_post" method="post" enctype="multipart/form-data" id="add_form">
                @csrf
                <div class="form-group">
                    <label for="post-title" class="form-control-label">Title:</label>
                    <input type="text" name="post" value="{{$post->title}}" id="post-title" class="form-control" placeholder="Enter Post Title">
                </div>
                <div class="form-group">
                  <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
                  <input type="hidden" id="imgstr" name='imgstr' value="{{$post->img}}">
                    <label for="post-body" class="form-control-label">Post Detail:</label>
                    <textarea id="summernote" name="detail" cols="30" rows="10"  class="@error('detail') is-invalid @enderror">{{$post->details}}</textarea>
                    @error('detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="post-image">Choose Image:</label>
                    <input type="file" name="img" id="post-image" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="post-category" class="form-control-label">Category:</label>
                    <select class="form-control" id="post-category" name="category_id">
                        @foreach($categorys as $category)
                        <option value='{{$category->id}}' @if($category->id == $post->category_id){{'
                                selected'}}@endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" id="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
          </div>


          <script>
              $('#summernote').summernote({
                placeholder: 'What\'s on your mind?',
                tabsize: 2,
                height: 100
              });
          </script>
          <script>
              $(document).ready(function($) {
                $("#add_form").validate({
                rules: {
                    post: {required: true,},
                    detail: {required: true,},
                    category_id: {required: true,},
                       },
                messages: {
                    name: {required: "Please enter the full name",},
                    detail: {required: "Please enter the detail",},
                    category_id: {required: "Please select category",},
                    }
                });
                $('#submit').click(function(event) {
                    
                    var IsValid=$("#add_form").valid();
                    if(!IsValid){
                        event.preventDefault();
                    }
                });
                  
              });
          </script>


@endsection
