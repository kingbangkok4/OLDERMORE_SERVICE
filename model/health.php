<?php

class Health {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO health (`health_id`, `con_disease`, `drug_allergy`, `doctor`, `doctor_mobile`, `hotel`, `hotel_mobile`, `user_id`) "
                . "VALUES (NULL, '{$data["con_disease"]}', '{$data["drug_allergy"]}', '{$data["doctor"]}', '{$data["doctor_mobile"]}', '{$data["hotel"]}', '{$data["hotel_mobile"]}', {$data["user_id"]})";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return $this->sql;
        }
    }

    public function update($set, $condition) {
        $this->sql = " UPDATE health SET {$set} WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete($data) {
        $this->sql = "DELETE FROM `health` WHERE health_id = {$data["health_id"]} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    public function read($condition = " 1=1") {
        $this->sql = "SELECT * from health WHERE $condition ORDER BY health_id ";
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
