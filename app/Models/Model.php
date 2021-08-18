<?php

namespace App\Models;

use App\Libraries\MySql;
use PDO;

class Model
{
    // Name of the model (table)
    private $model;

    // Max. records when fetching all records
    private $limit;

    private $protectedFields;


    /**
     * Constructor
     * Set $model and $limit from child Model
     */
    public function __construct($model, $limit = null, $protectedFields = null)
    {
        $this->model = $model;
        $this->limit = $limit;
        $this->protectedFields = $protectedFields;
    }

    
    /**
     * Fetching all records from table
     * @return array of objects
     */
    public function all(array $selectedFields = null)
    {
        $fields = "*";
        
        if (!empty($selectedFields) && count($selectedFields) > 0) {
            $fields = $this->composeQuery($selectedFields);
        }

        $sql = "SELECT " . $fields . " FROM " . $this->model . " WHERE deleted IS NULL" . (!empty($this->limit) ? " LIMIT " . $this->limit : "");

        return MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);
    }


    /**
     * Fetching one record based on the id
     * @return object
     */
    public function get(int $id, array $selectedFields = null)
    {
        if ($id === 0) return null;

        $fields = "*";

        if (is_array($selectedFields) && count($selectedFields) > 0) {
            $fields = $this->composeQuery($selectedFields);
        }

        $sql = "SELECT " . $fields .  " FROM " . $this->model . " WHERE id=" . $id . " AND deleted IS NULL";
        $res = MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);

        return count($res) > 0 ? $res[0] : null;
    }


    public function findById($id)
    {
        $data = $this->get($id);
        
        return !is_null($data) ? $data : false;
    }


    /**
     * Saves a record to the model
     * @param $data array
     * @return the ID of the new record
     */
    public function store(array $data)
    {
        
        return MySql::insert($this->removeIllegalFields($data), $this->model);
    }


    /**
     * Updates a record to the model
     * @param $data array
     */
    public function update(array $data, int $id)
    {
        if ($id === 0) return;

        MySql::update($this->removeIllegalFields($data), $this->model, $id);
    }


    /**
     * Archives a record to the model
     * @param $data array
     */
    public function destroy(int $id)
    {
        Mysql::delete($id, $this->model);
    }


    private function removeIllegalFields(array $data)
    {
        foreach (@$data as $key => $val) {
            if (in_array($key, $this->protectedFields)) {
                unset($data[$key]);
            }
        }

        return $data;
    }
    

    protected function composeQuery(array $fields)
    {
        $getFields = '';

        foreach ($fields as $field)
        {
            $getFields .= $field . ',';
        }

        return rtrim($getFields, ',');
    }


    //retrieves amount of records of user in table
    public function getNumRecords(int $id)
    {
        if ($id === NULL) return NULL;
    
        $sql = "SELECT users.id as user_id, COUNT(" . $this->model . ".id) as num FROM " . "users " . 
        "LEFT JOIN " . $this->model . " on " . $this->model . ".user_id = users.id GROUP BY users.id having users.id = " . $id;
        #dd($sql);
        $res = MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);

        return count($res) > 0 ? $res[0] : null;
    }

    //get timestamp latest mutation of user content tables
    public function getLatestUpdate(int $id)
    {
        if ($id === NULL) return NULL;
        
        //create one list/column of timestamps for created, updated, deleted
        //of a table, per specific user, output most recent timestamp
        $sql = 
        "SELECT " . $this->model . ".created as latest_update, " . $this->model . ".user_id FROM " . $this->model . "
        where " . $this->model . ".user_id = " . $id . "
        UNION 
        SELECT " . $this->model . ".updated, " . $this->model . ".user_id  FROM " . $this->model . " 
        where " . $this->model . ".user_id = " . $id . "
        UNION 
        SELECT " . $this->model . ".deleted, " . $this->model . ".user_id FROM " . $this->model . " 
        where " . $this->model . ".user_id = 4 and " . $this->model . ".deleted != null
        order by latest_update DESC
        limit 1";

        $res = MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);

        return count($res) > 0 ? $res[0] : null;
    }

}