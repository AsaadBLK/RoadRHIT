<div class="modal fade editEmploye" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editer l'employé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('employes.update.employe.details') ?>" method="post" id="update-employe-form">
                    @csrf
                     <input type="hidden" name="cid">
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
                                <label>Creation d'adresse email (IT)</label> <br>
                                <select name="status_crebyIT" class="form-control select">
                                <option value="none">---</option>
                                <option value="Créée">Créée</option>
                                <option value="Non créée">Non créée</option>
                                </select>
                                 <span class="text-danger error-text status_crebyIT_error"></span>
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
                                <button type="submit" class="btn btn-xs-block btn-success">ENREGISTRER</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               </div>

                 </form>


            </div>
        </div>
    </div>
</div>
