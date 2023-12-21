<?php
class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "webgameshop";

    public function connect()
    {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->dbName);
        return $conn;
    }

    public function register($name,$email,$username,$pw,$birthday)
    {
        $con = $this->connect();

        $select = "Select * from user";
        $result = $con->query($select);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if($username == $row["username"])
                {
                    echo "this username already exists";
                    return;
                }
            }
        }

        mysqli_query($con,"insert into user values
                    ('','$name','$email','$username','$pw','$birthday')");

    }
}