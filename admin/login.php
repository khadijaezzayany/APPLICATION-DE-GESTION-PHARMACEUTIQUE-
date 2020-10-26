<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <div class="login">
        <a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
        <h1>Space Administrator</h1>
        <form method="post" action="">

            <div class="form_item">
                <label for="username">Username:</label>
                <input type="text" class="textbox" id="username" name="username" required />
            </div>
            <div class="form_item">
                <label for="passworrd">Password:</label>
                <input type="password" class="textbox" id="password" name="password" required />
            </div>
            <div class="form_item form_item--valid">
                <input type="submit" value="VALIDATE" name=" valid" id="but_submit" />
            </div>
            <!-- php-->
            <?php if(isset($_SESSION['message'])){ ;?>
            <p class='alert alert_<?= $_SESSION['msg_type'];?>'>
                <b><?= $_SESSION['message'] ; ?></b>
            </p>
            <?php } unset($_SESSION['message']) ; ?>
            <!-- php-->


        </form>

    </div>
</body>

</html>