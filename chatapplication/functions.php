<?php
    require_once('config.php');

    function logged_in(){
        if(isset($_SESSION['login'])){
            return true;
        }
    }