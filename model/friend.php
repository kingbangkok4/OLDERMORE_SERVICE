<?php

class Friend {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO friend (`id`, `user_id`, `friend_id`) VALUES (NULL, {$data["user_id"]}, {$data["friend_id"]} )";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update($set, $condition) {
        $this->sql = " UPDATE `friend` SET {$set} WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($condition) {
        $this->sql = "DELETE FROM `friend` WHERE {$condition} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1=1 ") {
        $this->sql = "SELECT f.id, f.friend_id, u.user_image, m.member_name, m.member_mobile "
                . " FROM friend f INNER JOIN user u ON f.friend_id = u.user_id "
                . " INNER JOIN member m ON f.friend_id = m.user_id "
                . "  WHERE {$condition} ";
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

