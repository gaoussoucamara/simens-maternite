<?php
namespace Maternite\View\Helpers;

use Maternite\View\Helpers\fpdf181\fpdf;

class GeneralPdf extends fpdf
{

	function Footer()
	{
		// Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		
		$this->SetFillColor(0,128,0);
		$this->Cell(0,0.3,"",0,1,'C',true);
		$this->SetTextColor(0,0,0);
		$this->SetFont('Times','',9.5);
		$this->Cell(81,5,'Téléphone: 33 961 00 21 ',0,0,'L',false);
		$this->SetTextColor(128);
		$this->SetFont('Times','I',9);
		$this->Cell(20,8,'Page '.$this->PageNo(),0,0,'C',false);
		$this->SetTextColor(0,0,0);
		$this->SetFont('Times','',9.5);
		$this->Cell(81,5,'SIMENS+: www.simens.sn',0,0,'R',false);
	}
	
	protected $B = 0;
	protected $I = 0;
	protected $U = 0;
	protected $HREF = '';
	
	function WriteHTML($html)
	{
		// Parseur HTML
		$html = str_replace("\n",' ',$html);
		$a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
		foreach($a as $i=>$e)
		{
			if($i%2==0)
			{
				// Texte
				if($this->HREF)
					$this->PutLink($this->HREF,$e);
				else
					$this->Write(5,$e);
			}
			else
			{
				// Balise
				if($e[0]=='/')
					$this->CloseTag(strtoupper(substr($e,1)));
				else
				{
					// Extraction des attributs
					$a2 = explode(' ',$e);
					$tag = strtoupper(array_shift($a2));
					$attr = array();
					foreach($a2 as $v)
					{
						if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
							$attr[strtoupper($a3[1])] = $a3[2];
					}
					$this->OpenTag($tag,$attr);
				}
			}
		}
	}
	
	function OpenTag($tag, $attr)
	{
		// Balise ouvrante
		if($tag=='B' || $tag=='I' || $tag=='U')
			$this->SetStyle($tag,true);
		if($tag=='A')
			$this->HREF = $attr['HREF'];
		if($tag=='BR')
			$this->Ln(5);
	}
	
	function CloseTag($tag)
	{
		// Balise fermante
		if($tag=='B' || $tag=='I' || $tag=='U')
			$this->SetStyle($tag,false);
		if($tag=='A')
			$this->HREF = '';
	}
	
	function SetStyle($tag, $enable)
	{
		// Modifie le style et sélectionne la police correspondante
		$this->$tag += ($enable ? 1 : -1);
		$style = '';
		foreach(array('B', 'I', 'U') as $s)
		{
			if($this->$s>0)
				$style .= $s;
		}
		$this->SetFont('',$style);
	}
	
	function PutLink($URL, $txt)
	{
		// Place un hyperlien
		$this->SetTextColor(0,0,255);
		$this->SetStyle('U',true);
		$this->Write(5,$txt,$URL);
		$this->SetStyle('U',false);
		$this->SetTextColor(0);
	}
	

	protected $tabinfo ;
	protected $nomService;
	protected $infosComp;
	protected $periodeDiagnostic;
	protected $nbPatientAccou;
	protected $nbPatientAccCes;
	protected $nbPatientAccN;
	protected $nbPatientAccM;
	protected $nbPatientAccF;
	protected $nbPatientAccV;
	protected $nbcri;
	protected $nbinf;
	protected $enfviant;
	protected $nbGatPa;
	protected $decede;
	protected $reanimer;
	
	public function setTabInformations($tabinfo)
	{
		$this->tabinfo = $tabinfo;
	}
	
	/**
	 * @return the $enfviant
	 */
	public function getEnfviant() {
		return $this->enfviant;
	}

	/**
	 * @return the $nbGatPa
	 */
	public function getNbGatPa() {
		return $this->nbGatPa;
	}

