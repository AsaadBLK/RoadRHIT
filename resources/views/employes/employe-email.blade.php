<div class="modal fade editEmployeEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Demander la création de l'addresse email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- demande email adresse-->
                
            @if(auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 3)
                 <form action="<?= route('updateEmployeEmails') ?>" method="post" id="email-employe-form">
                    @csrf  
                     <input type="hidden" name="cid">
                                <div class="form-group">
                                <label>Status (RH)</label> 
                                {{-- <button type="submit" class="btn btn-xs float-sm-right" data-toggle="modal" data-target="#"><span class="material-icons">email</span></button> --}}
                                <br>
                                <select name="status_reqtoIT" class="form-control select">
                                <option value="none">---</option>
                                <option value="Envoyé">Envoyé</option>
                                <option value="Non envoyé">Non envoyé</option>
                                </select>
                                 <span class="text-danger error-text status_reqtoIT_error"></span>
                                </div>
                                <div class="form-group">
                         <button type="submit" class="btn btn-xs-block btn-success">Valider</button>
                     </div>   
                 </form><!-- demande email adresse-->
                @endif

            </div>
        </div>
    </div>
</div>
