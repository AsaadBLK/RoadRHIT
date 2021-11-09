<div class="modal fade editAccessoire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editer Accessoire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('accessoires.update.accessoire.details') ?>" method="post" id="update-accessoire-form">
                    @csrf
                     <input type="hidden" name="cid">
                      <div class="form-group">
                                    <label for="">Accessoire désignation</label>
                                    <input type="text" class="form-control" name="access_name" placeholder="Enter Nom">
                                    <span class="text-danger error-text access_name_error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Etat</label>
                                    <input type="text" class="form-control" name="access_etat" placeholder="Enter Etat">
                                    <span class="text-danger error-text access_etat_error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Commentaire</label>
                                    <textarea class="form-control" name="access_commentaire">... </textarea>
                                    <span class="text-danger error-text access_commentaire_error"></span>
                                </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-block btn-success">Sauvegarder</button>
                     </div>
                 </form>


            </div>
        </div>
    </div>
</div>
