<?php

class User {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO user(`user_id`, `username`, `password`, `user_image`, `type`) VALUES (NULL, '{$data["username"]}', '{$data["password"]}', '{$data["user_image"]}', '{$data["type"]}')";
        $query = mysql_query($this->sql);
        if ($query) {
            return mysql_insert_id();
        } else {
            return false;
        }
    }

    public function update($set, $condition) {
        $this->sql = "UPDATE user SET {$set} WHERE {$condition}";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($condition) {
        $this->sql = "DELETE FROM user WHERE {$condition}";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition) {
        $this->sql = "SELECT * FROM user WHERE $condition";
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
