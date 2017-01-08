<?php

class Post {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO post (`id`, `image`, `status`, `user_id`) VALUES (NULL, '{$data["image"]}', '{$data["status"]}', {$data["user_id"]} )";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update($set, $condition) {
        $this->sql = " UPDATE `post` SET {$set} WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($data) {
        $this->sql = "DELETE FROM `post` WHERE id = {$data["id"]} ";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1=1 ") {
        $this->sql = "SELECT p.id, m.member_name, p.image, p.status, p.url, p.user_id, p.timeStamp, u.user_image "
                . "FROM friend f INNER JOIN post p ON f.friend_id = p.user_id INNER JOIN user u ON p.user_id = u.user_id "
                . "INNER JOIN member m ON p.user_id = m.user_id "
                . "WHERE $condition ORDER BY timeStamp DESC ";
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

