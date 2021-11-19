@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-12">

                {{-- <input type="text" name="searchfor" id="" class="form-control"> --}}
                    <div class="card">
                        <div class="card-header">Attributions
                           <button type="button" class="btn btn-xs float-sm-right" data-toggle="modal" data-target="#exampleModal"><span class="material-icons">add_circle</span></button>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-condensed" id="attributions-table">
                                <thead>
                                    <th><input type="checkbox" name="main_checkbox"><label></label></th>
                                    <th>#</th>

                                    <th>Nom Prénom</th>
                                    <th>Matériel</th>
                                    <th>Accessoire</th>
                                    <th>Attribuer à</th>
                                    <th>Commentaire</th>

                                    <th>Actions <button class="btn btn-sm btn-danger d-none" id="deleteAllBtn">Tout supprimer</button></th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
              </div>
        </div>






 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter une nouvel attribution</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <div class="modal-body">
                    <div class="card">
                            <div class="card-body">
                  <form action="{{ route('attributions.add.attribution') }}" method="post" id="add-attribution-form" autocomplete="off">
                                @csrf
                           <div class="form-group">
                                <label>Employé</label> <br>
                                <select class="form-control select" name="id_employe">
                                @if ($empls->count())
                                @foreach($empls as $empl)
                                <option value="{{ $empl->id }}" {{ $selectedempl== $empl->id ? 'selected="selected"' : '' }}>{{ $empl->nomprenom }}</option>
                                @endforeach
                                @endif
                                </select>
                                <span class="text-danger error-text id_employe_error"></span>
                                </div>

                                <div class="form-group">
                                <label>Matériel</label> <br>
                                <select class="form-control select" name="id_materiel">
                                @if ($maters->count())
                                @foreach($maters as $mater)
                                <option value="{{ $mater->id }}" {{ $selectedmater== $mater->id ? 'selected="selected"' : '' }}>{{ $mater->designation }}</option>
                                @endforeach
                                @endif
                                </select>
                                <span class="text-danger error-text id_materiel_error"></span>
                                </div>

                                <div class="form-group">
                                <label>Accessoire</label> <br>
                                 <select class="form-control select" name="id_accessoire">
                                @if ($acces->count())
                                @foreach($acces as $acce)
                                <option value="{{ $acce->id }}" {{ $selectedacces== $acce->id ? 'selected="selected"' : '' }}>{{ $acce->access_name }}</option>
                                @endforeach
                                @endif
                                </select>
                                <span class="text-danger error-text id_accessoire_error"></span>
                                </div>

                                 <div class="form-group">
                                    <label for="">Commentaire</label>
                                    <textarea class="form-control" name="commentaire"> </textarea>
                                    <span class="text-danger error-text commentaire_error"></span>
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
 </div>










     @include('attributions.edit-attribution-modal')
          @include('attributions.show-attribution-modal')

    <script>
         toastr.options.preventDuplicates = true;
         $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
         });
         $(function(){
                //ADD NEW attribution
                $('#add-attribution-form').on('submit', function(e){
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
                                $('#attributions-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                             }
                        }
                    });
                });
                //GET ALL attributions
               var table =  $('#attributions-table').DataTable({
                     processing:true,
                     info:true,
                     ajax:"{{ route('attributions.get.attributions.list') }}",
                     "pageLength":5,
                     "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                     columns:[
                         {data:'checkbox', name:'checkbox', orderable:false, searchable:false},
                         {data:'DT_RowIndex', name:'DT_RowIndex'},

                        //  {data:'id_employe', name:'id_employe'},
                        //  {data:'id_materiel', name:'id_materiel'},
                        //  {data:'id_accessoire', name:'id_accessoire'},

                        //{data:'id', name:'id'},
                         {data:'nomprenom', name:'nomprenom'},
                         {data:'designation', name:'designation'},
                         {data:'access_name', name:'access_name'},
                         {data:'attribute_at', name:'attribute_at'},
                         {data:'commentaire', name:'commentaire'},

                        //  {data:'mater.designation', name:'mater.designation'},
                        //  {data:'acc.access_name', name:'acc.access_name'},
                        //  {data:'att.attribute_at', name:'att.attribute_at'},
                        //  {data:'att.commentaire', name:'att.commentaire'},


                         {data:'actions', name:'actions', orderable:false, searchable:false},
                     ]
                }).on('draw', function(){
                    $('input[name="attribution_checkbox"]').each(function(){this.checked = false;});
                    $('input[name="main_checkbox"]').prop('checked', false);
                    $('button#deleteAllBtn').addClass('d-none');
                });
                $(document).on('click','#editAttributionBtn', function(){
                    var attribution_id = $(this).data('id');
                    $('.editAttribution').find('form')[0].reset();
                    $('.editAttribution').find('span.error-text').text('');
                    $.post('<?= route("attributions.get.attribution.details") ?>',{attribution_id:attribution_id}, function(data){
                        $('.editAttribution').find('input[name="cid"]').val(data.details.id);
                        $('.editAttribution').find('select[name="id_employe"]').val(data.details.id_employe);
                        $('.editAttribution').find('select[name="id_materiel"]').val(data.details.id_materiel);
                        $('.editAttribution').find('select[name="id_accessoire"]').val(data.details.id_accessoire);
                        $('.editAttribution').find('textarea[name="commentaire"]').val(data.details.commentaire)
                        $('.editAttribution').modal('show');
                    },'json');
                });



                //show modal attribution to pdf
                 $(document).on('click','#showAttributionBtn', function(){
                    var attribution_id = $(this).data('id');
                    $('.showAttribution').find('form')[0].reset();
                    $('.showAttribution').find('span.error-text').text('');
                    $.post('<?= route("attributions.get.attribution.details") ?>',{attribution_id:attribution_id}, function(data){
                        $('.showAttribution').find('input[name="cid"]').val(data.details.id);
                        $('.showAttribution').find('select[name="id_employe"]').val(data.details.id_employe);
                        $('.showAttribution').find('select[name="id_materiel"]').val(data.details.id_materiel);
                        $('.showAttribution').find('select[name="id_accessoire"]').val(data.details.id_accessoire);
                        $('.showAttribution').find('input[name="attribute_at"]').val(data.details.attribute_at);
                        $('.showAttribution').find('input[name="commentaire"]').val(data.details.commentaire)
                        $('.showAttribution').modal('show');
                    },'json');
                });
                //show modal attribution to pdf



