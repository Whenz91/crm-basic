<?php

function login($user, $email, $password) {
    
    // validate post data
    if(empty($email) || empty($password)) {
        header("Location: index.php?error=emptyfields");
        exit();
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=wrongemail");
        exit();
    } else {
        // sanitize email
        $email = htmlspecialchars(strip_tags($email));

        $user->login($email);

        $password = md5($password);
        
        if($user->name != null) {
            if($user->password == $password) {
                session_start();
                $_SESSION["userId"] = $user->id;
                $_SESSION["userName"] = $user->name;
                $_SESSION["userRank"] = $user->rank;

                $log = date("Y-m-d H:i:s")." Sikeres belépés a(z) {$email} címről ({$_SERVER['REMOTE_ADDR']})\n";
                file_put_contents("log.txt", $log, FILE_APPEND);

                header("Location: dashbord.php");
                exit();
            } else {
                $log = date("Y-m-d H:i:s")." Sikertelen belépés a(z) {$email} címről ({$_SERVER['REMOTE_ADDR']})\n";
                file_put_contents("log.txt", $log, FILE_APPEND);

                header("Location: index.php?error=wrongpwd");
                exit();
            }
        } else {
            $log = date("Y-m-d H:i:s")." Sikertelen belépés a(z) {$email} címről ({$_SERVER['REMOTE_ADDR']})\n";
            file_put_contents("log.txt", $log, FILE_APPEND);

            header("Location: index.php?error=nouser");
            exit();   
        }
    }
}

?>