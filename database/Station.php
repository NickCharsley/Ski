<?php
/**
 * Table Definition for station
 */
require_once 'dbRoot.php';

class doStation extends dbRoot 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'station';             // table name
    public $ID;                              // int(4)  primary_key not_null
    public $Name;                            // varchar(45)  unique_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('doStation',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
