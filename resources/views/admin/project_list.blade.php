@extends('admin.template')
@section('content')


<h1 class="h3 mb-4 text-gray-800">Post List</h1>

          <div style="overflow-x:auto;">
            <table class="project-list-table" style="width: max-content;">
              <thead>
                  <tr class="bg-primary text-white text-center">
                      <th class="no">No</th>
                      <th class="title">Title</th>
                      <th class="subtitle">Sub Title</th>
                      <th class="body">Body</th>
                      <th class="client">Client</th>
                      <th class="client-web">Client Website</th>
                      <th class="completed-date">Completed Date</th>
                      <th class="created">Created At</th>
                      <th class="updated">Updated At</th>
                      <th class="actions">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($projects as $project)
                  <tr>
                      <td class="text-center">1</td>
                      <td>{{$project->title}}</td>
                      <td>{{$project->subtitle}}</td>
                      <td>{!!$project->detail!!}</td>
                      <td class="text-center">{{$project->client}}</td>
                      <td class="text-center">{{$project->client_web}}</td>
                      <td class="text-center">{{$project->complete_date}}</td>
                      <td class="text-center">{{$project->created_at}}</td>
                      <td class="text-center">{{$project->updated_at}}</td>
                      <td class="text-center">
                        <a href="/show_project/{{$project->id}}" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete_btn"data-id='{{$project->id}}' data-title='{{$project->title}}' data-toggle="modal" data-target="#delete-modal">Delete</button>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>

          <div class="modal fade" id="delete-modal">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header border-0">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>

          <div class="modal-body">
            <input type="hidden" id="delete_id">
            <input type="text" id="delete_title" placeholder="Post Title" class="form-control">
          </div>

          <div class="modal-footer border-0">
            <button type="button" class="btn btn-danger btn-sm" id="btn_delete">Delete</button>
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
          </div>

        </div>
      </div>
    </div>


   <script>
     $(document).ready(function($) {
      $(".delete_btn").click(function(event) {
        var id=$(this).attr('data-id');  
        var title=$(this).attr('data-title');
        $('#delete_title').val(title);
        $('#delete_id').val(id)
      });
      $('#btn_delete').click(function() {
              var id=$('#delete_id').val();
              var answer=confirm('Do you want to delete?');
              if(answer){
               $.ajax({
                url: '/delete_project/'+id,
                type: 'GET',
                success: function(){
                  //console.log('success');
                  $('#delete-modal').modal('hide');
                  $('#mesg').text('Delete success');
                  location.reload();
                  var x = document.getElementById("snackbar");
                              x.className = "show";
                              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                },
                error:function(request, status, error) {
                  $('#mesg').text(status);
                  var x = document.getElementById("snackbar");
                      x.className = "show";
                      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                }
              });
              }
              else{
                $('#mesg').text("Delete Canceled");
                  var x = document.getElementById("snackbar");
                              x.className = "show";
                              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
              }
      });

     });
   </script>
          
@endsection