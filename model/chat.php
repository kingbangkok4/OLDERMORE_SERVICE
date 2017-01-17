<?php

class Chat {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO chat (`id`, `user_id`, `friend_id`, `message`) VALUES (NULL, {$data["user_id"]}, {$data["friend_id"]}, '{$data["message"]}' )";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update($set, $condition) {
        $this->sql = " UPDATE `chat` SET {$set} WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($condition) {
        $this->sql = "DELETE FROM `chat` WHERE {$condition} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1=1 ") {
        $this->sql = "SELECT c.id, c.user_id, c.message, u.user_image, m.member_name, m.member_mobile "
                . " FROM chat c INNER JOIN user u ON c.user_id = u.user_id "
                . " INNER JOIN member m ON c.user_id = m.user_id "
                . "  WHERE {$condition} "
                . " ORDER BY c.id ";
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