//UPDATE Attribution DETAILS
                $('#update-attribution-form').on('submit', function(e){
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
                                  });  /* added  to show error */ toastr.error(data.msg);
                              }else{
                                  $('#attributions-table').DataTable().ajax.reload(null, false);
                                  $('.editAttribution').modal('hide');
                                  $('.editAttribution').find('form')[0].reset();
                                  toastr.success(data.msg);
                              }
                        }
                    });
                });




                //DELETE attribution RECORD
                $(document).on('click','#deleteAttributionBtn', function(){
                    var attribution_id = $(this).data('id');
                    var url = '<?= route("attributions.delete.attribution") ?>';
                    swal.fire({
                         title:'Are you sure?',
                         html:'You want to <b>delete</b> this attribution',
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
                              $.post(url,{attribution_id:attribution_id}, function(data){
                                   if(data.code == 1){
                                       $('#attributions-table').DataTable().ajax.reload(null, false);
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
                    $('input[name="attribution_checkbox"]').each(function(){
                        this.checked = true;
                    });
                  }else{
                     $('input[name="attribution_checkbox"]').each(function(){
                         this.checked = false;
                     });
                  }
                  toggledeleteAllBtn();
           });
           $(document).on('change','input[name="attribution_checkbox"]', function(){
               if( $('input[name="attribution_checkbox"]').length == $('input[name="attribution_checkbox"]:checked').length ){
                   $('input[name="main_checkbox"]').prop('checked', true);
               }else{
                   $('input[name="main_checkbox"]').prop('checked', false);
               }
               toggledeleteAllBtn();
           });
           function toggledeleteAllBtn(){
               if( $('input[name="attribution_checkbox"]:checked').length > 0 ){
                   $('button#deleteAllBtn').text('Supprimer ('+$('input[name="attribution_checkbox"]:checked').length+')').removeClass('d-none');
               }else{
                   $('button#deleteAllBtn').addClass('d-none');
               }
           }
           $(document).on('click','button#deleteAllBtn', function(){
               var checkedMateriels = [];
               $('input[name="attribution_checkbox"]:checked').each(function(){
                   checkedMateriels.push($(this).data('id'));
               });
               var url = '{{ route("attributions.delete.selected.attributions") }}';
               if(checkedMateriels.length > 0){
                   swal.fire({
                       title:'Are you sure?',
                       html:'You want to delete <b>('+checkedMateriels.length+')</b> attributions',
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
                           $.post(url,{attributions_ids:checkedMateriels},function(data){
                              if(data.code == 1){
                                  $('#attributions-table').DataTable().ajax.reload(null, true);
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
