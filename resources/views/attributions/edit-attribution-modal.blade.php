<div class="modal fade editAttribution" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editer l'attribution</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                 <form action="<?= route('attributions.update.attribution.details') ?>" method="post" id="update-attribution-form">
                    @csrf
                     <input type="hidden" name="cid">
                                 <div class="form-group">
                                <label>Employé</label> <br>
                                <select name="id_employe" class="form-control select">
                                <option value="none">---</option>
                                <option value="1">ASAAD</option>
                                <option value="2">ADMIN</option> 
                                </select>
                                <span class="text-danger error-text id_employe_error"></span>
                                </div>

                                <div class="form-group">
                                <label>Matériel</label> <br>
                                <select name="id_materiel" class="form-control select">
                                <option value="none">---</option>
                                <option value="1">LAPTOP</option>
                                <option value="2">GSM</option> 
                                </select>
                                <span class="text-danger error-text id_materiel_error"></span>
                                </div>

                                <div class="form-group">
                                <label>Accessoire</label> <br>
                                <select name="id_accessoire" class="form-control select">
                                <option value="none">---</option>
                                <option value="1">CARTABLE</option>
                                <option value="2">CASQUE</option>
                                <option value="3">WORKSTATION</option>
                                </select>
                                <span class="text-danger error-text id_accessoire_error"></span>
                                </div>

                                 <div class="form-group">
                                    <label for="">Commentaire</label>
                                    <textarea class="form-control" name="commentaire"> </textarea>
                                    <span class="text-danger error-text commentaire_error"></span>
                                </div>
                        <div class="form-group">
                         <button type="submit" class="btn btn-xs-block btn-success">Sauvegarder</button>
                     </div>

                 </form>


            </div>
        </div>
    </div>
</div>
