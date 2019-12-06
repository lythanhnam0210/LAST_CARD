<?php
session_start();
include ('model/m_user.php');
class C_user{

	function dangkiTKAdmin($username, $password, $name,$sdt, $email){
 		$m_user = new M_user();
 		$id_user = $m_user->dangkiAdmin($username, $password, $name,$sdt, $email);
 		if ($id_user>0) {
 			echo "<script>alert(' Đăng kí thành công !');location.href='Admin_login.php'</script>";
 			$_SESSION['success'] = "Đăng kí thành công";
 			if (isset($_SESSION['error'])) {
 				unset($_SESSION['error']);
 			}
 		}
 		else {
 			$_SESSION['error'] = "Đăng kí không thành công";
 			header('location:Admin_register.php');
 		}
 	}
	public function LoginAdmin($tendangnhap,$email, $matkhau){
 		$m_user = new M_user();
 		$admin = $m_user->DangnhapAdmin($tendangnhap,$email, $matkhau);
 		if($admin == true){
 			echo "<script>alert(' Đăng nhập thành công !');location.href='Index.php'</script>";
 			$_SESSION['user_name'] = $admin->name;
 			$_SESSION['id_user']=$admin->id;
 			if (isset($_SESSION['user_error'])) {
 				unset($_SESSION['user_error']);
 			}
 			if(isset($_SESSION['chua_dang_nhap'])){
 				unset($_SESSION['chua_dang_nhap']);
 			}
 		}
 		else{
 			$_SESSION['user_error'] = "Đăng nhập không thành công";
 			header('location:Admin_login.php');
 		}

 	}

 	function dangxuatAdmin(){
 		session_destroy();
 		header('location:Admin_login.php');
 	}
 	
}
?>