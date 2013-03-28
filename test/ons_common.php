<?php
/*
 * File ons_common.php
 * Created on Jun 1, 2006 by N.A.Charsley
 * email php@oldnicksoftware.co.uk
 *
 *
 * Copyright 2006 ONS
 *
 */
 define("__COMMON__",1);
 //ob_start("ob_gzhandler");
 
 error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
    
 error_log("Enter ".__FILE__);
/************************************************************\
*   Setup
\************************************************************/
    
    $time_start=microtime(true);

    //print_pre($_SERVER["SERVER_NAME"]);
    //print_pre($_ENV["COMPUTERNAME"]);

    if (isset($_SERVER["SERVER_NAME"])){
    	$system=strtolower($_SERVER["SERVER_NAME"]);
        print("System = $system\n");
		die(__FILE__.':'.__LINE__);
    }        
    elseif (isset($_SERVER["COMPUTERNAME"])){
        $system=strtolower($_SERVER["COMPUTERNAME"]);
		//print("System = $system\n");
	}
    elseif (isset($_SERVER["TERM"])){
        $system=strtolower($_SERVER["TERM"]);
		        print("System = $system\n");
		die(__FILE__.':'.__LINE__);
	}
    else {
        $system='';
		print_r($_SERVER);
		die;
	}

    global $web;
    global $root;
    global $root_path;
    global $ips;
    global $fps;
    global $db;
    global $mobile;
    global $local;
    
    $phpunit=true;


    
    $debug=isset($_GET['debug']);

    /*Unix set*/
    $ips=":";
    $fps="/";

    $root="http://$system";
    $root_path=dirname(dirname(__FILE__));//Cos in test directory
    $mobile=(strpos($system,"wewin")===false);
    $local=true;
    ini_set('log_errors',"on");
    $common_path='C:\Users\nick\workspace\ons_common';

    if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");

    if (strpos($system,'.local')>0
        or !(strpos($system,'localhost')===false)
            or !(strpos($system,'nick-xps')===false)
				or !(strpos($system,'tdvsvr0165')===false)){				
		$do_ini='do_nick-xps.ini';
		if (strpos((isset($_SERVER["SERVER_SOFTWARE"])?$_SERVER["SERVER_SOFTWARE"]:""),"Ubuntu")===false){
        	$ips=";";
        	$fps="\\";
        	if (isset($_SERVER["COMPUTERNAME"])){
	        	if (strtolower($_SERVER["COMPUTERNAME"])=="tdvsvr0165"){
	        		$common_path='C:\phpsites\ons_common';	        
	        		$do_ini='do_tdvsvr0165.ini';
	        	}
        	}
		} else {
			$common_path='/home/nick/workspace/common';
	        ini_set("include_path",ini_get("include_path").$ips."/usr/share/php/PEAR");
        }
        $local=true;        
        $web=true;
    } else if (!(strpos($system,'dovelane')===false)) {
        $do_ini='do_bytenig.ini';
        $common_path='/home/bytenig/common';
        ini_set("include_path",ini_get("include_path").$ips."/home/bytenig/php");
        $local=false;
        $web=true;
    } else if (!(strpos($system,'xterm')===false)) {
        //$do_ini='do_bytenig.ini';
        $common_path='/home/nick/workspace/common';
        ini_set("include_path",ini_get("include_path").$ips."/usr/share/php/PEAR");
        $local=true;
        $web=false;
    } else
    {
        phpinfo();
	print("<pre>");
	print_r($_ENV);
	print("<pre>");
        die("System = $system\n");
    }        
    ini_set("include_path",ini_get("include_path")
                            /*Project Code*/
                            .$ips.$root_path
                            .$ips.$root_path.$fps."script"
                            .$ips.$root_path.$fps."class"
                            .$ips.$root_path.$fps."font"
                            .$ips.$root_path.$fps."page"
                            .$ips.$root_path.$fps."extensions"
                            .$ips.$root_path.$fps."database"
                            /*Test Code*/
                            .$ips.$root_path.$fps."test".$fps."class"
                            /*Common Code*/
                            .$ips.$common_path
                            .$ips.$common_path.$fps."script"
                            .$ips.$common_path.$fps."class"
                            .$ips.$common_path.$fps."font"
                            .$ips.$common_path.$fps."page"
                            .$ips.$common_path.$fps."extensions"
                            .$ips.$common_path.$fps."googleApi"
                            .$ips.$common_path.$fps."googleApi".$fps."contrib"
                            );
    if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");
/************************************************************\
*   Common Utils
\************************************************************/
    
    if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");
    include_once("script/utils.php");
    ini_set('error_log',$root_path."/test/php_error.log");
    ini_set('max_execution_time',30000);
    include_once("const.php");
	krumo::disable() ;
    PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 'PEAR_ErrorToPEAR_Exception');
/***********************************************************\
 * Database Connectivity
\***********************************************************/
	if (isset($_GET['do_ini'])) $do_ini="do_{$_GET['do_ini']}.ini";	
    if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");
    if (file_exists(buildpath($root_path,"database",$do_ini))){    	
    	if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");
        include_once("database/utils.php");
        if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");
        
        $config = parse_ini_file(buildpath($root_path,"database",$do_ini), true);
        if (str_replace("/","\\",__FILE__)==str_replace("/","\\",$_SERVER["SCRIPT_FILENAME"]))
            print_pre($config);
        if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");
        
        foreach($config as $class=>$values) {
            $options = &PEAR::getStaticProperty($class,'options');
            $options = $values;
        }
        if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");
        
        PEARError($db = MDB2::connect($config['DB_DataObject']['database']),"Early out");
        //$db->setFetchMode(DB_FETCHMODE_ASSOC);
        $db->setFetchMode(MDB2_FETCHMODE_ASSOC);
        set_time_limit(0);
        DB_DataObject::debugLevel(5);
        if (str_replace("/","\\",__FILE__)==str_replace("/","\\",$_SERVER["SCRIPT_FILENAME"])){
            showload("t_dimension");
        }
        if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");
        
        DB_DataObject::debugLevel($debug?5:0);

        if ($debug) print_pre($db);

    }
    if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");
        
  //** Eclipse Debug Code **************************
if (str_replace("/","\\",__FILE__)==str_replace("/","\\",$_SERVER["SCRIPT_FILENAME"])){
    if (class_exists('gtk',false)) {
        print($_SERVER["SCRIPT_FILENAME"]."\n\r");
        //TODO:any gtk specific code for index.php goes here
    } else {
        print("<h1 align='center'>".$_SERVER["SCRIPT_FILENAME"]."</h1>");
        //TODO:any web specific code for index.php goes here
    }
    //TODO:any generic code for index.php goes here

    phpinfo();

}
if ($debug) print(__FILE__."(".__LINE__.")<br/>\n");

//************************************************
debug_error_log("Exit ".__FILE__);
?>
