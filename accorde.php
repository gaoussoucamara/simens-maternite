    //******************* VALIDER LES DONNEES DU TABLEAU DES CONSTANTES ********************************
    //******************* VALIDER LES DONNEES DU TABLEAU DES CONSTANTES ********************************

    //Au debut on d�sactive le code cons et la date de consultation qui sont non modifiables
var id_cons = $("#id_cons");
var date_cons = $("#date_cons");
id_cons.attr('readonly', true);
date_cons.attr('readonly', true);

var poids = $('#poids');
var hu = $('#hu');
var taille = $('#taille');
//var paleur = $('#paleur');
var tension = $('#tension');
var bu = $('#bu');
var temperature = $('#temperature');
var glycemie_capillaire = $('#glycemie_capillaire');
var pouls = $('#pouls');
var frequence_respiratoire = $('#frequence_respiratoire');
var tensionmaximale = $("#tensionmaximale");
var tensionminimale = $("#tensionminimale");

//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_constantes_valider").toggle(true);
$("#bouton_constantes_modifier").toggle(false);

//Au debut on active tous les champs
hu.attr('readonly', false).css({'background': '#fff'});
poids.attr('readonly', false).css({'background': '#fff'});
taille.attr('readonly', false).css({'background': '#fff'});
//paleur.attr('readonly', false).css({'background': '#fff'});
tension.attr('readonly', false).css({'background': '#fff'});
bu.attr('readonly', false).css({'background': '#fff'});
temperature.attr('readonly', false).css({'background': '#fff'});
glycemie_capillaire.attr('readonly', false).css({'background': '#fff'});
pouls.attr('readonly', false).css({'background': '#fff'});
frequence_respiratoire.attr('readonly', false).css({'background': '#fff'});
tensionmaximale.attr('readonly', false).css({'background': '#fff'});
tensionminimale.attr('readonly', false).css({'background': '#fff'});

$("#bouton_constantes_valider").click(function () {
    if (valid == true) {

        hu.attr('readonly', true).css({'background': '#f8f8f8'});
        poids.attr('readonly', true).css({'background': '#f8f8f8'});
        taille.attr('readonly', true).css({'background': '#f8f8f8'});
        //paleur.attr('readonly', true).css({'background': '#f8f8f8'});
        tension.attr('readonly', true).css({'background': '#f8f8f8'});
        bu.attr('readonly', true).css({'background': '#f8f8f8'});
        temperature.attr('readonly', true).css({'background': '#f8f8f8'});
        glycemie_capillaire.attr('readonly', true).css({'background': '#f8f8f8'});
        pouls.attr('readonly', true).css({'background': '#f8f8f8'});
        frequence_respiratoire.attr('readonly', true).css({'background': '#f8f8f8'});
        tensionmaximale.attr('readonly', true).css({'background': '#f8f8f8'});
        tensionminimale.attr('readonly', true).css({'background': '#f8f8f8'});

        $("#bouton_constantes_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#bouton_constantes_valider").toggle(false); //on cache le bouton permettant de valider les champs
    }
    return false;
});

