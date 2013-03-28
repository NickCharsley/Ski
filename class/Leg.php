<?php
    include_once("ons_common.php");
	
	class Leg {
		public $From;
		public $To;
		public $Train;
	
		function __construct($from,$to){			
			$from=str_replace("  "," ",str_replace("\n", "", $from));
			$to  =str_replace("  "," ",str_replace("\n", "", $to  ));
			
			if (strpos($from,"walk")) return;
			
			//Get From Station
			$from=split('[<>]',$from);
			//krumo($from);
			$this->From['Station']=trim($from[ 3]);			
			$this->From['Date']   =new DateTime(substr(trim($from[ 7]),4)." ".trim($from[15]));
			$this->Train=trim($from[27]);
			
			//Get To Station
			$to=split('[<>]',$to);
			//krumo($to);
			$this->To['Station']=trim($to[ 3]);			
			$this->To['Date']   =new DateTime(substr(trim($to[ 7]),4)." ".trim($to[15]));
		}
		
		function validate(){
			$this->valid=true;			
			if ($this->From['Date']->format('d')!=$this->To['Date']->format('d')
				and substr($this->Train,0,2)!='NZ') {
				//Only want Overnight Couchette train
				$this->valid=false;
			}						 		
		}
						
		function dump(){
			print "<tr><td rowspan=2>{$this->Train}</td><td>{$this->From['Station']}</td><td>{$this->To['Station']}</td></tr>";
			print "<tr><td>{$this->From['Date']->format('Y/m/d H:i')}</td><td>{$this->To['Date']->format('Y/m/d H:i')}</td></tr>";
			if (!$this->valid){
				print "<tr><td colspan='3'>";
				if ($this->From['Date']->format('d')!=$this->To['Date']->format('d')
				and substr($this->Train,0,3)=='EST') {
					print "Don't want overnight Eurostar!<br>";
				}
				print "</td></tr>";
			}
		}
		
		function Description(){
			$fromFormat=$this->From['Date']->format('d')==$this->To['Date']->format('d')?'H:i':'H:i d/m/Y';
			return $this->Train.": ".$this->From['Station']
					." to "
						.$this->To['Station']
							." ("
								.$this->From['Date']->format($fromFormat)
									." - "
										.$this->To['Date']->format('H:i d/m/Y')
											.")";
		}
		
		function Save(){
			//This will ignore Leg Validity and Save regardless
			$from=safe_dataobject_factory("Station"); 
			$to  =safe_dataobject_factory("Station");
			$leg =safe_dataobject_factory("Leg");
			
			$from->Name=$this->From['Station'];
			$from->Save();
			
			$to->Name=$this->To['Station'];
			$to->Save();
			
			$leg->Name=$this->Train;
			$leg->FromStationID=$from->ID;
			$leg->ToStationID=$to->ID;
			$leg->StartTime=$this->From['Date']->format('Y/m/d H:i');
			$leg->EndTime  =$this->To['Date']->format('Y/m/d H:i');
			$leg->Save();
			
			return $leg->ID;
		}
	}
?>