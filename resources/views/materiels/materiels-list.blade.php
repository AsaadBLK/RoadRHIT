@extends('layouts.app')

@section('content')

<div class="py-12">
          <div class="row" style="margin-top: 45px">


              <div class="col-md-12">
                {{-- <input type="text" name="searchfor" id="" class="form-control"> --}}
                    <div class="card">
                        <div class="card-header">Materiels
                            <button type="button" class="btn btn-xs float-sm-right" data-toggle="modal" data-target="#exampleModal"><span class="material-icons">add_circle</span></button>
                        </div>
                        <div class="card-body">

                          <br>

                            <table class="table table-hover table-condensed" id="materiels-table">
                                <thead>
                                    <th style="width:20px;"><input type="checkbox" name="main_checkbox"><label></label></th>
                                    <th style="width:20px;">#</th>
                                    <th >Désignation</th>
                                    <th>Marque</th>
                                    <th>Model</th>
                                    <th>S/N</th>
                                    <th>Status</th>
                                    <th>Etat</th>
                                    <th>Entity</th>
                                    <th>Business</th>
                                    <th>Commentaire</th>
                                    <th>Actions <button class="btn btn-sm btn-danger d-none" id="deleteAllBtn">Tout supprimer</button></th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
              </div>

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter un nouveau matériel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <div class="modal-body">
                    <div class="card">
                            <div class="card-body">
                            <form action="{{ route('materiels.add.materiel') }}" method="post" id="add-materiel-form" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                <label>Désignation</label>
                                <input type="text" name="designation" class="form-control" required>
                                <span class="text-danger error-text designation_error"></span>
                                </div>
                                <div class="form-group">
                                <label>Marque</label>
                                <input type="text" name="marque" class="form-control" required>
                                <span class="text-danger error-text marque_error"></span>
                                </div>
                                <div class="form-group">
                                <label>Model</label>
                                <input type="text" name="modell" class="form-control" required>
                                <span class="text-danger error-text modell_error"></span>
                                </div>
                                <div class="form-group">
                                <label>S/N</label>
                                <input type="text" name="serialnumber" class="form-control" required>
                                <span class="text-danger error-text serialnumber_error"></span>
                                </div>
                                <div class="form-group">
                                <label>Status</label> <br>
                                <select name="status" class="form-control select">
                                <option value="none">---</option>
                                <option value="Disponible">Disponible</option>
                                <option value="Déjà attribué">Déjà attribué</option>
                                <option value="KO">KO</option>
                                </select>
                                <span class="text-danger error-text status_error"></span>
                                </div>
                                <div class="form-group">
                                <label>Etat</label> <br>
                                <select name="etat" class="form-control select">
                                <option value="none">---</option>
                                <option value="NEUF">NEUF</option>
                                <option value="OPERATIONNEL">OPERATIONNEL</option>
                                </select>
                                <span class="text-danger error-text etat_error"></span>
                                </div>

                                <div class="form-group">
                                <label>Entité</label> <br>
                                <select name="entity" class="form-control select">
                                <option value="none">---</option>
                                <option value="SGM">SGM</option>
                                <option value="ASG">ASG</option>
                                <option value="TMD">TMD</option>
                                <option value="LAA">LAA</option>
                                </select>
                                <span class="text-danger error-text entity_error"></span>
                                </div>

                                <div class="form-group">
                                <label>Business</label> <br>
                                <select name="business" class="form-control select">
                                <option value="none">---</option>
                                <option value="N&R">N&R</option>
                                <option value="I&E">I&E</option>
                                <option value="OH">OH</option>
                                </select>
                                <span class="text-danger error-text business_error"></span>
                                </div>
                                <div class="form-group">
                                <label>Commentaire</label>
                                <textarea class="form-control" name="commentaire" required></textarea>
                                <span class="text-danger error-text commentaire_error"></span>
                                </div>

                                <div class="form-group">
                                <button type="submit" class="btn btn-xs-block btn-success">ENREGISTRER</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               </div>
                            </form>
                        </div>
                    </div>
              </div>
          </div></div>

    </div></div>

     @include('materiels.edit-materiel-modal')

    <script>
         toastr.options.preventDuplicates = true;
         $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
         });
         $(function(){
                //ADD NEW materiel
                $('#add-materiel-form').on('submit', function(e){
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
                                $('#materiels-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                             }
                        }
                    });
                });
                //GET ALL materiels
               var table =  $('#materiels-table').DataTable({
                     processing:true,
                     info:true,
                     ajax:"{{ route('materiels.get.materiels.list') }}",
                     "pageLength":5,
                     "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                     columns:[
                        //  {data:'id', name:'id'},
                         {data:'checkbox', name:'checkbox', orderable:false, searchable:false},
                         {data:'DT_RowIndex', name:'DT_RowIndex'},
                         {data:'designation', name:'designation'},
                         {data:'marque', name:'marque'},
                         {data:'modell', name:'modell'},
                         {data:'serialnumber', name:'serialnumber'},
                         {data:'status', name:'status'},
                         {data:'etat', name:'etat'},
                         {data:'entity', name:'entity'},
                         {data:'business', name:'business'},
                         {data:'commentaire', name:'commentaire'},
                         {data:'actions', name:'actions', orderable:false, searchable:false},
                     ]
                }).on('draw', function(){
                    $('input[name="materiel_checkbox"]').each(function(){this.checked = false;});
                    $('input[name="main_checkbox"]').prop('checked', false);
                    $('button#deleteAllBtn').addClass('d-none');
                });
                $(document).on('click','#editMaterielBtn', function(){
                    var materiel_id = $(this).data('id');
                    $('.editMateriel').find('form')[0].reset();
                    $('.editMateriel').find('span.error-text').text('');
                    $.post('<?= route("materiels.get.materiel.details") ?>',{materiel_id:materiel_id}, function(data){
                        //  alert(data.details.access_name);
                        $('.editMateriel').find('input[name="cid"]').val(data.details.id);
                        $('.editMateriel').find('input[name="designation"]').val(data.details.designation);
                        $('.editMateriel').find('input[name="marque"]').val(data.details.marque);
                        $('.editMateriel').find('input[name="modell"]').val(data.details.modell);
                        $('.editMateriel').find('input[name="serialnumber"]').val(data.details.serialnumber);
                        $('.editMateriel').find('select[name="status"]').val(data.details.status);
                        $('.editMateriel').find('select[name="etat"]').val(data.details.etat);
                        $('.editMateriel').find('select[name="entity"]').val(data.details.entity);
                        $('.editMateriel').find('select[name="business"]').val(data.details.business);
                        $('.editMateriel').find('textarea[name="commentaire"]').val(data.details.commentaire);
                        $('.editMateriel').modal('show');
                    },'json');
                });

                //UPDATE materiel DETAILS
                $('#update-materiel-form').on('submit', function(e){
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
                                  $('#materiels-table').DataTable().ajax.reload(null, false);
                                  $('.editMateriel').modal('hide');
                                  $('.editMateriel').find('form')[0].reset();
                                  toastr.success(data.msg);
                              }
                        }
                    });
                });
                //DELETE materiel RECORD
                $(document).on('click','#deleteMaterielBtn', function(){
                    var materiel_id = $(this).data('id');
                    var url = '<?= route("materiels.delete.materiel") ?>';
                    swal.fire({
                         title:'Are you sure?',
                         html:'You want to <b>delete</b> this materiel',
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
                              $.post(url,{materiel_id:materiel_id}, function(data){
                                   if(data.code == 1){
                                       $('#materiels-table').DataTable().ajax.reload(null, false);
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
                    $('input[name="materiel_checkbox"]').each(function(){
                        this.checked = true;
                    });
                  }else{
                     $('input[name="materiel_checkbox"]').each(function(){
                         this.checked = false;
                     });
                  }
                  toggledeleteAllBtn();
           });
           $(document).on('change','input[name="materiel_checkbox"]', function(){
               if( $('input[name="materiel_checkbox"]').length == $('input[name="materiel_checkbox"]:checked').length ){
                   $('input[name="main_checkbox"]').prop('checked', true);
               }else{
                   $('input[name="main_checkbox"]').prop('checked', false);
               }
               toggledeleteAllBtn();
           });
           function toggledeleteAllBtn(){
               if( $('input[name="materiel_checkbox"]:checked').length > 0 ){
                   $('button#deleteAllBtn').text('Supprimer ('+$('input[name="materiel_checkbox"]:checked').length+')').removeClass('d-none');
               }else{
                   $('button#deleteAllBtn').addClass('d-none');
               }
           }
           $(document).on('click','button#deleteAllBtn', function(){
               var checkedMateriels = [];
               $('input[name="materiel_checkbox"]:checked').each(function(){
                   checkedMateriels.push($(this).data('id'));
               });
               var url = '{{ route("materiels.delete.selected.materiels") }}';
               if(checkedMateriels.length > 0){
                   swal.fire({
                       title:'Are you sure?',
                       html:'You want to delete <b>('+checkedMateriels.length+')</b> materiels',
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
                           $.post(url,{materiels_ids:checkedMateriels},function(data){
                              if(data.code == 1){
                                  $('#materiels-table').DataTable().ajax.reload(null, true);
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
