<?php

class Knowledge {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO knowledge (`id`, `image`, `status`, `user_id`) VALUES (NULL, '{$data["image"]}', '{$data["status"]}', {$data["user_id"]} )";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update($set, $condition) {
        $this->sql = " UPDATE `knowledge` SET {$set} WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($data) {
        $this->sql = "DELETE FROM `knowledge` WHERE id = {$data["id"]} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    

    public function read($condition = " 1=1 ") {
        $this->sql = "SELECT * FROM knowledge WHERE $condition ORDER BY id DESC ";
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

