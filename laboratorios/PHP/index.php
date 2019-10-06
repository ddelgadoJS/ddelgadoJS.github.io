<?php
    $userName = "Daniel";
    $password = "1234";

    session_start();
    if($_POST == $_SESSION['oldPOST']) $_POST = array(); else $_SESSION['oldPOST'] = $_POST;

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
        if ($userName != $_POST['user']) {
            showErrorMessage("user");
        } elseif ($password != $_POST['password']) {
            showErrorMessage("password");
        }
        
        echo "<script type='text/javascript'>location.href = '/scripts/index.html'</script>";
    }

    include 'login.html';
?>