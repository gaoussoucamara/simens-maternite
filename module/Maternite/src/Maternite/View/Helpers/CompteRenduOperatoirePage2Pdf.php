<?php

namespace Maternite\View\Helpers;

use ZendPdf;
use ZendPdf\Page;
use ZendPdf\Font;
use Maternite\Model\Consultation;

class CompteRenduOperatoirePage2Pdf {
	protected $_page;
	protected $_yPosition;
	protected $_leftMargin;
	protected $_pageWidth;
	protected $_pageHeight;
	protected $_normalFont;
	protected $_boldFont;
	protected $_newTime;
	protected $_newTimeGras;
	protected $_year;
	protected $_headTitle;
	protected $_introText;
	protected $_graphData;
	protected $_patient;
	protected $_id_cons;
	protected $_date;
	protected $_note;
	protected $_idPersonne;
	protected $_Medicaments;
	protected $_DonneesPatient;
	protected $_DonneesMedecin;
	protected $_Donnees;
	protected $_policeContenu;
	protected $_newPolice;
	protected $_Service;
	protected $_infoAdmission;
	public function __construct() {
		$this->_page = new Page ( Page::SIZE_A4 );
		
		$this->_yPosition = 750;
		$this->_leftMargin = 50;
		$this->_pageHeight = $this->_page->getHeight ();
		$this->_pageWidth = $this->_page->getWidth ();
		/**
		 * Pas encore utilis�
		 */
		$this->_normalFont = Font::fontWithName ( ZendPdf\Font::FONT_HELVETICA );
		$this->_boldFont = Font::fontWithName ( ZendPdf\Font::FONT_HELVETICA_BOLD );
		/**
		 * ****************
		 */
		$this->_newTime = Font::fontWithName ( ZendPdf\Font::FONT_TIMES_ROMAN );
		$this->_newTimeGras = Font::fontWithName ( ZendPdf\Font::FONT_TIMES_BOLD_ITALIC );
		$this->_policeContenu = ZendPdf\Font::fontWithName ( ZendPdf\Font::FONT_TIMES );
		$this->_newPolice = ZendPdf\Font::fontWithName ( ZendPdf\Font::FONT_TIMES );
	}
	public function getPage() {
		return $this->_page;
	}
	public function addNoteTC() {
		$this->_page->saveGS ();
		
		$this->getNoteTC ();
		$this->getPiedPage ();
		
		$this->_page->restoreGS ();
	}
	public function baseUrl() {
		$baseUrl = $_SERVER ['SCRIPT_FILENAME'];
		$tabURI = explode ( 'public', $baseUrl );
		return $tabURI [0];
	}
	public function setDonneesMedecinTC($donneesMedecin) {
		$this->_DonneesMedecin = $donneesMedecin;
	}
	public function setDonnees($donnees) {
		$this->_Donnees = $donnees;
	}
	public function getNewItalique() {
		$font = ZendPdf\Font::fontWithName ( ZendPdf\Font::FONT_HELVETICA_OBLIQUE );
		$this->_page->setFont ( $font, 12 );
	}
	public function getNewTime() {
		$font = ZendPdf\Font::fontWithName ( ZendPdf\Font::FONT_TIMES_ROMAN );
		$this->_page->setFont ( $font, 12 );
	}
	protected function getNoteTC() {
		$noteLineHeight = 38;
		$noteLineHeight -= 15;
		$this->_yPosition -= $noteLineHeight + 10;
		
		$protocole_operatoire = $this->_Donnees ['protocole_operatoire'];
		$soins_post_operatoire = $this->_Donnees ['soins_post_operatoire'];
		
		$TableauPO = explode ( "\n", $protocole_operatoire );
		$TableauSPO = explode ( "\n", $soins_post_operatoire );
		
		$k = 0;
		$nbLigne = 15;
		
		// Gestion du protocole op�ratoire
		// Gestion du protocole op�ratoire
		
		for($i = 0; $i < count ( $TableauPO ); $i ++) {
			
			if (strlen ( $TableauPO [$i] ) > 100) {
				$textDecouper = wordwrap ( $TableauPO [$i], 109, "\n", false ); // On d�coupe le texte
				$textDecouperTab = explode ( "\n", $textDecouper ); // On le place dans un tableau
				
				for($j = 0; $j < count ( $textDecouperTab ); $j ++) {
					if ($k ++ > $nbLigne) {
						$this->_page->setlineColor ( new ZendPdf\Color\Html ( '#efefef' ) );
						$this->_page->setLineWidth ( 0.5 );
						$this->_page->drawLine ( $this->_leftMargin, $this->_yPosition, $this->_pageWidth - $this->_leftMargin, $this->_yPosition );
						
						$this->_page->setFont ( $this->_policeContenu, 12 );
						$this->_page->drawText ( iconv ( 'UTF-8', 'ISO-8859-1', $textDecouperTab [$j] ), $this->_leftMargin, $this->_yPosition );
						
						$this->_yPosition -= $noteLineHeight;
					}
				}
			} else {
				if ($k ++ > $nbLigne) {
					$this->_page->setlineColor ( new ZendPdf\Color\Html ( '#efefef' ) );
					$this->_page->setLineWidth ( 0.5 );
					$this->_page->drawLine ( $this->_leftMargin, $this->_yPosition, $this->_pageWidth - $this->_leftMargin, $this->_yPosition );
					
					$this->_page->setFont ( $this->_policeContenu, 12 );
					$this->_page->drawText ( iconv ( 'UTF-8', 'ISO-8859-1', $TableauPO [$i] ), $this->_leftMargin, $this->_yPosition );
					
					$this->_yPosition -= $noteLineHeight;
				}
			}
		}
		
		// Fin de la gestion du protocole op�ratoire
		// Fin de la gestion du protocole op�ratoire
		
		// Gestion des soins post op�ratoire
		// Gestion des soins post op�ratoire
		
		$this->_page->setFont ( $this->_newTimeGras, 14 );
		$this->_page->drawText ( 'Soins post op�ratoire :  ', $this->_leftMargin, $this->_yPosition );
		
		$this->_yPosition -= $noteLineHeight;
		
		for($i = 0; $i < count ( $TableauSPO ); $i ++) {
			
			if (strlen ( $TableauSPO [$i] ) > 100) {
				$textDecouper = wordwrap ( $TableauSPO [$i], 109, "\n", false ); // On d�coupe le texte
				$textDecouperTab = explode ( "\n", $textDecouper ); // On le place dans un tableau
				
				for($j = 0; $j < count ( $textDecouperTab ); $j ++) {
					$this->_page->setlineColor ( new ZendPdf\Color\Html ( '#efefef' ) );
					$this->_page->setLineWidth ( 0.5 );
					$this->_page->drawLine ( $this->_leftMargin, $this->_yPosition, $this->_pageWidth - $this->_leftMargin, $this->_yPosition );
					
					$this->_page->setFont ( $this->_policeContenu, 12 );
					$this->_page->drawText ( iconv ( 'UTF-8', 'ISO-8859-1', $textDecouperTab [$j] ), $this->_leftMargin, $this->_yPosition );
					
					$this->_yPosition -= $noteLineHeight;
					$nbLigne ++;
				}
			} else {
				$this->_page->setlineColor ( new ZendPdf\Color\Html ( '#efefef' ) );
				$this->_page->setLineWidth ( 0.5 );
				$this->_page->drawLine ( $this->_leftMargin, $this->_yPosition, $this->_pageWidth - $this->_leftMargin, $this->_yPosition );
				
				$this->_page->setFont ( $this->_policeContenu, 12 );
				$this->_page->drawText ( iconv ( 'UTF-8', 'ISO-8859-1', $TableauSPO [$i] ), $this->_leftMargin, $this->_yPosition );
				
				$this->_yPosition -= $noteLineHeight;
				$nbLigne ++;
			}
		}
		
		// Fin Gestion des soins post op�ratoire
		// Fin Gestion des soins post op�ratoire
	}
	public function getPiedPage() {
		$this->_page->setlineColor ( new ZendPdf\Color\Html ( 'green' ) );
		$this->_page->setLineWidth ( 1.5 );
		$this->_page->drawLine ( $this->_leftMargin, 80, $this->_pageWidth - $this->_leftMargin, 80 );
		
		$this->_page->setFont ( $this->_newTime, 10 );
		$this->_page->drawText ( 'T�l�phone: 33 961 00 21', $this->_leftMargin, $this->_pageWidth - (100 + 430) );
		
		$this->_page->setFont ( $this->_newTime, 10 );
		$this->_page->drawText ( 'SIMENS+: ', $this->_leftMargin + 355, $this->_pageWidth - (100 + 430) );
		$this->_page->setFont ( $this->_newTimeGras, 11 );
		$this->_page->drawText ( 'www.simens.sn', $this->_leftMargin + 405, $this->_pageWidth - (100 + 430) );
	}
}