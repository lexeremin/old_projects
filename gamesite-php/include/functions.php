<?php
    function is_user_logged_in() {
        session_start();

        if(isset($_SESSION['user_login']))
            return true;

        return false;    
    }

    function get_header($main_template) {
        $header_template = $_SERVER['DOCUMENT_ROOT']."/templates/header/header_default.php";

        if(is_user_logged_in()) {
            $header_template = $_SERVER['DOCUMENT_ROOT']."/templates/header/header_logged_in.php";
        }

        include $header_template;
    }

    function get_main($template_name) {
        include "dbconnect.php";
        $mysqli = dbconnect();
        include $_SERVER['DOCUMENT_ROOT']."/templates/main/".$template_name;
    }

    function get_footer() {
        include $_SERVER['DOCUMENT_ROOT']."/templates/footer/footer.php";
    }
?>