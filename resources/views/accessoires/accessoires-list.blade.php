@extends('layouts.app')

@section('content')
<div class="container">


<hr class="mt-2 mb-3"/>
@section('gridtitle', 'Liste des accessoires')
@include('layouts.grid')
<hr class="mt-2 mb-3"/>

          <div class="row" style="margin-top: 5px">
              <div class="col-md-8">

                {{-- <input type="text" name="searchfor" id="" class="form-control"> --}}
                    <div class="card">
                        <div class="card-header">Accessoires</div>
                        <div class="card-body">
                            <table class="table table-hover table-condensed" id="accessoires-table">
                                <thead>
                                    <th><input type="checkbox" name="main_checkbox"><label></label></th>
                                    <th>#</th>
                                    <th>Désignation</th>
                                    <th>Etat</th>
                                    <th>Commentaire</th>
                                    <th>Actions <button class="btn btn-sm btn-danger d-none" id="deleteAllBtn">Tout supprimer</button></th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Ajouter un nouvel accessoire</div>
                        <div class="card-body">
                            <form action="{{ route('accessoires.add.accessoire') }}" method="post" id="add-accessoire-form" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="">Accessoire nom</label>
                                    <input type="text" class="form-control" name="access_name" placeholder="Enter Nom">
                                    <span class="text-danger error-text access_name_error"></span>
                                </div>

                                <div class="form-group">
                                <label>Etat</label> <br>
                                <select name="access_etat" class="form-control select">
                                <option value="none">---</option>
                                <option value="NEUF">NEUF</option>
                                <option value="OPERATIONNEL">OPERATIONNEL</option>
                                </select>
                                 <span class="text-danger error-text access_etat_error"></span>
                                </div>

                                <div class="form-group">
                                    <label for="">Commentaire</label>
                                    <textarea class="form-control" name="access_commentaire"> </textarea>
                                    <span class="text-danger error-text access_commentaire_error"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success">ENREGISTRER</button>
                                </div>
                            </form>
                        </div>
                    </div>
              </div>
          </div>

    </div>

     @include('accessoires.edit-accessoire-modal')

    <script>
         toastr.options.preventDuplicates = true;
         $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
         });
         $(function(){
                //ADD NEW accessoire
                $('#add-accessoire-form').on('submit', function(e){
                    e.preventDefault();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                             $(form).find('span.error-text').text('');
                        },
                        success:function(data){
                             if(data.code == 0){
                                   $.each(data.error, function(prefix, val){
                                       $(form).find('span.'+prefix+'_error').text(val[0]);
                                   });
                             }else{
                                 $(form)[0].reset();
                                //  alert(data.msg);
                                $('#accessoires-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                             }
                        }
                    });
                });
                //GET ALL accessoires
               var table =  $('#accessoires-table').DataTable({
                     processing:true,
                     info:true,
                     ajax:"{{ route('accessoires.get.accessoires.list') }}",
                     "pageLength":5,
                     "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                     columns:[
                        //  {data:'id', name:'id'},
                         {data:'checkbox', name:'checkbox', orderable:false, searchable:false},
                         {data:'DT_RowIndex', name:'DT_RowIndex'},
                         {data:'access_name', name:'access_name'},
                         {data:'access_etat', name:'access_etat'},
                         {data:'access_commentaire', name:'access_commentaire'},
                         {data:'actions', name:'actions', orderable:false, searchable:false},
                     ]
                }).on('draw', function(){
                    $('input[name="accessoire_checkbox"]').each(function(){this.checked = false;});
                    $('input[name="main_checkbox"]').prop('checked', false);
                    $('button#deleteAllBtn').addClass('d-none');
                });
                $(document).on('click','#editAccessoireBtn', function(){
                    var accessoire_id = $(this).data('id');
                    $('.editAccessoire').find('form')[0].reset();
                    $('.editAccessoire').find('span.error-text').text('');
                    $.post('<?= route("accessoires.get.accessoire.details") ?>',{accessoire_id:accessoire_id}, function(data){
                        //  alert(data.details.access_name);
                        $('.editAccessoire').find('input[name="cid"]').val(data.details.id);
                        $('.editAccessoire').find('input[name="access_name"]').val(data.details.access_name);
                        $('.editAccessoire').find('select[name="access_etat"]').val(data.details.access_etat);
                        $('.editAccessoire').find('textarea[name="access_commentaire"]').val(data.details.access_commentaire);
                        $('.editAccessoire').modal('show');
                    },'json');
                });

                //UPDATE accessoire DETAILS
                $('#update-accessoire-form').on('submit', function(e){
                    e.preventDefault();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend: function(){
                             $(form).find('span.error-text').text('');
                        },
                        success: function(data){
                              if(data.code == 0){
                                  $.each(data.error, function(prefix, val){
                                      $(form).find('span.'+prefix+'_error').text(val[0]);
                                  });
                              }else{
                                  $('#accessoires-table').DataTable().ajax.reload(null, false);
                                  $('.editAccessoire').modal('hide');
                                  $('.editAccessoire').find('form')[0].reset();
                                  toastr.success(data.msg);
                              }
                        }
                    });
                });
                //DELETE accessoire RECORD
                $(document).on('click','#deleteAccessoireBtn', function(){
                    var accessoire_id = $(this).data('id');
                    var url = '<?= route("accessoires.delete.accessoire") ?>';
                    swal.fire({
                         title:'Are you sure?',
                         html:'You want to <b>delete</b> this accessoire',
                         showCancelButton:true,
                         showCloseButton:true,
                         cancelButtonText:'Cancel',
                         confirmButtonText:'Yes, Delete',
                         cancelButtonColor:'#d33',
                         confirmButtonColor:'#556ee6',
                         width:300,
                         allowOutsideClick:false
                    }).then(function(result){
                          if(result.value){
                              $.post(url,{accessoire_id:accessoire_id}, function(data){
                                   if(data.code == 1){
                                       $('#accessoires-table').DataTable().ajax.reload(null, false);
                                       toastr.success(data.msg);
                                   }else{
                                       toastr.error(data.msg);
                                   }
                              },'json');
                          }
                    });
                });
           $(document).on('click','input[name="main_checkbox"]', function(){
                  if(this.checked){
                    $('input[name="accessoire_checkbox"]').each(function(){
                        this.checked = true;
                    });
                  }else{
                     $('input[name="accessoire_checkbox"]').each(function(){
                         this.checked = false;
                     });
                  }
                  toggledeleteAllBtn();
           });
           $(document).on('change','input[name="accessoire_checkbox"]', function(){
               if( $('input[name="accessoire_checkbox"]').length == $('input[name="accessoire_checkbox"]:checked').length ){
                   $('input[name="main_checkbox"]').prop('checked', true);
               }else{
                   $('input[name="main_checkbox"]').prop('checked', false);
               }
               toggledeleteAllBtn();
           });
           function toggledeleteAllBtn(){
               if( $('input[name="accessoire_checkbox"]:checked').length > 0 ){
                   $('button#deleteAllBtn').text('Supprimer ('+$('input[name="accessoire_checkbox"]:checked').length+')').removeClass('d-none');
               }else{
                   $('button#deleteAllBtn').addClass('d-none');
               }
           }
           $(document).on('click','button#deleteAllBtn', function(){
               var checkedAccessoires = [];
               $('input[name="accessoire_checkbox"]:checked').each(function(){
                   checkedAccessoires.push($(this).data('id'));
               });
               var url = '{{ route("accessoires.delete.selected.accessoires") }}';
               if(checkedAccessoires.length > 0){
                   swal.fire({
                       title:'Are you sure?',
                       html:'You want to delete <b>('+checkedAccessoires.length+')</b> materiels',
                       showCancelButton:true,
                       showCloseButton:true,
                       confirmButtonText:'Yes, Delete',
                       cancelButtonText:'Cancel',
                       confirmButtonColor:'#556ee6',
                       cancelButtonColor:'#d33',
                       width:300,
                       allowOutsideClick:false
                   }).then(function(result){
                       if(result.value){
                           $.post(url,{accessoires_ids:checkedAccessoires},function(data){
                              if(data.code == 1){
                                  $('#accessoires-table').DataTable().ajax.reload(null, true);
                                  toastr.success(data.msg);
                              }
                           },'json');
                       }
                   })
               }
           });

         });
    </script>
@endsection
