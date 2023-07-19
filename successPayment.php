<?php
@include 'config.php';

$val_id = urlencode($_POST['val_id']);
$store_id = urlencode("test63972957b02e4");
$store_passwd = urlencode("test63972957b02e4@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if ($code == 200 && !(curl_errno($handle))) {

    # TO CONVERT AS ARRAY
    # $result = json_decode($result, true);
    # $status = $result['status'];

    # TO CONVERT AS OBJECT
    $result = json_decode($result);

    # TRANSACTION INFO

    $status = $result->status;
    $tran_date = $result->tran_date;
    $tran_id = $result->tran_id;
    $val_id = $result->val_id;
    $amount = $result->amount;
    $store_amount = $result->store_amount;
    $bank_tran_id = $result->bank_tran_id;
    $card_type = $result->card_type;

    # EMI INFO
    $emi_instalment = $result->emi_instalment;
    $emi_amount = $result->emi_amount;
    $emi_description = $result->emi_description;
    $emi_issuer = $result->emi_issuer;

    # ISSUER INFO
    $card_no = $result->card_no;
    $card_issuer = $result->card_issuer;
    $card_brand = $result->card_brand;
    $card_issuer_country = $result->card_issuer_country;
    $card_issuer_country_code = $result->card_issuer_country_code;

    # API AUTHENTICATION
    $APIConnect = $result->APIConnect;
    $validated_on = $result->validated_on;
    $gw_version = $result->gw_version;

    // echo $status . " " . $tran_date . " " . $tran_id . " " . $card_type;
    // echo $amount;
} else {

    echo "Failed to connect with SSLCOMMERZ";
}

if (isset($_POST['update_sub_payment'])) {

    $user_id = $_POST['order_id'];
    $update_userStatus = $_POST['update_userStatus'];
    $update_userStatus = filter_var($update_userStatus, FILTER_SANITIZE_STRING);
    $update_payment = $_POST['update_payment'];
    $update_payment = filter_var($update_payment, FILTER_SANITIZE_STRING);
    $update_payment_type = $_POST['update_payment_type'];
    $update_payment_type = filter_var($update_payment_type, FILTER_SANITIZE_STRING);
    $update_transaction = $_POST['update_transaction'];
    $update_transaction = filter_var($update_transaction, FILTER_SANITIZE_STRING);
    $update_orders = $conn->prepare("UPDATE `service` SET payment_status = ?, payment_type = ?, transaction_no= ? WHERE user_id = ?");
    $update_orders->execute([$update_payment, $update_payment_type, $update_transaction, $user_id]);

    $update_user_status = $conn->prepare("UPDATE `users` SET user_status = ? WHERE id = ?");
    $update_user_status->execute([$update_userStatus, $user_id]);
    header('location:service.php');
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>

    <section>
        <div class="transaction_success">


            <?php
            $user_id = $_GET['user_id'];
            $name = $_GET['name'];
            $select_orders = $conn->prepare("SELECT * FROM `service` WHERE  user_name = ? AND user_id = ?");
            $select_orders->execute([$name, $user_id]);
            $fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)
            ?>
            <div class="transaction_info_container">
                <i class="fa-regular fa-circle-check"></i>
                <h2>Transaction Successful</h2>
                <div class="transaction_info">
                    <p>Name: <span><?= $fetch_orders['user_name']; ?></span></p>
                    <p>Transaction ID: <span><?= $tran_id; ?></span></p>
                    <p>Date: <span><?= $tran_date; ?></span></p>
                    <p>Status: <span><?= $status; ?></span></p>
                    <p>Total Amount: <span><?= $amount; ?></span></p>
                    <p>Method: <span><?= $card_type; ?></span></p>
                </div>


                <?php
                if ($status == 'VALIDATED' or 'VALID') {
                ?>
                    <form action="" method="POST">
                        <input type="hidden" name="order_id" value="<?= $user_id; ?>">
                        <input type="hidden" name="update_payment" value="completed">
                        <input type="hidden" name="update_userStatus" value="subscriber">
                        <input type="hidden" name="update_payment_type" value="<?= $card_type; ?>">
                        <input type="hidden" name="update_transaction" value="<?= $tran_id; ?>">
                        <input type="submit" name="update_sub_payment" class="btn" value="Go back">
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>