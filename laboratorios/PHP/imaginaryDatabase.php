<?php
class User {
    var $firstName;
    var $lastName;
    var $userName;
    var $password;
    var $email;
    var $telephone;
    var $role;

    public function __construct($firstName, $lastName, $username, $password, $email, $telephone, $role) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->role = $role;
    }

    public function echoAll() { // Not useful.
        echo $this->firstName;
        echo $this->lastName;
        echo $this->username;
        echo $this->password;
        echo $this->email;
        echo $this->telephone;
        echo $this->role;
    }

    public function getUsername() {
        echo $this->username;
    }

    public function getPassword() {
        echo $this->password;
    }

    public function checkUsername($username) {
        if ($this->username == $username) {
            return true;
        }
        return false;
    }

    public function checkPassword($password) {
        if ($this->password == $password) {
            return true;
        }
        return false;
    }
}
    $user1 = new User('Daniel', 'Delgado', 'dadelgado', '1234', 'dadelgado@gmail.com', '+506 1234 5678', 'user');
    $user2 = new User('Oscar', 'Vega', 'osvega', '1111', 'osvega@gmail.com', '+1 1234 5678', 'user');
    $user3 = new User('Efrain', 'Vega', 'efvega', '2222', 'efvega@gmail.com', '+12 1234 5678', 'user');
    $admin1 = new User('David', 'Beckham', 'dabeckham', '3333', 'dabeckham@gmail.com', '+44 1234 5678', 'admin');

    $usersArray = array('user1'=>$user1, 'user2'=>$user2, 'user3'=>$user3, 'admin1'=>$admin1);

   /* foreach ($usersArray as $key => $value) {
        echo $value->checkUsername("dadelgado").'<br>';
    }*/

    //print_r($users['user1']);
    //$users['user1']->getUsername();
?>