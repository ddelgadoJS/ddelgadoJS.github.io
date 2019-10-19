<?php 
    include 'database.php';

    $myDB = new Database('root', '', 'lab_web_php');
    $myDB->modifyUser($_POST['currentUsername'], $_POST['newUsername'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone']);
    
    if (strlen($_POST['password_change']) > 1) {
        if ($_POST['password_change'] == $_POST['password_change_repeat']) {
            $myDB->modifyUserPassword($_POST['currentUsername'], $_POST['password_change']);
        }
    }
    
    /*$newUsername = $_POST['newUsername'];
    header("Location: profile.php?user=$newUsername");

    if ($_POST['currentUsername'] != $_POST['newUsername']) {
        //echo "<script type='text/javascript'>location.href = '/scripts/login.php'</script>";
        $newUsername = $_POST['newUsername'];
        header("Location: profile.php?user=$newUsername");
    }*/
?>