<?php

namespace Maternite\Form\accouchement;

use Zend\Form\Form;

class ProtocoleOperatoireForm extends Form {
	public function __construct() {
		parent::__construct ();
		
		$this->add ( array (
				'name' => 'id_admission',
				'type' => 'Hidden',
				'attributes' => array (
						'id' => 'id_admission' 
				) 
		) );
		
		$this->add ( array (
				'name' => 'id_patient',
				'type' => 'Hidden',
				'attributes' => array (
						'id' => 'id_patient' 
				) 
		) );
		
		$this->add ( array (
				'name' => 'id_protocole',
				'type' => 'Hidden',
				'attributes' => array (
						'id' => 'id_protocole' 
				) 
		) );
		
		$this->add ( array (
				'name' => 'anesthesiste',
				'type' => 'Text',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Anesth�siste' ) 
				),
				'attributes' => array (
						'id' => 'anesthesiste',
						'required' => true 
				) 
		) );
		
		$this->add ( array (
				'name' => 'indication',
				'type' => 'Text',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Indication' ) 
				),
				'attributes' => array (
						'id' => 'indication',
						'required' => true 
				) 
		) );
		
		$this->add ( array (
				'name' => 'type_anesthesie',
				'type' => 'Text',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Type d\'anesth�sie' ) 
				),
				'attributes' => array (
						'id' => 'type_anesthesie',
						'required' => true 
				) 
		) );
		
		$this->add ( array (
				'name' => 'protocole_operatoire',
				'type' => 'TextArea',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Protocole op�ratoire' ) 
				),
				'attributes' => array (
						'id' => 'protocole_operatoire',
						'required' => true,
						'maxlength' => 1980 
				) 
		) );
		
		$this->add ( array (
				'name' => 'soins_post_operatoire',
				'type' => 'TextArea',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Soins post Op�ratoire' ) 
				),
				'attributes' => array (
						'id' => 'soins_post_operatoire',
						'maxlength' => 255,
						'required' => true 
				) 
		) );
		
		// ******************************************************************************
		// ******************************************************************************
		// ******************************************************************************
		// La liste des participants � l'op�ration
		// La liste des participants � l'op�ration
		$this->add ( array (
				'name' => 'aides_operateurs',
				'type' => 'TextArea',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Aides op�rateurs' ) 
				),
				'attributes' => array (
						'id' => 'aides_operateurs' 
				) 
		) );
		
		// Les complications de l'op�ration
		// Les complications de l'op�ration
		$this->add ( array (
				'name' => 'complications',
				'type' => 'TextArea',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Les complications' ) 
				),
				'attributes' => array (
						'id' => 'complications' 
				) 
		) );
		
		// Note relative au protocole op�ratoire
		// Note relative au protocole op�ratoire
		$this->add ( array (
				'name' => 'note_cro',
				'type' => 'TextArea',
				'options' => array (
						'label' => iconv ( 'ISO-8859-1', 'UTF-8', 'Note' ) 
				),
				'attributes' => array (
						'id' => 'note_cro' 
				) 
		) );
	}
}