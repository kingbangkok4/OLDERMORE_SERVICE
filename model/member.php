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

    public function update($data, $condition) {
        $this->sql = "UPDATE member SET fullname = '{$data["fullname"]}', mobile = '{$data["mobile"]}', email = '{$data["email"]}', address='{$data["address"]}', gender = '{$data["gender"]}' WHERE {$condition}";
        mysql_query("SET NAMES 'utf8'");
		$query = mysql_query($this->sql);
        
        if ($query) {
			$this->sql = "SELECT * FROM tb_employee WHERE {$condition} ";
			mysql_query("SET NAMES 'utf8'");
			$query = mysql_query($this->sql);
            $result = array();
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
				$this->sql = "UPDATE tb_user SET username = '{$data["username"]}', password = '{$data["password"]}' WHERE id = {$data["id"]} ";
				mysql_query("SET NAMES 'utf8'");
				$query = mysql_query($this->sql);
            }
            if (count($result) > 0) {
                return $result[0];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete($user_ref) 
	{
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
        $this->sql = "SELECT * from member WHERE $condition";
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