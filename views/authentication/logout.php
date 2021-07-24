<?php
session_start();
if(isset($_GET['logout'])){
    include_once 'process_logout.php';
}