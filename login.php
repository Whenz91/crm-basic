<?php
require_once "db.php";

class Login extends DB {
    
    /**
     * Belépési adatok ellenőrzése az admin felületre
     */
    public function loginCheck($userEmail, $userPassword) {
        //$userPassword = md5($userPassword);

        if(empty($userEmail) || empty($userPassword)) {
            header("Location: index.php?error=emptyfields");
            exit();
        } else if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            header("Location: index.php?error=wrongemail");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE email= :email";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':email', $userEmail);

            $stmt->execute();
        
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
            if(!empty($result)) {
                if($result['password'] == $userPassword) {
                    session_start();
                    $_SESSION["userId"] = $result["id"];
                    $_SESSION["userName"] = $result["name"];
                    $_SESSION["userRank"] = $result["rank"];

                    $log = date("Y-m-d H:i:s")." Sikeres belépés a(z) {$userEmail} címről ({$_SERVER['REMOTE_ADDR']})\n";
                    file_put_contents("log.txt", $log, FILE_APPEND);

                    header("Location: dashbord.php");
                    exit();
                } else {
                    $log = date("Y-m-d H:i:s")." Sikertelen belépés a(z) {$userEmail} címről ({$_SERVER['REMOTE_ADDR']})\n";
                    file_put_contents("log.txt", $log, FILE_APPEND);

                    header("Location: index.php?error=wrongpwd");
                    exit();
                }
            } else {
                $log = date("Y-m-d H:i:s")." Sikertelen belépés a(z) {$userEmail} címről ({$_SERVER['REMOTE_ADDR']})\n";
                file_put_contents("log.txt", $log, FILE_APPEND);

                header("Location: index.php?error=nouser");
                exit();   
            }
            
        }
    }

}


?>