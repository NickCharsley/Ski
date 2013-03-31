<?php

include_once('ons_common.php');

class AigleTest extends PHPUnit_Framework_TestCase //ONS_Tests_DatabaseTestCase
{
/**/	
	protected $tables=array();
	protected static $journey;
	
	public static function setUpBeforeClass()
	{
		self::$journey=new Journeys("C:/Users/nick/Ski/Routes/Aigle.htm");

//		print_r(self::$journey->Routes[8]);
//		print_r(self::$journey);
//		die;

 	}
	
	public static function tearDownAfterClass()
 	{
		self::$journey = NULL;
 	}
	
	/**
	 * 
	 */
	function testClassCreated(){							
		$this->assertNotNull(self::$journey);
	}
	
	/**
	 * @depends testClassCreated
	 */
	function testClassIsJourney(){
		$this->assertEquals('Journeys',get_class(self::$journey));
	}	
	
	/**
	 * @depends testClassIsJourney
	 */
	function testRouteCountIsCorrect(){	
		$this->assertEquals(14,count(self::$journey->Routes));
	}
	
//Define for Each Route
	
	/**
	 * @depends testClassIsJourney
	 */
	function testRoute00IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[0]));
	}
	
	/**
	 * @depends testRoute00IsRoute
	 */
	function testRoute00FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[0]->From['Station']);
	}
	
	/**
	 * @depends testRoute00IsRoute
	 */
	function testRoute00FromDateIsCorrect(){		
		$this->assertEquals('17:04 29/03/2013',self::$journey->Routes[0]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute00IsRoute
	 */
	function testRoute00ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[0]->To['Station']);
	}
	
	/**
	 * @depends testRoute00IsRoute
	 */
	function testRoute00ToDateIsCorrect(){		
		$this->assertEquals('10:16 30/03/2013',self::$journey->Routes[0]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute00FromStationIsCorrect
	 * @depends testRoute00FromDateIsCorrect
	 * @depends testRoute00ToStationIsCorrect
	 * @depends testRoute00ToDateIsCorrect
	 */
	function testRoute00TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (17:04 29/03/2013 - 10:16 30/03/2013)',self::$journey->Routes[0]->Description());
	}
	
	/**
	 * @depends testRoute00IsRoute
	 */
	function testRoute00IsInvalid(){		
		$this->assertEquals(false,self::$journey->Routes[0]->valid);
	}
	
	/**
	 * @depends testRoute00IsRoute
	 */
	function testRoute00LegCountIsCorrect(){		
		$this->assertEquals(4,count(self::$journey->Routes[0]->Legs));
	}
	
  //Define for Each Leg

    //Leg 00
   	/**
	 * @depends testRoute00LegCountIsCorrect
	 */
	function testRoute00Leg00IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[0]->Legs[0]));
	}
  
	/**
	 * @depends testRoute00Leg00IsLeg
	 */
	function testRoute00Leg00IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[0]->Legs[00]->valid);
	}

	/**
	 * @depends testRoute00Leg00IsLeg
	 */
	function testRoute00Leg00TrainIsCorrect(){		
		$this->assertEquals('EST 9148',self::$journey->Routes[0]->Legs[0]->Train);
	}
	
	/**
	 * @depends testRoute00Leg00IsLeg
	 */
	function testRoute00Leg00FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[0]->Legs[0]->From['Station']);
	}
	
	/**
	 * @depends testRoute00Leg00IsLeg
	 */
	function testRoute00Leg00FromDateIsCorrect(){		
		$this->assertEquals('17:04 29/03/2013',self::$journey->Routes[0]->Legs[0]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute00Leg00IsLeg
	 */
	function testRoute00Leg00ToStationIsCorrect(){		
		$this->assertEquals('Lille Europe Eurostar',self::$journey->Routes[0]->Legs[0]->To['Station']);
	}
	
	/**
	 * @depends testRoute00Leg00IsLeg
	 */
	function testRoute00Leg00ToDateIsCorrect(){		
		$this->assertEquals('19:26 29/03/2013',self::$journey->Routes[0]->Legs[0]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute00Leg00TrainIsCorrect
	 * @depends testRoute00Leg00FromStationIsCorrect
	 * @depends testRoute00Leg00FromDateIsCorrect
	 * @depends testRoute00Leg00ToStationIsCorrect
	 * @depends testRoute00Leg00ToDateIsCorrect
	 */
	function testRoute00Leg00TitleIsCorrect(){		
		$this->assertEquals('EST 9148: London St. Pancras International to Lille Europe Eurostar (17:04 - 19:26 29/03/2013)',self::$journey->Routes[0]->Legs[0]->Description());
	}

  	//Leg01
   	/**
	 * @depends testRoute00LegCountIsCorrect
	 */
	function testRoute00Leg01IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[0]->Legs[1]));
	}
  
	/**
	 * @depends testRoute00Leg01IsLeg
	 */
	function testRoute00Leg01IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[0]->Legs[01]->valid);
	}
	/**
	 * @depends testRoute00Leg01IsLeg
	 */
	function testRoute00Leg01TrainIsCorrect(){		
		$this->assertEquals('TGV 9846',self::$journey->Routes[0]->Legs[1]->Train);
	}
	
	/**
	 * @depends testRoute00Leg01IsLeg
	 */
	function testRoute00Leg01FromStationIsCorrect(){		
		$this->assertEquals('Lille Europe',self::$journey->Routes[0]->Legs[1]->From['Station']);
	}
	
	/**
	 * @depends testRoute00Leg01IsLeg
	 */
	function testRoute00Leg01FromDateIsCorrect(){		
		$this->assertEquals('20:02 29/03/2013',self::$journey->Routes[0]->Legs[1]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute00Leg01IsLeg
	 */
	function testRoute00Leg01ToStationIsCorrect(){		
		$this->assertEquals('Lyon Part Dieu',self::$journey->Routes[0]->Legs[1]->To['Station']);
	}
	
	/**
	 * @depends testRoute00Leg01IsLeg
	 */
	function testRoute00Leg01ToDateIsCorrect(){		
		$this->assertEquals('23:24 29/03/2013',self::$journey->Routes[0]->Legs[1]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute00Leg01TrainIsCorrect
	 * @depends testRoute00Leg01FromStationIsCorrect
	 * @depends testRoute00Leg01FromDateIsCorrect
	 * @depends testRoute00Leg01ToStationIsCorrect
	 * @depends testRoute00Leg01ToDateIsCorrect
	 */
	function testRoute00Leg01TitleIsCorrect(){		
		$this->assertEquals('TGV 9846: Lille Europe to Lyon Part Dieu (20:02 - 23:24 29/03/2013)',self::$journey->Routes[0]->Legs[1]->Description());
	}
  	
  	//Leg02
   	/**
	 * @depends testRoute00LegCountIsCorrect
	 */
	function testRoute00Leg02IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[0]->Legs[02]));
	}
  
	/**
	 * @depends testRoute00Leg02IsLeg
	 */
	function testRoute00Leg02IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[0]->Legs[02]->valid);
	}
	
	/**
	 * @depends testRoute00Leg02IsLeg
	 */
	function testRoute00Leg02TrainIsCorrect(){		
		$this->assertEquals('RE 96500',self::$journey->Routes[0]->Legs[02]->Train);
	}
	
	/**
	 * @depends testRoute00Leg02IsLeg
	 */
	function testRoute00Leg02FromStationIsCorrect(){		
		$this->assertEquals('Lyon Part Dieu',self::$journey->Routes[0]->Legs[02]->From['Station']);
	}
	
	/**
	 * @depends testRoute00Leg02IsLeg
	 */
	function testRoute00Leg02FromDateIsCorrect(){		
		$this->assertEquals('06:38 30/03/2013',self::$journey->Routes[0]->Legs[02]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute00Leg02IsLeg
	 */
	function testRoute00Leg02ToStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[0]->Legs[02]->To['Station']);
	}
	
	/**
	 * @depends testRoute00Leg02IsLeg
	 */
	function testRoute00Leg02ToDateIsCorrect(){		
		$this->assertEquals('08:27 30/03/2013',self::$journey->Routes[0]->Legs[02]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute00Leg02TrainIsCorrect
	 * @depends testRoute00Leg02FromStationIsCorrect
	 * @depends testRoute00Leg02FromDateIsCorrect
	 * @depends testRoute00Leg02ToStationIsCorrect
	 * @depends testRoute00Leg02ToDateIsCorrect
	 */
	function testRoute00Leg02TitleIsCorrect(){		
		$this->assertEquals('RE 96500: Lyon Part Dieu to Geneve (06:38 - 08:27 30/03/2013)',self::$journey->Routes[0]->Legs[02]->Description());
	}
	
	//Leg03
   	/**
	 * @depends testRoute00LegCountIsCorrect
	 */
	function testRoute00Leg03IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[0]->Legs[03]));
	}
  
	/**
	 * @depends testRoute00Leg03IsLeg
	 */
	function testRoute00Leg03IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[0]->Legs[03]->valid);
	}
	
	/**
	 * @depends testRoute00Leg03IsLeg
	 */
	function testRoute00Leg03TrainIsCorrect(){		
		$this->assertEquals('IR 1411',self::$journey->Routes[0]->Legs[03]->Train);
	}
	
	/**
	 * @depends testRoute00Leg03IsLeg
	 */
	function testRoute00Leg03FromStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[0]->Legs[03]->From['Station']);
	}
	
	/**
	 * @depends testRoute00Leg03IsLeg
	 */
	function testRoute00Leg03FromDateIsCorrect(){		
		$this->assertEquals('09:03 30/03/2013',self::$journey->Routes[0]->Legs[03]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute00Leg03IsLeg
	 */
	function testRoute00Leg03ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[0]->Legs[03]->To['Station']);
	}
	
	/**
	 * @depends testRoute00Leg03IsLeg
	 */
	function testRoute00Leg03ToDateIsCorrect(){		
		$this->assertEquals('10:16 30/03/2013',self::$journey->Routes[0]->Legs[03]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute00Leg03TrainIsCorrect
	 * @depends testRoute00Leg03FromStationIsCorrect
	 * @depends testRoute00Leg03FromDateIsCorrect
	 * @depends testRoute00Leg03ToStationIsCorrect
	 * @depends testRoute00Leg03ToDateIsCorrect
	 */
	function testRoute00Leg03TitleIsCorrect(){		
		$this->assertEquals('IR 1411: Geneve to Aigle (09:03 - 10:16 30/03/2013)',self::$journey->Routes[0]->Legs[03]->Description());
	}
	  	
  //End Define for Each Leg
  //Route 01
	/**
	 * @depends testClassIsJourney
	 */
	function testRoute01IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[01]));
	}
	
	/**
	 * @depends testRoute01IsRoute
	 */
	function testRoute01FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[01]->From['Station']);
	}
	
	/**
	 * @depends testRoute01IsRoute
	 */
	function testRoute01FromDateIsCorrect(){		
		$this->assertEquals('17:31 29/03/2013',self::$journey->Routes[01]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute01IsRoute
	 */
	function testRoute01ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[01]->To['Station']);
	}
	
	/**
	 * @depends testRoute01IsRoute
	 */
	function testRoute01ToDateIsCorrect(){		
		$this->assertEquals('10:16 30/03/2013',self::$journey->Routes[01]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute01FromStationIsCorrect
	 * @depends testRoute01FromDateIsCorrect
	 * @depends testRoute01ToStationIsCorrect
	 * @depends testRoute01ToDateIsCorrect
	 */
	function testRoute01TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (17:31 29/03/2013 - 10:16 30/03/2013)',self::$journey->Routes[01]->Description());
	}
	
	/**
	 * @depends testRoute01IsRoute
	 */
	function testRoute01IsInvalid(){		
		$this->assertEquals(false,self::$journey->Routes[01]->valid);
	}
	
	/**
	 * @depends testRoute01IsRoute
	 */
	function testRoute01LegCountIsCorrect(){		
		$this->assertEquals(4,count(self::$journey->Routes[01]->Legs));
	}
	
  //Define for Each Leg
  	//Leg00
   	/**
	 * @depends testRoute01LegCountIsCorrect
	 */
	function testRoute01Leg00IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[01]->Legs[00]));
	}
  
	/**
	 * @depends testRoute01Leg00IsLeg
	 */
	function testRoute01Leg00IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[01]->Legs[00]->valid);
	}
	
	/**
	 * @depends testRoute01Leg00IsLeg
	 */
	function testRoute01Leg00TrainIsCorrect(){		
		$this->assertEquals('EST 9044',self::$journey->Routes[01]->Legs[00]->Train);
	}
	
	/**
	 * @depends testRoute01Leg00IsLeg
	 */
	function testRoute01Leg00FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[01]->Legs[00]->From['Station']);
	}
	
	/**
	 * @depends testRoute01Leg00IsLeg
	 */
	function testRoute01Leg00FromDateIsCorrect(){		
		$this->assertEquals('17:31 29/03/2013',self::$journey->Routes[01]->Legs[00]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute01Leg00IsLeg
	 */
	function testRoute01Leg00ToStationIsCorrect(){		
		$this->assertEquals('Paris Nord Eurostar',self::$journey->Routes[01]->Legs[00]->To['Station']);
	}
	
	/**
	 * @depends testRoute01Leg00IsLeg
	 */
	function testRoute01Leg00ToDateIsCorrect(){		
		$this->assertEquals('20:56 29/03/2013',self::$journey->Routes[01]->Legs[00]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute01Leg00TrainIsCorrect
	 * @depends testRoute01Leg00FromStationIsCorrect
	 * @depends testRoute01Leg00FromDateIsCorrect
	 * @depends testRoute01Leg00ToStationIsCorrect
	 * @depends testRoute01Leg00ToDateIsCorrect
	 */
	function testRoute01Leg00TitleIsCorrect(){		
		$this->assertEquals('EST 9044: London St. Pancras International to Paris Nord Eurostar (17:31 - 20:56 29/03/2013)',self::$journey->Routes[01]->Legs[00]->Description());
	}
  
    //Leg01
   	/**
	 * @depends testRoute01LegCountIsCorrect
	 */
	function testRoute01Leg01IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[01]->Legs[01]));
	}
  
	/**
	 * @depends testRoute01Leg01IsLeg
	 */
	function testRoute01Leg01IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[01]->Legs[01]->valid);
	}
	
	/**
	 * @depends testRoute01Leg01IsLeg
	 */
	function testRoute01Leg01TrainIsCorrect(){		
		$this->assertEquals('TGV 6635',self::$journey->Routes[01]->Legs[01]->Train);
	}
	
	/**
	 * @depends testRoute01Leg01IsLeg
	 */
	function testRoute01Leg01FromStationIsCorrect(){		
		$this->assertEquals('Paris Gare de Lyon',self::$journey->Routes[01]->Legs[01]->From['Station']);
	}
	
	/**
	 * @depends testRoute01Leg01IsLeg
	 */
	function testRoute01Leg01FromDateIsCorrect(){		
		$this->assertEquals('21:58 29/03/2013',self::$journey->Routes[01]->Legs[01]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute01Leg01IsLeg
	 */
	function testRoute01Leg01ToStationIsCorrect(){		
		$this->assertEquals('Lyon Part Dieu',self::$journey->Routes[01]->Legs[01]->To['Station']);
	}
	
	/**
	 * @depends testRoute01Leg01IsLeg
	 */
	function testRoute01Leg01ToDateIsCorrect(){		
		$this->assertEquals('23:59 29/03/2013',self::$journey->Routes[01]->Legs[01]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute01Leg01TrainIsCorrect
	 * @depends testRoute01Leg01FromStationIsCorrect
	 * @depends testRoute01Leg01FromDateIsCorrect
	 * @depends testRoute01Leg01ToStationIsCorrect
	 * @depends testRoute01Leg01ToDateIsCorrect
	 */
	function testRoute01Leg01TitleIsCorrect(){		
		$this->assertEquals('TGV 6635: Paris Gare de Lyon to Lyon Part Dieu (21:58 - 23:59 29/03/2013)',self::$journey->Routes[01]->Legs[01]->Description());
	}

  	//Leg02
   	/**
	 * @depends testRoute01LegCountIsCorrect
	 */
	function testRoute01Leg02IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[01]->Legs[02]));
	}
  
	/**
	 * @depends testRoute01Leg02IsLeg
	 */
	function testRoute01Leg02IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[01]->Legs[02]->valid);
	}
	
	/**
	 * @depends testRoute01Leg02IsLeg
	 */
	function testRoute01Leg02TrainIsCorrect(){		
		$this->assertEquals('RE 96500',self::$journey->Routes[01]->Legs[02]->Train);
	}
	
	/**
	 * @depends testRoute01Leg02IsLeg
	 */
	function testRoute01Leg02FromStationIsCorrect(){		
		$this->assertEquals('Lyon Part Dieu',self::$journey->Routes[01]->Legs[02]->From['Station']);
	}
	
	/**
	 * @depends testRoute01Leg02IsLeg
	 */
	function testRoute01Leg02FromDateIsCorrect(){		
		$this->assertEquals('06:38 30/03/2013',self::$journey->Routes[01]->Legs[02]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute01Leg02IsLeg
	 */
	function testRoute01Leg02ToStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[01]->Legs[02]->To['Station']);
	}
	
	/**
	 * @depends testRoute01Leg02IsLeg
	 */
	function testRoute01Leg02ToDateIsCorrect(){		
		$this->assertEquals('08:27 30/03/2013',self::$journey->Routes[01]->Legs[02]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute01Leg02TrainIsCorrect
	 * @depends testRoute01Leg02FromStationIsCorrect
	 * @depends testRoute01Leg02FromDateIsCorrect
	 * @depends testRoute01Leg02ToStationIsCorrect
	 * @depends testRoute01Leg02ToDateIsCorrect
	 */
	function testRoute01Leg02TitleIsCorrect(){		
		$this->assertEquals('RE 96500: Lyon Part Dieu to Geneve (06:38 - 08:27 30/03/2013)',self::$journey->Routes[01]->Legs[02]->Description());
	}

  	//Leg03
   	/**
	 * @depends testRoute01LegCountIsCorrect
	 */
	function testRoute01Leg03IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[01]->Legs[03]));
	}
  
	/**
	 * @depends testRoute01Leg03IsLeg
	 */
	function testRoute01Leg03IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[01]->Legs[03]->valid);
	}
	
	/**
	 * @depends testRoute01Leg03IsLeg
	 */
	function testRoute01Leg03TrainIsCorrect(){		
		$this->assertEquals('IR 1411',self::$journey->Routes[01]->Legs[03]->Train);
	}
	
	/**
	 * @depends testRoute01Leg03IsLeg
	 */
	function testRoute01Leg03FromStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[01]->Legs[03]->From['Station']);
	}
	
	/**
	 * @depends testRoute01Leg03IsLeg
	 */
	function testRoute01Leg03FromDateIsCorrect(){		
		$this->assertEquals('09:03 30/03/2013',self::$journey->Routes[01]->Legs[03]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute01Leg03IsLeg
	 */
	function testRoute01Leg03ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[01]->Legs[03]->To['Station']);
	}
	
	/**
	 * @depends testRoute01Leg03IsLeg
	 */
	function testRoute01Leg03ToDateIsCorrect(){		
		$this->assertEquals('10:16 30/03/2013',self::$journey->Routes[01]->Legs[03]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute01Leg03TrainIsCorrect
	 * @depends testRoute01Leg03FromStationIsCorrect
	 * @depends testRoute01Leg03FromDateIsCorrect
	 * @depends testRoute01Leg03ToStationIsCorrect
	 * @depends testRoute01Leg03ToDateIsCorrect
	 */
	function testRoute01Leg03TitleIsCorrect(){		
		$this->assertEquals('IR 1411: Geneve to Aigle (09:03 - 10:16 30/03/2013)',self::$journey->Routes[01]->Legs[03]->Description());
	}
		
  //End of Define for Each Leg
  //Route 02

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute02IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[02]));
	}
	
	/**
	 * @depends testRoute02IsRoute
	 */
	function testRoute02FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[02]->From['Station']);
	}
	
	/**
	 * @depends testRoute02IsRoute
	 */
	function testRoute02FromDateIsCorrect(){		
		$this->assertEquals('18:31 29/03/2013',self::$journey->Routes[02]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute02IsRoute
	 */
	function testRoute02ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[02]->To['Station']);
	}
	
	/**
	 * @depends testRoute02IsRoute
	 */
	function testRoute02ToDateIsCorrect(){		
		$this->assertEquals('10:50 30/03/2013',self::$journey->Routes[02]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute02FromStationIsCorrect
	 * @depends testRoute02FromDateIsCorrect
	 * @depends testRoute02ToStationIsCorrect
	 * @depends testRoute02ToDateIsCorrect
	 */
	function testRoute02TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (18:31 29/03/2013 - 10:50 30/03/2013)',self::$journey->Routes[02]->Description());
	}
	
	/**
	 * @depends testRoute02IsRoute
	 */
	function testRoute02IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[02]->valid);
	}
	
	/**
	 * @depends testRoute02IsRoute
	 */
	function testRoute02LegCountIsCorrect(){		
		$this->assertEquals(4,count(self::$journey->Routes[02]->Legs));
	}
	
  //Define for Each Leg
  	//Leg00
   	/**
	 * @depends testRoute02LegCountIsCorrect
	 */
	function testRoute02Leg00IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[02]->Legs[00]));
	}
  
	/**
	 * @depends testRoute02Leg00IsLeg
	 */
	function testRoute02Leg00IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[02]->Legs[00]->valid);
	}
	
	/**
	 * @depends testRoute02Leg00IsLeg
	 */
	function testRoute02Leg00TrainIsCorrect(){		
		$this->assertEquals('EST 9048',self::$journey->Routes[02]->Legs[00]->Train);
	}
	
	/**
	 * @depends testRoute02Leg00IsLeg
	 */
	function testRoute02Leg00FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[02]->Legs[00]->From['Station']);
	}
	
	/**
	 * @depends testRoute02Leg00IsLeg
	 */
	function testRoute02Leg00FromDateIsCorrect(){		
		$this->assertEquals('18:31 29/03/2013',self::$journey->Routes[02]->Legs[00]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute02Leg00IsLeg
	 */
	function testRoute02Leg00ToStationIsCorrect(){		
		$this->assertEquals('Paris Nord Eurostar',self::$journey->Routes[02]->Legs[00]->To['Station']);
	}
	
	/**
	 * @depends testRoute02Leg00IsLeg
	 */
	function testRoute02Leg00ToDateIsCorrect(){		
		$this->assertEquals('21:56 29/03/2013',self::$journey->Routes[02]->Legs[00]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute02Leg00TrainIsCorrect
	 * @depends testRoute02Leg00FromStationIsCorrect
	 * @depends testRoute02Leg00FromDateIsCorrect
	 * @depends testRoute02Leg00ToStationIsCorrect
	 * @depends testRoute02Leg00ToDateIsCorrect
	 */
	function testRoute02Leg00TitleIsCorrect(){		
		$this->assertEquals('EST 9048: London St. Pancras International to Paris Nord Eurostar (18:31 - 21:56 29/03/2013)',self::$journey->Routes[02]->Legs[00]->Description());
	}

  	//Leg01
   	/**
	 * @depends testRoute02LegCountIsCorrect
	 */
	function testRoute02Leg01IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[02]->Legs[01]));
	}
  
	/**
	 * @depends testRoute02Leg01IsLeg
	 */
	function testRoute02Leg01IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[02]->Legs[01]->valid);
	}
	
	/**
	 * @depends testRoute02Leg01IsLeg
	 */
	function testRoute02Leg01TrainIsCorrect(){		
		$this->assertEquals('NZ 5595',self::$journey->Routes[02]->Legs[01]->Train);
	}
	
	/**
	 * @depends testRoute02Leg01IsLeg
	 */
	function testRoute02Leg01FromStationIsCorrect(){		
		$this->assertEquals('Paris Austerlitz',self::$journey->Routes[02]->Legs[01]->From['Station']);
	}
	
	/**
	 * @depends testRoute02Leg01IsLeg
	 */
	function testRoute02Leg01FromDateIsCorrect(){		
		$this->assertEquals('23:12 29/03/2013',self::$journey->Routes[02]->Legs[01]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute02Leg01IsLeg
	 */
	function testRoute02Leg01ToStationIsCorrect(){		
		$this->assertEquals('Aix-les-Bains-le-Revard',self::$journey->Routes[02]->Legs[01]->To['Station']);
	}
	
	/**
	 * @depends testRoute02Leg01IsLeg
	 */
	function testRoute02Leg01ToDateIsCorrect(){		
		$this->assertEquals('05:53 30/03/2013',self::$journey->Routes[02]->Legs[01]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute02Leg01TrainIsCorrect
	 * @depends testRoute02Leg01FromStationIsCorrect
	 * @depends testRoute02Leg01FromDateIsCorrect
	 * @depends testRoute02Leg01ToStationIsCorrect
	 * @depends testRoute02Leg01ToDateIsCorrect
	 */
	function testRoute02Leg01TitleIsCorrect(){		
		$this->assertEquals('NZ 5595: Paris Austerlitz to Aix-les-Bains-le-Revard (23:12 29/03/2013 - 05:53 30/03/2013)',self::$journey->Routes[02]->Legs[01]->Description());
	}
  	//Leg02
   	/**
	 * @depends testRoute02LegCountIsCorrect
	 */
	function testRoute02Leg02IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[02]->Legs[02]));
	}
  
	/**
	 * @depends testRoute02Leg02IsLeg
	 */
	function testRoute02Leg02IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[02]->Legs[02]->valid);
	}
	
	/**
	 * @depends testRoute02Leg02IsLeg
	 */
	function testRoute02Leg02TrainIsCorrect(){		
		$this->assertEquals('RE 96604',self::$journey->Routes[02]->Legs[02]->Train);
	}
	
	/**
	 * @depends testRoute02Leg02IsLeg
	 */
	function testRoute02Leg02FromStationIsCorrect(){		
		$this->assertEquals('Aix-les-Bains-le-Revard',self::$journey->Routes[02]->Legs[02]->From['Station']);
	}
	
	/**
	 * @depends testRoute02Leg02IsLeg
	 */
	function testRoute02Leg02FromDateIsCorrect(){		
		$this->assertEquals('07:57 30/03/2013',self::$journey->Routes[02]->Legs[02]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute02Leg02IsLeg
	 */
	function testRoute02Leg02ToStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[02]->Legs[02]->To['Station']);
	}
	
	/**
	 * @depends testRoute02Leg02IsLeg
	 */
	function testRoute02Leg02ToDateIsCorrect(){		
		$this->assertEquals('09:00 30/03/2013',self::$journey->Routes[02]->Legs[02]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute02Leg02TrainIsCorrect
	 * @depends testRoute02Leg02FromStationIsCorrect
	 * @depends testRoute02Leg02FromDateIsCorrect
	 * @depends testRoute02Leg02ToStationIsCorrect
	 * @depends testRoute02Leg02ToDateIsCorrect
	 */
	function testRoute02Leg02TitleIsCorrect(){		
		$this->assertEquals('RE 96604: Aix-les-Bains-le-Revard to Geneve (07:57 - 09:00 30/03/2013)',self::$journey->Routes[02]->Legs[02]->Description());
	}	
  	//Leg03
   	/**
	 * @depends testRoute02LegCountIsCorrect
	 */
	function testRoute02Leg03IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[02]->Legs[03]));
	}
  
	/**
	 * @depends testRoute02Leg03IsLeg
	 */
	function testRoute02Leg03IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[02]->Legs[03]->valid);
	}
	
	/**
	 * @depends testRoute02Leg03IsLeg
	 */
	function testRoute02Leg03TrainIsCorrect(){		
		$this->assertEquals('IR 1713',self::$journey->Routes[02]->Legs[03]->Train);
	}
	
	/**
	 * @depends testRoute02Leg03IsLeg
	 */
	function testRoute02Leg03FromStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[02]->Legs[03]->From['Station']);
	}
	
	/**
	 * @depends testRoute02Leg03IsLeg
	 */
	function testRoute02Leg03FromDateIsCorrect(){		
		$this->assertEquals('09:33 30/03/2013',self::$journey->Routes[02]->Legs[03]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute02Leg03IsLeg
	 */
	function testRoute02Leg03ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[02]->Legs[03]->To['Station']);
	}
	
	/**
	 * @depends testRoute02Leg03IsLeg
	 */
	function testRoute02Leg03ToDateIsCorrect(){		
		$this->assertEquals('10:50 30/03/2013',self::$journey->Routes[02]->Legs[03]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute02Leg03TrainIsCorrect
	 * @depends testRoute02Leg03FromStationIsCorrect
	 * @depends testRoute02Leg03FromDateIsCorrect
	 * @depends testRoute02Leg03ToStationIsCorrect
	 * @depends testRoute02Leg03ToDateIsCorrect
	 */
	function testRoute02Leg03TitleIsCorrect(){		
		$this->assertEquals('IR 1713: Geneve to Aigle (09:33 - 10:50 30/03/2013)',self::$journey->Routes[02]->Legs[03]->Description());
	}	
  //End of Define for Each Leg  

  //Route 03

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute03IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[03]));
	}
	
	/**
	 * @depends testRoute03IsRoute
	 */
	function testRoute03FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[03]->From['Station']);
	}
	
	/**
	 * @depends testRoute03IsRoute
	 */
	function testRoute03FromDateIsCorrect(){		
		$this->assertEquals('19:01 29/03/2013',self::$journey->Routes[03]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute03IsRoute
	 */
	function testRoute03ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[03]->To['Station']);
	}
	
	/**
	 * @depends testRoute03IsRoute
	 */
	function testRoute03ToDateIsCorrect(){		
		$this->assertEquals('10:50 30/03/2013',self::$journey->Routes[03]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute03FromStationIsCorrect
	 * @depends testRoute03FromDateIsCorrect
	 * @depends testRoute03ToStationIsCorrect
	 * @depends testRoute03ToDateIsCorrect
	 */
	function testRoute03TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (19:01 29/03/2013 - 10:50 30/03/2013)',self::$journey->Routes[03]->Description());
	}
	
	/**
	 * @depends testRoute03IsRoute
	 */
	function testRoute03IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[03]->valid);
	}
	
	/**
	 * @depends testRoute03IsRoute
	 */
	function testRoute03LegCountIsCorrect(){		
		$this->assertEquals(4,count(self::$journey->Routes[03]->Legs));
	}
	
  //Define for Each Leg
  	//Leg00
   	/**
	 * @depends testRoute03LegCountIsCorrect
	 */
	function testRoute03Leg00IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[03]->Legs[00]));
	}
  
	/**
	 * @depends testRoute03Leg00IsLeg
	 */
	function testRoute03Leg00IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[03]->Legs[00]->valid);
	}
	
	/**
	 * @depends testRoute03Leg00IsLeg
	 */
	function testRoute03Leg00TrainIsCorrect(){		
		$this->assertEquals('EST 9050',self::$journey->Routes[03]->Legs[00]->Train);
	}
	
	/**
	 * @depends testRoute03Leg00IsLeg
	 */
	function testRoute03Leg00FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[03]->Legs[00]->From['Station']);
	}
	
	/**
	 * @depends testRoute03Leg00IsLeg
	 */
	function testRoute03Leg00FromDateIsCorrect(){		
		$this->assertEquals('19:01 29/03/2013',self::$journey->Routes[03]->Legs[00]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute03Leg00IsLeg
	 */
	function testRoute03Leg00ToStationIsCorrect(){		
		$this->assertEquals('Paris Nord Eurostar',self::$journey->Routes[03]->Legs[00]->To['Station']);
	}
	
	/**
	 * @depends testRoute03Leg00IsLeg
	 */
	function testRoute03Leg00ToDateIsCorrect(){		
		$this->assertEquals('22:23 29/03/2013',self::$journey->Routes[03]->Legs[00]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute03Leg00TrainIsCorrect
	 * @depends testRoute03Leg00FromStationIsCorrect
	 * @depends testRoute03Leg00FromDateIsCorrect
	 * @depends testRoute03Leg00ToStationIsCorrect
	 * @depends testRoute03Leg00ToDateIsCorrect
	 */
	function testRoute03Leg00TitleIsCorrect(){		
		$this->assertEquals('EST 9050: London St. Pancras International to Paris Nord Eurostar (19:01 - 22:23 29/03/2013)',self::$journey->Routes[03]->Legs[00]->Description());
	}

  	//Leg01
   	/**
	 * @depends testRoute03LegCountIsCorrect
	 */
	function testRoute03Leg01IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[03]->Legs[01]));
	}
  
	/**
	 * @depends testRoute03Leg01IsLeg
	 */
	function testRoute03Leg01IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[03]->Legs[01]->valid);
	}
	
	/**
	 * @depends testRoute03Leg01IsLeg
	 */
	function testRoute03Leg01TrainIsCorrect(){		
		$this->assertEquals('NZ 5595',self::$journey->Routes[03]->Legs[01]->Train);
	}
	
	/**
	 * @depends testRoute03Leg01IsLeg
	 */
	function testRoute03Leg01FromStationIsCorrect(){		
		$this->assertEquals('Paris Austerlitz',self::$journey->Routes[03]->Legs[01]->From['Station']);
	}
	
	/**
	 * @depends testRoute03Leg01IsLeg
	 */
	function testRoute03Leg01FromDateIsCorrect(){		
		$this->assertEquals('23:12 29/03/2013',self::$journey->Routes[03]->Legs[01]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute03Leg01IsLeg
	 */
	function testRoute03Leg01ToStationIsCorrect(){		
		$this->assertEquals('Aix-les-Bains-le-Revard',self::$journey->Routes[03]->Legs[01]->To['Station']);
	}
	
	/**
	 * @depends testRoute03Leg01IsLeg
	 */
	function testRoute03Leg01ToDateIsCorrect(){		
		$this->assertEquals('05:53 30/03/2013',self::$journey->Routes[03]->Legs[01]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute03Leg01TrainIsCorrect
	 * @depends testRoute03Leg01FromStationIsCorrect
	 * @depends testRoute03Leg01FromDateIsCorrect
	 * @depends testRoute03Leg01ToStationIsCorrect
	 * @depends testRoute03Leg01ToDateIsCorrect
	 */
	function testRoute03Leg01TitleIsCorrect(){		
		$this->assertEquals('NZ 5595: Paris Austerlitz to Aix-les-Bains-le-Revard (23:12 29/03/2013 - 05:53 30/03/2013)',self::$journey->Routes[03]->Legs[01]->Description());
	}
  	//Leg02
   	/**
	 * @depends testRoute03LegCountIsCorrect
	 */
	function testRoute03Leg02IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[03]->Legs[02]));
	}
  
	/**
	 * @depends testRoute03Leg02IsLeg
	 */
	function testRoute03Leg02IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[03]->Legs[02]->valid);
	}
	
	/**
	 * @depends testRoute03Leg02IsLeg
	 */
	function testRoute03Leg02TrainIsCorrect(){		
		$this->assertEquals('RE 96604',self::$journey->Routes[03]->Legs[02]->Train);
	}
	
	/**
	 * @depends testRoute03Leg02IsLeg
	 */
	function testRoute03Leg02FromStationIsCorrect(){		
		$this->assertEquals('Aix-les-Bains-le-Revard',self::$journey->Routes[03]->Legs[02]->From['Station']);
	}
	
	/**
	 * @depends testRoute03Leg02IsLeg
	 */
	function testRoute03Leg02FromDateIsCorrect(){		
		$this->assertEquals('07:57 30/03/2013',self::$journey->Routes[03]->Legs[02]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute03Leg02IsLeg
	 */
	function testRoute03Leg02ToStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[03]->Legs[02]->To['Station']);
	}
	
	/**
	 * @depends testRoute03Leg02IsLeg
	 */
	function testRoute03Leg02ToDateIsCorrect(){		
		$this->assertEquals('09:00 30/03/2013',self::$journey->Routes[03]->Legs[02]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute03Leg02TrainIsCorrect
	 * @depends testRoute03Leg02FromStationIsCorrect
	 * @depends testRoute03Leg02FromDateIsCorrect
	 * @depends testRoute03Leg02ToStationIsCorrect
	 * @depends testRoute03Leg02ToDateIsCorrect
	 */
	function testRoute03Leg02TitleIsCorrect(){		
		$this->assertEquals('RE 96604: Aix-les-Bains-le-Revard to Geneve (07:57 - 09:00 30/03/2013)',self::$journey->Routes[03]->Legs[02]->Description());
	}	
  	//Leg03
   	/**
	 * @depends testRoute03LegCountIsCorrect
	 */
	function testRoute03Leg03IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[03]->Legs[03]));
	}
  
	/**
	 * @depends testRoute03Leg03IsLeg
	 */
	function testRoute03Leg03IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[03]->Legs[03]->valid);
	}
	
	/**
	 * @depends testRoute03Leg03IsLeg
	 */
	function testRoute03Leg03TrainIsCorrect(){		
		$this->assertEquals('IR 1713',self::$journey->Routes[03]->Legs[03]->Train);
	}
	
	/**
	 * @depends testRoute03Leg03IsLeg
	 */
	function testRoute03Leg03FromStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[03]->Legs[03]->From['Station']);
	}
	
	/**
	 * @depends testRoute03Leg03IsLeg
	 */
	function testRoute03Leg03FromDateIsCorrect(){		
		$this->assertEquals('09:33 30/03/2013',self::$journey->Routes[03]->Legs[03]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute03Leg03IsLeg
	 */
	function testRoute03Leg03ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[03]->Legs[03]->To['Station']);
	}
	
	/**
	 * @depends testRoute03Leg03IsLeg
	 */
	function testRoute03Leg03ToDateIsCorrect(){		
		$this->assertEquals('10:50 30/03/2013',self::$journey->Routes[03]->Legs[03]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute03Leg03TrainIsCorrect
	 * @depends testRoute03Leg03FromStationIsCorrect
	 * @depends testRoute03Leg03FromDateIsCorrect
	 * @depends testRoute03Leg03ToStationIsCorrect
	 * @depends testRoute03Leg03ToDateIsCorrect
	 */
	function testRoute03Leg03TitleIsCorrect(){		
		$this->assertEquals('IR 1713: Geneve to Aigle (09:33 - 10:50 30/03/2013)',self::$journey->Routes[03]->Legs[03]->Description());
	}	
  //End of Define for Each Leg  
  
  //Route 04

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute04IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[04]));
	}
	
	/**
	 * @depends testRoute04IsRoute
	 */
	function testRoute04FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[04]->From['Station']);
	}
	
	/**
	 * @depends testRoute04IsRoute
	 */
	function testRoute04FromDateIsCorrect(){		
		$this->assertEquals('20:01 29/03/2013',self::$journey->Routes[04]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute04IsRoute
	 */
	function testRoute04ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[04]->To['Station']);
	}
	
	/**
	 * @depends testRoute04IsRoute
	 */
	function testRoute04ToDateIsCorrect(){		
		$this->assertEquals('12:16 30/03/2013',self::$journey->Routes[04]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute04FromStationIsCorrect
	 * @depends testRoute04FromDateIsCorrect
	 * @depends testRoute04ToStationIsCorrect
	 * @depends testRoute04ToDateIsCorrect
	 */
	function testRoute04TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (20:01 29/03/2013 - 12:16 30/03/2013)',self::$journey->Routes[04]->Description());
	}
	
	/**
	 * @depends testRoute04IsRoute
	 */
	function testRoute04IsInvalid(){		
		$this->assertEquals(false,self::$journey->Routes[04]->valid);
	}
	
	/**
	 * @depends testRoute04IsRoute
	 */
	function testRoute04LegCountIsCorrect(){		
		$this->assertEquals(3,count(self::$journey->Routes[04]->Legs));
	}
	
  //Define for Each Leg
  	//Leg00
   	/**
	 * @depends testRoute04LegCountIsCorrect
	 */
	function testRoute04Leg00IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[04]->Legs[00]));
	}
  
	/**
	 * @depends testRoute04Leg00IsLeg
	 */
	function testRoute04Leg00IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[04]->Legs[00]->valid);
	}
	
	/**
	 * @depends testRoute04Leg00IsLeg
	 */
	function testRoute04Leg00TrainIsCorrect(){		
		$this->assertEquals('EST 9054',self::$journey->Routes[04]->Legs[00]->Train);
	}
	
	/**
	 * @depends testRoute04Leg00IsLeg
	 */
	function testRoute04Leg00FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[04]->Legs[00]->From['Station']);
	}
	
	/**
	 * @depends testRoute04Leg00IsLeg
	 */
	function testRoute04Leg00FromDateIsCorrect(){		
		$this->assertEquals('20:01 29/03/2013',self::$journey->Routes[04]->Legs[00]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute04Leg00IsLeg
	 */
	function testRoute04Leg00ToStationIsCorrect(){		
		$this->assertEquals('Paris Nord Eurostar',self::$journey->Routes[04]->Legs[00]->To['Station']);
	}
	
	/**
	 * @depends testRoute04Leg00IsLeg
	 */
	function testRoute04Leg00ToDateIsCorrect(){		
		$this->assertEquals('23:23 29/03/2013',self::$journey->Routes[04]->Legs[00]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute04Leg00TrainIsCorrect
	 * @depends testRoute04Leg00FromStationIsCorrect
	 * @depends testRoute04Leg00FromDateIsCorrect
	 * @depends testRoute04Leg00ToStationIsCorrect
	 * @depends testRoute04Leg00ToDateIsCorrect
	 */
	function testRoute04Leg00TitleIsCorrect(){		
		$this->assertEquals('EST 9054: London St. Pancras International to Paris Nord Eurostar (20:01 - 23:23 29/03/2013)',self::$journey->Routes[04]->Legs[00]->Description());
	}
  	//Leg01
   	/**
	 * @depends testRoute04LegCountIsCorrect
	 */
	function testRoute04Leg01IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[04]->Legs[01]));
	}
  
	/**
	 * @depends testRoute04Leg01IsLeg
	 */
	function testRoute04Leg01IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[04]->Legs[01]->valid);
	}
	
	/**
	 * @depends testRoute04Leg01IsLeg
	 */
	function testRoute04Leg01TrainIsCorrect(){		
		$this->assertEquals('TGV 9261',self::$journey->Routes[04]->Legs[01]->Train);
	}
	
	/**
	 * @depends testRoute04Leg01IsLeg
	 */
	function testRoute04Leg01FromStationIsCorrect(){		
		$this->assertEquals('Paris Gare de Lyon',self::$journey->Routes[04]->Legs[01]->From['Station']);
	}
	
	/**
	 * @depends testRoute04Leg01IsLeg
	 */
	function testRoute04Leg01FromDateIsCorrect(){		
		$this->assertEquals('08:03 30/03/2013',self::$journey->Routes[04]->Legs[01]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute04Leg01IsLeg
	 */
	function testRoute04Leg01ToStationIsCorrect(){		
		$this->assertEquals('Lausanne',self::$journey->Routes[04]->Legs[01]->To['Station']);
	}
	
	/**
	 * @depends testRoute04Leg01IsLeg
	 */
	function testRoute04Leg01ToDateIsCorrect(){		
		$this->assertEquals('11:37 30/03/2013',self::$journey->Routes[04]->Legs[01]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute04Leg01TrainIsCorrect
	 * @depends testRoute04Leg01FromStationIsCorrect
	 * @depends testRoute04Leg01FromDateIsCorrect
	 * @depends testRoute04Leg01ToStationIsCorrect
	 * @depends testRoute04Leg01ToDateIsCorrect
	 */
	function testRoute04Leg01TitleIsCorrect(){		
		$this->assertEquals('TGV 9261: Paris Gare de Lyon to Lausanne (08:03 - 11:37 30/03/2013)',self::$journey->Routes[04]->Legs[01]->Description());
	}		
  	//Leg02
   	/**
	 * @depends testRoute04LegCountIsCorrect
	 */
	function testRoute04Leg02IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[04]->Legs[02]));
	}
  
	/**
	 * @depends testRoute04Leg02IsLeg
	 */
	function testRoute04Leg02IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[04]->Legs[02]->valid);
	}
	
	/**
	 * @depends testRoute04Leg02IsLeg
	 */
	function testRoute04Leg02TrainIsCorrect(){		
		$this->assertEquals('IR 1415',self::$journey->Routes[04]->Legs[02]->Train);
	}
	
	/**
	 * @depends testRoute04Leg02IsLeg
	 */
	function testRoute04Leg02FromStationIsCorrect(){		
		$this->assertEquals('Lausanne',self::$journey->Routes[04]->Legs[02]->From['Station']);
	}
	
	/**
	 * @depends testRoute04Leg02IsLeg
	 */
	function testRoute04Leg02FromDateIsCorrect(){		
		$this->assertEquals('11:46 30/03/2013',self::$journey->Routes[04]->Legs[02]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute04Leg02IsLeg
	 */
	function testRoute04Leg02ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[04]->Legs[02]->To['Station']);
	}
	
	/**
	 * @depends testRoute04Leg02IsLeg
	 */
	function testRoute04Leg02ToDateIsCorrect(){		
		$this->assertEquals('12:16 30/03/2013',self::$journey->Routes[04]->Legs[02]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute04Leg02TrainIsCorrect
	 * @depends testRoute04Leg02FromStationIsCorrect
	 * @depends testRoute04Leg02FromDateIsCorrect
	 * @depends testRoute04Leg02ToStationIsCorrect
	 * @depends testRoute04Leg02ToDateIsCorrect
	 */
	function testRoute04Leg02TitleIsCorrect(){		
		$this->assertEquals('IR 1415: Lausanne to Aigle (11:46 - 12:16 30/03/2013)',self::$journey->Routes[04]->Legs[02]->Description());
	}
  //End of Define for Each Leg  
     
  //Route 05

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute05IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[05]));
	}
	
	/**
	 * @depends testRoute05IsRoute
	 */
	function testRoute05FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[05]->From['Station']);
	}
	
	/**
	 * @depends testRoute05IsRoute
	 */
	function testRoute05FromDateIsCorrect(){		
		$this->assertEquals('20:01 29/03/2013',self::$journey->Routes[05]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute05IsRoute
	 */
	function testRoute05ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[05]->To['Station']);
	}
	
	/**
	 * @depends testRoute05IsRoute
	 */
	function testRoute05ToDateIsCorrect(){		
		$this->assertEquals('12:47 30/03/2013',self::$journey->Routes[05]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute05FromStationIsCorrect
	 * @depends testRoute05FromDateIsCorrect
	 * @depends testRoute05ToStationIsCorrect
	 * @depends testRoute05ToDateIsCorrect
	 */
	function testRoute05TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (20:01 29/03/2013 - 12:47 30/03/2013)',self::$journey->Routes[05]->Description());
	}
	
	/**
	 * @depends testRoute05IsRoute
	 */
	function testRoute05IsInvalid(){		
		$this->assertEquals(false,self::$journey->Routes[05]->valid);
	}
	
	/**
	 * @depends testRoute05IsRoute
	 */
	function testRoute05LegCountIsCorrect(){		
		$this->assertEquals(2,count(self::$journey->Routes[05]->Legs));
	}
	
  //Define for Each Leg
  	//Leg00
   	/**
	 * @depends testRoute05LegCountIsCorrect
	 */
	function testRoute05Leg00IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[05]->Legs[00]));
	}
  
	/**
	 * @depends testRoute05Leg00IsLeg
	 */
	function testRoute05Leg00IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[05]->Legs[00]->valid);
	}
	
	/**
	 * @depends testRoute05Leg00IsLeg
	 */
	function testRoute05Leg00TrainIsCorrect(){		
		$this->assertEquals('EST 9054',self::$journey->Routes[05]->Legs[00]->Train);
	}
	
	/**
	 * @depends testRoute05Leg00IsLeg
	 */
	function testRoute05Leg00FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[05]->Legs[00]->From['Station']);
	}
	
	/**
	 * @depends testRoute05Leg00IsLeg
	 */
	function testRoute05Leg00FromDateIsCorrect(){		
		$this->assertEquals('20:01 29/03/2013',self::$journey->Routes[05]->Legs[00]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute05Leg00IsLeg
	 */
	function testRoute05Leg00ToStationIsCorrect(){		
		$this->assertEquals('Paris Nord Eurostar',self::$journey->Routes[05]->Legs[00]->To['Station']);
	}
	
	/**
	 * @depends testRoute05Leg00IsLeg
	 */
	function testRoute05Leg00ToDateIsCorrect(){		
		$this->assertEquals('23:23 29/03/2013',self::$journey->Routes[05]->Legs[00]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute05Leg00TrainIsCorrect
	 * @depends testRoute05Leg00FromStationIsCorrect
	 * @depends testRoute05Leg00FromDateIsCorrect
	 * @depends testRoute05Leg00ToStationIsCorrect
	 * @depends testRoute05Leg00ToDateIsCorrect
	 */
	function testRoute05Leg00TitleIsCorrect(){		
		$this->assertEquals('EST 9054: London St. Pancras International to Paris Nord Eurostar (20:01 - 23:23 29/03/2013)',self::$journey->Routes[05]->Legs[00]->Description());
	}
  	//Leg01
   	/**
	 * @depends testRoute05LegCountIsCorrect
	 */
	function testRoute05Leg01IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[05]->Legs[01]));
	}
  
	/**
	 * @depends testRoute05Leg01IsLeg
	 */
	function testRoute05Leg01IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[05]->Legs[01]->valid);
	}
	
	/**
	 * @depends testRoute05Leg01IsLeg
	 */
	function testRoute05Leg01TrainIsCorrect(){		
		$this->assertEquals('TGV 9763',self::$journey->Routes[05]->Legs[01]->Train);
	}
	
	/**
	 * @depends testRoute05Leg01IsLeg
	 */
	function testRoute05Leg01FromStationIsCorrect(){		
		$this->assertEquals('Paris Gare de Lyon',self::$journey->Routes[05]->Legs[01]->From['Station']);
	}
	
	/**
	 * @depends testRoute05Leg01IsLeg
	 */
	function testRoute05Leg01FromDateIsCorrect(){		
		$this->assertEquals('08:11 30/03/2013',self::$journey->Routes[05]->Legs[01]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute05Leg01IsLeg
	 */
	function testRoute05Leg01ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[05]->Legs[01]->To['Station']);
	}
	
	/**
	 * @depends testRoute05Leg01IsLeg
	 */
	function testRoute05Leg01ToDateIsCorrect(){		
		$this->assertEquals('12:47 30/03/2013',self::$journey->Routes[05]->Legs[01]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute05Leg01TrainIsCorrect
	 * @depends testRoute05Leg01FromStationIsCorrect
	 * @depends testRoute05Leg01FromDateIsCorrect
	 * @depends testRoute05Leg01ToStationIsCorrect
	 * @depends testRoute05Leg01ToDateIsCorrect
	 */
	function testRoute05Leg01TitleIsCorrect(){		
		$this->assertEquals('TGV 9763: Paris Gare de Lyon to Aigle (08:11 - 12:47 30/03/2013)',self::$journey->Routes[05]->Legs[01]->Description());
	}			
  //End of Define for Each Leg     
     
  //Route 06

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute06IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[6]));
	}
	
	/**
	 * @depends testRoute06IsRoute
	 */
	function testRoute06FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[6]->From['Station']);
	}
	
	/**
	 * @depends testRoute06IsRoute
	 */
	function testRoute06FromDateIsCorrect(){		
		$this->assertEquals('20:31 29/03/2013',self::$journey->Routes[6]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute06IsRoute
	 */
	function testRoute06ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[6]->To['Station']);
	}
	
	/**
	 * @depends testRoute06IsRoute
	 */
	function testRoute06ToDateIsCorrect(){		
		$this->assertEquals('11:50 30/03/2013',self::$journey->Routes[6]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute06FromStationIsCorrect
	 * @depends testRoute06FromDateIsCorrect
	 * @depends testRoute06ToStationIsCorrect
	 * @depends testRoute06ToDateIsCorrect
	 */
	function testRoute06TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (20:31 29/03/2013 - 11:50 30/03/2013)',self::$journey->Routes[6]->Description());
	}
	
	/**
	 * @depends testRoute06IsRoute
	 */
	function testRoute06IsInvalid(){		
		$this->assertEquals(false,self::$journey->Routes[6]->valid);
	}
	
	/**
	 * @depends testRoute06IsRoute
	 */
	function testRoute06LegCountIsCorrect(){		
		$this->assertEquals(4,count(self::$journey->Routes[6]->Legs));
	}
	
  //Define for Each Leg
  	//Leg00
   	/**
	 * @depends testRoute06LegCountIsCorrect
	 */
	function testRoute06Leg00IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[6]->Legs[00]));
	}
  
	/**
	 * @depends testRoute06Leg00IsLeg
	 */
	function testRoute06Leg00IsInvalid(){		
		$this->assertEquals(false,self::$journey->Routes[6]->Legs[00]->valid);
	}
	
	/**
	 * @depends testRoute06Leg00IsLeg
	 */
	function testRoute06Leg00TrainIsCorrect(){		
		$this->assertEquals('EST 9096',self::$journey->Routes[6]->Legs[00]->Train);
	}
	
	/**
	 * @depends testRoute06Leg00IsLeg
	 */
	function testRoute06Leg00FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[6]->Legs[00]->From['Station']);
	}
	
	/**
	 * @depends testRoute06Leg00IsLeg
	 */
	function testRoute06Leg00FromDateIsCorrect(){		
		$this->assertEquals('20:31 29/03/2013',self::$journey->Routes[6]->Legs[00]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute06Leg00IsLeg
	 */
	function testRoute06Leg00ToStationIsCorrect(){		
		$this->assertEquals('Moutiers-Salins-Brides-les-Bains',self::$journey->Routes[6]->Legs[00]->To['Station']);
	}
	
	/**
	 * @depends testRoute06Leg00IsLeg
	 */
	function testRoute06Leg00ToDateIsCorrect(){		
		$this->assertEquals('05:51 30/03/2013',self::$journey->Routes[6]->Legs[00]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute06Leg00TrainIsCorrect
	 * @depends testRoute06Leg00FromStationIsCorrect
	 * @depends testRoute06Leg00FromDateIsCorrect
	 * @depends testRoute06Leg00ToStationIsCorrect
	 * @depends testRoute06Leg00ToDateIsCorrect
	 */
	function testRoute06Leg00TitleIsCorrect(){		
		$this->assertEquals('EST 9096: London St. Pancras International to Moutiers-Salins-Brides-les-Bains (20:31 29/03/2013 - 05:51 30/03/2013)',self::$journey->Routes[6]->Legs[00]->Description());
	}

  	//Leg01
   	/**
	 * @depends testRoute06LegCountIsCorrect
	 */
	function testRoute06Leg01IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[6]->Legs[01]));
	}
  
	/**
	 * @depends testRoute06Leg01IsLeg
	 */
	function testRoute06Leg01IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[6]->Legs[01]->valid);
	}
	
	/**
	 * @depends testRoute06Leg01IsLeg
	 */
	function testRoute06Leg01TrainIsCorrect(){		
		$this->assertEquals('RE 83254',self::$journey->Routes[6]->Legs[01]->Train);
	}
	
	/**
	 * @depends testRoute06Leg01IsLeg
	 */
	function testRoute06Leg01FromStationIsCorrect(){		
		$this->assertEquals('Moutiers-Salins-Brides-les-Bains',self::$journey->Routes[6]->Legs[01]->From['Station']);
	}
	
	/**
	 * @depends testRoute06Leg01IsLeg
	 */
	function testRoute06Leg01FromDateIsCorrect(){		
		$this->assertEquals('06:48 30/03/2013',self::$journey->Routes[6]->Legs[01]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute06Leg01IsLeg
	 */
	function testRoute06Leg01ToStationIsCorrect(){		
		$this->assertEquals('Chambery-Challes-E',self::$journey->Routes[6]->Legs[01]->To['Station']);
	}
	
	/**
	 * @depends testRoute06Leg01IsLeg
	 */
	function testRoute06Leg01ToDateIsCorrect(){		
		$this->assertEquals('07:58 30/03/2013',self::$journey->Routes[6]->Legs[01]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute06Leg01TrainIsCorrect
	 * @depends testRoute06Leg01FromStationIsCorrect
	 * @depends testRoute06Leg01FromDateIsCorrect
	 * @depends testRoute06Leg01ToStationIsCorrect
	 * @depends testRoute06Leg01ToDateIsCorrect
	 */
	function testRoute06Leg01TitleIsCorrect(){		
		$this->assertEquals('RE 83254: Moutiers-Salins-Brides-les-Bains to Chambery-Challes-E (06:48 - 07:58 30/03/2013)',self::$journey->Routes[6]->Legs[01]->Description());
	}
  	//Leg02
   	/**
	 * @depends testRoute06LegCountIsCorrect
	 */
	function testRoute06Leg02IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[6]->Legs[02]));
	}
  
	/**
	 * @depends testRoute06Leg02IsLeg
	 */
	function testRoute06Leg02IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[6]->Legs[02]->valid);
	}
	
	/**
	 * @depends testRoute06Leg02IsLeg
	 */
	function testRoute06Leg02TrainIsCorrect(){		
		$this->assertEquals('RE 96608',self::$journey->Routes[6]->Legs[02]->Train);
	}
	
	/**
	 * @depends testRoute06Leg02IsLeg
	 */
	function testRoute06Leg02FromStationIsCorrect(){		
		$this->assertEquals('Chambery-Challes-E',self::$journey->Routes[6]->Legs[02]->From['Station']);
	}
	
	/**
	 * @depends testRoute06Leg02IsLeg
	 */
	function testRoute06Leg02FromDateIsCorrect(){		
		$this->assertEquals('08:42 30/03/2013',self::$journey->Routes[6]->Legs[02]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute06Leg02IsLeg
	 */
	function testRoute06Leg02ToStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[6]->Legs[02]->To['Station']);
	}
	
	/**
	 * @depends testRoute06Leg02IsLeg
	 */
	function testRoute06Leg02ToDateIsCorrect(){		
		$this->assertEquals('09:57 30/03/2013',self::$journey->Routes[6]->Legs[02]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute06Leg02TrainIsCorrect
	 * @depends testRoute06Leg02FromStationIsCorrect
	 * @depends testRoute06Leg02FromDateIsCorrect
	 * @depends testRoute06Leg02ToStationIsCorrect
	 * @depends testRoute06Leg02ToDateIsCorrect
	 */
	function testRoute06Leg02TitleIsCorrect(){		
		$this->assertEquals('RE 96608: Chambery-Challes-E to Geneve (08:42 - 09:57 30/03/2013)',self::$journey->Routes[6]->Legs[02]->Description());
	}	
  	//Leg03
   	/**
	 * @depends testRoute06LegCountIsCorrect
	 */
	function testRoute06Leg03IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[6]->Legs[03]));
	}
  
	/**
	 * @depends testRoute06Leg03IsLeg
	 */
	function testRoute06Leg03IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[6]->Legs[03]->valid);
	}
	
	/**
	 * @depends testRoute06Leg03IsLeg
	 */
	function testRoute06Leg03TrainIsCorrect(){		
		$this->assertEquals('IR 1715',self::$journey->Routes[6]->Legs[03]->Train);
	}
	
	/**
	 * @depends testRoute06Leg03IsLeg
	 */
	function testRoute06Leg03FromStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[6]->Legs[03]->From['Station']);
	}
	
	/**
	 * @depends testRoute06Leg03IsLeg
	 */
	function testRoute06Leg03FromDateIsCorrect(){		
		$this->assertEquals('10:33 30/03/2013',self::$journey->Routes[6]->Legs[03]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute06Leg03IsLeg
	 */
	function testRoute06Leg03ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[6]->Legs[03]->To['Station']);
	}
	
	/**
	 * @depends testRoute06Leg03IsLeg
	 */
	function testRoute06Leg03ToDateIsCorrect(){		
		$this->assertEquals('11:50 30/03/2013',self::$journey->Routes[6]->Legs[03]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute06Leg03TrainIsCorrect
	 * @depends testRoute06Leg03FromStationIsCorrect
	 * @depends testRoute06Leg03FromDateIsCorrect
	 * @depends testRoute06Leg03ToStationIsCorrect
	 * @depends testRoute06Leg03ToDateIsCorrect
	 */
	function testRoute06Leg03TitleIsCorrect(){		
		$this->assertEquals('IR 1715: Geneve to Aigle (10:33 - 11:50 30/03/2013)',self::$journey->Routes[6]->Legs[03]->Description());
	}  
  
  //End of Define for Each Leg
  
  //Route 07

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute07IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[7]));
	}
	
	/**
	 * @depends testRoute07IsRoute
	 */
	function testRoute07FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[7]->From['Station']);
	}
	
	/**
	 * @depends testRoute07IsRoute
	 */
	function testRoute07FromDateIsCorrect(){		
		$this->assertEquals('06:57 30/03/2013',self::$journey->Routes[7]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute07IsRoute
	 */
	function testRoute07ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[7]->To['Station']);
	}
	
	/**
	 * @depends testRoute07IsRoute
	 */
	function testRoute07ToDateIsCorrect(){		
		$this->assertEquals('15:47 30/03/2013',self::$journey->Routes[7]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute07FromStationIsCorrect
	 * @depends testRoute07FromDateIsCorrect
	 * @depends testRoute07ToStationIsCorrect
	 * @depends testRoute07ToDateIsCorrect
	 */
	function testRoute07TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (06:57 - 15:47 30/03/2013)',self::$journey->Routes[7]->Description());
	}
	
	/**
	 * @depends testRoute07IsRoute
	 */
	function testRoute07IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[7]->valid);
	}
	
	/**
	 * @depends testRoute07IsRoute
	 */
	function testRoute07LegCountIsCorrect(){		
		$this->assertEquals(2,count(self::$journey->Routes[7]->Legs));
	}
	
  //Define for Each Leg
  	//Leg00
   	/**
	 * @depends testRoute07LegCountIsCorrect
	 */
	function testRoute07Leg00IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[7]->Legs[00]));
	}
  
	/**
	 * @depends testRoute07Leg00IsLeg
	 */
	function testRoute07Leg00IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[7]->Legs[00]->valid);
	}
	
	/**
	 * @depends testRoute07Leg00IsLeg
	 */
	function testRoute07Leg00TrainIsCorrect(){		
		$this->assertEquals('EST 9110',self::$journey->Routes[7]->Legs[00]->Train);
	}
	
	/**
	 * @depends testRoute07Leg00IsLeg
	 */
	function testRoute07Leg00FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[7]->Legs[00]->From['Station']);
	}
	
	/**
	 * @depends testRoute07Leg00IsLeg
	 */
	function testRoute07Leg00FromDateIsCorrect(){		
		$this->assertEquals('06:57 30/03/2013',self::$journey->Routes[7]->Legs[00]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute07Leg00IsLeg
	 */
	function testRoute07Leg00ToStationIsCorrect(){		
		$this->assertEquals('Lille Europe Eurostar',self::$journey->Routes[7]->Legs[00]->To['Station']);
	}
	
	/**
	 * @depends testRoute07Leg00IsLeg
	 */
	function testRoute07Leg00ToDateIsCorrect(){		
		$this->assertEquals('09:26 30/03/2013',self::$journey->Routes[7]->Legs[00]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute07Leg00TrainIsCorrect
	 * @depends testRoute07Leg00FromStationIsCorrect
	 * @depends testRoute07Leg00FromDateIsCorrect
	 * @depends testRoute07Leg00ToStationIsCorrect
	 * @depends testRoute07Leg00ToDateIsCorrect
	 */
	function testRoute07Leg00TitleIsCorrect(){		
		$this->assertEquals('EST 9110: London St. Pancras International to Lille Europe Eurostar (06:57 - 09:26 30/03/2013)',self::$journey->Routes[7]->Legs[00]->Description());
	}
  
   	//Leg01
   	/**
	 * @depends testRoute07LegCountIsCorrect
	 */
	function testRoute07Leg01IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[7]->Legs[01]));
	}
  
	/**
	 * @depends testRoute07Leg01IsLeg
	 */
	function testRoute07Leg01IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[7]->Legs[01]->valid);
	}
	
	/**
	 * @depends testRoute07Leg01IsLeg
	 */
	function testRoute07Leg01TrainIsCorrect(){		
		$this->assertEquals('TGV 9797',self::$journey->Routes[7]->Legs[01]->Train);
	}
	
	/**
	 * @depends testRoute07Leg01IsLeg
	 */
	function testRoute07Leg01FromStationIsCorrect(){		
		$this->assertEquals('Lille Europe',self::$journey->Routes[7]->Legs[01]->From['Station']);
	}
	
	/**
	 * @depends testRoute07Leg01IsLeg
	 */
	function testRoute07Leg01FromDateIsCorrect(){		
		$this->assertEquals('09:57 30/03/2013',self::$journey->Routes[7]->Legs[01]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute07Leg01IsLeg
	 */
	function testRoute07Leg01ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[7]->Legs[01]->To['Station']);
	}
	
	/**
	 * @depends testRoute07Leg01IsLeg
	 */
	function testRoute07Leg01ToDateIsCorrect(){		
		$this->assertEquals('15:47 30/03/2013',self::$journey->Routes[7]->Legs[01]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute07Leg01TrainIsCorrect
	 * @depends testRoute07Leg01FromStationIsCorrect
	 * @depends testRoute07Leg01FromDateIsCorrect
	 * @depends testRoute07Leg01ToStationIsCorrect
	 * @depends testRoute07Leg01ToDateIsCorrect
	 */
	function testRoute07Leg01TitleIsCorrect(){		
		$this->assertEquals('TGV 9797: Lille Europe to Aigle (09:57 - 15:47 30/03/2013)',self::$journey->Routes[7]->Legs[01]->Description());
	}	
  //End of Define for Each Leg  

   //Route 8

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute8IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[8]));
	}
	
	/**
	 * @depends testRoute8IsRoute
	 */
	function testRoute8FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[8]->From['Station']);
	}
	
	/**
	 * @depends testRoute8IsRoute
	 */
	function testRoute8FromDateIsCorrect(){		
		$this->assertEquals('07:31 30/03/2013',self::$journey->Routes[8]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute8IsRoute
	 */
	function testRoute8ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[8]->To['Station']);
	}
	
	/**
	 * @depends testRoute8IsRoute
	 */
	function testRoute8ToDateIsCorrect(){		
		$this->assertEquals('16:16 30/03/2013',self::$journey->Routes[8]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute8FromStationIsCorrect
	 * @depends testRoute8FromDateIsCorrect
	 * @depends testRoute8ToStationIsCorrect
	 * @depends testRoute8ToDateIsCorrect
	 */
	function testRoute8TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (07:31 - 16:16 30/03/2013)',self::$journey->Routes[8]->Description());
	}
	
	/**
	 * @depends testRoute8IsRoute
	 */
	function testRoute8IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[8]->valid);
	}
	
	/**
	 * @depends testRoute8IsRoute
	 */
	function testRoute8LegCountIsCorrect(){		
		$this->assertEquals(3,count(self::$journey->Routes[8]->Legs));
	}
	
  //Define for Each Leg
  	//Leg0
   	/**
	 * @depends testRoute8LegCountIsCorrect
	 */
	function testRoute8Leg0IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[8]->Legs[0]));
	}
  
	/**
	 * @depends testRoute8Leg0IsLeg
	 */
	function testRoute8Leg0IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[8]->Legs[0]->valid);
	}
	
	/**
	 * @depends testRoute8Leg0IsLeg
	 */
	function testRoute8Leg0TrainIsCorrect(){		
		$this->assertEquals('EST 9006',self::$journey->Routes[8]->Legs[0]->Train);
	}
	
	/**
	 * @depends testRoute8Leg0IsLeg
	 */
	function testRoute8Leg0FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[8]->Legs[0]->From['Station']);
	}
	
	/**
	 * @depends testRoute8Leg0IsLeg
	 */
	function testRoute8Leg0FromDateIsCorrect(){		
		$this->assertEquals('07:31 30/03/2013',self::$journey->Routes[8]->Legs[0]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute8Leg0IsLeg
	 */
	function testRoute8Leg0ToStationIsCorrect(){		
		$this->assertEquals('Paris Nord Eurostar',self::$journey->Routes[8]->Legs[0]->To['Station']);
	}
	
	/**
	 * @depends testRoute8Leg0IsLeg
	 */
	function testRoute8Leg0ToDateIsCorrect(){		
		$this->assertEquals('10:53 30/03/2013',self::$journey->Routes[8]->Legs[0]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute8Leg0TrainIsCorrect
	 * @depends testRoute8Leg0FromStationIsCorrect
	 * @depends testRoute8Leg0FromDateIsCorrect
	 * @depends testRoute8Leg0ToStationIsCorrect
	 * @depends testRoute8Leg0ToDateIsCorrect
	 */
	function testRoute8Leg0TitleIsCorrect(){		
		$this->assertEquals('EST 9006: London St. Pancras International to Paris Nord Eurostar (07:31 - 10:53 30/03/2013)',self::$journey->Routes[8]->Legs[0]->Description());
	}
	
  	//Leg1
   	/**
	 * @depends testRoute8LegCountIsCorrect
	 */
	function testRoute8Leg1IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[8]->Legs[1]));
	}
  
	/**
	 * @depends testRoute8Leg1IsLeg
	 */
	function testRoute8Leg1IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[8]->Legs[1]->valid);
	}
	
	/**
	 * @depends testRoute8Leg1IsLeg
	 */
	function testRoute8Leg1TrainIsCorrect(){		
		$this->assertEquals('TGV 9269',self::$journey->Routes[8]->Legs[1]->Train);
	}
	
	/**
	 * @depends testRoute8Leg1IsLeg
	 */
	function testRoute8Leg1FromStationIsCorrect(){		
		$this->assertEquals('Paris Gare de Lyon',self::$journey->Routes[8]->Legs[1]->From['Station']);
	}
	
	/**
	 * @depends testRoute8Leg1IsLeg
	 */
	function testRoute8Leg1FromDateIsCorrect(){		
		$this->assertEquals('11:58 30/03/2013',self::$journey->Routes[8]->Legs[1]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute8Leg1IsLeg
	 */
	function testRoute8Leg1ToStationIsCorrect(){		
		$this->assertEquals('Lausanne',self::$journey->Routes[8]->Legs[1]->To['Station']);
	}
	
	/**
	 * @depends testRoute8Leg1IsLeg
	 */
	function testRoute8Leg1ToDateIsCorrect(){		
		$this->assertEquals('15:37 30/03/2013',self::$journey->Routes[8]->Legs[1]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute8Leg1TrainIsCorrect
	 * @depends testRoute8Leg1FromStationIsCorrect
	 * @depends testRoute8Leg1FromDateIsCorrect
	 * @depends testRoute8Leg1ToStationIsCorrect
	 * @depends testRoute8Leg1ToDateIsCorrect
	 */
	function testRoute8Leg1TitleIsCorrect(){		
		$this->assertEquals('TGV 9269: Paris Gare de Lyon to Lausanne (11:58 - 15:37 30/03/2013)',self::$journey->Routes[8]->Legs[1]->Description());
	}
	
  	//Leg2
   	/**
	 * @depends testRoute8LegCountIsCorrect
	 */
	function testRoute8Leg2IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[8]->Legs[2]));
	}
  
	/**
	 * @depends testRoute8Leg2IsLeg
	 */
	function testRoute8Leg2IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[8]->Legs[2]->valid);
	}
	
	/**
	 * @depends testRoute8Leg2IsLeg
	 */
	function testRoute8Leg2TrainIsCorrect(){		
		$this->assertEquals('IR 1423',self::$journey->Routes[8]->Legs[2]->Train);
	}
	
	/**
	 * @depends testRoute8Leg2IsLeg
	 */
	function testRoute8Leg2FromStationIsCorrect(){		
		$this->assertEquals('Lausanne',self::$journey->Routes[8]->Legs[2]->From['Station']);
	}
	
	/**
	 * @depends testRoute8Leg2IsLeg
	 */
	function testRoute8Leg2FromDateIsCorrect(){		
		$this->assertEquals('15:46 30/03/2013',self::$journey->Routes[8]->Legs[2]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute8Leg2IsLeg
	 */
	function testRoute8Leg2ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[8]->Legs[2]->To['Station']);
	}
	
	/**
	 * @depends testRoute8Leg2IsLeg
	 */
	function testRoute8Leg2ToDateIsCorrect(){		
		$this->assertEquals('16:16 30/03/2013',self::$journey->Routes[8]->Legs[2]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute8Leg2TrainIsCorrect
	 * @depends testRoute8Leg2FromStationIsCorrect
	 * @depends testRoute8Leg2FromDateIsCorrect
	 * @depends testRoute8Leg2ToStationIsCorrect
	 * @depends testRoute8Leg2ToDateIsCorrect
	 */
	function testRoute8Leg2TitleIsCorrect(){		
		$this->assertEquals('IR 1423: Lausanne to Aigle (15:46 - 16:16 30/03/2013)',self::$journey->Routes[8]->Legs[2]->Description());
	}
  //End of Define for Each Leg
  
  //Route 9

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute9IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[9]));
	}
	
	/**
	 * @depends testRoute9IsRoute
	 */
	function testRoute9FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[9]->From['Station']);
	}
	
	/**
	 * @depends testRoute9IsRoute
	 */
	function testRoute9FromDateIsCorrect(){		
		$this->assertEquals('08:25 30/03/2013',self::$journey->Routes[9]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute9IsRoute
	 */
	function testRoute9ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[9]->To['Station']);
	}
	
	/**
	 * @depends testRoute9IsRoute
	 */
	function testRoute9ToDateIsCorrect(){		
		$this->assertEquals('18:50 30/03/2013',self::$journey->Routes[9]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute9FromStationIsCorrect
	 * @depends testRoute9FromDateIsCorrect
	 * @depends testRoute9ToStationIsCorrect
	 * @depends testRoute9ToDateIsCorrect
	 */
	function testRoute9TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (08:25 - 18:50 30/03/2013)',self::$journey->Routes[9]->Description());
	}
	
	/**
	 * @depends testRoute9IsRoute
	 */
	function testRoute9IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[9]->valid);
	}
	
	/**
	 * @depends testRoute9IsRoute
	 */
	function testRoute9LegCountIsCorrect(){		
		$this->assertEquals(4,count(self::$journey->Routes[9]->Legs));
	}
	
  //Define for Each Leg
  	//Leg0
   	/**
	 * @depends testRoute9LegCountIsCorrect
	 */
	function testRoute9Leg0IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[9]->Legs[0]));
	}
  
	/**
	 * @depends testRoute9Leg0IsLeg
	 */
	function testRoute9Leg0IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[9]->Legs[0]->valid);
	}
	
	/**
	 * @depends testRoute9Leg0IsLeg
	 */
	function testRoute9Leg0TrainIsCorrect(){		
		$this->assertEquals('EST 9010',self::$journey->Routes[9]->Legs[0]->Train);
	}
	
	/**
	 * @depends testRoute9Leg0IsLeg
	 */
	function testRoute9Leg0FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[9]->Legs[0]->From['Station']);
	}
	
	/**
	 * @depends testRoute9Leg0IsLeg
	 */
	function testRoute9Leg0FromDateIsCorrect(){		
		$this->assertEquals('08:25 30/03/2013',self::$journey->Routes[9]->Legs[0]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute9Leg0IsLeg
	 */
	function testRoute9Leg0ToStationIsCorrect(){		
		$this->assertEquals('Paris Nord Eurostar',self::$journey->Routes[9]->Legs[0]->To['Station']);
	}
	
	/**
	 * @depends testRoute9Leg0IsLeg
	 */
	function testRoute9Leg0ToDateIsCorrect(){		
		$this->assertEquals('11:56 30/03/2013',self::$journey->Routes[9]->Legs[0]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute9Leg0TrainIsCorrect
	 * @depends testRoute9Leg0FromStationIsCorrect
	 * @depends testRoute9Leg0FromDateIsCorrect
	 * @depends testRoute9Leg0ToStationIsCorrect
	 * @depends testRoute9Leg0ToDateIsCorrect
	 */
	function testRoute9Leg0TitleIsCorrect(){		
		$this->assertEquals('EST 9010: London St. Pancras International to Paris Nord Eurostar (08:25 - 11:56 30/03/2013)',self::$journey->Routes[9]->Legs[0]->Description());
	}
  	//Leg1
   	/**
	 * @depends testRoute9LegCountIsCorrect
	 */
	function testRoute9Leg1IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[9]->Legs[1]));
	}
  
	/**
	 * @depends testRoute9Leg1IsLeg
	 */
	function testRoute9Leg1IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[9]->Legs[1]->valid);
	}
	
	/**
	 * @depends testRoute9Leg1IsLeg
	 */
	function testRoute9Leg1TrainIsCorrect(){		
		$this->assertEquals('TGV 6615',self::$journey->Routes[9]->Legs[1]->Train);
	}
	
	/**
	 * @depends testRoute9Leg1IsLeg
	 */
	function testRoute9Leg1FromStationIsCorrect(){		
		$this->assertEquals('Paris Gare de Lyon',self::$journey->Routes[9]->Legs[1]->From['Station']);
	}
	
	/**
	 * @depends testRoute9Leg1IsLeg
	 */
	function testRoute9Leg1FromDateIsCorrect(){		
		$this->assertEquals('12:53 30/03/2013',self::$journey->Routes[9]->Legs[1]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute9Leg1IsLeg
	 */
	function testRoute9Leg1ToStationIsCorrect(){		
		$this->assertEquals('Lyon Part Dieu',self::$journey->Routes[9]->Legs[1]->To['Station']);
	}
	
	/**
	 * @depends testRoute9Leg1IsLeg
	 */
	function testRoute9Leg1ToDateIsCorrect(){		
		$this->assertEquals('14:56 30/03/2013',self::$journey->Routes[9]->Legs[1]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute9Leg1TrainIsCorrect
	 * @depends testRoute9Leg1FromStationIsCorrect
	 * @depends testRoute9Leg1FromDateIsCorrect
	 * @depends testRoute9Leg1ToStationIsCorrect
	 * @depends testRoute9Leg1ToDateIsCorrect
	 */
	function testRoute9Leg1TitleIsCorrect(){		
		$this->assertEquals('TGV 6615: Paris Gare de Lyon to Lyon Part Dieu (12:53 - 14:56 30/03/2013)',self::$journey->Routes[9]->Legs[1]->Description());
	}  
  	//Leg2
   	/**
	 * @depends testRoute9LegCountIsCorrect
	 */
	function testRoute9Leg2IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[9]->Legs[2]));
	}
  
	/**
	 * @depends testRoute9Leg2IsLeg
	 */
	function testRoute9Leg2IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[9]->Legs[2]->valid);
	}
	
	/**
	 * @depends testRoute9Leg2IsLeg
	 */
	function testRoute9Leg2TrainIsCorrect(){		
		$this->assertEquals('TGV 9750',self::$journey->Routes[9]->Legs[2]->Train);
	}
	
	/**
	 * @depends testRoute9Leg2IsLeg
	 */
	function testRoute9Leg2FromStationIsCorrect(){		
		$this->assertEquals('Lyon Part Dieu',self::$journey->Routes[9]->Legs[2]->From['Station']);
	}
	
	/**
	 * @depends testRoute9Leg2IsLeg
	 */
	function testRoute9Leg2FromDateIsCorrect(){		
		$this->assertEquals('15:34 30/03/2013',self::$journey->Routes[9]->Legs[2]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute9Leg2IsLeg
	 */
	function testRoute9Leg2ToStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[9]->Legs[2]->To['Station']);
	}
	
	/**
	 * @depends testRoute9Leg2IsLeg
	 */
	function testRoute9Leg2ToDateIsCorrect(){		
		$this->assertEquals('17:16 30/03/2013',self::$journey->Routes[9]->Legs[2]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute9Leg2TrainIsCorrect
	 * @depends testRoute9Leg2FromStationIsCorrect
	 * @depends testRoute9Leg2FromDateIsCorrect
	 * @depends testRoute9Leg2ToStationIsCorrect
	 * @depends testRoute9Leg2ToDateIsCorrect
	 */
	function testRoute9Leg2TitleIsCorrect(){		
		$this->assertEquals('TGV 9750: Lyon Part Dieu to Geneve (15:34 - 17:16 30/03/2013)',self::$journey->Routes[9]->Legs[2]->Description());
	}  
    	//Leg3
   	/**
	 * @depends testRoute9LegCountIsCorrect
	 */
	function testRoute9Leg3IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[9]->Legs[3]));
	}
  
	/**
	 * @depends testRoute9Leg3IsLeg
	 */
	function testRoute9Leg3IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[9]->Legs[3]->valid);
	}
	
	/**
	 * @depends testRoute9Leg3IsLeg
	 */
	function testRoute9Leg3TrainIsCorrect(){		
		$this->assertEquals('IR 1733',self::$journey->Routes[9]->Legs[3]->Train);
	}
	
	/**
	 * @depends testRoute9Leg3IsLeg
	 */
	function testRoute9Leg3FromStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[9]->Legs[3]->From['Station']);
	}
	
	/**
	 * @depends testRoute9Leg3IsLeg
	 */
	function testRoute9Leg3FromDateIsCorrect(){		
		$this->assertEquals('17:33 30/03/2013',self::$journey->Routes[9]->Legs[3]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute9Leg3IsLeg
	 */
	function testRoute9Leg3ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[9]->Legs[3]->To['Station']);
	}
	
	/**
	 * @depends testRoute9Leg3IsLeg
	 */
	function testRoute9Leg3ToDateIsCorrect(){		
		$this->assertEquals('18:50 30/03/2013',self::$journey->Routes[9]->Legs[3]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute9Leg3TrainIsCorrect
	 * @depends testRoute9Leg3FromStationIsCorrect
	 * @depends testRoute9Leg3FromDateIsCorrect
	 * @depends testRoute9Leg3ToStationIsCorrect
	 * @depends testRoute9Leg3ToDateIsCorrect
	 */
	function testRoute9Leg3TitleIsCorrect(){		
		$this->assertEquals('IR 1733: Geneve to Aigle (17:33 - 18:50 30/03/2013)',self::$journey->Routes[9]->Legs[3]->Description());
	}  
  //End of Define for Each Leg  

  //Route 10

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute10IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[10]));
	}
	
	/**
	 * @depends testRoute10IsRoute
	 */
	function testRoute10FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[10]->From['Station']);
	}
	
	/**
	 * @depends testRoute10IsRoute
	 */
	function testRoute10FromDateIsCorrect(){		
		$this->assertEquals('09:31 30/03/2013',self::$journey->Routes[10]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute10IsRoute
	 */
	function testRoute10ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[10]->To['Station']);
	}
	
	/**
	 * @depends testRoute10IsRoute
	 */
	function testRoute10ToDateIsCorrect(){		
		$this->assertEquals('19:51 30/03/2013',self::$journey->Routes[10]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute10FromStationIsCorrect
	 * @depends testRoute10FromDateIsCorrect
	 * @depends testRoute10ToStationIsCorrect
	 * @depends testRoute10ToDateIsCorrect
	 */
	function testRoute10TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (09:31 - 19:51 30/03/2013)',self::$journey->Routes[10]->Description());
	}
	
	/**
	 * @depends testRoute10IsRoute
	 */
	function testRoute10IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[10]->valid);
	}
	
	/**
	 * @depends testRoute10IsRoute
	 */
	function testRoute10LegCountIsCorrect(){		
		$this->assertEquals(3,count(self::$journey->Routes[10]->Legs));
	}
	
  //Define for Each Leg
  	//Leg0
   	/**
	 * @depends testRoute10LegCountIsCorrect
	 */
	function testRoute10Leg0IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[10]->Legs[0]));
	}
  
	/**
	 * @depends testRoute10Leg0IsLeg
	 */
	function testRoute10Leg0IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[10]->Legs[0]->valid);
	}
	
	/**
	 * @depends testRoute10Leg0IsLeg
	 */
	function testRoute10Leg0TrainIsCorrect(){		
		$this->assertEquals('EST 9014',self::$journey->Routes[10]->Legs[0]->Train);
	}
	
	/**
	 * @depends testRoute10Leg0IsLeg
	 */
	function testRoute10Leg0FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[10]->Legs[0]->From['Station']);
	}
	
	/**
	 * @depends testRoute10Leg0IsLeg
	 */
	function testRoute10Leg0FromDateIsCorrect(){		
		$this->assertEquals('09:31 30/03/2013',self::$journey->Routes[10]->Legs[0]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute10Leg0IsLeg
	 */
	function testRoute10Leg0ToStationIsCorrect(){		
		$this->assertEquals('Paris Nord Eurostar',self::$journey->Routes[10]->Legs[0]->To['Station']);
	}
	
	/**
	 * @depends testRoute10Leg0IsLeg
	 */
	function testRoute10Leg0ToDateIsCorrect(){		
		$this->assertEquals('12:59 30/03/2013',self::$journey->Routes[10]->Legs[0]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute10Leg0TrainIsCorrect
	 * @depends testRoute10Leg0FromStationIsCorrect
	 * @depends testRoute10Leg0FromDateIsCorrect
	 * @depends testRoute10Leg0ToStationIsCorrect
	 * @depends testRoute10Leg0ToDateIsCorrect
	 */
	function testRoute10Leg0TitleIsCorrect(){		
		$this->assertEquals('EST 9014: London St. Pancras International to Paris Nord Eurostar (09:31 - 12:59 30/03/2013)',self::$journey->Routes[10]->Legs[0]->Description());
	}
  	//Leg1
   	/**
	 * @depends testRoute10LegCountIsCorrect
	 */
	function testRoute10Leg1IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[10]->Legs[1]));
	}
  
	/**
	 * @depends testRoute10Leg1IsLeg
	 */
	function testRoute10Leg1IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[10]->Legs[1]->valid);
	}
	
	/**
	 * @depends testRoute10Leg1IsLeg
	 */
	function testRoute10Leg1TrainIsCorrect(){		
		$this->assertEquals('TGV 9775',self::$journey->Routes[10]->Legs[1]->Train);
	}
	
	/**
	 * @depends testRoute10Leg1IsLeg
	 */
	function testRoute10Leg1FromStationIsCorrect(){		
		$this->assertEquals('Paris Gare de Lyon',self::$journey->Routes[10]->Legs[1]->From['Station']);
	}
	
	/**
	 * @depends testRoute10Leg1IsLeg
	 */
	function testRoute10Leg1FromDateIsCorrect(){		
		$this->assertEquals('15:11 30/03/2013',self::$journey->Routes[10]->Legs[1]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute10Leg1IsLeg
	 */
	function testRoute10Leg1ToStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[10]->Legs[1]->To['Station']);
	}
	
	/**
	 * @depends testRoute10Leg1IsLeg
	 */
	function testRoute10Leg1ToDateIsCorrect(){		
		$this->assertEquals('18:16 30/03/2013',self::$journey->Routes[10]->Legs[1]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute10Leg1TrainIsCorrect
	 * @depends testRoute10Leg1FromStationIsCorrect
	 * @depends testRoute10Leg1FromDateIsCorrect
	 * @depends testRoute10Leg1ToStationIsCorrect
	 * @depends testRoute10Leg1ToDateIsCorrect
	 */
	function testRoute10Leg1TitleIsCorrect(){		
		$this->assertEquals('TGV 9775: Paris Gare de Lyon to Geneve (15:11 - 18:16 30/03/2013)',self::$journey->Routes[10]->Legs[1]->Description());
	}	
  	//Leg2
   	/**
	 * @depends testRoute10LegCountIsCorrect
	 */
	function testRoute10Leg2IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[10]->Legs[2]));
	}
  
	/**
	 * @depends testRoute10Leg2IsLeg
	 */
	function testRoute10Leg2IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[10]->Legs[2]->valid);
	}
	
	/**
	 * @depends testRoute10Leg2IsLeg
	 */
	function testRoute10Leg2TrainIsCorrect(){		
		$this->assertEquals('IR 1735',self::$journey->Routes[10]->Legs[2]->Train);
	}
	
	/**
	 * @depends testRoute10Leg2IsLeg
	 */
	function testRoute10Leg2FromStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[10]->Legs[2]->From['Station']);
	}
	
	/**
	 * @depends testRoute10Leg2IsLeg
	 */
	function testRoute10Leg2FromDateIsCorrect(){		
		$this->assertEquals('18:33 30/03/2013',self::$journey->Routes[10]->Legs[2]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute10Leg2IsLeg
	 */
	function testRoute10Leg2ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[10]->Legs[2]->To['Station']);
	}
	
	/**
	 * @depends testRoute10Leg2IsLeg
	 */
	function testRoute10Leg2ToDateIsCorrect(){		
		$this->assertEquals('19:51 30/03/2013',self::$journey->Routes[10]->Legs[2]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute10Leg2TrainIsCorrect
	 * @depends testRoute10Leg2FromStationIsCorrect
	 * @depends testRoute10Leg2FromDateIsCorrect
	 * @depends testRoute10Leg2ToStationIsCorrect
	 * @depends testRoute10Leg2ToDateIsCorrect
	 */
	function testRoute10Leg2TitleIsCorrect(){		
		$this->assertEquals('IR 1735: Geneve to Aigle (18:33 - 19:51 30/03/2013)',self::$journey->Routes[10]->Legs[2]->Description());
	}	
	
  //End of Define for Each Leg           
  //Route 11

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute11IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[11]));
	}
	
	/**
	 * @depends testRoute11IsRoute
	 */
	function testRoute11FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[11]->From['Station']);
	}
	
	/**
	 * @depends testRoute11IsRoute
	 */
	function testRoute11FromDateIsCorrect(){		
		$this->assertEquals('10:17 30/03/2013',self::$journey->Routes[11]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute11IsRoute
	 */
	function testRoute11ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[11]->To['Station']);
	}
	
	/**
	 * @depends testRoute11IsRoute
	 */
	function testRoute11ToDateIsCorrect(){		
		$this->assertEquals('19:51 30/03/2013',self::$journey->Routes[11]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute11FromStationIsCorrect
	 * @depends testRoute11FromDateIsCorrect
	 * @depends testRoute11ToStationIsCorrect
	 * @depends testRoute11ToDateIsCorrect
	 */
	function testRoute11TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (10:17 - 19:51 30/03/2013)',self::$journey->Routes[11]->Description());
	}
	
	/**
	 * @depends testRoute11IsRoute
	 */
	function testRoute11IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[11]->valid);
	}
	
	/**
	 * @depends testRoute11IsRoute
	 */
	function testRoute11LegCountIsCorrect(){		
		$this->assertEquals(3,count(self::$journey->Routes[11]->Legs));
	}
	
  //Define for Each Leg
  	//Leg0
   	/**
	 * @depends testRoute11LegCountIsCorrect
	 */
	function testRoute11Leg0IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[11]->Legs[0]));
	}
  
	/**
	 * @depends testRoute11Leg0IsLeg
	 */
	function testRoute11Leg0IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[11]->Legs[0]->valid);
	}
	
	/**
	 * @depends testRoute11Leg0IsLeg
	 */
	function testRoute11Leg0TrainIsCorrect(){		
		$this->assertEquals('EST 9074',self::$journey->Routes[11]->Legs[0]->Train);
	}
	
	/**
	 * @depends testRoute11Leg0IsLeg
	 */
	function testRoute11Leg0FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[11]->Legs[0]->From['Station']);
	}
	
	/**
	 * @depends testRoute11Leg0IsLeg
	 */
	function testRoute11Leg0FromDateIsCorrect(){		
		$this->assertEquals('10:17 30/03/2013',self::$journey->Routes[11]->Legs[0]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute11Leg0IsLeg
	 */
	function testRoute11Leg0ToStationIsCorrect(){		
		$this->assertEquals('Marne la Vallée Eurostar',self::$journey->Routes[11]->Legs[0]->To['Station']);
	}
	
	/**
	 * @depends testRoute11Leg0IsLeg
	 */
	function testRoute11Leg0ToDateIsCorrect(){		
		$this->assertEquals('13:57 30/03/2013',self::$journey->Routes[11]->Legs[0]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute11Leg0TrainIsCorrect
	 * @depends testRoute11Leg0FromStationIsCorrect
	 * @depends testRoute11Leg0FromDateIsCorrect
	 * @depends testRoute11Leg0ToStationIsCorrect
	 * @depends testRoute11Leg0ToDateIsCorrect
	 */
	function testRoute11Leg0TitleIsCorrect(){		
		$this->assertEquals('EST 9074: London St. Pancras International to Marne la Vallée Eurostar (10:17 - 13:57 30/03/2013)',self::$journey->Routes[11]->Legs[0]->Description());
	}
  	//Leg1
   	/**
	 * @depends testRoute11LegCountIsCorrect
	 */
	function testRoute11Leg1IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[11]->Legs[1]));
	}
  
	/**
	 * @depends testRoute11Leg1IsLeg
	 */
	function testRoute11Leg1IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[11]->Legs[1]->valid);
	}
	
	/**
	 * @depends testRoute11Leg1IsLeg
	 */
	function testRoute11Leg1TrainIsCorrect(){		
		$this->assertEquals('TGV 9775',self::$journey->Routes[11]->Legs[1]->Train);
	}
	
	/**
	 * @depends testRoute11Leg1IsLeg
	 */
	function testRoute11Leg1FromStationIsCorrect(){		
		$this->assertEquals('Paris Gare de Lyon',self::$journey->Routes[11]->Legs[1]->From['Station']);
	}
	
	/**
	 * @depends testRoute11Leg1IsLeg
	 */
	function testRoute11Leg1FromDateIsCorrect(){		
		$this->assertEquals('15:11 30/03/2013',self::$journey->Routes[11]->Legs[1]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute11Leg1IsLeg
	 */
	function testRoute11Leg1ToStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[11]->Legs[1]->To['Station']);
	}
	
	/**
	 * @depends testRoute11Leg1IsLeg
	 */
	function testRoute11Leg1ToDateIsCorrect(){		
		$this->assertEquals('18:16 30/03/2013',self::$journey->Routes[11]->Legs[1]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute11Leg1TrainIsCorrect
	 * @depends testRoute11Leg1FromStationIsCorrect
	 * @depends testRoute11Leg1FromDateIsCorrect
	 * @depends testRoute11Leg1ToStationIsCorrect
	 * @depends testRoute11Leg1ToDateIsCorrect
	 */
	function testRoute11Leg1TitleIsCorrect(){		
		$this->assertEquals('TGV 9775: Paris Gare de Lyon to Geneve (15:11 - 18:16 30/03/2013)',self::$journey->Routes[11]->Legs[1]->Description());
	}	
  	//Leg2
   	/**
	 * @depends testRoute11LegCountIsCorrect
	 */
	function testRoute11Leg2IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[11]->Legs[2]));
	}
  
	/**
	 * @depends testRoute11Leg2IsLeg
	 */
	function testRoute11Leg2IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[11]->Legs[2]->valid);
	}
	
	/**
	 * @depends testRoute11Leg2IsLeg
	 */
	function testRoute11Leg2TrainIsCorrect(){		
		$this->assertEquals('IR 1735',self::$journey->Routes[11]->Legs[2]->Train);
	}
	
	/**
	 * @depends testRoute11Leg2IsLeg
	 */
	function testRoute11Leg2FromStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[11]->Legs[2]->From['Station']);
	}
	
	/**
	 * @depends testRoute11Leg2IsLeg
	 */
	function testRoute11Leg2FromDateIsCorrect(){		
		$this->assertEquals('18:33 30/03/2013',self::$journey->Routes[11]->Legs[2]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute11Leg2IsLeg
	 */
	function testRoute11Leg2ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[11]->Legs[2]->To['Station']);
	}
	
	/**
	 * @depends testRoute11Leg2IsLeg
	 */
	function testRoute11Leg2ToDateIsCorrect(){		
		$this->assertEquals('19:51 30/03/2013',self::$journey->Routes[11]->Legs[2]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute11Leg2TrainIsCorrect
	 * @depends testRoute11Leg2FromStationIsCorrect
	 * @depends testRoute11Leg2FromDateIsCorrect
	 * @depends testRoute11Leg2ToStationIsCorrect
	 * @depends testRoute11Leg2ToDateIsCorrect
	 */
	function testRoute11Leg2TitleIsCorrect(){		
		$this->assertEquals('IR 1735: Geneve to Aigle (18:33 - 19:51 30/03/2013)',self::$journey->Routes[11]->Legs[2]->Description());
	}	
	
  //End of Define for Each Leg
  
  //Route 12

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute12IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[12]));
	}
	
	/**
	 * @depends testRoute12IsRoute
	 */
	function testRoute12FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[12]->From['Station']);
	}
	
	/**
	 * @depends testRoute12IsRoute
	 */
	function testRoute12FromDateIsCorrect(){		
		$this->assertEquals('11:01 30/03/2013',self::$journey->Routes[12]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute12IsRoute
	 */
	function testRoute12ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[12]->To['Station']);
	}
	
	/**
	 * @depends testRoute12IsRoute
	 */
	function testRoute12ToDateIsCorrect(){		
		$this->assertEquals('19:51 30/03/2013',self::$journey->Routes[12]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute12FromStationIsCorrect
	 * @depends testRoute12FromDateIsCorrect
	 * @depends testRoute12ToStationIsCorrect
	 * @depends testRoute12ToDateIsCorrect
	 */
	function testRoute12TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (11:01 - 19:51 30/03/2013)',self::$journey->Routes[12]->Description());
	}
	
	/**
	 * @depends testRoute12IsRoute
	 */
	function testRoute12IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[12]->valid);
	}
	
	/**
	 * @depends testRoute12IsRoute
	 */
	function testRoute12LegCountIsCorrect(){		
		$this->assertEquals(3,count(self::$journey->Routes[12]->Legs));
	}
	
  //Define for Each Leg
  	//Leg0
   	/**
	 * @depends testRoute12LegCountIsCorrect
	 */
	function testRoute12Leg0IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[12]->Legs[0]));
	}
  
	/**
	 * @depends testRoute12Leg0IsLeg
	 */
	function testRoute12Leg0IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[12]->Legs[0]->valid);
	}
	
	/**
	 * @depends testRoute12Leg0IsLeg
	 */
	function testRoute12Leg0TrainIsCorrect(){		
		$this->assertEquals('EST 9020',self::$journey->Routes[12]->Legs[0]->Train);
	}
	
	/**
	 * @depends testRoute12Leg0IsLeg
	 */
	function testRoute12Leg0FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[12]->Legs[0]->From['Station']);
	}
	
	/**
	 * @depends testRoute12Leg0IsLeg
	 */
	function testRoute12Leg0FromDateIsCorrect(){		
		$this->assertEquals('11:01 30/03/2013',self::$journey->Routes[12]->Legs[0]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute12Leg0IsLeg
	 */
	function testRoute12Leg0ToStationIsCorrect(){		
		$this->assertEquals('Paris Nord Eurostar',self::$journey->Routes[12]->Legs[0]->To['Station']);
	}
	
	/**
	 * @depends testRoute12Leg0IsLeg
	 */
	function testRoute12Leg0ToDateIsCorrect(){		
		$this->assertEquals('14:26 30/03/2013',self::$journey->Routes[12]->Legs[0]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute12Leg0TrainIsCorrect
	 * @depends testRoute12Leg0FromStationIsCorrect
	 * @depends testRoute12Leg0FromDateIsCorrect
	 * @depends testRoute12Leg0ToStationIsCorrect
	 * @depends testRoute12Leg0ToDateIsCorrect
	 */
	function testRoute12Leg0TitleIsCorrect(){		
		$this->assertEquals('EST 9020: London St. Pancras International to Paris Nord Eurostar (11:01 - 14:26 30/03/2013)',self::$journey->Routes[12]->Legs[0]->Description());
	}
  	//Leg1
   	/**
	 * @depends testRoute12LegCountIsCorrect
	 */
	function testRoute12Leg1IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[12]->Legs[1]));
	}
  
	/**
	 * @depends testRoute12Leg1IsLeg
	 */
	function testRoute12Leg1IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[12]->Legs[1]->valid);
	}
	
	/**
	 * @depends testRoute12Leg1IsLeg
	 */
	function testRoute12Leg1TrainIsCorrect(){		
		$this->assertEquals('TGV 9775',self::$journey->Routes[12]->Legs[1]->Train);
	}
	
	/**
	 * @depends testRoute12Leg1IsLeg
	 */
	function testRoute12Leg1FromStationIsCorrect(){		
		$this->assertEquals('Paris Gare de Lyon',self::$journey->Routes[12]->Legs[1]->From['Station']);
	}
	
	/**
	 * @depends testRoute12Leg1IsLeg
	 */
	function testRoute12Leg1FromDateIsCorrect(){		
		$this->assertEquals('15:11 30/03/2013',self::$journey->Routes[12]->Legs[1]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute12Leg1IsLeg
	 */
	function testRoute12Leg1ToStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[12]->Legs[1]->To['Station']);
	}
	
	/**
	 * @depends testRoute12Leg1IsLeg
	 */
	function testRoute12Leg1ToDateIsCorrect(){		
		$this->assertEquals('18:16 30/03/2013',self::$journey->Routes[12]->Legs[1]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute12Leg1TrainIsCorrect
	 * @depends testRoute12Leg1FromStationIsCorrect
	 * @depends testRoute12Leg1FromDateIsCorrect
	 * @depends testRoute12Leg1ToStationIsCorrect
	 * @depends testRoute12Leg1ToDateIsCorrect
	 */
	function testRoute12Leg1TitleIsCorrect(){		
		$this->assertEquals('TGV 9775: Paris Gare de Lyon to Geneve (15:11 - 18:16 30/03/2013)',self::$journey->Routes[12]->Legs[1]->Description());
	}	
  	//Leg2
   	/**
	 * @depends testRoute12LegCountIsCorrect
	 */
	function testRoute12Leg2IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[12]->Legs[2]));
	}
  
	/**
	 * @depends testRoute12Leg2IsLeg
	 */
	function testRoute12Leg2IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[12]->Legs[2]->valid);
	}
	
	/**
	 * @depends testRoute12Leg2IsLeg
	 */
	function testRoute12Leg2TrainIsCorrect(){		
		$this->assertEquals('IR 1735',self::$journey->Routes[12]->Legs[2]->Train);
	}
	
	/**
	 * @depends testRoute12Leg2IsLeg
	 */
	function testRoute12Leg2FromStationIsCorrect(){		
		$this->assertEquals('Geneve',self::$journey->Routes[12]->Legs[2]->From['Station']);
	}
	
	/**
	 * @depends testRoute12Leg2IsLeg
	 */
	function testRoute12Leg2FromDateIsCorrect(){		
		$this->assertEquals('18:33 30/03/2013',self::$journey->Routes[12]->Legs[2]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute12Leg2IsLeg
	 */
	function testRoute12Leg2ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[12]->Legs[2]->To['Station']);
	}
	
	/**
	 * @depends testRoute12Leg2IsLeg
	 */
	function testRoute12Leg2ToDateIsCorrect(){		
		$this->assertEquals('19:51 30/03/2013',self::$journey->Routes[12]->Legs[2]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute12Leg2TrainIsCorrect
	 * @depends testRoute12Leg2FromStationIsCorrect
	 * @depends testRoute12Leg2FromDateIsCorrect
	 * @depends testRoute12Leg2ToStationIsCorrect
	 * @depends testRoute12Leg2ToDateIsCorrect
	 */
	function testRoute12Leg2TitleIsCorrect(){		
		$this->assertEquals('IR 1735: Geneve to Aigle (18:33 - 19:51 30/03/2013)',self::$journey->Routes[12]->Legs[2]->Description());
	}	
	
  //End of Define for Each Leg           
  //Route 13

	/**
	 * @depends testClassIsJourney
	 */
	function testRoute13IsRoute(){
		$this->assertEquals('Route',get_class(self::$journey->Routes[13]));
	}
	
	/**
	 * @depends testRoute13IsRoute
	 */
	function testRoute13FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[13]->From['Station']);
	}
	
	/**
	 * @depends testRoute13IsRoute
	 */
	function testRoute13FromDateIsCorrect(){		
		$this->assertEquals('11:01 30/03/2013',self::$journey->Routes[13]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute13IsRoute
	 */
	function testRoute13ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[13]->To['Station']);
	}
	
	/**
	 * @depends testRoute13IsRoute
	 */
	function testRoute13ToDateIsCorrect(){		
		$this->assertEquals('20:16 30/03/2013',self::$journey->Routes[13]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute13FromStationIsCorrect
	 * @depends testRoute13FromDateIsCorrect
	 * @depends testRoute13ToStationIsCorrect
	 * @depends testRoute13ToDateIsCorrect
	 */
	function testRoute13TitleIsCorrect(){		
		$this->assertEquals('London St. Pancras International to Aigle (11:01 - 20:16 30/03/2013)',self::$journey->Routes[13]->Description());
	}
	
	/**
	 * @depends testRoute13IsRoute
	 */
	function testRoute13IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[13]->valid);
	}
	
	/**
	 * @depends testRoute13IsRoute
	 */
	function testRoute13LegCountIsCorrect(){		
		$this->assertEquals(3,count(self::$journey->Routes[13]->Legs));
	}
	
  //Define for Each Leg
  	//Leg0
   	/**
	 * @depends testRoute13LegCountIsCorrect
	 */
	function testRoute13Leg0IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[13]->Legs[0]));
	}
  
	/**
	 * @depends testRoute13Leg0IsLeg
	 */
	function testRoute13Leg0IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[13]->Legs[0]->valid);
	}
	
	/**
	 * @depends testRoute13Leg0IsLeg
	 */
	function testRoute13Leg0TrainIsCorrect(){		
		$this->assertEquals('EST 9020',self::$journey->Routes[13]->Legs[0]->Train);
	}
	
	/**
	 * @depends testRoute13Leg0IsLeg
	 */
	function testRoute13Leg0FromStationIsCorrect(){		
		$this->assertEquals('London St. Pancras International',self::$journey->Routes[13]->Legs[0]->From['Station']);
	}
	
	/**
	 * @depends testRoute13Leg0IsLeg
	 */
	function testRoute13Leg0FromDateIsCorrect(){		
		$this->assertEquals('11:01 30/03/2013',self::$journey->Routes[13]->Legs[0]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute13Leg0IsLeg
	 */
	function testRoute13Leg0ToStationIsCorrect(){		
		$this->assertEquals('Paris Nord Eurostar',self::$journey->Routes[13]->Legs[0]->To['Station']);
	}
	
	/**
	 * @depends testRoute13Leg0IsLeg
	 */
	function testRoute13Leg0ToDateIsCorrect(){		
		$this->assertEquals('14:26 30/03/2013',self::$journey->Routes[13]->Legs[0]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute13Leg0TrainIsCorrect
	 * @depends testRoute13Leg0FromStationIsCorrect
	 * @depends testRoute13Leg0FromDateIsCorrect
	 * @depends testRoute13Leg0ToStationIsCorrect
	 * @depends testRoute13Leg0ToDateIsCorrect
	 */
	function testRoute13Leg0TitleIsCorrect(){		
		$this->assertEquals('EST 9020: London St. Pancras International to Paris Nord Eurostar (11:01 - 14:26 30/03/2013)',self::$journey->Routes[13]->Legs[0]->Description());
	}
  	//Leg1
   	/**
	 * @depends testRoute13LegCountIsCorrect
	 */
	function testRoute13Leg1IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[13]->Legs[1]));
	}
  
	/**
	 * @depends testRoute13Leg1IsLeg
	 */
	function testRoute13Leg1IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[13]->Legs[1]->valid);
	}
	
	/**
	 * @depends testRoute13Leg1IsLeg
	 */
	function testRoute13Leg1TrainIsCorrect(){		
		$this->assertEquals('TGV 9273',self::$journey->Routes[13]->Legs[1]->Train);
	}
	
	/**
	 * @depends testRoute13Leg1IsLeg
	 */
	function testRoute13Leg1FromStationIsCorrect(){		
		$this->assertEquals('Paris Gare de Lyon',self::$journey->Routes[13]->Legs[1]->From['Station']);
	}
	
	/**
	 * @depends testRoute13Leg1IsLeg
	 */
	function testRoute13Leg1FromDateIsCorrect(){		
		$this->assertEquals('15:58 30/03/2013',self::$journey->Routes[13]->Legs[1]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute13Leg1IsLeg
	 */
	function testRoute13Leg1ToStationIsCorrect(){		
		$this->assertEquals('Lausanne',self::$journey->Routes[13]->Legs[1]->To['Station']);
	}
	
	/**
	 * @depends testRoute13Leg1IsLeg
	 */
	function testRoute13Leg1ToDateIsCorrect(){		
		$this->assertEquals('19:37 30/03/2013',self::$journey->Routes[13]->Legs[1]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute13Leg1TrainIsCorrect
	 * @depends testRoute13Leg1FromStationIsCorrect
	 * @depends testRoute13Leg1FromDateIsCorrect
	 * @depends testRoute13Leg1ToStationIsCorrect
	 * @depends testRoute13Leg1ToDateIsCorrect
	 */
	function testRoute13Leg1TitleIsCorrect(){		
		$this->assertEquals('TGV 9273: Paris Gare de Lyon to Lausanne (15:58 - 19:37 30/03/2013)',self::$journey->Routes[13]->Legs[1]->Description());
	}	
  	//Leg2
   	/**
	 * @depends testRoute13LegCountIsCorrect
	 */
	function testRoute13Leg2IsLeg(){		
		$this->assertEquals('Leg',get_class(self::$journey->Routes[13]->Legs[2]));
	}
  
	/**
	 * @depends testRoute13Leg2IsLeg
	 */
	function testRoute13Leg2IsValid(){		
		$this->assertEquals(true,self::$journey->Routes[13]->Legs[2]->valid);
	}
	
	/**
	 * @depends testRoute13Leg2IsLeg
	 */
	function testRoute13Leg2TrainIsCorrect(){		
		$this->assertEquals('IR 1435',self::$journey->Routes[13]->Legs[2]->Train);
	}
	
	/**
	 * @depends testRoute13Leg2IsLeg
	 */
	function testRoute13Leg2FromStationIsCorrect(){		
		$this->assertEquals('Lausanne',self::$journey->Routes[13]->Legs[2]->From['Station']);
	}
	
	/**
	 * @depends testRoute13Leg2IsLeg
	 */
	function testRoute13Leg2FromDateIsCorrect(){		
		$this->assertEquals('19:46 30/03/2013',self::$journey->Routes[13]->Legs[2]->From['Date']->format('H:i d/m/Y'));
	}
		
	/**
	 * @depends testRoute13Leg2IsLeg
	 */
	function testRoute13Leg2ToStationIsCorrect(){		
		$this->assertEquals('Aigle',self::$journey->Routes[13]->Legs[2]->To['Station']);
	}
	
	/**
	 * @depends testRoute13Leg2IsLeg
	 */
	function testRoute13Leg2ToDateIsCorrect(){		
		$this->assertEquals('20:16 30/03/2013',self::$journey->Routes[13]->Legs[2]->To['Date']->format('H:i d/m/Y'));
	}
	
	/**
	 * @depends testRoute13Leg2TrainIsCorrect
	 * @depends testRoute13Leg2FromStationIsCorrect
	 * @depends testRoute13Leg2FromDateIsCorrect
	 * @depends testRoute13Leg2ToStationIsCorrect
	 * @depends testRoute13Leg2ToDateIsCorrect
	 */
	function testRoute13Leg2TitleIsCorrect(){		
		$this->assertEquals('IR 1435: Lausanne to Aigle (19:46 - 20:16 30/03/2013)',self::$journey->Routes[13]->Legs[2]->Description());
	}	
	
  //End of Define for Each Leg           
      
             
//End Define for Each Route
	
}


?>