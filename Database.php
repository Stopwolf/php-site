<?php

class Database {
    
    private $hostname = "localhost";
    private $username = "stopwolf";
    private $password = "sinisa123";
    private $dbname;
    private $dblink;
    private $result;
    private $records;
    private $affected;

    function __construct($db_name){
        $this->dbname = $db_name;
        $this->Connect();
    }

    function Connect(){
        $this->dblink = new mysqli($this->username, $this->password, $this->dbname);

        if($this->dblink->connect_errno){
            printf("Konekcija neuspesna: %s\n", $this->dblink->connect_error);
            exit();
        }

        $this->dblink->set_charset("utf8");
    }

    function ExecuteQuery($query){
        $this->result = $this->dblink->query($query);

        if($this->result){
            if(isset($this->result->num_rows)){
                $this->records = $this->result->num_rows;
            }

            if(isset($this->result->affected_rows)){
                $this->affected = $this->result->affected_rows;
            }

            return true;
        } else {
            return false;
        }
    }

    function getResult(){
        return $this->result;
    }

    function select($table, $rows, $join_table, $join_key1, $join_key2, $where=null, $order=null){
        $query = 'SELECT '.$rows.' FROM '.$table;

        if($join_table != null){
            $query .= ' JOIN '.$join_table.' ON '.$table.'.'.$join_key1.'='.$join_table.'.'.$join_key2;
        }

        if($where != null){
            $query .= ' WHERE '.$where;
        }

        if($order != null){
            $query .= ' ORDER BY '.$order;
        }

        echo 'Query to be executed:\n'.$query;

        $this->ExecuteQuery($query);
    }

    function insert($table, $columns, $values){
        $query_values = implode(', ',$values);
        $query ='INSERT INTO '.$table;

        if($columns != null){
            $query .= '('.$columns.')';
        }

        $query .= " VALUES($query_values)";
        
        if($this->ExecuteQuery($query)){
            return true;
        } else {
            return false;
        }
    }

    function update($table, $id, $columns, $values){
        $query_values = "";
        $set_query = array();

        for($i=0; $i < sizeof($columns); $i++){
            $set_query[] = "$columns[$i] = $values[$i]";
        }

        $query_values = implode(", ", $set_query);
        $query = "UPDATE ".$table." SET ".$query_values." WHERE id=".$id;

        if($this->ExecuteQuery($query)){
            return true;
        } else {
            return false;
        }
    }

    function delete($table, $id, $id_value){
        $query = "DELETE FROM ".$table." WHERE ".$table.".".$id."=".$id_value;

        if($this->ExecuteQuery($query)){
            return true;
        } else {
            return false;
        }
    }
}
?>
