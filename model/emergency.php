<?php

class Emergency {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO emergency (`emergency_id`, `emergency_name`, `emergency_mobile`, `emergency_image`, `user_id`) VALUES (NULL, '{$data["emergency_name"]}', '{$data["emergency_mobile"]}', '{$data["emergency_image"]}', '{$data["user_id"]}')";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update($set, $condition) {
        $this->sql = " UPDATE `emergency` SET {$set} WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($data) {
        $this->sql = "DELETE FROM `emergency` WHERE emergency_id = {$data["emergency_id"]} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1=1 ") {
        $this->sql = "SELECT * from emergency WHERE $condition ORDER BY emergency_id ";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        } else {
            return false; 
        }
    } 

}

?>