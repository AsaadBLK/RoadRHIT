<div class="modal fade showAttribution" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                 <form action="<?= route('attributions.update.attribution.details') ?>" method="post" id="update-attribution-form">
                    @csrf
                     <input type="hidden" name="cid">
                                {{-- <div class="form-group">
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
                         <button type="submit" class="btn btn-xs-block btn-success">Sauvegarder</button>
                     </div> --}}

                 </form>




<table align="center" cellspacing="0" border="0">
	<colgroup width="174"></colgroup>
	<colgroup width="37"></colgroup>
	<colgroup span="6" width="69"></colgroup>
	<colgroup width="1"></colgroup>
	<colgroup width="14"></colgroup>
	<tr>
		<td rowspan=2 height="39" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br>
            <img src="{{ asset('/img/sav.png') }}" width=88 height=38 hspace=43 vspace=1>  <br>
		</font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=10 rowspan=2 height="41" align="center" valign=middle bgcolor="#FFFFFF"><b><font size=4 color="#000000">FICHE D' ATTRIBUTION MATERIEL</font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td height="20" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Mat&eacute;riel attribu&eacute;</font></b></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">D&eacute;signation:                       </font></b></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=9 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">{{ $mater->designation }}</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Marque:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=9 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">{{ $mater->marque }}</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Mod&egrave;le:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=9 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">{{ $mater->modell }}</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">SN/IMEI:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=9 align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;0"><b><font size=3 color="#000000"> {{ $mater->serialnumber }} <br></font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Accessoires:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=9 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">{{ $acce->access_name }}</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Etat:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=9 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">{{ $mater->etat }}</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Commentaire:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=9 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000"> <input type="text" name="commentaire" style="background-color:#fff;border:none;font-weight:bold;height:27px;text-align:center;" class="form-control" readonly /> </font></b></td>
		</tr>
	<tr>
		<td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Utilisateur</font></b></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Nom et pr&eacute;nom:</font></b></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=8 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">{{ $empl->nomprenom  }}</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Division D&eacute;partement:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=8 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">{{ $empl->businessEmp  }}</font></b></td>
		</tr>
	{{-- <tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Fonction :</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=8 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">FONCTION</font></b></td>
		</tr> --}}
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Date d'attribution:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=8 align="center" valign=bottom bgcolor="#FFFFFF" sdnum="1033;1033;M/D/YYYY"><b><font size=3 color="#000000"> <input type="text" name="attribute_at" style="background-color:#fff;border:none;font-weight:bold;height:27px;text-align:center;" class="form-control" readonly />  </font></b></td>
		</tr>
	<tr>
		<td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Gestionnaire du mat&eacute;riel</font></b></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Nom pr&eacute;nom:</font></b></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=8 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Responsable IT</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Division D&eacute;partement:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=8 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">ASAAD DEV</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=2 height="21" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Fonction:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=8 align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">IT RESP</font></b></td>
		</tr>
	<tr>
		<td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 height="22" align="left" valign=bottom bgcolor="#FFFFFF"><b><font size=3 color="#000000">Engagement</font></b></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
	</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=10 height="197" align="left" valign=middle bgcolor="#FFFFFF"><font size=3 color="#000000">*L&rsquo;entreprise confie par la pr&eacute;sente &agrave; l&rsquo;utilisateur le mat&eacute;riel ci-dessus, il doit en pr&eacute;server l&rsquo;&eacute;tat. <br>*Ce mat&eacute;riel est neuf ou en &eacute;tat de fonctionnement reste la propri&eacute;t&eacute; pleine et enti&egrave;re de SGS Maroc. l&rsquo;utilisateur est aussi tenu &agrave; restituer le mat&eacute;riel sur la demande du service IT ou en cas de d&eacute;part.<br>*En cas de perte, l&rsquo;utilisateur est tenu de faire une d&eacute;claration aupr&egrave;s des services concern&eacute;s.<br>* En cas de d&eacute;gradation, l'utilisateur est tenu &agrave; rembourser la valeur du mat&eacute;riel et les &eacute;quipements associ&eacute;s</font></td>
		</tr>
	<tr>
		<td height="22" align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="42" align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 align="center" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000">Signature<br>Gestionnaire du mat&eacute;riel</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=5 align="center" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000">Signature<br>  Utilisateur</font></td>
		</tr>
	<tr>
		<td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=3 rowspan=5 align="center" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=5 align="center" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		</tr>
	<tr>
		<td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		</tr>
	<tr>
		<td height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		</tr>
	<tr>
		<td height="10" align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		</tr>
	<tr>
		<td height="6" align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font size=3 color="#000000"><br></font></td>
		</tr>
	<tr>
		<td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">Le : </font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
		<td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><br></font></td>
	</tr>
</table>
{{-- <img src="result_htm_41c2dc0ad81d2314.png" width=632 height=65> --}}
<br clear=left>

            </div>
        </div>
    </div>
</div>
