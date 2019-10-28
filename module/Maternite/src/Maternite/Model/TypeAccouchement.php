<?php
namespace Maternite\Model;

class TypeAccouchement {
	public  $id_type;
	Public  $type_accouch;
	

	public function exchangeArray($data) {
		$this->id_type = (! empty ( $data ['id_type'] )) ? $data ['id_type'] : null;
		$this->type_accouch = (! empty ( $data ['type_accouch'] )) ? $data ['type_accouch'] : null;
	
	}

	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
}