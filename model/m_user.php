<?php 
include ('database.php');

class M_user extends database
{
	function DangnhapAdmin($tendangnhap, $email, $matkhau)
   {
   		$sql = "SELECT * FROM admin WHERE username= '$tendangnhap' and email='$email' and password = '$matkhau'";
   		$this->setQuery($sql);
   		return $this->loadRow(array($username,$email,$password));
   }
   function dangkiAdmin($username, $password, $name,$sdt, $email)
   {
         $sql = "INSERT INTO admin(username,password,name,SDT,email) VALUES(?,?,?,?,?)";
         $this->setQuery($sql);
         $result = $this->execute(array($username,$password,$name,$sdt,$email));
         if ($result) {
            return $this->getLastId();
         }
         else{
            return false;
         }
   }

  
   
}