<?php
function logout()
{

    session_start();
    unset($_SESSION['auth']);
    session_destroy();

    header('Location: index.php');
}

logout();
