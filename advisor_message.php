<?php
@include 'config.php';

session_start();

$user_id = $_SESSION['advisor_id'];

if (!isset($user_id)) {
   header('location:login.php');
};

$select_user = $conn->prepare("SELECT * FROM users WHERE NOT user_type = 'advisor' ORDER BY id DESC");
$select_user->execute();

$select_message = $conn->prepare("SELECT * FROM `messages` WHERE incoming_msg_id = $user_id");
$select_message->execute();

if ($select_message->rowCount() > 0 ) {
    while ($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)) {

        $select_messages = $conn->prepare("SELECT * FROM messages WHERE (incoming_msg_id = {$fetch_user['id']}
        OR outgoing_msg_id = {$fetch_user['id']}) AND (outgoing_msg_id = {$user_id} 
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
        <a href="advisor_message_view.php?msg_user_id=<?= ($fetch_user['id']) ?>" class="user">
            <div class="info">
                <img src="uploaded_img/<?= $fetch_user['image']; ?>" alt="">
                <div>
                    <h3 class="advisor_name"><?= ucwords($fetch_user['name']); ?></h3>
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
    echo '<p class="no_advisor">no user in list!</p>';
}
?>