@extends('admin.template')
@section('content')

              <h1 class="h3 mb-4 text-gray-800">Post List</h1>

          <div style="overflow-x:auto;">
            <table class="post-list-table" style="width: max-content;" id="myTable">
              <thead>
                  <tr class="bg-primary text-white text-center">
                      <th class="no">No</th>
                      <th class="title">Title</th>
                      <th class="body">Category</th>
                      <th class="created">Created At</th>
                      <th class="updated">Updated At</th>
                      <th class="actions">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                  <tr>
                      <td class="text-center">{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      <td>{!!$post->category->name!!}</td>
                      <td class="text-center">{{$post->created_at}}</td>
                      <td class="text-center">{{$post->updated_at}}</td>
                      <td class="text-center">
                        <a  href="/show_post/{{$post->id}}" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete_btn"data-id='{{$post->id}}' data-title='{{$post->title}}' data-toggle="modal" data-target="#delete-modal">Delete</button>
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Delete Modal -->
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
      $('#myTable').DataTable();
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
                url: '/delete_post/'+id,
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
