<?php
@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
};

$select_advisor = $conn->prepare("SELECT * FROM `users` WHERE user_type ='advisor'");
$select_advisor->execute();
if ($select_advisor->rowCount() > 0) {
    while ($fetch_advisor = $select_advisor->fetch(PDO::FETCH_ASSOC)) {

        $select_messages = $conn->prepare("SELECT * FROM messages WHERE (incoming_msg_id = {$fetch_advisor['id']}
        OR outgoing_msg_id = {$fetch_advisor['id']}) AND (outgoing_msg_id = {$user_id} 
        OR incoming_msg_id = {$user_id}) ORDER BY mssg_id DESC LIMIT 1");
        $select_messages->execute();
        $fetch_messages = $select_messages->fetch (PDO::FETCH_ASSOC);
        ($select_messages->rowCount() > 0) ? $result = $fetch_messages['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($fetch_messages['outgoing_msg_id'])){
            ($user_id == $fetch_messages['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }

        ($select_messages->rowCount() > 0) ? $date = $fetch_messages['date'] : $date =" ";
?>
        <a href="message_view.php?advisor_id=<?= ($fetch_advisor['id']) ?>" class="advisor">
            <div class="info">
                <img src="uploaded_img/<?= $fetch_advisor['image']; ?>" alt="">
                <div>
                    <h3 class="advisor_name"><?= ucwords($fetch_advisor['name']); ?></h3>
                    <p class="mssg"><?= $you.$msg ?> </p>
                </div>
            </div>
            <div class="date_remove">
                <div class="date"><?= $date ?></div>
                <div class="delete_btn"><i class="fa-solid fa-trash"></i></div>
            </div>
        </a>
<?php
    }
} else {
    echo '<p class="no_advisor">no advisor in list!</p>';
}
?>