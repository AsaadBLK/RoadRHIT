@extends('layouts.app')


@section('content')



 <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">Gestion Accessoires</h4>
                    </div>
                    <div class="col-md-12 mb-4 text-right">
                        <a class="btn btn-success" href="javascript:void(0)" id="createNewAccessoire"> <i class="fas fa-plus"></i></a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered data-table">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Désignation</th>
                                    <th>Etat</th>
                                    <th>Commentaire</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="accessoireForm" name="accessoireForm" class="form-horizontal">
                    <input type="TEXT" name="id" id="id">
                    <div class="form-group">
                        <label for="access_name" class="col-sm-2 control-label">Désignation</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="access_name" name="access_name" placeholder="Enter désignation" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="etat" class="col-sm-2 control-label">Etat</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="access_etat" name="access_etat" placeholder="Enter Etat" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Commentaire</label>
                        <div class="col-sm-12">
                            <textarea id="access_commentaire" name="access_commentaire" required="" placeholder="Enter votre commentaire" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Valider</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>









    {{-- <script type="text/javascript">

 $(document).ready( function () {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.data-table').DataTable({
           processing: true,
           serverSide: true,
            ajax: "{{ route('accessoire.index') }}",
           columns: [
                {data:'DT_RowIndex',name:'DT_RowIndex'},
                {data:'access_name',name:'access_name'},
                {data:'access_etat',name:'access_etat'},
                {data:'access_commentaire',name:'access_commentaire'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                 ],
          order: [[0, 'desc']]
    });
    $('#createNewAccessoire').click(function () {
       $('#accessoireForm').trigger("reset");
       $('#modelHeading').html("Add Accessoire");
       $('#ajaxModel').modal('show');
    });


    $('body').on('click', '.editAccessoire', function () {
        var id = $(this).data('id');

        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('edit-accessoire') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#modelHeading').html("Edit Accessoire");
              $('#ajaxModel').modal('show');
              $('#id').val(res.id);
             $('#access_name').val(res.access_name);
             $('#access_etat').val(res.access_etat);
             $('#access_commentaire').val(res.access_commentaire);
           }
        });
    });


    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');

        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete-accessoire') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              var oTable = $('.data-table').dataTable();
              oTable.fnDraw(false);
           }
        });
       }
    });


    $('body').on('click', '#saveBtn', function (event) {
          var id = $("#id").val();
          var access_name = $("#access_name").val();
          var access_etat = $("#access_etat").val();
          var access_commentaire = $("#access_commentaire").val();
          $("#saveBtn").html('Please Wait...');
          $("#saveBtn"). attr("disabled", true);

          // ajax
          $.ajax({
            type:"POST",
            url: "{{ url('add-update-accessoire') }}",
            data: {
              id:id,
              access_name:access_name,
              access_etat:access_etat,
              access_commentaire:access_commentaire,
            },
            dataType: 'json',
            success: function(res){
            $("#ajaxModel").modal('hide');
            var oTable = $('.data-table').dataTable();
            oTable.fnDraw(false);
            $("#saveBtn").html('Submit');
            $("#saveBtn"). attr("disabled", false);
           }
        });
    });
});
</script> --}}




  <script>
    $(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('accessoire.index') }}",
            columns : [
                {data:'DT_RowIndex',name:'DT_RowIndex'},
                {data:'access_name',name:'access_name'},
                {data:'access_etat',name:'access_etat'},
                {data:'access_commentaire',name:'access_commentaire'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#createNewAccessoire').click(function () {
            $('#saveBtn').val("Ajouter-Accessoire");
            $('#id').val('');
            $('#accessoireForm').trigger("reset");
            $('#modelHeading').html("Create New Accessoire");
            $('#ajaxModel').modal('show');

                        $.ajax({
                            data: $('#accessoireForm').serialize(),
                            url: "{{ route('accessoire.store') }}",
                            type: "POST",
                            dataType: 'json',
                            success: function (data) {
                                $('#accessoireForm').trigger("reset");
                                $('#ajaxModel').modal('hide');
                                table.draw();
                            },
                            error: function (data) {
                                console.log('Error:', data);
                                $('#saveBtn').html('Ajouter');
                            }
                        });

        });


        $('body').on('click', '.editAccessoire', function () {
            var accessoire_id = $(this).data('id');
            $.get("{{ route('accessoire.index') }}" +'/' + accessoire_id +'/edit', function (data) {
            $('#modelHeading').html("Editer Accessoire");
            $('#saveBtn').val("editer-Accessoire");
            $('#ajaxModel').modal('show');
            $('#id').val(data.id);
            $('#access_name').val(data.access_name);
            $('#access_etat').val(data.access_etat);
            $('#access_commentaire').val(data.access_commentaire);
            })

                            $.ajax({
                            data: $('#accessoireForm').serialize(),
                            type: "PUT",
                            url: "{{ route('accessoire.store') }}"+'/'+accessoire_id,
                            dataType: 'json',
                            success: function (data) {
                                $('#accessoireForm').trigger("reset");
                                $('#ajaxModel').modal('hide');
                                table.draw();
                            },
                            error: function (data) {
                                console.log('Error:', data);
                                $('#saveBtn').html('Modifier');
                            }
                        });
        });



        // $('#saveBtn').click(function (e) {
        //     e.preventDefault();
        //     $(this).html('Chargement..');

        //     $.ajax({
        //         data: $('#accessoireForm').serialize(),
        //         url: "{{ route('accessoire.store') }}",
        //         type: "POST",
        //         dataType: 'json',
        //         success: function (data) {
        //             $('#accessoireForm').trigger("reset");
        //             $('#ajaxModel').modal('hide');
        //             table.draw();
        //         },
        //         error: function (data) {
        //             console.log('Error:', data);
        //             $('#saveBtn').html('Valider les modifications');
        //         }
        //     });
        // });
        $('body').on('click', '.deleteAccessoire', function (){
            var accessoire_id = $(this).data("id");
            var result = confirm("Voulez vous vraiment supprimer ?!");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('accessoire.store') }}"+'/'+accessoire_id,
                    success: function (data) {
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }else{
                return false;
            }
        });
    });
</script>



@endsection
