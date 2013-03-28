<?php
    include_once("ons_common.php");
	
	class Resorts {
	
		function __construct($filename){
			$this->parse(file_get_contents($filename));
		}	
		
		private function parse($data){
			$temp=split("<!-- /Glossary Z -->",$data);
			$temp=split("<!-- Glossary",$temp[0]);
			unset($temp[0]);
			foreach ($temp as $Glossary) {
				$this->parseGlossary($Glossary);
			}
		}
		
		private function parseGlossary($data){
			$temp=split("<div",$data);
			for($i=4;$i<count($temp);$i+=6){
				$this->getResort($temp[$i]);	
				$this->getStation($temp[$i+1]);
			}
		}
		
		private function getResort($data){
			list($null,$resort)=split("[<>]",$data);
			
			$doResort=Safe_DataObject_factory("Resort");
			$doResort->Name=$resort;
			if (!$doResort->find(true)){
				$doResort->insert();	
			}			
		}
		
		private function getStation($data){
			list($null,$station)=split("[<>]",$data);
			//print_line("Station:=$station\n");
		}
			
	}
?>