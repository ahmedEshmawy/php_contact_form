<?php
// check if the user come from request
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //Asign variables
    $user = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $msg = $_POST['message'];
    $userError = "";
    $msgError = "";
    $mobileError = "";

    // if (strlen($user) <= 4) {
    //     $userError =  "User Name must be at least 5 character" . "<br>";
    // }
    // if (strlen($mobile) <= 6) {
    //     $mobileError = "Mobile number must be at least 6 character" . "<br>";
    // }
    // if (strlen($msg) < 10) {
    //     $msgError  = "Message at least  10 character " . "<br>";
    // }



    // **creating array of errors
    $formErrors = array();
    if (strlen($user) <= 4) {
        $formErrors[] = "User Name must be at least 5 character" . "<br>";
    }
    if (strlen($mobile) < 6) {
        $formErrors[] = "Mobile number must be at least 6 character" . "<br>";
    }
    if (strlen($msg) < 10) {
        $formErrors[] = "Message at least  10 character " . "<br>";
    }
    // if no errors send mail($to, $subject, $msg, $headers);
    $myemail = "ahmed@gmail";
    $subject = "contact Form";
    $headers = "from" .$email . "\r\n";

    if (empty($formErrors)) {
        mail($myemail,$subject,$msg,$headers);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Contact Form</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Contact Me</h1>

        <!--------- Start form ------>
        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?> " method="POST">
            <div class="form-group">
                <?php if (!empty($formErrors)) : ?>
                <!-- we put alert class in if confition to not show alert if no errors -->
                <div class=" alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <?php
                        foreach ($formErrors as $error) :
                            echo $error;
                        endforeach
                        ?>
                    <?php endif ?>


                </div>
                <label>User Name</label>
                <input type="text" class="form-control" name="username" placeholder="User name"
                    value="<?php if (isset($user)) echo $user ?>">
                <span class="astrisx">*</span>


            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email"
                    value="<?php if (isset($email)) echo $email ?>">
            </div>
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" class="form-control" name="mobile" placeholder="Mobile Number"
                    value="<?php if (isset($mobile)) echo $mobile ?>">


            </div>
            <div class="form-group">
                <label>Example textarea</label>
                <textarea class="form-control" name="message" placeholder="type your message" rows="3"> <?php if (isset($msg)) echo $msg ?>
                </textarea>


            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
        <!--------- end form ------>
    </div>


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>