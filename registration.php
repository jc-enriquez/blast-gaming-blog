<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  require "sendmail.php"; ?>

<?php

if(isset($_POST['register'])) {
    
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password'];
    $verification_code = uniqid();
    
    if($user_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); location.href='registration.php';</script>";
    }
    
    else {
        
        $mail->SetFrom($gmailUsername,"Blast Admin");//Name of Sender: the "FEU-IT Admin" could be change and replace as the name of the sender
        $mail->Subject = "Please verify your account!"; //Email Subject: to get the subject from the form
        $mail->Body = "<h1>Welcome to Blast!</h1>
                        <h3>Please click the link below to activate your account:<br/>
                            <a href='http://localhost/cms/activateuser.php?verification_code=$verification_code'>ACTIVATE ACCOUNT</a> 
                        </h3>";
                        //Content of Message : to get the content or body of the email from form

        $mail->AddAddress($user_email);//Recepient of email: to send whatever email you want to
        
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            
        } else {
            
            $query = "INSERT INTO users(username, user_email, user_password, verification_code) ";
            $query .="VALUES('{$username}', '{$user_email}', '{$user_password}', '{$verification_code}') ";
            
            $register_account_query = mysqli_query($connection, $query);
            
            if(!$register_account_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }            
        }
    } 
}
?>


<!-- Navigation -->
    
<?php  include "includes/navigation.php"; ?>
    
 
<!-- Page Content -->
<div class="container">
    
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                    <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username">
                            </div>
                             <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="user_email" id="email" class="form-control" placeholder="Enter your email">
                            </div>
                             <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="user_password" id="key" class="form-control" placeholder="Password">
                            </div>
                            
                            <div class="form-group">
                                <label for="password" class="sr-only">Confirm Password</label>
                                <input type="password" name="confirm_password" id="key" class="form-control" placeholder="Confirm Password">
                            </div>

                            <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Click to Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


        <hr>



<?php include "includes/footer.php";?>