	/**
	 * @return the $decede
	 */
	public function getDecede() {
		return $this->decede;
	}

	/**
	 * @return the $reanimer
	 */
	public function getReanimer() {
		return $this->reanimer;
	}

	/**
	 * @param field_type $enfviant
	 */
	public function setEnfviant($enfviant) {
		$this->enfviant = $enfviant;
	}

	/**
	 * @param field_type $nbGatPa
	 */
	public function setNbGatPa($nbGatPa) {
		$this->nbGatPa = $nbGatPa;
	}

	/**
	 * @param field_type $decede
	 */
	public function setDecede($decede) {
		$this->decede = $decede;
	}

	/**
	 * @param field_type $reanimer
	 */
	public function setReanimer($reanimer) {
		$this->reanimer = $reanimer;
	}

	/**
	 * @return the $nbPatientAccF
	 */
	public function getNbPatientAccF() {
		return $this->nbPatientAccF;
	}

	/**
	 * @return the $nbPatientAccV
	 */
	public function getNbPatientAccV() {
		return $this->nbPatientAccV;
	}

	/**
	 * @return the $nbcri
	 */
	public function getNbcri() {
		return $this->nbcri;
	}

	/**
	 * @return the $nbinf
	 */
	public function getNbinf() {
		return $this->nbinf;
	}

	/**
	 * @param field_type $nbPatientAccF
	 */
	public function setNbPatientAccF($nbPatientAccF) {
		$this->nbPatientAccF = $nbPatientAccF;
	}

	/**
	 * @param field_type $nbPatientAccV
	 */
	public function setNbPatientAccV($nbPatientAccV) {
		$this->nbPatientAccV = $nbPatientAccV;
	}

	/**
	 * @param field_type $nbcri
	 */
	public function setNbcri($nbcri) {
		$this->nbcri = $nbcri;
	}

	/**
	 * @param field_type $nbinf
	 */
	public function setNbinf($nbinf) {
		$this->nbinf = $nbinf;
	}

	/**
	 * @return the $nbPatientAccou
	 */
	public function getNbPatientAccou() {
		return $this->nbPatientAccou;
	}

	/**
	 * @return the $nbPatientAccCes
	 */
	public function getNbPatientAccCes() {
		return $this->nbPatientAccCes;
	}

	/**
	 * @return the $nbPatientAccN
	 */
	public function getNbPatientAccN() {
		return $this->nbPatientAccN;
	}

	/**
	 * @return the $nbPatientAccM
	 */
	public function getNbPatientAccM() {
		return $this->nbPatientAccM;
	}

	/**
	 * @param field_type $nbPatientAccou
	 */
	public function setNbPatientAccou($nbPatientAccou) {
		$this->nbPatientAccou = $nbPatientAccou;
	}

	/**
	 * @param field_type $nbPatientAccCes
	 */
	public function setNbPatientAccCes($nbPatientAccCes) {
		$this->nbPatientAccCes = $nbPatientAccCes;
	}

	/**
	 * @param field_type $nbPatientAccN
	 */
	public function setNbPatientAccN($nbPatientAccN) {
		$this->nbPatientAccN = $nbPatientAccN;
	}

	/**
	 * @param field_type $nbPatientAccM
	 */
	public function setNbPatientAccM($nbPatientAccM) {
		$this->nbPatientAccM = $nbPatientAccM;
	}

	public function getTabInformations()
	{
		return $this->tabinfo;
	}
	
	public function getNomService()
	{
		return $this->nomService;
	}
	
	public function setNomService($nomService)
	{
		$this->nomService = $nomService;
	}
	
	public function getPeriodeDiagnostic()
	{
		return $this->periodeDiagnostic;
	}
	
	public function setPeriodeDiagnostic($periodeDiagnostic)
	{
		$this->periodeDiagnostic = $periodeDiagnostic;
	}

	public function getInfosComp()
	{
		return $this->infosComp;
	}
	
