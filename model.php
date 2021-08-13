<?php

class Model {
    var $db = null;

    function __construct(){
        $this->db = new SQLite3('database.sqlite3');
    }

    public function insertUser(array $data){
        $sql = "INSERT INTO user 
            (first_name, last_name, type, email, suffering, message, create_date) 
            values 
            (
                '{first_name}',
                '{last_name}',
                '{type}',
                '{email}',
                '{suffering}',
                '{message}',
                '{create_date}'
                )";

        $sql = str_replace('{first_name}',$data[0],$sql);
        $sql = str_replace('{last_name}',$data[1],$sql);
        $sql = str_replace('{type}',$data[2],$sql);
        $sql = str_replace('{email}',$data[3],$sql);
        $sql = str_replace('{suffering}',$data[4],$sql);
        $sql = str_replace('{message}',$data[5],$sql);
        $sql = str_replace('{create_date}',date('d/m/Y h:i:s'),$sql);
        $result = $this->db->exec($sql);
        return boolval($result);
    }

    /**
     * Obtiene la lista de usuarios
     */
    public function getUsers(){
       $result = $this->db->query('SELECT * FROM user order by type, id');
       $response = [];
       while ($item = $result->fetchArray()){
           array_push($response, $item);
       }
       return $response;
    }
}