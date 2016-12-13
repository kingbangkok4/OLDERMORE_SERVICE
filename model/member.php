<?php

class Member {

    public $sql;

    public function insert($data) {
        $this->sql = "INSERT INTO member (`member_id`, `member_name`, `member_address`, `member_mobile`, `member_email`, `user_id`) VALUES (NULL, '{$data["member_name"]}', '{$data["member_address"]}', '{$data["member_mobile"]}', '{$data["member_email"]}', '{$data["user_id"]}')";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update($set, $condition) {
        $this->sql = "UPDATE member SET {$set} WHERE {$condition}";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($user_ref) {
        $this->sql = "DELETE FROM tb_employee WHERE user_ref = {$user_ref}";
        $query = mysql_query($this->sql);

        $this->sql = "DELETE FROM tb_user WHERE id = {$user_ref}";
        $query = mysql_query($this->sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function read($condition = " 1=1") {
        $this->sql = "SELECT * from member m inner join user u on m.user_id = u.user_id WHERE $condition";
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

    public function get_user($condition = " 1=1 ") {
        $this->sql = "SELECT * FROM tb_user WHERE {$condition} ";
        mysql_query("SET NAMES 'utf8'");
        $query = mysql_query($this->sql);
        if ($query) {
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $result[] = $row;
            }
            if (count($result) > 0) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

?>