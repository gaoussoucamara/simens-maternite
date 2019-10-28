<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;

class MotifAdmissionTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function getMotifAdmission($id_cons) {
		$db = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $db );
		$sQuery = $sql->select ()->from ( 'motif_admission' )->columns ( array (
				'*' 
		) )->where ( array (
				'id_cons' => $id_cons 
		) );
		$stat = $sql->prepareStatementForSqlObject ( $sQuery );
		$result = $stat->execute ();
		
		$donnees = array ();
		$donnees ['temoin'] = 0;
		foreach ( $result as $resultat ) {
			if ($resultat ['libelle_motif'] == 'ConsultationGyneco') {
				$donnees ['motif_admission'] = 1; // C'est � coch�
			}
			if ($resultat ['libelle_motif'] == 'SuiviGrossesse') {
				$donnees ['motif_admission'] = 2; // C'est � coch�
			}
			
			if ($resultat ['libelle_motif'] == 'NonGrossesse') {
				$donnees ['nouvelleGrossesse'] = 0; // C'est � coch�
			}
			if ($resultat ['libelle_motif'] == 'Normale') {
				$donnees ['nouvelleGrossesse'] = 1; // C'est � coch�
			}
			if ($resultat ['libelle_motif'] == 'Pathologique') {
				$donnees ['nouvelleGrossesse'] = 2; // C'est � coch�
			}
			
			// temoin
			$donnees ['temoin'] = 1;
		}
		
		return $donnees;
	}
	public function nbMotifs($id) {
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $adapter );
		$select = $sql->select ();
		$select->from ( 'motif_admission' );
		$select->columns ( array (
				'id_motif' 
		) );
		$select->where ( array (
				'id_cons' => $id 
		) );
		$stat = $sql->prepareStatementForSqlObject ( $select );
		$result = $stat->execute ()->count ();
		return $result;
	}
	public function deleteMotifAdmission($id) {
		$this->tableGateway->delete ( array (
				'id_cons' => $id 
		) );
	}
	public function addMotifAdmission($motisAdmission) {
		$values = array ();
		
		if ($motisAdmission ['motif_admission'] == 1) {
			$values [] = array (
					'ID_CONS' => $motisAdmission ['id_cons'],
					'libelle_motif' => 'ConsultationGyneco' 
			);
		} elseif ($motisAdmission ['motif_admission'] == 2) {
			$values [] = array (
					'ID_CONS' => $motisAdmission ['id_cons'],
					'libelle_motif' => 'SuiviGrossesse' 
			);
		} elseif ($motisAdmission ['nouvelleGrossesse'] == 0) {
			$values [] = array (
					'ID_CONS' => $motisAdmission ['id_cons'],
					'libelle_motif' => 'NonGrossesse' 
			);
		} elseif ($motisAdmission ['nouvelleGrossesse'] == 1) {
			$values [] = array (
					'ID_CONS' => $motisAdmission ['id_cons'],
					'libelle_motif' => 'Normale' 
			);
		} elseif ($motisAdmission ['nouvelleGrossesse'] == 2) {
			$values [] = array (
					'ID_CONS' => $motisAdmission ['id_cons'],
					'libelle_motif' => 'Pathologique' 
			);
		}
		;
		
		for($i = 0; $i < count ( $values ); $i ++) {
			$db = $this->tableGateway->getAdapter ();
			$sql = new Sql ( $db );
			$sQuery = $sql->insert ()->into ( 'motif_admission' )->columns ( array (
					'ID_CONS',
					'libelle_motif' 
			) )->values ( $values [$i] );
			$stat = $sql->prepareStatementForSqlObject ( $sQuery );
			$stat->execute ();
		}
		
		// }
	}
	public function addMotifAdmissionPourExamenJour($values, $codeExamen) {
		$tabMotif = array (
				1 => $values->motif_admission,
				2 => $values->nouvelleGrossesse 
		);
		
		// for($i=1 ; $i<=2; $i++){
		if ($tabMotif [1]) {
			$datamotifadmission = array (
					'libelle_motif' => $tabMotif [1],
					'id_cons' => $codeExamen 
			);
			$this->tableGateway->insert ( $datamotifadmission );
		}
		if ($tabMotif [2]) {
			$datamotifadmission = array (
					'libelle_motif' => $tabMotif [2],
					'id_cons' => $codeExamen 
			);
			$this->tableGateway->insert ( $datamotifadmission );
		}
		// }
	}
}
