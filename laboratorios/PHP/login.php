<?php
    session_start();
    if($_POST == $_SESSION['oldPOST']) $_POST = array(); else $_SESSION['oldPOST'] = $_POST;

    include 'database.php';

    function showErrorMessage($errorMessageType) {
        if ($errorMessageType == "user") {
            echo "<div class='alert alert-danger'>
                <button type='button'' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <span><strong>Error: </strong> Usuario incorrecto. <a href='/scripts/register.html' class='alert-link'>¡Crea una cuenta!</a></span>
                </div>";
        } elseif ($errorMessageType == "password") {
            echo "<div class='alert alert-danger'>
                <button type='button'' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <span><strong>Error: </strong> Contraseña incorrecta.</span>
                </div>";
        }
    }

    if (isset($_POST['user']) && isset($_POST['password'])) {
        $myDB = new Database('root', '', 'lab_web_php');
        if ($myDB->checkUsername($_POST['user'])) { // Check username in DB
            if ($myDB->checkPassword($_POST['user'], $_POST['password'])) { // Check password in DB
                // Username and password correct.
                //echo "<script type='text/javascript'>location.href = '/scripts/mainPage.php'</script>";
                
                $loggedInUser = $_POST['user'];
                header("Location: mainPage.php?user=$loggedInUser");

                //$_SESSION['fuser'] = $_POST['user'];
                //header("Location: mainPage.php");
            } else { // Incorrect password
                showErrorMessage("password");
            }
        } else {
            showErrorMessage("user"); // If username not found, incorrect username.
        }
    }

    include 'login.html';
?>