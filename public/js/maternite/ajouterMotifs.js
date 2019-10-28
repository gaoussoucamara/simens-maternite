var base_url = window.location.toString();
var tabUrl = base_url.split("public");

//********************* motif_admission *****************************
//********************* motif_admission *****************************
$(function(){
	var motifRadio = $("#motifAdmission input:radio");
	var motifRadio1 = $("#motif6 input:radio");
	var motifRadio2 = $(".newG input:radio");


	$("#bouton_motif_valider").toggle(true);
    $("#bouton_motif_modifier").toggle(false);

    motifRadio.attr( 'disabled', false);
    $("#motifAdmission input:radio").click(function () {
        if ( $("#motif_admission input:radio").is(':checked'))
        {
            $(".newG input:radio").attr('disabled', false)
        }
    })


	$('.supprimerMotif1, .supprimerMotif2, .supprimerMotif3').toggle(true);

	$("#bouton_motif_valider").click(function(){

        motifRadio.attr( 'disabled', true);


		$("#bouton_motif_modifier").toggle(true);
		$("#bouton_motif_valider").toggle(false);

		return false;
	}); 
	
	$("#bouton_motif_modifier").click(function(){

        motifRadio.attr( 'disabled', false);


        $("#bouton_motif_modifier").toggle(false);
		$("#bouton_motif_valider").toggle(true);
		
		$('.supprimerMotif1, .supprimerMotif2, .supprimerMotif3, .supprimerMotif4, .supprimerMotif5').toggle(true);
		return false;
	});
});