<?php
/**
 * Table Definition for route
 */
require_once 'dbRoot.php';

class doRoute extends dbRoot 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'route';               // table name
    public $ID;                              // int(4)  primary_key not_null
    public $Name;                            // varchar(45)  
    public $FromStationID;                   // int(4)   not_null
    public $ToStationID;                     // int(4)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('doRoute',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
