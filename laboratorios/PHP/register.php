<?php
    session_start();
    if($_POST == $_SESSION['oldPOST']) $_POST = array(); else $_SESSION['oldPOST'] = $_POST;

    include 'database.php';

    function showErrorMessage($errorMessageType) {
        if ($errorMessageType == "userDuplicated") {
            echo "<div class='alert alert-danger'>
                <button type='button'' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <span><strong>Error: </strong> Usuario duplicado.</span>
                </div>";
        } elseif ($errorMessageType == "passwordsDontMatch") {
            echo "<div class='alert alert-danger'>
                <button type='button'' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <span><strong>Error: </strong> Contraseñas no coinciden.</span>
                </div>";
        }
    }

    if (isset($_POST['first_name']) && isset($_POST['last_name']) &&
        isset($_POST['username']) && isset($_POST['email']) && 
        isset($_POST['password']) && isset($_POST['password_repeat'])) {

        $myDB = new Database('root', '', 'lab_web_php');
        if (!$myDB->checkUsername($_POST['username'])) { // Check username is not in DB
            if ($_POST['password'] == $_POST['password_repeat']) { // Check passwords match
                $myDB->addUser($_POST['username'], $_POST['first_name'], $_POST['last_name'],
                                $_POST['password'], $_POST['email'], $_POST['phone'], 'User');
               echo "<script type='text/javascript'>location.href = '/scripts/login.php'</script>";
            } else showErrorMessage("passwordsDontMatch");
        } else showErrorMessage("userDuplicated");
    }

    include 'register.html';
?>