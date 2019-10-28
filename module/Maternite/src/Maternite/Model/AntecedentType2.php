<?php
namespace Maternite\Model;

class AntecedentType2 {

	public $id_patient;
	public $id_cons;
	public $dystocie;
	public $eclampsie;
	public $cycle;
	public $duree_cycle;
	public $quantite_regle;
	public $nb_garniture_jr;
	public $note_eclampsie;
	public $note_dystocie;
	public $note_cycle;
	public $autre;
	public $note_autre;
	public $contraception;
	public $type_contraception;
	public $duree_contraception;
	public $note_contraception;



	public function exchangeArray($data) {
		$this->id_patient = (! empty ( $data ['id_patient'] )) ? $data ['id_patient'] : null;
		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
		$this->dystocie = (! empty ( $data ['dystocie'] )) ? $data ['dystocie'] : null;
		$this->eclampsie = (! empty ( $data ['eclampsie'] )) ? $data ['eclampsie'] : null;
		$this->duree_cycle = (! empty ( $data ['duree_cycle'] )) ? $data ['duree_cycle'] : null;
		$this->cycle = (! empty ( $data ['cycle'] )) ? $data ['cycle'] : null;
		$this->quantite_regle = (! empty ( $data ['quantite_regle'] )) ? $data ['quantite_regle'] : null;
		$this->autre_go = (! empty ( $data ['autre_go'] )) ? $data ['autre_go'] : null;
		$this->nb_garniture_jr = (! empty ( $data ['nb_garniture_jr'] )) ? $data ['nb_garniture_jr'] : null;
		$this->note_dystocie = (! empty ( $data ['note_dystocie'] )) ? $data ['note_dystocie'] : null;
		$this->note_eclampsie = (! empty ( $data ['note_eclampsie'] )) ? $data ['note_eclampsie'] : null;
		$this->note_autre = (! empty ( $data ['note_autre'] )) ? $data ['note_autre'] : null;
		$this->note_cycle = (! empty ( $data ['note_cycle'] )) ? $data ['note_cycle'] : null;
		$this->contraception = (! empty ( $data ['contraception'] )) ? $data ['contraception'] : null;
		$this->type_contraception = (! empty ( $data ['type_contraception'] )) ? $data ['type_contraception'] : null;
		$this->duree_contraception = (! empty ( $data ['duree_contraception'] )) ? $data ['duree_contraception'] : null;
		$this->note_contraception = (! empty ( $data ['note_contraception'] )) ? $data ['note_contraception'] : null;
	}
	public function getArrayCopy() {
		//return get_object_vars ( $this );
	}
}