<?php 
require_once "db.php";

class GetData extends Db {
    public function getAllUsers() {
        $sql = "SELECT* FROM users";
		$data = array();
		
		$result = $this->connect()->query($sql);
		
		if($result->rowCount()>0) {
			
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $item = array(
                    'id'=>$id,
                    'name'=>$name,
                    'password'=>$password,
                    'location'=>$location,
                    'phone'=>$phone,
                    'email'=>$email,
                    'rank'=>$rank
                );

                array_push($data, $item);
            }
		}
        
		return $data;

    }
}


?>