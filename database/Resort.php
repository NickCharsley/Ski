<?php
/**
 * Table Definition for resort
 */
require_once 'dbRoot.php';

class doResort extends dbRoot 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'resort';              // table name
    public $ID;                              // int(4)  primary_key not_null
    public $Name;                            // varchar(45)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('doResort',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