	public function setInfosComp($infosComp)
	{
		$this->infosComp = $infosComp;
	}
	
	function EnTetePage()
	{
		$this->SetFont('Times','',10.3);
		$this->SetTextColor(0,0,0);
		$this->Cell(0,4,"République du Sénégal");
		$this->SetFont('Times','',8.5);
		$this->Cell(0,4,"Saint-Louis, le ".$this->getInfosComp()['dateImpression'],0,0,'R');
		$this->SetFont('Times','',10.3);
		$this->Ln(5.4);
		$this->Cell(100,4,"Ministère de la santé et de l'action sociale");
		
		$this->AddFont('timesbi','','timesbi.php');
		$this->Ln(5.4);
		$this->Cell(100,4,"C.H.R de Saint-louis");
		$this->Ln(5.4);
		$this->SetFont('timesbi','',10.3);
		$this->Cell(14,4,"Service : ",0,0,'L');
		$this->SetFont('Times','',10.3);
		$this->Cell(86,4,$this->getNomService(),0,0,'L');
		
		$this->Ln(8);
		$this->SetFont('Times','',14.3);
		$this->SetTextColor(0,128,0);
		$this->Cell(0,5,"RAPPORT STATISTIQUES",0,1,'C');
		$this->SetFillColor(0,128,0);
		$this->Cell(0,0.3,"",0,1,'C',true);
	
		// EMPLACEMENT DU LOGO
		// EMPLACEMENT DU LOGO
		$baseUrl = $_SERVER['SCRIPT_FILENAME'];
		$tabURI  = explode('public', $baseUrl);
		$this->Image($tabURI[0].'public/images_icons/hrsl.png', 162, 19, 35, 15);
		
	}
	
