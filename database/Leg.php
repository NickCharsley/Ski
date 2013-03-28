<?php
/**
 * Table Definition for leg
 */
require_once 'dbRoot.php';

class doLeg extends dbRoot 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'leg';                 // table name
    public $ID;                              // int(4)  primary_key not_null
    public $Name;                            // varchar(45)  unique_key
    public $FromStationID;                   // int(4)   not_null
    public $ToStationID;                     // int(4)   not_null
    public $StartTime;                       // datetime  
    public $EndTime;                         // datetime  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('doLeg',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
