<?php
    include_once("ons_common.php");
	
	class Route {
		public $Legs=array();	
	
		function __construct($data){
			$data="<table><tr class=\"$data".'"></tr></table>';
			//print($data);
			$result=split("<tr",$data);			
			
			krumo($result);
			
			$this->getRouteName($result[1], $result[2]);
			for($i=5;$i<count($result);$i+=2){
				if (strpos($result[$i],'journeyguide')) break;
				if (strpos($result[$i],'intermediate')) $i++;
				$leg=new Leg($result[$i], $result[$i+1]);
				//Remove RER
				if (substr($leg->Train,0,3)!='RER')
					$this->Legs[]=$leg;		
			}		
			$this->validate();
		}
		
		private function validate(){
			$this->valid=true;			
			if ($this->To['Date']->format('w')==0) {
				$this->valid=false;
			}
			$last;			
			foreach ($this->Legs as $leg){
				$leg->validate();
				if (isset($last)){
					if ($last->To['Date']->format('d')!=$leg->From['Date']->format('d')) $this->valid=false; 
				}
				if (!$leg->valid) $this->valid=false;
				$last=$leg;
			} 			
		}
		
		private function dump()
		{
			print "<table border='1'>";
			print "<tr><td>From</td><td>{$this->From['Station']}</td><td>{$this->From['Date']->format('Y/m/d H:i')}</td></tr>";
			print "<tr><td>To</td><td>{$this->To['Station']}</td><td>{$this->To['Date']->format('Y/m/d H:i')}</td></tr>";
			foreach ($this->Legs as $leg){
				$leg->dump();	
			}			
			print "<tr><td colspan='3'>";
			if ($this->valid) 
				Print "Journey is Valid";
			else {
				if ($this->To['Date']->format('w')==0) Print "Journey Arrives on a Sunday<br>";
			}			
			print "</td></tr>";
			print "</table>";
			krumo($this);
		}
				
		private function getRouteName($from,$to){			
			$from=str_replace("\n", "", $from);
			$to=str_replace("\n", "", $to);
			
			//Get From Station
			$from=split('[<>]',$from);
			
			//krumo($from);			
			
			$this->From['Station']=trim($from[ 9]);			
			$this->From['Date']   =new DateTime(substr(trim($from[15]),4)." ".trim($from[23]));
			
			//Get To Station
			$to=split('[<>]',$to);
			
			$this->To['Station']=trim($to[ 3]);			
			$this->To['Date']   =new DateTime(substr(trim($to[ 7]),4)." ".trim($to[15]));
		}
		
		function Description(){
			$fromFormat=$this->From['Date']->format('d')==$this->To['Date']->format('d')?'H:i':'H:i d/m/Y';
			return $this->From['Station']
					." to "
						.$this->To['Station']
							." ("
								.$this->From['Date']->format($fromFormat)
									." - "
										.$this->To['Date']->format('H:i d/m/Y')
											.")";
		}
		
		function Save(){
			$route=safe_dataobject_factory("Route");
			$from =safe_dataobject_factory("Station"); 
			$to   =safe_dataobject_factory("Station");
			
			$from->Name=$this->From['Station'];
			$from->Save();
			
			$to->Name=$this->To['Station'];
			$to->Save();
			
			$route->Name=$this->Description();
			$route->FromStationID=$from->ID;
			$route->ToStationID=$to->ID;
			$route->Save();
			
			$seq=0;
			foreach($this->Legs as $leg){
				$journey=safe_dataobject_factory("Journey");
				$journey->RouteID=$route->ID;
				$journey->LegID=$leg->Save();
				$journey->sequence=$seq++;
				$journey->Save();
			}
		}
	}
?>