	function CorpsDocument(){

		if($this->getPeriodeDiagnostic()){
			$dateConvert = new DateHelper();
			$date_debut = $dateConvert->convertDate($this->getPeriodeDiagnostic()[0]);
			$date_fin   = $dateConvert->convertDate($this->getPeriodeDiagnostic()[1]);
				
			$this->Ln(4);
			$this->SetFillColor(220,220,220);
			$this->SetDrawColor(205,193,197);
			$this->SetTextColor(0,0,0);
			$this->AddFont('zap','','zapfdingbats.php');
			$this->SetFont('zap','',13);
				
			$this->SetFillColor(255,255,255);
			$this->Cell(55,7,'','',0,'L',1);
				
			$this->SetFillColor(220,220,220);
			$this->SetLineWidth(1);
			$this->Cell(5,8,'B','BLT',0,'L',1);
				
			$this->AddFont('timesb','','timesb.php');
			$this->AddFont('timesi','','timesi.php');
			$this->AddFont('times','','times.php');
				
			$this->SetFont('times','',12.5);
			$this->Cell(70,8,"Periode du ".$date_debut." au ".$date_fin,'BRT',0,'L',1);
				
			$this->SetFillColor(255,255,255);
			$this->Cell(53,7,'','L',0,'L',1);
				
			$this->Ln(7);
			$this->SetLineWidth(0);
		}
		
		
		

		$tabInformations = $this->getTabInformations(); 
		$nbacc=$this->getNbPatientAccou();
		$nbv =$this->getNbPatientAccV();
		$bnF=$this->getNbPatientAccF();
		$nbM=$this->getNbPatientAccM();
		$nbN=$this->getNbPatientAccN();
		$nbc=$this->getNbPatientAccCes();
		$nbcri=$this->getNbcri();
		$nbinf=$this->getNbinf();
		$nbviv=$this->getEnfviant();
		$rea=$this->getReanimer();
		$dece=$this->getDecede();
		
	if($nbacc||$nbv||$bnF||$nbM||$nbN||$nbc||$nbcri||$nbinf||$nbviv||$rea||$dece){
						
					$this->Ln(5.4);
					$this->SetFillColor(220,220,220);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
	
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
						
					//$this->Cell(25,7,($i+1).')','BT',0,'L',1);
	
					$this->SetFont('times','',12.5);
					
					$this->Cell(78,7,"Accouchement Normal",'BT',0,'L',1);
					$this->Cell(27,7,iconv ('UTF-8' , 'windows-1252',$nbN),'BT',0,'L',1);
					$this->Cell(78,7,iconv ('UTF-8' , 'windows-1252', $tabInformations[1][$tabInformations[0][0]]),'BT',0,'R',1);
						
					$this->Ln(2);
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
						
				//}else {
						
					$this->Ln(5.4);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
	
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
						
					//$this->Cell(25,7,($i+1).')','BT',0,'L',1);
	
					$this->SetFont('times','',12.5);
					$this->Cell(78,7,"Accouchement Ventouse",'BT',0,'L',1);
					$this->Cell(27,7,iconv ('UTF-8' , 'windows-1252',$nbv ),'BT',0,'L',1);
					$this->Cell(78,7,iconv ('UTF-8' , 'windows-1252', $tabInformations[1][$tabInformations[0][0]]),'BT',0,'R',1);
				
				
				//$this->Ln(1);
					
					
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					$this->Ln(2.1);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
					
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					$this->Ln(5.4);
					$this->SetFillColor(220,220,220);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
					
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					
					//$this->Cell(25,7,($i+1).')','BT',0,'L',1);
					
					$this->SetFont('times','',12.5);
						
					$this->Cell(78,7,"Accouchement Manoeuvre",'BT',0,'L',1);
					$this->Cell(27,7,iconv ('UTF-8' , 'windows-1252',$nbM),'BT',0,'L',1);
					$this->Cell(78,7,iconv ('UTF-8' , 'windows-1252', $tabInformations[1][$tabInformations[0][0]]),'BT',0,'R',1);
					
					$this->Ln(2);
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					
					//}else {
					
					$this->Ln(5.4);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
					
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					
					//$this->Cell(25,7,($i+1).')','BT',0,'L',1);
					
					$this->SetFont('times','',12.5);
					$this->Cell(78,7,"Accouchement Forcep",'BT',0,'L',1);
					$this->Cell(27,7,iconv ('UTF-8' , 'windows-1252',$bnF ),'BT',0,'L',1);
					$this->Cell(78,7,iconv ('UTF-8' , 'windows-1252', $tabInformations[1][$tabInformations[0][0]]),'BT',0,'R',1);
					$this->Ln(6);
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					$this->Ln(5.4);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
						
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					
					
					//$this->Ln(1);
						
						
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					//$this->Ln(2.1);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
						
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					//$this->Ln(2.1);
					$this->SetFillColor(220,220,220);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
						
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
						
					//$this->Cell(25,7,($i+1).')','BT',0,'L',1);
						
					$this->SetFont('times','',12.5);
					
					$this->Cell(78,7,"Accouchement Césarienne",'BT',0,'L',1);
					$this->Cell(27,7,iconv ('UTF-8' , 'windows-1252',$nbc),'BT',0,'L',1);
					$this->Cell(78,7,iconv ('UTF-8' , 'windows-1252', $tabInformations[1][$tabInformations[0][0]]),'BT',0,'R',1);
						
					//$this->Ln(2);
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
						
					//}else {
						
					$this->Ln(5.4);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
						
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
						
					//$this->Cell(25,7,($i+1).')','BT',0,'L',1);
						
					$this->SetFont('times','',12.5);
					$this->Cell(78,7,"Accouchement Total",'BT',0,'L',1);
					$this->Cell(27,7,iconv ('UTF-8' , 'windows-1252',$nbacc ),'BT',0,'L',1);
					$this->Cell(78,7,iconv ('UTF-8' , 'windows-1252', $tabInformations[1][$tabInformations[0][0]]),'BT',0,'R',1);
					$this->Ln(2);
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					$this->Ln(2.1);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
					
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					//$this->Ln(1);
					
					
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					$this->Ln(2.1);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
					
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					//$this->Ln(2.1);
					$this->SetFillColor(220,220,220);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
					
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					
					//$this->Cell(25,7,($i+1).')','BT',0,'L',1);
					
					$this->SetFont('times','',12.5);
						
					$this->Cell(78,7,"Nombre de bebes n'ayant pas crie a la naissance",'BT',0,'L',1);
					$this->Cell(27,7,iconv ('UTF-8' , 'windows-1252',$nbcri),'BT',0,'L',1);
					$this->Cell(78,7,iconv ('UTF-8' , 'windows-1252', $tabInformations[1][$tabInformations[0][0]]),'BT',0,'R',1);
					
					$this->Ln(2);
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					
					//}else {
					
					$this->Ln(5.4);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
					
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					
					//$this->Cell(25,7,($i+1).')','BT',0,'L',1);
					
					$this->SetFont('times','',12.5);
					$this->Cell(78,7,"Nombre de bebes dont le poids est inferieur à 2500",'BT',0,'L',1);
					$this->Cell(27,7,iconv ('UTF-8' , 'windows-1252',$nbinf ),'BT',0,'L',1);
					$this->Cell(78,7,iconv ('UTF-8' , 'windows-1252', $tabInformations[1][$tabInformations[0][0]]),'BT',0,'R',1);
					$this->Ln(2);
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					$this->Ln(2.1);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
						
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					//$this->Ln(1);
					
					
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					$this->Ln(2.1);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
					
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					//$this->Ln(2.1);
					$this->SetFillColor(220,220,220);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
					
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					
					//$this->Cell(25,7,($i+1).')','BT',0,'L',1);
					
					$this->SetFont('times','',12.5);
						
					$this->Cell(78,7,"Nombre d'enfants vivants",'BT',0,'L',1);
					$this->Cell(27,7,iconv ('UTF-8' , 'windows-1252',$nbviv),'BT',0,'L',1);
					$this->Cell(78,7,iconv ('UTF-8' , 'windows-1252', $tabInformations[1][$tabInformations[0][0]]),'BT',0,'R',1);
					
					//$this->Ln(2);
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					
					//}else {
					
					$this->Ln(5.4);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
					
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
					
					//$this->Cell(25,7,($i+1).')','BT',0,'L',1);
					
					$this->SetFont('times','',12.5);
					$this->Cell(78,7,"Nombre d'enfants reanimes",'BT',0,'L',1);
					$this->Cell(27,7,iconv ('UTF-8' , 'windows-1252',$rea ),'BT',0,'L',1);
					$this->Cell(78,7,iconv ('UTF-8' , 'windows-1252', $tabInformations[1][$tabInformations[0][0]]),'BT',0,'R',1);
					$this->Ln(2);
					$this->SetFillColor(249,249,249);
					$this->SetDrawColor(220,220,220);
					$this->Ln(2.1);
					$this->SetFillColor(240,240,240);
					$this->SetDrawColor(205,193,197);
					$this->SetTextColor(0,0,0);
					//$this->AddFont('zap','','zapfdingbats.php');
					//$this->SetFont('zap','',13);
						
					$this->AddFont('timesb','','timesb.php');
					$this->AddFont('timesi','','timesi.php');
					$this->AddFont('times','','times.php');
		}else {
			echo  "<div align='center' style='font-size: 30px; font-family: times new roman;'> Aucune information à afficher </div>"; exit();
		}
		
		
	}
	
	//IMPRESSION DES INFOS STATISTIQUES
	//IMPRESSION DES INFOS STATISTIQUES
	function ImpressionInfosStatistiques()
	{
		$this->AddPage();
		$this->EnTetePage();
		$this->CorpsDocument();
	}

}

?>
