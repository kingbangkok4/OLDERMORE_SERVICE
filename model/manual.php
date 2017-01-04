<?php

class Manual {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO manual(`manual_id`, `manual_video`, `manual_word`) "
                . "VALUES (NULL, '{$data["manual_video"]}', '{$data["manual_word"]}') ";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return $this->sql;
        }
    }

    public function update($set, $condition) {
        $this->sql = " UPDATE manual SET {$set} WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
      public function delete($id) {
        $this->sql = "DELETE FROM manual WHERE manual_id = {$id}";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    public function read($condition = " 1=1") {
        $this->sql = "SELECT * from manual WHERE $condition";
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
