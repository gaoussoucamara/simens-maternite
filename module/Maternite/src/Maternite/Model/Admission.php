<?php
namespace Maternite\Model;

class Admission {
	public $id_admission;
	public $id_type_ad;
	public $id_patient;
	public $id_service;
	public $date_cons;
	public $id_employe;
	public $date_enregistrement;
	public function exchangeArray($data) {
		
		$this->id_admission = (! empty ( $data ['id_admission'] )) ? $data ['id_admission'] : null;
		$this->id_type_ad=(!empty($data ['id_type_ad'])) ? $data['id_type_ad']:null;
		$this->id_patient = (! empty ( $data ['id_patient'] )) ? $data ['id_patient'] : null;
		$this->id_service = (! empty ( $data ['id_service'] )) ? $data ['id_service'] : null;
		$this->date_cons = (! empty ( $data ['date_cons'] )) ? $data ['date_cons'] : null;
		$this->id_employe = (! empty ( $data ['id_employe'] )) ? $data ['id_employe'] : null;
		$this->date_enregistrement = (! empty ( $data ['date_enregistrement'] )) ? $data ['date_enregistrement'] : null;
	}
	public function getArrayCopy() {
	}
}