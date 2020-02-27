@extends('admin.template')
@section('content')


    <h1 class="h3 mb-4 text-gray-800">Category List</h1>

          <div style="overflow-x: auto;">
            <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#add-modal">Add New</button>
            <table class="category-list-table" style="width: max-content;" id="myTable">
              <thead>
                  <tr class="bg-primary text-white text-center">
                      <th class="no">No</th>
                      <th class="category">Category</th>
                      <th class="created">Created At</th>
                      <th class="updated">Updated At</th>
                      <th class="actions">Actions</th>
                  </tr>
              </thead>
              <tbody id="data_table">
                  
              </tbody>
          </table>
          </div>
    <!-- edit Modal -->
    <div class="modal fade" id="edit-modal">
      <div class="modal-dialog">
        <div class="modal-content">
        <form action="/update_category" method="post" id="update_form">
            @csrf
          <div class="modal-body">
            <input type="hidden" id="update_id">
            <button type="button" class="close mb-3" data-dismiss="modal">&times;</button>
            <input type="text" id="edit_name" placeholder="Enter Category Name" class="form-control">
          </div>

          <div class="modal-footer border-top-0">
            <button type="button" class="btn btn-primary btn-sm " id="update_btn">Update</button>
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
          </div>
      </form>

        </div>
      </div>
    </div>

    <!-- add Modal -->
    <div class="modal fade" id="add-modal">
      <div class="modal-dialog">
        <div class="modal-content">
        <form action="/add_category" method="post" id="add_form">
        @csrf
          <div class="modal-body">
            <button type="button" class="close mb-3" data-dismiss="modal">&times;</button>
            <input type="text" name="name" id="name" placeholder="Enter Category Name" class="form-control">
            
          </div>
          <div class="modal-footer border-top-0">
            <input type="submit" name="submit" id="add_category" class="btn btn-primary btn-sm" value="Save">
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
          </div>
          </form>

        </div>
      </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header border-0">
            <input type="hidden" id="delete_id">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" id="delete_name" placeholder="Category Name" class="form-control">
          </div>

          <div class="modal-footer border-0">
            <button type="button" class="btn btn-danger btn-sm" id="delete_btn">Delete</button>
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
          </div>

        </div>
      </div>
    </div>
    <script>
        $(document).ready(function($) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $("#add_form").validate({
            rules: {
                name: {required: true,}
                   },
            messages: {
                name: {required: "Please enter the full name",}
                }
            });
            $("#update_form").validate({
            rules: {
                name: {required: true,}
                   },
            messages: {
                name: {required: "Please enter the full name",}
                }
            });
            graph();
            $('#add_category').click(function(event) {
                event.preventDefault();
                var IsValid=$("#add_form").valid();
               if(IsValid){
                var name=$('#name').val();
                 $.ajax({
                         type: "POST",
                         url: "/add_project_category",
                         data: {name:name},
                         success: function(response){
                            graph();
                            $('#add-modal').modal('hide');
                            $('#mesg').text('Save success');
                              var x = document.getElementById("snackbar");
                                          x.className = "show";
                                          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                         },
                         error: function(){
                            $('#mesg').text('Error ');
                              var x = document.getElementById("snackbar");
                                          x.className = "show";
                                          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                         }
                 });
                }
                else{
                }
                /* Act on the event */
            });
            $('#update_btn').click(function(event) {
                event.preventDefault();
                var IsValid=$("#update_form").valid();
               if(IsValid){
                var name=$('#edit_name').val();
                var id=$('#update_id').val();
                 $.ajax({
                         type: "POST",
                         url: "/update_project_category",
                         data: {name:name ,id:id},
                         success: function(response){
                            clear_datatable();
                            graph();
                            $('#edit-modal').modal('hide');
                            $('#mesg').text('Update success');
                              var x = document.getElementById("snackbar");
                                          x.className = "show";
                                          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                         },
                         error: function(){
                            $('#mesg').text('Error ');
                              var x = document.getElementById("snackbar");
                                          x.className = "show";
                                          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                         }
                 });
                }
                else{
                }
                /* Act on the event */
            });
            $(document).on('click','.btn_edit' , function() {
              /*var data = table.row( $(this).parents('tr') ).data();*/
              // console.log(data);
              var id=$(this).attr('data-id');
              var name=$(this).attr('data-name');
              $('#edit_name').val(name);
              $('#update_id').val(id)
            });
            $(document).on('click','.btn_delete' , function() {
              var id=$(this).attr('data-id');  
              var name=$(this).attr('data-name');
              $('#delete_name').val(name);
              $('#delete_id').val(id)
            });
            $('#delete_btn').click(function() {
              var id=$('#delete_id').val();
              var answer=confirm('Do you want to delete?');
              if(answer){
               $.ajax({
                url: '/delete_project_category/'+id,
                type: 'GET',
                success: function(){
                  //console.log('success');
                  $('#delete-modal').modal('hide');
                  $('#mesg').text('Delete success');
                  clear_datatable();
                  graph();
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
            function graph(){
              /*$('#myTable').DataTable().clear();
              $('#myTable').DataTable().ajax.reload();*/
                $.ajax({
                         type: "GET",
                         url: "/list_project_category",
                         success: function(response){
                            var html='';
                            $.each(response ,function(i,v) {
                                var num=i+1;
                                html+=`<tr>
                                          <td class="text-center">${num}</td>
                                          <td>${v.name}</td>
                                          <td class="text-center">${v.created_at}</td>
                                          <td class="text-center">${v.updated_at}</td>
                                          <td class="text-center">
                                              <button class="btn btn-info btn-sm btn_edit" data-toggle="modal" data-target="#edit-modal" data-id='${v.id}' data-name='${v.name}'>Edit</button>
                                              <button class="btn btn-danger btn-sm btn_delete" data-toggle="modal" data-target="#delete-modal" data-id='${v.id}'data-name='${v.name}'>Delete</button>
                                          </td>
                                      </tr>` 
                            });
                            $('#data_table').html(html); 
                            $('#myTable').DataTable();
                            
                         },
                         error: function(){
                         }
                 });

            }
            function clear_datatable(){
              var table = $('#myTable').DataTable();
              table.destroy();
            }            
        });
    </script>
@endsection
