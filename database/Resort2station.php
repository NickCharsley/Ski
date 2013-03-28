<?php
/**
 * Table Definition for resort2station
 */
require_once 'dbRoot.php';

class doResort2station extends dbRoot 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'resort2station';      // table name
    public $ID;                              // int(4)  primary_key not_null
    public $ResortID;                        // int(4)   not_null
    public $StationID;                       // int(4)   not_null
    public $Distance;                        // decimal(10,2)   default_0.00

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('doResort2station',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
