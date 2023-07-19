<?php
session_start();
$user_id = $_SESSION['user_id'];
if (isset($user_id)) {
    include_once "config.php";
    $outgoing_id = $user_id;
    $incoming_id = $_POST['incoming_id'];
    $incoming_id = filter_var($incoming_id, FILTER_SANITIZE_STRING);
    $output = "";

    $select_messages = $conn->prepare("SELECT * FROM messages LEFT JOIN users ON users.id = messages.outgoing_msg_id WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY mssg_id");
    $select_messages->execute();
    if ($select_messages->rowCount() > 0) {
        while ($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)) {
            
            if ($fetch_messages['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $fetch_messages['msg'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="uploaded_img/' . $fetch_messages['image'] . '" alt="">
                                <div class="details">
                                    <p>' . $fetch_messages['msg'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
    }
    echo $output;
} else {
    header("location:login.php");
}
