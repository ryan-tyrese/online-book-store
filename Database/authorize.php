<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();

        if(isset($_POST['email']) &&
            isset($_POST['password'])){
                include "../dbh.inc.php";
                include "validate.php";

                $email = $_POST['email'];
                $password = $_POST['password'];

                # Validation form
                #Email validation
                $text = "Email";
                $file_location = "../LogIn.php";
                $message = "error";
                no_entry($email, $text, $location, $ms, "");

                #Password validation
                $text = "Password";
	            $file_location = "../LogIn.php";
	            $message = "error";
                no_entry($password, $text, $location, $ms, "");

                #Searching for existing emails
                $sql = "SELECT * FROM admin 
                WHERE email=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$email]);

                #IF email exist then we run this
                if ($stmt->rowCount() === 1) {
                    $user = $stmt->fetch();
            
                    $user_id = $user['id'];
                    $user_email = $user['email'];
                    $user_password = $user['password'];
                    if ($email === $user_email) {
                        if (password_verify($password, $user_password)) {
                            $_SESSION['user_id'] = $user_id;
                            $_SESSION['user_email'] = $user_email;
                            header("Location: ../admin.php");
                        }else {
                            # Error message
                            $err_message = "Incorrect User name or password";
                            header("Location: ../LogIn.php?error=$err_message");
                        }
                    }else {
                        # Error message
                        $err_message = "Incorrect User name or password";
                        header("Location: ../LogIn.php?error=$err_message");
                    }
                }else{
                    # Error message
                    $err_message = "Incorrect User name or password";
                    header("Location: ../LogIn.php?error=$err_message");
                }
            
            }else {
                # Redirect to "../LogIn.php"
                header("Location: ../LogIn.php");
            }
    ?>
</body>
</html>