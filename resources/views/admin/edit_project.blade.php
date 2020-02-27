@extends('admin.template')
@section('content')
 <h1 class="h3 mb-4 text-gray-800">Update Project</h1>

          <div>
            <form action="/update_project" method="post" enctype="multipart/form-data" id="add_form" >
                @csrf
                <div class="form-group">
                    <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}">
                    <input type="hidden" id="imgstr" name='imgstr' value="{{$project->img}}">
                    <label for="project_title" class="form-control-label">Title:</label>
                    <input type="text" id="project_title" value="{{$project->title}}" name="project_title" class="form-control" placeholder="Enter Project Title">
                </div>
                <div class="form-group">
                    <label for="sub_title" class="form-control-label">Sub Title:</label>
                    <input type="text" name="sub_title"value="{{$project->subtitle}}" id="sub_title" class="form-control" placeholder="Enter Project Sub Title">
                </div>
                <div class="form-group">
                    <label for="client"  class="form-control-label">Client:</label>
                    <input type="text" name="client" id="client" value="{{$project->client}}" class="form-control" placeholder="Enter Client">
                </div>
                <div class="form-group">
                    <label for="client_web" class="form-control-label">Client Website:</label>
                    <input type="text" name="client_web" id="client_web" value="{{$project->client_web}}"class="form-control" placeholder="Enter Client Website">
                </div>
                <div class="form-group">
                    <label for="completed_date" class="form-control-label">Project Completed Date:</label>
                    <input type="date" id="completed_date" name="completed_date" value="{{$project->complete_date}}" class="form-control" placeholder="Enter Client Website">
                </div>
                <div class="form-group">
                    <label for="post_body" class="form-control-label">Project Detail:</label>
                    <textarea id="summernote" cols="30" rows="10" id="post_body" name="post_body">{{$project->detail}}</textarea>
                </div>
                <div class="form-group">
                    <label for="project_category_id" class="form-control-label">Category:</label>
                    <select class="form-control" id="project_category_id" name="project_category_id">
                        @foreach($categorys as $category)
                        <option value='{{$category->id}}'@if($category->id == $project->project_category_id){{'selected'}}@endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="post_image">Choose Image:</label>
                    <input type="file" id="post_image" name="post_image" class="form-control-file">
                </div>
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary" id="submit">
                </div>
            </form>
          </div>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
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
                    project_title: {required: true,},
                    sub_title: {required: true,},
                    completed_date: {required: true,},
                    post_body: {required: true,},
                    project_category_id: {required: true,},
                       },
                messages: {
                    project_title: {required: "Please fill this form",},
                    sub_title: {required: "Please fill this form",},
                    completed_date: {required: "Please fill this form",},
                    post_body: {required: "Please fill this form",},
                    project_category_id: {required: "Please fill this form",},

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