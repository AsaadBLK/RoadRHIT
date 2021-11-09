<div class="modal fade editMateriel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editer matériel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('materiels.update.materiel.details') ?>" method="post" id="update-materiel-form">
                    @csrf
                     <input type="hidden" name="cid">
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
                                <label>Commentaire</label>
                                <textarea class="form-control" name="commentaire" required></textarea>
                                </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-block btn-success">Sauvegarder</button>
                     </div>
                 </form>


            </div>
        </div>
    </div>
</div>
