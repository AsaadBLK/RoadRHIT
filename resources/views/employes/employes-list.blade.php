@extends('layouts.app')

@section('content')

<div class="py-12">
          <div class="row" style="margin-top: 45px">


              <div class="col-md-12">
                {{-- <input type="text" name="searchfor" id="" class="form-control"> --}}
                    <div class="card">
                        <div class="card-header">Employés
                            <button type="button" class="btn btn-xs float-sm-right" data-toggle="modal" data-target="#exampleModal"><span class="material-icons">add_circle</span></button>
                        </div>
                        <div class="card-body">

                          <br>

                            <table class="table table-hover table-condensed" id="employes-table">
                                <thead>
                                    <th style="width:20px;"><input type="checkbox" name="main_checkbox"><label></label></th>
                                    <th style="width:20px;">#</th>
                                    <th>Nom Prénom</th>
                                    <th>Email</th>
                                    <th>Matricule</th>
                                    <th>Responsable hiérarchique</th>
                                    <th>Ville</th>
                                    <th>Demande au IT</th>
                                    <th>Date demande</th>
                                    <th>Création par IT</th>
                                    <th>Date Création</th>
                                    <th>Traiter par</th>
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
        <h5 class="modal-title">Ajouter un nouveau employé</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <div class="modal-body">
                    <div class="card">
                            <div class="card-body">
                            <form action="{{ route('employes.add.employe') }}" method="post" id="add-employe-form" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                <label>Nom Prénom</label>
                                <input type="text" name="nomprenom" class="form-control" required>
                                <span class="text-danger error-text nomprenom_error"></span>
                                </div>
                                <div class="form-group">
                                <label>Matricule</label>
                                <input type="text" name="matricule" class="form-control" required>
                                <span class="text-danger error-text matricule_error"></span>
                                </div>
                                <div class="form-group">
                                <label>Responsable hiérarchique</label>
                                <input type="text" name="respH" class="form-control" required>
                                <span class="text-danger error-text respH_error"></span>
                                </div>
 <div class="form-group">
                                <label>Ville</label>
                                <select class="form-control select" id="ville" name="ville">
                                <option value="---">---</option>
                                <option value="AFFOURER">AFFOURER</option>
                                <option value="AGADIR">AGADIR</option>
                                <option value="AGDZ">AGDZ</option>
                                <option value="AGUELMOUSS">AGUELMOUSS</option>
                                <option value="AHFIR">AHFIR</option>
                                <option value="Ain Aouda">Ain Aouda</option>
                                <option value="AIN ATIQ">AIN ATIQ</option>
                                <option value="AIN HARROUDA">AIN HARROUDA</option>
                                <option value="AIN TAOUJDATE">AIN TAOUJDATE</option>
                                <option value="AIT BAHA">AIT BAHA</option>
                                <option value="AIT MELLOUL">AIT MELLOUL</option>
                                <option value="AJDIR-NADOR">AJDIR-NADOR</option>
                                <option value="AKRACHE">AKRACHE</option>
                                <option value="AL HOCEIMA">AL HOCEIMA</option>
                                <option value="AMEZMIZ">AMEZMIZ</option>
                                <option value="ASSA ZAG">ASSA ZAG</option>
                                <option value="ASSILAH">ASSILAH</option>
                                <option value="ATTAOUIA">ATTAOUIA</option>
                                <option value="AZEMMOUR">AZEMMOUR</option>
                                <option value="AZROU">AZROU</option>
                                <option value="BEN HMED">BEN HMED</option>
                                <option value="BENGUERIR">BENGUERIR</option>
                                <option value="BENI MELLAL">BENI MELLAL</option>
                                <option value="BENSLIMANE">BENSLIMANE</option>
                                <option value="BERKANE">BERKANE</option>
                                <option value="BERRECHID">BERRECHID</option>
                                <option value="BIR JDID">BIR JDID</option>
                                <option value="BOUCHRANE">BOUCHRANE</option>
                                <option value="Boufekrane">Boufekrane</option>
                                <option value="BOUJNIBA">BOUJNIBA</option>
                                <option value="BOUKNADEL">BOUKNADEL</option>
                                <option value="Boulemane">Boulemane</option>
                                <option value="BOUMALNE DADES">BOUMALNE DADES</option>
                                <option value="BOUMIA">BOUMIA</option>
                                <option value="BOUSKOURA">BOUSKOURA</option>
                                <option value="BOUZNIKA">BOUZNIKA</option>
                                <option value="CASABLANCA">CASABLANCA</option>
                                <option value="CHEFCHAOUEN">CHEFCHAOUEN</option>
                                <option value="CHELLALAT">CHELLALAT</option>
                                <option value="CHICHAOUA">CHICHAOUA</option>
                                <option value="DAR BOUAZZA">DAR BOUAZZA</option>
                                <option value="DEMNATE">DEMNATE</option>
                                <option value="DRIOUCH">DRIOUCH</option>
                                <option value="EL ATTAOUIA">EL ATTAOUIA</option>
                                <option value="EL HAJEB">EL HAJEB</option>
                                <option value="EL JADIDA">EL JADIDA</option>
                                <option value="EL KELAA SRAGHNA">EL KELAA SRAGHNA</option>
                                <option value="EL MANSOURIA">EL MANSOURIA</option>
                                <option value="ERFOUD">ERFOUD</option>
                                <option value="ERRACHIDIA">ERRACHIDIA</option>
                                <option value="ESSAOUIRA">ESSAOUIRA</option>
                                <option value="ESSOUIRA">ESSOUIRA</option>
                                <option value="FES">FES</option>
                                <option value="FKIH BEN SALEH">FKIH BEN SALEH</option>
                                <option value="FNIDEQ">FNIDEQ</option>
                                <option value="GHAFSAI">GHAFSAI</option>
                                <option value="GHAFSAI Province TAOUNAT">GHAFSAI Province TAOUNAT</option>
                                <option value="GUELMIM">GUELMIM</option>
                                <option value="GUERCIF">GUERCIF</option>
                                <option value="HAD HRARA">HAD HRARA</option>
                                <option value="HAD SOUALEM">HAD SOUALEM</option>
                                <option value="Ifrane">Ifrane</option>
                                <option value="IKAOUEN">IKAOUEN</option>
                                <option value="IMMOUZER">IMMOUZER</option>
                                <option value="INEZGANE">INEZGANE</option>
                                <option value="JEMA LARIAH">JEMA LARIAH</option>
                                <option value="Jorf Lasfar">Jorf Lasfar</option>
                                <option value="JORF LASFAR">JORF LASFAR</option>
                                <option value="KASBA TADLA">KASBA TADLA</option>
                                <option value="KELAA DES SRAGHNA">KELAA DES SRAGHNA</option>
                                <option value="KELAA MGOUNA">KELAA MGOUNA</option>
                                <option value="KENITRA">KENITRA</option>
                                <option value="Kénitra">Kénitra</option>
                                <option value="Khemis Zemamra">Khemis Zemamra</option>
                                <option value="KHEMISSET">KHEMISSET</option>
                                <option value="KHENIFRA">KHENIFRA</option>
                                <option value="KHENITRA">KHENITRA</option>
                                <option value="KHOURIBGA">KHOURIBGA</option>
                                <option value="KSAR SGHIR">KSAR SGHIR</option>
                                <option value="LARACHE">LARACHE</option>
                                <option value="LEKSER LEKBIR">LEKSER LEKBIR</option>
                                <option value="LISSASFA">LISSASFA</option>
                                <option value="Madagh">Madagh</option>
                                <option value="Marrakech">Marrakech</option>
                                <option value="MARTIL">MARTIL</option>
                                <option value="MECHRAA BEL KSIRI">MECHRAA BEL KSIRI</option>
                                <option value="MEDIOUNA">MEDIOUNA</option>
                                <option value="MEKNES">MEKNES</option>
                                <option value="Meknès">Meknès</option>
                                <option value="MIDELT">MIDELT</option>
                                <option value="MISSOUR">MISSOUR</option>
                                <option value="MJAARA">MJAARA</option>
                                <option value="MOHAMMEDIA">MOHAMMEDIA</option>
                                <option value="MOULAY BOUSELHAM">MOULAY BOUSELHAM</option>
                                <option value="MRIRT">MRIRT</option>
                                <option value="NADOR">NADOR</option>
                                <option value="NKOB">NKOB</option>
                                <option value="NOUACER">NOUACER</option>
                                <option value="OUARZAZATE">OUARZAZATE</option>
                                <option value="Ouazzane">Ouazzane</option>
                                <option value="Oued Zem">Oued Zem</option>
                                <option value="OUEZZANE">OUEZZANE</option>
                                <option value="OUJDA">OUJDA</option>
                                <option value="RABAT">RABAT</option>
                                <option value="RABAT - SALE">RABAT - SALE</option>
                                <option value="Route Seouiria">Route Seouiria</option>
                                <option value="SAFI">SAFI</option>
                                <option value="SAIDIA">SAIDIA</option>
                                <option value="Salé">Salé</option>
                                <option value="Sefrou">Sefrou</option>
                                <option value="SETTAT">SETTAT</option>
                                <option value="SIDI ALLAL BAHRAOUI">SIDI ALLAL BAHRAOUI</option>
                                <option value="SIDI BENNOUR">SIDI BENNOUR</option>
                                <option value="SIDI BERNOUSSI">SIDI BERNOUSSI</option>
                                <option value="SIDI BETTACHE">SIDI BETTACHE</option>
                                <option value="SIDI BOUATHMANE">SIDI BOUATHMANE</option>
                                <option value="SIDI BOUZID">SIDI BOUZID</option>
                                <option value="SIDI IFNI">SIDI IFNI</option>
                                <option value="SIDI KACEM">SIDI KACEM</option>
                                <option value="SIDI KACEM/MOHAMMEDIA">SIDI KACEM/MOHAMMEDIA</option>
                                <option value="SIDI LYAMANI">SIDI LYAMANI</option>
                                <option value="SIDI SLIMANE">SIDI SLIMANE</option>
                                <option value="SIDI SMAIL">SIDI SMAIL</option>
                                <option value="SIDI YAHYA">SIDI YAHYA</option>
                                <option value="SKHIRAT">SKHIRAT</option>
                                <option value="SKHIRAT">SKHIRAT</option>
                                <option value="SKHOUR RHAMNA">SKHOUR RHAMNA</option>
                                <option value="SOUIHLA">SOUIHLA</option>
                                <option value="SOUK ARBAA">SOUK ARBAA</option>
                                <option value="SOUK SEBT">SOUK SEBT</option>
                                <option value="SRAGHNA">SRAGHNA</option>
                                <option value="TADLA">TADLA</option>
                                <option value="TAHNAOUT">TAHNAOUT</option>
                                <option value="TALSINT">TALSINT</option>
                                <option value="TAMENSOURT">TAMENSOURT</option>
                                <option value="TAMESNA">TAMESNA</option>
                                <option value="TAN TAN">TAN TAN</option>
                                <option value="TANANT">TANANT</option>
                                <option value="TANGER">TANGER</option>
                                <option value="Taounat">Taounat</option>
                                <option value="TAOUNATE">TAOUNATE</option>
                                <option value="TAOURIRT">TAOURIRT</option>
                                <option value="TARGUIST">TARGUIST</option>
                                <option value="TAROUDANT">TAROUDANT</option>
                                <option value="TAROUDANTE">TAROUDANTE</option>
                                <option value="TATA">TATA</option>
                                <option value="TAZA">TAZA</option>
                                <option value="TAZANEKHT">TAZANEKHT</option>
                                <option value="TEMARA">TEMARA</option>
                                <option value="TETOUAN">TETOUAN</option>
                                <option value="TIFLET">TIFLET</option>
                                <option value="TILOUGUIT">TILOUGUIT</option>
                                <option value="TINGHIR">TINGHIR</option>
                                <option value="TINJDAD">TINJDAD</option>
                                <option value="TIT MELLIL">TIT MELLIL</option>
                                <option value="TIZGHA">TIZGHA</option>
                                <option value="TIZNIT">TIZNIT</option>
                                <option value="TLET LOULAD">TLET LOULAD</option>
                                <option value="YOUSSOUFIA">YOUSSOUFIA</option>
                                <option value="ZAGORA">ZAGORA</option>
                                <option value="ZAGOURA">ZAGOURA</option>
                                <option value="ZAIO">ZAIO</option>
                                <option value="ZEMMOUR">ZEMMOUR</option>
                                <option value="ZENATA">ZENATA</option>
                                </select>
                                <span class="text-danger error-text ville_error"></span>
 </div>

                                <div class="form-group">
                                <label>Demande Creation d'adresse email (RH)</label> <br>
                                <select name="status_reqtoIT" class="form-control select">
                                <option value="none">---</option>
                                <option value="Envoyé">Envoyé</option>
                                <option value="Non envoyé">Non envoyé</option>
                                </select>
                                 <span class="text-danger error-text status_reqtoIT_error"></span>
                                </div>


                                <div class="form-group">
                                 <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                                <span class="text-danger error-text email_error"></span>
                                </div>



                                <div class="form-group">
                                <label>Entité</label> <br>
                                <select name="entityEmp" class="form-control select">
                                <option value="none">---</option>
                                <option value="SGM">SGM</option>
                                <option value="ASG">ASG</option>
                                <option value="TMD">TMD</option>
                                <option value="LAA">LAA</option>
                                </select>
                                <span class="text-danger error-text entityEmp_error"></span>
                                </div>

                                <div class="form-group">
                                <label>Business</label> <br>
                                <select name="businessEmp" class="form-control select">
                                <option value="none">---</option>
                                <option value="N&R">N&R</option>
                                <option value="I&E">I&E</option>
                                <option value="OH">OH</option>
                                </select>
                                <span class="text-danger error-text businessEmp_error"></span>
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

     @include('employes.edit-employe-modal')

    <script>
         toastr.options.preventDuplicates = true;
         $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
         });
         $(function(){
                //ADD NEW employe
                $('#add-employe-form').on('submit', function(e){
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
                                $('#employes-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                             }
                        }
                    });
                });
                //GET ALL employes
               var table =  $('#employes-table').DataTable({
                     processing:true,
                     info:true,
                     ajax:"{{ route('employes.get.employes.list') }}",
                     "pageLength":5,
                     "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                     columns:[
                        //  {data:'id', name:'id'},
                         {data:'checkbox', name:'checkbox', orderable:false, searchable:false},
                         {data:'DT_RowIndex', name:'DT_RowIndex'},
                         {data:'nomprenom', name:'nomprenom'},
                         {data:'email', name:'email'},
                         {data:'matricule', name:'matricule'},
                         {data:'respH', name:'respH'},
                         {data:'ville', name:'ville'},
                         {data:'status_reqtoIT', name:'status_reqtoIT'},
                         {data:'email_request_at', name:'email_request_at'},
                         {data:'status_crebyIT', name:'status_crebyIT'},
                         {data:'email_create_at', name:'email_create_at'},
                        //  {data:'entityEmp', name:'entityEmp'},
                        //  {data:'businessEmp', name:'businessEmp'},
                         {data:'action_by', name:'action_by'},


                         {data:'actions', name:'actions', orderable:false, searchable:false},
                     ]
                }).on('draw', function(){
                    $('input[name="employe_checkbox"]').each(function(){this.checked = false;});
                    $('input[name="main_checkbox"]').prop('checked', false);
                    $('button#deleteAllBtn').addClass('d-none');
                });
                $(document).on('click','#editEmployeBtn', function(){
                    var employe_id = $(this).data('id');
                    $('.editEmploye').find('form')[0].reset();
                    $('.editEmploye').find('span.error-text').text('');
                    $.post('<?= route("employes.get.employe.details") ?>',{employe_id:employe_id}, function(data){
                        //  alert(data.details.access_name);
                        $('.editEmploye').find('input[name="cid"]').val(data.details.id);
                        $('.editEmploye').find('input[name="nomprenom"]').val(data.details.nomprenom);
                        $('.editEmploye').find('input[name="email"]').val(data.details.email);
                        $('.editEmploye').find('input[name="matricule"]').val(data.details.matricule);
                        $('.editEmploye').find('input[name="respH"]').val(data.details.respH);
                        $('.editEmploye').find('select[name="ville"]').val(data.details.ville);
                        $('.editEmploye').find('select[name="entityEmp"]').val(data.details.entityEmp);
                        $('.editEmploye').find('select[name="businessEmp"]').val(data.details.businessEmp);
                        $('.editEmploye').find('select[name="status_reqtoIT"]').val(data.details.status_reqtoIT);
                        $('.editEmploye').find('select[name="status_crebyIT"]').val(data.details.status_crebyIT);
                        $('.editEmploye').find('select[name="action_by"]').val(data.details.action_by);
                        $('.editEmploye').modal('show');
                    },'json');
                });

                //UPDATE employe DETAILS
                $('#update-employe-form').on('submit', function(e){
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
                                  $('#employes-table').DataTable().ajax.reload(null, false);
                                  $('.editEmploye').modal('hide');
                                  $('.editEmploye').find('form')[0].reset();
                                  toastr.success(data.msg);
                              }
                        }
                    });
                });
                //DELETE employe RECORD
                $(document).on('click','#deleteEmployeBtn', function(){
                    var employe_id = $(this).data('id');
                    var url = '<?= route("employes.delete.employe") ?>';
                    swal.fire({
                         title:'Are you sure?',
                         html:'You want to <b>delete</b> this employé',
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
                              $.post(url,{employe_id:employe_id}, function(data){
                                   if(data.code == 1){
                                       $('#employes-table').DataTable().ajax.reload(null, false);
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
                    $('input[name="employe_checkbox"]').each(function(){
                        this.checked = true;
                    });
                  }else{
                     $('input[name="employe_checkbox"]').each(function(){
                         this.checked = false;
                     });
                  }
                  toggledeleteAllBtn();
           });
           $(document).on('change','input[name="employe_checkbox"]', function(){
               if( $('input[name="employe_checkbox"]').length == $('input[name="employe_checkbox"]:checked').length ){
                   $('input[name="main_checkbox"]').prop('checked', true);
               }else{
                   $('input[name="main_checkbox"]').prop('checked', false);
               }
               toggledeleteAllBtn();
           });
           function toggledeleteAllBtn(){
               if( $('input[name="employe_checkbox"]:checked').length > 0 ){
                   $('button#deleteAllBtn').text('Supprimer ('+$('input[name="employe_checkbox"]:checked').length+')').removeClass('d-none');
               }else{
                   $('button#deleteAllBtn').addClass('d-none');
               }
           }
           $(document).on('click','button#deleteAllBtn', function(){
               var checkedMateriels = [];
               $('input[name="employe_checkbox"]:checked').each(function(){
                   checkedMateriels.push($(this).data('id'));
               });
               var url = '{{ route("employes.delete.selected.employes") }}';
               if(checkedMateriels.length > 0){
                   swal.fire({
                       title:'Are you sure?',
                       html:'You want to delete <b>('+checkedMateriels.length+')</b> employes',
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
                           $.post(url,{employes_ids:checkedMateriels},function(data){
                              if(data.code == 1){
                                  $('#employes-table').DataTable().ajax.reload(null, true);
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
