<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 1/6/2015
 * Time: 2:43 PM
 */
    require("config.php");

    session_destroy();

    header("Location: login.php")
?>