$("#bouton_constantes_modifier").click(function () {
    poids.attr('readonly', false).css({'background': '#fff'});
    taille.attr('readonly', false).css({'background': '#fff'});
   hu.attr('readonly', false).css({'background': '#fff'});
   // paleur.attr('readonly', false).css({'background': '#fff'});
    tension.attr('readonly', false).css({'background': '#fff'});
   bu.attr('readonly', false).css({'background': '#fff'});
    temperature.attr('readonly', false).css({'background': '#fff'});
    glycemie_capillaire.attr('readonly', false).css({'background': '#fff'});
    pouls.attr('readonly', false).css({'background': '#fff'});
    frequence_respiratoire.attr('readonly', false).css({'background': '#fff'});
    tensionmaximale.attr('readonly', false).css({'background': '#fff'});
    tensionminimale.attr('readonly', false).css({'background': '#fff'});

    $("#bouton_constantes_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
    $("#bouton_constantes_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
    return false;
});






















//ACCOUCHEMENT
var forme_accouchement = $("#type_accouchement");
var motif_forme = $("#motif_forme");
var date_accouchement = $("#date_accouchement");
var heure_accouchement = $("#heure_accouchement");
var delivrance = $("#delivrance");
var ru = $("#ru");
var hemorragie = $("#hemoragie");
var ocytocine_per = $("#ocytocique_per");
var ocytocine_post = $("#ocytocique_post");
var antibiotique = $("#antibiotique");
var anticonv = $("#anticonv");
var transfusion = $("#transfusion");
//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_accouchement_valider").toggle(true);
$("#bouton_accouchement_modifier").toggle(false);

//Au debut on active tous les champs
forme_accouchement.attr('readonly', false).css({'background': '#fff'});
motif_forme.attr('readonly', false).css({'background': '#fff'});
date_accouchement.attr('readonly', false).css({'background': '#fff'});
heure_accouchement.attr('readonly', false).css({'background': '#fff'});
delivrance.attr('readonly', false).css({'background': '#fff'});
ru.attr('readonly', false).css({'background': '#fff'});
hemorragie.attr('readonly', false).css({'background': '#fff'});
ocytocine_per.attr('readonly', false).css({'background': '#fff'});
ocytocine_post.attr('readonly', false).css({'background': '#fff'});
antibiotique.attr('readonly', false).css({'background': '#fff'});
anticonv.attr('readonly', false).css({'background': '#fff'});
transfusion.attr('readonly', false).css({'background': '#fff'});
$("#bouton_accouchement_valider").click(function () {
    if (valid == true) {

        forme_accouchement.attr('readonly', true).css({'background': '#f8f8f8'});
        motif_forme.attr('readonly', true).css({'background': '#f8f8f8'});
        date_accouchement.attr('readonly', true).css({'background': '#f8f8f8'});
       heure_accouchement.attr('readonly', true).css({'background': '#f8f8f8'});
      delivrance.attr('readonly', true).css({'background': '#f8f8f8'});
       ru.attr('readonly', true).css({'background': '#f8f8f8'});
       hemorragie.attr('readonly', true).css({'background': '#f8f8f8'});
       ocytocine_per.attr('readonly', true).css({'background': '#f8f8f8'});
       ocytocine_post.attr('readonly', true).css({'background': '#f8f8f8'});
       antibiotique.attr('readonly', true).css({'background': '#f8f8f8'});
       anticonv.attr('readonly', true).css({'background': '#f8f8f8'});
       transfusion.attr('readonly', true).css({'background': '#f8f8f8'});
        $("#bouton_accouchement_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#bouton_accouchement_valider").toggle(false); //on cache le bouton permettant de valider les champs
    }
    return false;
});

$("#bouton_accouchement_modifier").click(function () {
    forme_accouchement.attr('readonly', false).css({'background': '#fff'});
    motif_forme.attr('readonly', false).css({'background': '#fff'});
    date_accouchement.attr('readonly', false).css({'background': '#fff'});
   heure_accouchement.attr('readonly', false).css({'background': '#fff'});
  delivrance.attr('readonly', false).css({'background': '#fff'});
   ru.attr('readonly', false).css({'background': '#fff'});
  hemorragie.attr('readonly', false).css({'background': '#fff'});
  ocytocine_per.attr('readonly', false).css({'background': '#fff'});
  ocytocine_post.attr('readonly', false).css({'background': '#fff'});
  antibiotique.attr('readonly', false).css({'background': '#fff'});
  anticonv.attr('readonly', false).css({'background': '#fff'});
  tranfusion.attr('readonly', false).css({'background': '#fff'});
    $("#bouton_accouchement_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
    $("#bouton_accouchement_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
    return false;
});
























//ENFANT





var sexe = $("#sexe");
var poids = $("#poids");
var apgar1 = $("#apgar1");
var apgar5 = $("#apgar5");
var malf = $("#malf");
var cri = $("#cri");
var maintien_temp = $("#maintien_temp");
var mise_soin_precoce = $("#mise_soin_precoce");
var soin_cordon = $("#soin_cordon");
var reanimation = $("#reanimation");
var sat = $("#sat");
var vit_k = $("#vit_k");
var collyre = $("#collyre");
var consult_j1_j2 = $("#consult_j1_j2");
//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_enfant_valider").toggle(true);
$("#bouton_enfant_modifier").toggle(false);

//Au debut on active tous les champs
sexe.attr('readonly', false).css({'background': '#fff'});
poids.attr('readonly', false).css({'background': '#fff'});
apgar1.attr('readonly', false).css({'background': '#fff'});
apgar5.attr('readonly', false).css({'background': '#fff'});
malf.attr('readonly', false).css({'background': '#fff'});
cri.attr('readonly', false).css({'background': '#fff'});
maintien_temp.attr('readonly', false).css({'background': '#fff'});
mise_soin_precoce.attr('readonly', false).css({'background': '#fff'});
soin_cordon.attr('readonly', false).css({'background': '#fff'});
reanimation.attr('readonly', false).css({'background': '#fff'});
sat.attr('readonly', false).css({'background': '#fff'});
vit_k.attr('readonly', false).css({'background': '#fff'});
collyre.attr('readonly', false).css({'background': '#fff'});
consult_j1_j2.attr('readonly', false).css({'background': '#fff'});
$("#bouton_enfant_valider").click(function () {
    if (valid == true) {

    	sexe.attr('readonly', true).css({'background': '#f8f8f8'});
    	poids.attr('readonly', true).css({'background': '#f8f8f8'});
    	apgar1.attr('readonly', true).css({'background': '#f8f8f8'});
    	apgar5.attr('readonly', true).css({'background': '#f8f8f8'});
    	malf.attr('readonly', true).css({'background': '#f8f8f8'});
    	cri.attr('readonly', true).css({'background': '#f8f8f8'});
    	maintien_temp.attr('readonly', true).css({'background': '#f8f8f8'});
    	mise_soin_precoce.attr('readonly', true).css({'background': '#f8f8f8'});
    	soin_cordon.attr('readonly', true).css({'background': '#f8f8f8'});
    	reanimation.attr('readonly', true).css({'background': '#f8f8f8'});
    	sat.attr('readonly', true).css({'background': '#f8f8f8'});
    	vit_k.attr('readonly', true).css({'background': '#f8f8f8'});
    	collyre.attr('readonly', true).css({'background': '#f8f8f8'});
    	consult_j1_j2.attr('readonly', true).css({'background': '#f8f8f8'});
        $("#bouton_enfant_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#bouton_enfant_valider").toggle(false); //on cache le bouton permettant de valider les champs
    }
    return false;
});

$("#bouton_enfant_modifier").click(function () {
	sexe.attr('readonly', false).css({'background': '#fff'});
	poids.attr('readonly', false).css({'background': '#fff'});
	apgar1.attr('readonly', false).css({'background': '#fff'});
	apgar5.attr('readonly', false).css({'background': '#fff'});
	malf.attr('readonly', false).css({'background': '#fff'});
  cri.attr('readonly', false).css({'background': '#fff'});
  maintien_temp.attr('readonly', false).css({'background': '#fff'});
  mise_soin_precoce.attr('readonly', false).css({'background': '#fff'});
  soin_cordon.attr('readonly', false).css({'background': '#fff'});
  reanimation.attr('readonly', false).css({'background': '#fff'});
  sat.attr('readonly', false).css({'background': '#fff'});
  vit_k.attr('readonly', false).css({'background': '#fff'});
  collyre.attr('readonly', false).css({'background': '#fff'});
  consult_j1_j2.attr('readonly', false).css({'background': '#fff'});
    $("#bouton_enfant_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
    $("#bouton_enfant_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
    return false;
});




















//Antecedent 


var geste = $("#geste");
var parite = $("#parite");
var enf_viv = $("#enf_viv");
var nb_cpn = $("#nb_cpn");
var mort_ne = $("#mort_ne");
var cesar = $("#cesar");
var dystocie = $("#dystocie");
var eclampsie = $("#eclampsie");

//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_ant_valider").toggle(true);
$("#bouton_ant_modifier").toggle(false);

//Au debut on active tous les champs
geste.attr('readonly', false).css({'background': '#fff'});
parite.attr('readonly', false).css({'background': '#fff'});
enf_viv.attr('readonly', false).css({'background': '#fff'});
nb_cpn.attr('readonly', false).css({'background': '#fff'});
mort_ne.attr('readonly', false).css({'background': '#fff'});
cesar.attr('readonly', false).css({'background': '#fff'});
dystocie.attr('readonly', false).css({'background': '#fff'});
eclampsie.attr('readonly', false).css({'background': '#fff'});

$("#bouton_ant_valider").click(function () {
  if (valid == true) {

  	geste.attr('readonly', true).css({'background': '#f8f8f8'});
  	parite.attr('readonly', true).css({'background': '#f8f8f8'});
  	enf_viv.attr('readonly', true).css({'background': '#f8f8f8'});
  	nb_cpn.attr('readonly', true).css({'background': '#f8f8f8'});
  	mort_ne.attr('readonly', true).css({'background': '#f8f8f8'});
  	cesar.attr('readonly', true).css({'background': '#f8f8f8'});
  	dystocie.attr('readonly', true).css({'background': '#f8f8f8'});
  	eclampsie.attr('readonly', true).css({'background': '#f8f8f8'});
  
      $("#bouton_ant_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
      $("#bouton_ant_valider").toggle(false); //on cache le bouton permettant de valider les champs
  }
  return false;
});

$("#bouton_ant_modifier").click(function () {
	geste.attr('readonly', false).css({'background': '#fff'});
	parite.attr('readonly', false).css({'background': '#fff'});
	enf_viv.attr('readonly', false).css({'background': '#fff'});
	nb_cpn.attr('readonly', false).css({'background': '#fff'});
	mort_ne.attr('readonly', false).css({'background': '#fff'});
cesar.attr('readonly', false).css({'background': '#fff'});
dystocie.attr('readonly', false).css({'background': '#fff'});
eclampsie.attr('readonly', false).css({'background': '#fff'});

  $("#bouton_ant_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
  $("#bouton_ant_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
  return false;
});







//Grossesse


var ddr = $("#ddr");
var duree_grossesse = $("#duree_grossesse");
var bb_attendu = $("#bb_attendu");
var vat_1 = $("#vat_1");
var vat_2 = $("#vat_2");
var vat_3 = $("#vat_3");


//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_gro_valider").toggle(true);
$("#bouton_gro_modifier").toggle(false);

//Au debut on active tous les champs
ddr.attr('readonly', false).css({'background': '#fff'});
duree_grossesse.attr('readonly', false).css({'background': '#fff'});
bb_attendu.attr('readonly', false).css({'background': '#fff'});
vat_1.attr('readonly', false).css({'background': '#fff'});
vat_2.attr('readonly', false).css({'background': '#fff'});
vat_3.attr('readonly', false).css({'background': '#fff'});


$("#bouton_gro_valider").click(function () {
if (valid == true) {

	ddr.attr('readonly', true).css({'background': '#f8f8f8'});
	duree_grossesse.attr('readonly', true).css({'background': '#f8f8f8'});
	bb_attendu.attr('readonly', true).css({'background': '#f8f8f8'});
	vat_1.attr('readonly', true).css({'background': '#f8f8f8'});
	vat_2.attr('readonly', true).css({'background': '#f8f8f8'});
	vat_3.attr('readonly', true).css({'background': '#f8f8f8'});


    $("#bouton_gro_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
    $("#bouton_gro_valider").toggle(false); //on cache le bouton permettant de valider les champs
}
return false;
});

$("#bouton_gro_modifier").click(function () {
	ddr.attr('readonly', false).css({'background': '#fff'});
	duree_grossesse.attr('readonly', false).css({'background': '#fff'});
	bb_attendu.attr('readonly', false).css({'background': '#fff'});
	vat_1.attr('readonly', false).css({'background': '#fff'});
	vat_2.attr('readonly', false).css({'background': '#fff'});
    vat_3.attr('readonly', false).css({'background': '#fff'});


$("#bouton_gro_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
$("#bouton_gro_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
return false;
});
















//EVACUATION





var evacue_de = $("#evacue_de");
var motif_evac = $("#motif_evac");
var evacue_vers = $("#evacue_vers");
var motif_ev_vers = $("#motif_ev_vers");

//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_evac_valider").toggle(true);
$("#bouton_evac_modifier").toggle(false);

//Au debut on active tous les champs
evacue_de.attr('readonly', false).css({'background': '#fff'});
motif_evac.attr('readonly', false).css({'background': '#fff'});
evacue_vers.attr('readonly', false).css({'background': '#fff'});
motif_ev_vers.attr('readonly', false).css({'background': '#fff'});

$("#bouton_evac_valider").click(function () {
    if (valid == true) {

    	evacue_de.attr('readonly', true).css({'background': '#f8f8f8'});
    	motif_evac.attr('readonly', true).css({'background': '#f8f8f8'});
    	evacue_vers.attr('readonly', true).css({'background': '#f8f8f8'});
    	motif_ev_vers.attr('readonly', true).css({'background': '#f8f8f8'});
    	
        $("#bouton_evac_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#bouton_evac_valider").toggle(false); //on cache le bouton permettant de valider les champs
    }
    return false;
});

$("#bouton_evac_modifier").click(function () {
	evacue_de.attr('readonly', false).css({'background': '#fff'});
	motif_evac.attr('readonly', false).css({'background': '#fff'});
	evacue_vers.attr('readonly', false).css({'background': '#fff'});
	motif_ev_vers.attr('readonly', false).css({'background': '#fff'});
	
    $("#bouton_evac_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
    $("#bouton_evac_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
    return false;
});



//REFERENCE


var reference = $("#reference");
var motif_ref = $("#motif_ref");
//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_ref_valider").toggle(true);
$("#bouton_ref_modifier").toggle(false);

//Au debut on active tous les champs

reference.attr('readonly', false).css({'background': '#fff'});
motif_ref.attr('readonly', false).css({'background': '#fff'});
$("#bouton_ref_valider").click(function () {
    if (valid == true) {

    	
    	reference.attr('readonly', true).css({'background': '#f8f8f8'});
    	motif_ref.attr('readonly', true).css({'background': '#f8f8f8'});
        $("#bouton_ref_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#bouton_ref_valider").toggle(false); //on cache le bouton permettant de valider les champs
    }
    return false;
});

$("#bouton_ref_modifier").click(function () {
	
	reference.attr('readonly', false).css({'background': '#fff'});
	motif_ref.attr('readonly', false).css({'background': '#fff'});
    $("#bouton_ref_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
    $("#bouton_ref_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
    return false;
});