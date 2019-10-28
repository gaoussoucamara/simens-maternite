<?php

namespace Maternite\Model;

class Conclusion {
	public $id_conclusion;
	public $id_cons;
	public $id_cause;
	public $id_type_cause;
	public $note_conclusion;
	public $id_patient;
	public function exchangeArray($data) {
		$this->id_conclusion = (! empty ( $data ['id_conclusion'] )) ? $data ['id_conclusion'] : null;
		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
		$this->id_cause = (! empty ( $data ['id_cause'] )) ? $data ['id_cause'] : null;
		$this->id_patient = (! empty ( $data ['id_patient'] )) ? $data ['id_patient'] : null;
		$this->note_conclusion = (! empty ( $data ['note_conclusion'] )) ? $data ['note_conclusion'] : null;
	}
}