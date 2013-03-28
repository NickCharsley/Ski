<?php
    include_once("ons_common.php");
	
	class Journeys {
	
		public $Routes=array();
	
		function __construct($filename,$return=false){
			$this->parse(file_get_contents($filename));
		}	
		
		private function parse($data){
			//cut between <table class="result" and /table>
			
			//try to replace problem Stations (Accented Chars)
			$data=preg_replace(array('/Marne la Vall.e Eurostar/','/Aime-la-Plagne/','/Marne la Vall.e-Chessy/','/  /','/&nbsp;/'),
							   array('Marne la Vallée Eurostar'  ,'Aime la Plagne'  ,'Marne la Vallée-Chessy'  ,' '   ,' '       ),$data);			
						
			$result=split("firstrow",$data);
			unset($result[0]);
			
			$i=0;
			foreach($result as $row){
				krumo("Route $i");
				$i++;
				$this->Routes[]=new Route($row);
			}			
		}
		
		function Save(){
			foreach($this->Routes as $route){
				$route->Save();
			}
		}
	}
?>