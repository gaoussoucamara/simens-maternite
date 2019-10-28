<?php

namespace Maternite\Model;

class Naissance {
public $id_maman;
public $id_grossesse;
public $id_cons;
	public $sexe;
	public $note_sexe;
	public $poids;
	public $note_poids;
	public $taille;
	public $note_taille;
	public $apgar_1;
	public $apgar_5;
	public $note_apgar;
	public $malf;
	public $note_malf;
	public $cri;
	public $note_cri;
	public $maintien_temp;
	public $note_temp;
	public $mise_soin_precoce;
	public $note_soin_precoce;
	public $soin_cordon;
	public $note_cordon;
	public $reanimation;
	public $note_reanim;
	public $sat;
	public $note_sat;
	public $vit_k;
	public $note_vitk;
	public $collyre;
	public $note_collyre;
	public $consult_j1_j2;
	public $perim_cranien;
	public $perim_cephalique;
	public $perim_brachial;
	public $note_perim;
	public $bcg;
	public $note_bcg;
	public $anti_hepatique;
	public $note_hepa;
	public $vpo;
	public $note_vpo;
	public $anti_tuberculeux;
	public $note_tuberculeux;
	public $autre_vacc;
	public $type_autre_vacc;
	public $note_autre_vacc;
	
	
	
	public function exchangeArray($data) {
$this->id_maman = (! empty ( $data ['id_maman'] )) ? $data ['id_maman'] : null;
$this->id_grossesse = (! empty ( $data ['id_grossesse'] )) ? $data ['id_grossesse'] : null;
		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
		$this->sexe= (! empty ( $data ['sexe'] )) ? $data ['sexe'] : null;
		$this->note_sexe= (! empty ( $data ['note_sexe'] )) ? $data ['note_sexe'] : null;
		$this->poids= (! empty ( $data ['poids'] )) ? $data ['poids'] : null;
		$this->note_poids= (! empty ( $data ['note_poids'] )) ? $data ['note_poids'] : null;
		$this->taille = (! empty ( $data ['taille'] )) ? $data ['taille'] : null;
		$this->note_taille = (! empty ( $data ['note_taille'] )) ? $data ['note_taille'] : null;
	    $this->apgar_1= (! empty ( $data ['apgar_1'] )) ? $data ['apgar_1'] : null;
	   $this->apgar_5= (! empty ( $data ['apgar_5'] )) ? $data ['apgar_5'] : null;
	   $this->note_apgar= (! empty ( $data ['note_apgar'] )) ? $data ['note_apgar'] : null;
		$this->malf = (! empty ( $data ['malf'] )) ? $data ['malf'] : null;
		$this->note_malf = (! empty ( $data ['note_malf'] )) ? $data ['note_malf'] : null;
		$this->cri = (! empty ( $data ['cri'] )) ? $data ['cri'] : null;
		$this->note_cri = (! empty ( $data ['note_cri'] )) ? $data ['note_cri'] : null;
		$this->maintien_temp= (! empty ( $data ['maintien_temp'] )) ? $data ['maintien_temp'] : null;
		$this->note_temp= (! empty ( $data ['note_temp'] )) ? $data ['note_temp'] : null;
		$this->mise_soin_precoce = (! empty ( $data ['mise_soin_precoce'] )) ? $data ['mise_soin_precoce'] : null;
		$this->note_soin_precoce = (! empty ( $data ['note_soin_precoce'] )) ? $data ['note_soin_precoce'] : null;
		$this->soin_cordon = (! empty ( $data ['soin_cordon'] )) ? $data ['soin_cordon'] : null;
		$this->note_cordon = (! empty ( $data ['note_cordon'] )) ? $data ['note_cordon'] : null;
		$this->reanimation = (! empty ( $data ['reanimation'] )) ? $data ['reanimation'] : null;
		$this->note_reanim = (! empty ( $data ['note_reanim'] )) ? $data ['note_reanim'] : null;
		$this->sat = (! empty ( $data ['sat'] )) ? $data ['sat'] : null;
		$this->note_sat = (! empty ( $data ['note_sat'] )) ? $data ['note_sat'] : null;
		$this->vit_k = (! empty ( $data ['vit_k'] )) ? $data ['vit_k'] : null;
		$this->note_vitk = (! empty ( $data ['note_vitk'] )) ? $data ['note_vitk'] : null;
		$this->collyre = (! empty ( $data ['collyre'] )) ? $data ['collyre'] : null;
		$this->note_collyre = (! empty ( $data ['note_collyre'] )) ? $data ['note_collyre'] : null;
		$this->consult_j1_j2 = (! empty ( $data ['consult_j1_j2'] )) ? $data ['consult_j1_j2'] : null;
		$this->perim_cranien = (! empty ( $data ['perim_cranien'] )) ? $data ['perim_cranien'] : null;
		$this->perim_brachial = (! empty ( $data ['perim_brachial'] )) ? $data ['perim_brachial'] : null;
		$this->perim_cephalique = (! empty ( $data ['perim_cephalique'] )) ? $data ['perim_cephalique'] : null;		
		$this->note_perim = (! empty ( $data ['note_perim'] )) ? $data ['note_perim'] : null;
		$this->bcg = (! empty ( $data ['bcg'] )) ? $data ['bcg'] : null;
		$this->note_bcg = (! empty ( $data ['note_bcg'] )) ? $data ['note_bcg'] : null;
		$this->anti_hepatique = (! empty ( $data ['anti_hepatique'] )) ? $data ['anti_hepatique'] : null;
		$this->note_hepa = (! empty ( $data ['note_hepa'] )) ? $data ['note_hepa'] : null;
		$this->vpo = (! empty ( $data ['vpo'] )) ? $data ['vpo'] : null;
		$this->note_vpo = (! empty ( $data ['note_vpo'] )) ? $data ['note_vpo'] : null;
		$this->anti_tuberculeux = (! empty ( $data ['anti_tuberculeux'] )) ? $data ['anti_tuberculeux'] : null;
		$this->note_tuberculeux = (! empty ( $data ['note_tuberculeux'] )) ? $data ['note_tuberculeux'] : null;
		$this->autre_vacc = (! empty ( $data ['autre_vacc'] )) ? $data ['autre_vacc'] : null;
		$this->type_autre_vacc = (! empty ( $data ['type_autre_vacc'] )) ? $data ['type_autre_vacc'] : null;
		$this->note_autre_vacc = (! empty ( $data ['note_autre_vacc'] )) ? $data ['note_autre_vacc'] : null;
		
	}
}