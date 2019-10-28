<?php
namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;

class TypeAccouchementTable{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	public function listeTypeAccouchement(){
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('t'=>'type_accouchement'));
		$select->columns(array('id_type','type_accouch'));
		$select->order('id_type ASC');
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		$options = array(0 => "Choisir");
		foreach ($result as $data) {
			$options[$data['id_type']] = $data['type_accouch'];
		}
		//var_dump($data);exit();
		return $options;
	}
	


	public function TypeAvortement(){
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('ta'=>'type_avortement'));
		$select->columns(array('id_type_av','libelle'));
		$select->order('id_type_av ASC');
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		$options = array(0 => "Choisir");
		foreach ($result as $data) {
			$options[$data['id_type_av']] = $data['libelle'];
		}
		//var_dump($data);exit();
		return $options;
	}
	

	
	
	public function Traitement(){
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('tm'=>'traitement_recu'));
		$select->columns(array('id_traitement','libelle'));
		$select->order('id_traitement ASC');
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		$options = array(0 => "Choisir");
		foreach ($result as $data) {
			$options[$data['id_traitement']] = $data['libelle'];
		}
		//var_dump($data);exit();
		return $options;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}