<?php
    session_start();
    if($_POST == $_SESSION['oldPOST']) $_POST = array(); else $_SESSION['oldPOST'] = $_POST;

    include 'imaginaryDatabase.php';

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
        } elseif ($errorMessageType == "good") {
            echo "<div class='alert alert-danger'>
                <button type='button'' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <span><strong>Error: </strong> GOOOOOOOOD.</span>
                </div>";
        }
    }
    
    if (isset($_POST['user']) && isset($_POST['password'])) {
        foreach ($usersArray as $key => $value) {
            if ($value->checkUsername($_POST['user'])) { // Check username in DB
                if ($value->checkPassword($_POST['password'])) { // Check password in DB
                    // Username and password correct.
                    echo "<script type='text/javascript'>location.href = '/scripts/mainPage.html'</script>";
                    break;
                } else { // Incorrect password
                    showErrorMessage("password");
                    break;
                }
            }

            if (end($usersArray) == $value) { // If end of array, it means it's not in DB.
                showErrorMessage("user"); // If username not found, incorrect username.
            }
        }
    }

    include 'login.html';
?>