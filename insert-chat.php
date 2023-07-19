<?php
session_start();
if (isset($_SESSION['user_id'])) {
    include_once "config.php";
    $outgoing_id = $_SESSION['user_id'];
    $incoming_id = $_POST['incoming_id'];
    $incoming_id = filter_var($incoming_id, FILTER_SANITIZE_STRING);
    $message = $_POST['message'];
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    $placed_on = date('d-M-Y');
    date_default_timezone_set('asia/dhaka');
    $placed_on_time = date('h:i a');



    if (!empty($message)) {
        $insert_message = $conn->prepare("INSERT INTO `messages`(incoming_msg_id, outgoing_msg_id, msg, date, time) VALUES(?,?,?,?,?)");
        $insert_message->execute([$incoming_id, $outgoing_id, $message, $placed_on, $placed_on_time]);
    }
} else {
    header("location: login.php");
}
