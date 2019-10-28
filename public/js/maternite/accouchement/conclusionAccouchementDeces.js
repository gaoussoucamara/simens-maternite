function creerLalisteDeces ($listeDesElements) {
    	var index = $("Deces").length; 
			        $liste = "<div id='DecesMaternel_"+(index+1)+"'>"+
				             "<Deces>"+
				             "<table class='table table-bordered' id='Cause' style='margin-bottom: 0px; width: 100%;'>"+
                             "<tr style='width: 100%;'>" +
                             
                             "<th style='width: 4%;'>"+
                             "<label style='width: 100%; margin-top: 10px; margin-left: 5px; font-weight: bold; font-family: police2; font-size: 14px;' >"+(index+1)+"<span id='element_label'></span></label>" +
                             "</th >"+
                             
                             "<th id='SelectDeces_"+(index+1)+"' style='width: 28%;'>"+
                             "<select style='width: 100%; margin-top: 3px; margin-bottom: 0px; font-size: 13px;' name='deces_name_"+(index+1)+"' id='deces_name_"+(index+1)+"'>"+
			                 "<option value=''> -- S&eacute;l&eacute;ctionner une Cause-- </option>";
                             for(var i = 1 ; i < $listeDesElements.length ; i++){
                            	 if($listeDesElements[i]){
                    $liste +="<option value='"+i+"'>"+$listeDesElements[i]+"</option>";
                            	 }
                             }   
                    $liste +="</select>"+                           
                             "</th>"+
                             
                             "<th id='noteDeces_"+(index+1)+"'  style='width: 59%;'  >"+
                             "<input name='noteDeces_"+(index+1)+"' id='notesDeces_"+(index+1)+"' type='text' style='width: 100%; margin-top: 3px; height: 30px; margin-bottom: 0px; font-size: 15px; padding-left: 10px;' >" +
                             "</th >"+
                             
                             "<th id='iconeDeces_supp_vider' style='width: 9%;'  >"+
                             "<a id='supprimer_deces_selectionne_"+ (index+1) +"'  style='width:50%;' >"+
                             "<img class='supprimerDeces' style='margin-left: 5px; margin-top: 10px; cursor: pointer;' src='../images/images/sup.png' title='supprimer' />"+
                             "</a>"+
                             
                             "<a id='vider_deces_selectionne_"+ (index+1) +"'  style='width:50%;' >"+
                             "<img class='viderDeces' style='margin-left: 15px; margin-top: 10px; cursor: pointer;' src='../images_icons/gomme.png' title='vider' />"+
                             "</a>"+
                             "</th >"+
                             "</tr>" +
                             "</table>" +
                             "</Deces>" +
                             "</div>"+
                             
                             
                             "<script>"+
                                "$('#supprimer_deces_selectionne_"+ (index+1) +"').click(function(){ " +
                                		"supprimer_deces_selectionne("+ (index+1) +"); });" +
                                				
                                "$('#vider_deces_selectionne_"+ (index+1) +"').click(function(){ " +
                                		"vider_deces_selectionne("+ (index+1) +"); });" +
                             "</script>";
                    
                    //AJOUTER ELEMENT SUIVANT
                    $("#DecesMaternel_"+index).after($liste);
                    
                    //CACHER L'ICONE AJOUT QUAND ON A CINQ LISTES
                    if((index+1) == 6){
                    	$("#ajouter_deces").toggle(false);
                    }
                    
                    //AFFICHER L'ICONE SUPPRIMER QUAND ON A DEUX LISTES ET PLUS
                    if((index+1) == 2){
                    	$("#supprimer_deces").toggle(true);
                    }
}


//NOMBRE DE LISTE AFFICHEES
function nbListeDeces () {
	return $("Deces").length;
}


//SUPPRIMER LE DERNIER ELEMENT
$(function () {
	//Au début on cache la suppression
	$("#supprimer_deces").click(function(){
		//ON PEUT SUPPRIMER QUAND C'EST PLUS DE DEUX LISTE
		if(nbListeDeces () >  1){$("#DecesMaternel_"+nbListeDeces ()).remove();}
		//ON CACHE L'ICONE SUPPRIMER QUAND ON A UNE LIGNE
		if(nbListeDeces () == 1) {
			$("#supprimer_deces").toggle(false);
			$(".supprimerDeces" ).replaceWith(
			  "<img class='supprimerDeces' style='margin-left: 5px; margin-top: 10px;' src='../images/images/sup2.png' />"
			);
		}
		//Afficher L'ICONE AJOUT QUAND ON A CINQ LIGNES
		if((nbListeDeces()+1) == 6){
			$("#ajouter_deces").toggle(true);
		}    
		Event.stopPropagation();
	});
});


