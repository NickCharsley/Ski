<?php
/**
 * Table Definition for journey
 */
require_once 'dbRoot.php';

class doJourney extends dbRoot 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'journey';             // table name
    public $ID;                              // int(4)  primary_key not_null
    public $RouteID;                         // int(4)   not_null
    public $LegID;                           // int(4)   not_null
    public $sequence;                        // int(4)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('doJourney',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
