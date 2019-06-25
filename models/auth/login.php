<?php
    session_start();
        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
         // Load Composer's autoloader
        
    require_once "../../config/connection.php";
    require_once "auth_functions.php";
    require '../../vendor/autoload.php';

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = findUser($email,$password);
        if($user)
        {
            
            $_SESSION['user'] = $user;
            $id_user = $_SESSION['user']->id;
            userLogged($id_user);
            header('Location:../../index.php');
        }
        else
        {
            echo "not successfull";
            
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sajtzaphp1@gmail.com';                 // SMTP username
                $mail->Password = 'sajtzaphp1!';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
                $mail->SMTPOptions =array(
                    "ssl"=>array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false,
                        "allow_self_signed"=>true
                    )
                );
                //Recipients
                $mail->setFrom('sajtzaphp1@gmail.com', 'Login not successfull');
                $mail->addAddress($email,'User');     // Add a recipient
               
               
                
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'You log-in request was not successfull';
                $mail->Body    = 'Please try again to login';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                echo 'Message has been sent';
                header("Location:../../index.php");
            } 
            catch (Exception $e) 
            {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
    
        }
    }
    
?>