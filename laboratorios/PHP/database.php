<?php
class Database {
    var $user;
    var $password;
    var $dbName;
    var $connection;

    public function __construct($user, $password, $dbName) {
        $this->user = $user;
        $this->password = $password;
        $this->dbName = $dbName;
    }

    public function openConnection() {
        $this->connection = new mysqli('localhost', $this->user, $this->password, $this->dbName) or die("Unable to connect");
    }

    public function checkUsername($username) {
        $this->openConnection();
        $result = $this->connection->query("SELECT Username FROM USERS");
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                if ($username == $row["Username"]) {
                    $this->connection->close();
                    return true;
                }
            }
        }
        $this->connection->close();
        return false;
    }

    public function checkPassword($username, $password) {
        $this->openConnection();
        $result = $this->connection->query("SELECT Username, Password FROM USERS");
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                if ($username == $row["Username"]){
                    if ($password == $row["Password"]) {
                        $this->connection->close();
                        return true;
                    }
                };
            }
        }
        $this->connection->close();
        return false;
    }

    public function addUser($username, $firstName, $lastName, $password, $email, $phone, $role) {
        $this->openConnection();
        if ($this->connection->query("INSERT INTO `users` (`Username`, `FirstName`, `LastName`, `Password`, `Email`, `Phone`, `Role`) VALUES
        ('$username', '$firstName', '$lastName', '$password', '$email', '$phone', '$role');"
        ) == true) {
            $this->connection->close();
            return true;
        }
        $this->connection->close();
        return false;
    }

    public function getData($username, $dataRequested) {
        $this->openConnection();
        $result = $this->connection->query("SELECT * FROM `users` WHERE `Username` = '$username'");

        if ($result->num_rows > 0) {
            if ($dataRequested == "FullName") {
                $row = $result->fetch_assoc();
                $this->connection->close();
                return $row["FirstName"].' '.$row["LastName"];
            } elseif ($dataRequested == "FirstName") {
                $row = $result->fetch_assoc();
                $this->connection->close();
                return $row["FirstName"];
            } elseif ($dataRequested == "LastName") {
                $row = $result->fetch_assoc();
                $this->connection->close();
                return $row["LastName"];
            } elseif ($dataRequested == "Username") {
                $row = $result->fetch_assoc();
                $this->connection->close();
                return $row["Username"];
            } elseif ($dataRequested == "Email") {
                $row = $result->fetch_assoc();
                $this->connection->close();
                return $row["Email"];
            } elseif ($dataRequested == "Phone") {
                $row = $result->fetch_assoc();
                $this->connection->close();
                return $row["Phone"];
            }
        }
        
        $this->connection->close();
        return false;
    }

    public function modifyUser($username, $newUsername, $firstName, $lastName, $password, $email, $phone) {
        $this->openConnection();
        if ($this->connection->query("UPDATE `users` SET
                                    `Username` = '$newUsername',
                                    `FirstName` = '$firstName',
                                    `LastName` = '$lastName',
                                    `Password` = '$password',
                                    `Email` = '$email',
                                    `Phone` = '$phone'
                                    WHERE `users`.`Username` = '$username';"
        ) == true) {
            $this->connection->close();
            return true;
        } else echo mysqli_error($this->connection);
        $this->connection->close();
        return false;
    }
}

//$myDB = new Database('root', '', 'lab_web_php');
//$myDB->addUser('dabeckham', 'David', 'Beckham', '777', 'dabeckham@gmail.com', '+44 1234 5678', 'admin');
//$myDB->modifyUser('dadelgado', 'dabeckham', 'David', 'Beckham', '777', 'dabeckham@gmail.com', '+44 1234 5678');

//$myDB->getFullName('efvega');

?>