<?php

require_once "db.php";

class Add extends DB {
   public function addUser($name, $email, $phone, $location, $password, $rank) {
        $password = md5($password);

        $sql = "INSERT INTO users SET name= :name, password= :password, location= :location, phone= :phone, email= :email, rank= :rank";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':rank', $rank);

        if($stmt->execute()) {
            header("Location: dashbord.php?message=regok");
        } else {
            header("Location: dashbord.php?message=regerror");
        }
   }

}




?>