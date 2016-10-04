<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

/* 
    im in two minds about this class, while it's nice to get all of teh
    code out of the controllers, it feels like this is a little redundant
*/

class DatabaseRequest extends Model
{
    private $tableName;
    private $limit;

    public function __construct($tableName, $limit = null)
    {
        $this->tableName = $tableName;
        $this->setLimit($limit);
    }

    private function setLimit($limit = null)
    {
        if (!$limit || $limit === "" || !is_int($limit))
        {
            $this->limit = DB::table($this->table)->count();
        }
        else
        {
            $this->limit = $limit;
        }
    }

    public function getAllData()
    {
        return DB::table($this->tableName)->get();
    }

    public function getAllDataSortedBy($orderCol = null)
    {
        if (!$orderCol || $orderCol === "")
        {
            return null;
        }

        // sort the data at the query level with orderby rather than sortby (php)
        return DB::table($this->tableName)->orderBy($orderCol)->get();
    }

    public function getDataWhere($col, $val = null)
    {
        if (!$val || $val === "")
        {
            return null;
        }

        return DB::table($this->tableName)->where($col, $val)->get();
    }

    public function getDataWhereOperator($col, $val, $op)
    {
        return DB::table($this->tableName)->where($col, $op, $val)->limit($this->limit)->get();
    }
}
