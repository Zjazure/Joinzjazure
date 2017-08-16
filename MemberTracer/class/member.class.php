<?php
require(__DIR__."/config.class.php");
class member
{
    public $name;
    public $gender;
    public $grade;
    public $class;
    public $groups;
    public $email;
    public $phone;
    public $QQ;
    public $weibo;
    public $description;
    public $joindate;
    public function get_pk_json()
    {
        return json_encode(array(
            "name"=>$this->name,
            "gender"=>$this->gender,
            "grade"=>$this->grade,
            "class"=>$this->class
        ));
    }

    private static function connect_to_table()
    {
        $conf = config::get_configs();
        $db_host = $conf["database_host"];
        $db_name = $conf["database_name"];
        $db_user = $conf["database_user"];
        $db_pwd = $conf["database_pass"];
        $db_tbl = $conf["database_table"];
        $mysqli = mysqli_connect($db_host, $db_user, $db_pwd, $db_name); 
        if (!$mysqli)
            return null;
        $mysqli->set_charset("utf8");
        if(!self::table_exist_or_create($db_tbl,$db_name,$mysqli)) return null;
        return $mysqli;
    }

    private static function table_exist_or_create($tablename,$dbname,$mysqli)
    {
        $sql = "select * from information_schema.TABLES where table_schema='$dbname' and table_name='$tablename'";
        $result = $mysqli->query($sql);
        if($result->num_rows==0)
        {
            $sql = "
            CREATE TABLE `$dbname`.`$tablename` (
            `Name` VARCHAR(45) NOT NULL,
            `Gender` BOOLEAN NOT NULL,
            `Grade` INT NOT NULL,
            `Class` INT NOT NULL,
            `JoinDate` INT NOT NULL,
            `GroupValue` TEXT NOT NULL,
            `Email` TEXT NOT NULL,
            `Phone` VARCHAR(45) NOT NULL,
            `QQ` VARCHAR(45) NOT NULL,
            `Weibo` VARCHAR(45) NOT NULL,
            `Description` TEXT NOT NULL,
            PRIMARY KEY (`Name`, `Gender`, `Grade`, `Class`));
            ";
            return $mysqli->query($sql);
        }
        else
            return true;
    }

    
    private static function CIC($string)
    {
        return str_ireplace("'","''",$string);
    }

    public static function get_members()
    {
        $conf = config::get_configs();
        $db_tbl = $conf["database_table"];

        $mysqli = self::connect_to_table();
        if(!$mysqli) return null;
        $sql_cmd = "SELECT * FROM $db_tbl";
        $result = $mysqli->query($sql_cmd);

        $members = array();
        if($result->num_rows>0)
            while($row = $result->fetch_assoc())
            {
                $member = new member();
                $member->name = $row["Name"];
                $member->gender = $row["Gender"];
                $member->grade = $row["Grade"];
                $member->class = $row["Class"];
                $member->joindate = $row["JoinDate"];
                $member->email = $row["Email"];
                $member->phone = $row["Phone"];
                $member->QQ = $row["QQ"];
                $member->weibo = $row["Weibo"];
                $member->description = $row["Description"];
                $member->groups = $row["GroupValue"];
                array_push($members,$member);
            }
        $mysqli->close();
        return $members;
    }

    public static function get_member_by_pk_json($pk_json)
    {
        $pks = json_decode($pk_json,true);
        $conf = config::get_configs();
        $db_tbl = $conf["database_table"];
        $mysqli = self::connect_to_table();
        $sql_cmd = "SELECT * FROM $db_tbl WHERE Name='".self::CIC($pks["name"])."' AND Gender='".$pks["gender"]."' AND Grade='".self::CIC($pks["grade"])."' AND Class='".self::CIC($pks["class"])."' ";
        $result = $mysqli->query($sql_cmd);
        if($result->num_rows==1)
        {
            $row = $result->fetch_assoc();
            $member = new member();
            $member->name = $row["Name"];
            $member->gender = $row["Gender"];
            $member->grade = $row["Grade"];
            $member->class = $row["Class"];
            $member->email = $row["Email"];
            $member->phone = $row["Phone"];
            $member->QQ = $row["QQ"];
            $member->weibo = $row["Weibo"];
            $member->description = $row["Description"];
            $member->groups = $row["GroupValue"];
            return $member;
        }
        return null;
    }

    public static function delete_member($member)
    {
        $conf = config::get_configs();
        $db_tbl = $conf["database_table"];
        $mysqli = self::connect_to_table();
        $sql_cmd = "DELETE FROM $db_tbl WHERE Name='".self::CIC($member->name)."' AND Gender='".$member->gender."' AND Grade='".self::CIC($member->grade)."' AND Class='".self::CIC($member->class)."' ";
        $result = $mysqli->query($sql_cmd);
        $mysqli->close();
        return $result;
    }

    public static function add_member($member)
    {
        $conf = config::get_configs();
        $db_tbl = $conf["database_table"];
        $mysqli = self::connect_to_table();
        $result = true;
        //check if member exists
        $sql_cmd = "SELECT * FROM $db_tbl WHERE Name='".self::CIC($member->name)."' AND Gender='".$member->gender."' AND Grade='".self::CIC($member->grade)."' AND Class='".self::CIC($member->class)."' ";
        if($mysqli->query($sql_cmd)->num_rows>=0)
        {
            $sql_cmd = "DELETE FROM $db_tbl WHERE Name='".self::CIC($member->name)."' AND Gender='".$member->gender."' AND Grade='".self::CIC($member->grade)."' AND Class='".self::CIC($member->class)."' ";
            $result=$result&&$mysqli->query($sql_cmd);
        }
        $sql_cmd = "INSERT INTO $db_tbl (Name,Gender,Grade,Class,JoinDate,GroupValue,Email,Phone,QQ,Weibo,Description) VALUES ('".self::CIC($member->name)."','".$member->gender."','".self::CIC($member->grade)."','".self::CIC($member->class)."','".self::CIC($member->joindate)."','".self::CIC($member->groups)."','".self::CIC($member->email)."','".self::CIC($member->phone)."','".self::CIC($member->QQ)."','".self::CIC($member->weibo)."','".self::CIC($member->description)."')";
        $result = $result&&$mysqli->query($sql_cmd);
        $mysqli->close();
        return $result;
        
    }
}