//FONCTION INITIALISATION (Par défaut)
function partDefautDeces (Liste, n) { 
	var i = 0;
	for( i ; i < n ; i++){
		creerLalisteDeces(Liste);
	}
	if(n == 1){
		$(".supprimerDeces" ).replaceWith(
				"<img class='supprimerDeces' style='margin-left: 5px; margin-top: 10px;' src='../images/images/sup2.png' />"
			);
	}
	$('#ajouter_deces').click(function(){ 
		creerLalisteDeces(Liste);
		if(nbListeDeces() == 2){
		$(".supprimerDeces" ).replaceWith(
				"<img class='supprimerDeces' style='margin-left: 5px; margin-top: 10px; cursor: pointer;' src='../images/images/sup.png' title='Supprimer' />"
		);
		}
	});

	//AFFICHER L'ICONE SUPPRIMER QUAND ON A DEUX LISTES ET PLUS
    if(nbListeDeces () > 1){
    	$("#supprimer_deces").toggle(true);
    } else {
    	$("#supprimer_deces").toggle(false);
      }
}

//SUPPRIMER ELEMENT SELECTIONNER
function supprimer_deces_selectionne(id) { 

	for(var i = (id+1); i <= nbListeDeces(); i++ ){
		var element = $('#deces_name_'+i).val();
		$("#SelectDeces_"+(i-1)+" option[value='"+element+"']").attr('selected','selected');
		
		var note = $('#noteDeces_'+i+' input').val();
		$("#noteDeces_"+(i-1)+" input").val(note);
	}

	if(nbListeDeces() <= 2 && id <= 2){
		$(".supprimerDeces" ).replaceWith(
			"<img class='supprimerDeces' style='margin-left: 5px; margin-top: 10px;' src='../images/images/sup2.png' />"
		);
	}
	if(nbListeDeces() != 1) {
		$('#DecesMaternel_'+nbListeDeces()).remove();
	}
	if(nbListeDeces() == 1) {
		$("#supprimer_deces").toggle(false);
	}
	if((nbListeDeces()+1) == 6){
		$("#ajouter_deces").toggle(true);
	}
   
}

//VIDER LES CHAMPS DE L'ELEMENT SELECTIONNER
function vider_deces_selectionne(id) {
	$("#SelectDeces_"+id+" option[value='']").attr('selected','selected');
	$("#noteDeces_"+id+" input").val("");
}

//CHARGEMENT DES ELEMENTS SELECTIONNES POUR LA MODIFICATION
//CHARGEMENT DES ELEMENTS SELECTIONNES POUR LA MODIFICATION
//CHARGEMENT DES ELEMENTS SELECTIONNES POUR LA MODIFICATION

//pour maj
function chargementCauseDeces(index , element , note) { 
	$("#SelectDeces_"+(index+1)+" option[value='"+element+"']").attr('selected','selected'); 
	$("#noteDeces_"+(index+1)+" input").val(note);
	

}

var base_url = window.location.toString();
var tabUrl = base_url.split("public");

//VALIDATION VALIDATION VALIDATION
//********************* EXAMEN MORPHOLOGIQUE *****************************
//********************* EXAMEN MORPHOLOGIQUE *****************************
//********************* EXAMEN MORPHOLOGIQUE *****************************

function ValiderDemandeComplication(){
$(function(){
	//Au debut on affiche pas le bouton modifier
	$("#bouton_ExamenBio_modifier_demande").toggle(false);
	//Au debut on affiche le bouton valider
	$("#bouton_ExamenBio_valider_demande").toggle(true);
	
	$("#bouton_ExamenBio_valider_demande button").click(function(){ 
		//RECUPERATION DES DONNEES DU TABLEAU
		var id_cons = $('#id_cons').val();
		var examensBio = [];
		var notesBio = [];
		for(var i = 1, j = 1; i <= nbListeComp(); i++ ){
			if($('#comp_name_'+i).val()) {
				examensBio[j] = $('#comp_name_'+i).val();
				notesBio[j] = $('#noteComp_'+i+' input').val();
				j++;
			}
		}
		
		$.ajax({
	        type: 'POST',
	        url: tabUrl[0]+'public/accouchement/conclusion-complication',
	        data: {'id_cons':id_cons, 'deces': deces, 'notesDeces':notesComp},
	        success: function(data) {

	            for(var i = 1; i <= nbListeDeces(); i++ ){
	    			$('#deces_name_'+i).attr('disabled',true); $('#deces_name_'+i).css({'background':'#f8f8f8'});
	    			$("#noteDeces_"+i+" input").attr('disabled',true); $("#noteDeces_"+i+" input").css({'background':'#f8f8f8'});
	    		}
	    		$("#controls_Deces div").toggle(false);
	    		$("#iconeDeces_supp_vider a img").toggle(false);

	    		return false;
	      },
	      error:function(e){console.log(e);alert("Une erreur interne est survenue!");},
	      dataType: "html"
		});
		return false;
	});
	

	
});
}
