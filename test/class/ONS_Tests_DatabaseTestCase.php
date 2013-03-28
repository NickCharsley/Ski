<?php

abstract class ONS_Tests_DatabaseTestCase extends PHPUnit_Extensions_Database_TestCase
{
    // only instantiate pdo once for test clean-up/fixture load
    static private $pdo = null;

    // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
    private $conn = null;

	/**
     * Performs operation returned by getSetUpOperation().
     */
    protected function setUp()
    {
    	$this->getConnection()->getConnection()->query("SET FOREIGN_KEY_CHECKS = 0; -- Disable foreign key checking.");
		parent::setUp();
		$this->getConnection()->getConnection()->query("SET FOREIGN_KEY_CHECKS = 1; -- Enable foreign key checking.");		        
	}


    final public function getConnection()
    {
		
    	try {
	    	@DB_DataObject::debugLevel($GLOBALS['DB_DEBUG']);
			
	        if ($this->conn === null) {
	            if (self::$pdo == null) {
	                self::$pdo = new PDO( $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
					self::$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	            }
				
	            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
	        }
	        return $this->conn;
    		
    	} catch(PDOException $e) {  
			echo $e->getMessage();  
		}  
    }
		
	private function sync($table){
		$backup =new backup_restore('localhost',$GLOBALS['DB_SYNCNAME'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'],$table );
		$backup->backup(get_class($this).".$table.txt");
		$restore=new backup_restore('localhost',$GLOBALS['DB_DBNAME']  , $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'],$table );
		$backup->restore(get_class($this).".$table.txt");
	}	
		
	final public function getDataSet()
    {   	
//    	foreach ($this->tables as $table){
//    		$this->sync($table);
//    	}		    	
    	//Now load Dataset
		$file=$this->tables[0];		
        return $this->createXMLDataSet($this->xmlData($file));
    }
	
	protected function xmlData($file){
		return buildPath(dirname(dirname(__FILE__)),"testData","$file.xml");
	}
}

?>