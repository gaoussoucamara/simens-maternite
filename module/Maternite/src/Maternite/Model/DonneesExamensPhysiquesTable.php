<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Maternite\View\Helpers\DateHelper;
class DonneesExamensPhysiquesTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function getExamensPhysiques($id_cons) {
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $adapter );
		$select = $sql->select ();
		$select->columns ( array (
				'*' 
		) );
		$select->from ( array (
				'dep' => 'donnees_examen_physique' 
		) );
		$select->where ( array (
				'dep.id_cons' => $id_cons 
		) );
		$select->order ( 'dep.code_examen ASC' );
		$stat = $sql->prepareStatementForSqlObject ( $select );
		$result = $stat->execute ()->current();

		return $result;
		
	}
	
	
	
	
	
	
	//pour la presentation du foetus
	public function listePresentation(){
		$adapter = $this->tableGateway->getAdapter();
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from(array('p'=>'presentation'));
		$select->columns(array('id_pres','presentation'));
		$select->order('id_pres ASC');
		$stat = $sql->prepareStatementForSqlObject($select);
		$result = $stat->execute();
		//$options = array(0 => "Choisir");
		foreach ($result as $data) {
			$options[$data['id_pres']] = $data['presentation'];
		}
		//var_dump($data);exit();
		return $options;
	}
	
	

	
	public function updateExamenPhysiquePourCons($donnees) {
		$this->tableGateway->delete ( array (
				'id_cons' => $donnees ['id_cons']
		) );
	
		for($i = 1; $i <= 9; $i ++) { // 5 car on s'arrete a 5 champs de donn�es
			if ($donnees ['donnee' . $i]) {
				$datadonnee = array (
						'libelle_examen' => $donnees ['donnee' . $i],
						'id_cons' => $donnees ['id_cons']
				);
				$this->tableGateway->insert ( $datadonnee );
			}
		}
	}
	


	public function updateExamenPhysique($donnees) {
		$Control = new DateHelper();
		$this->tableGateway->delete ( array (
				'id_cons' => $donnees ['id_cons'] 
		) );
		//var_dump('test');exit();
		$date_rupt_pde = $donnees['examen_maternite_donnee6'];
		if($date_rupt_pde){ $date_rupt_pde = $Control->convertDateInAnglais($date_rupt_pde); }else{ $date_rupt_pde = null;}
				
				$datadonnee = array (
						'id_cons' => $donnees ['id_cons'],	
						'toucher_vaginale' => $donnees ['examen_maternite_donnee1'],
						'hauteur_uterine' => $donnees ['examen_maternite_donnee2'],
						'bdc' => $donnees ['examen_maternite_donnee3'],
						'pde' => $donnees ['examen_maternite_donnee5'],
						
						'id_pres' => $donnees['examen_maternite_donnee8'],
						'bassin' => $donnees ['examen_maternite_donnee9'],
						'nb_bdc' => $donnees ['examen_maternite_donnee10'],
						'note_tv' => $donnees ['note_tv'],
						'note_hu' => $donnees ['note_hu'],
						'note_bdc' => $donnees ['note_bdc'],
						'note_bassin' => $donnees ['note_bassin'],
						'aspect' => $donnees ['examen_maternite_donnee11']
				
				);
				
				if($donnees['examen_maternite_donnee5']==1){
					$datadonnee['date_rupt_pde'] = $date_rupt_pde;
					$datadonnee['heure_rupt_pde' ]= $donnees ['examen_maternite_donnee7'];
				}
				//var_dump($datadonnee); exit();
				$this->tableGateway->insert ( $datadonnee );
	}
	
	public function addExamenPhysiqueExamenJour($donnees) {
		$this->tableGateway->delete ( array (
				'id_cons' => $donnees ['id_cons'] 
		) );
		
		for($i = 1; $i <= 5; $i ++) { // 5 car on s'arrete a 5 champs de donn�es
			if ($donnees ['donnee' . $i]) {
				$datadonnee = array (
						'libelle_examen' => $donnees ['donnee' . $i],
						'id_cons' => $donnees ['id_cons'] 
				);
				$this->tableGateway->insert ( $datadonnee );
			}
		}
	}
}
