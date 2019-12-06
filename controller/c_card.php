<?php
include ('model/m_card.php');
include ('model/phantrang.php');
class C_card{
	//CARD
	function Taothemuon($code_card, $status){
 		$m_card = new M_card();
 		$i_card = $m_card->Taothe($code_card, $status);
 		// print_r($i_card);exit;
 		if ($i_card>0) {
 			echo "<script>alert(' Tạo thẻ thành công, tiếp tục !');location.href='Card.php'</script>";
 			$_SESSION['success'] = "Tạo thẻ thành công";
 			if (isset($_SESSION['error'])) {
 				unset($_SESSION['error']);
 			}
 		}
 		else {
 			// print_r($card);exit;
 			$_SESSION['error'] = "Tạo thẻ không thành công";
 			header('location:Taothe.php');
 		}			
 	}
 
 	function get_themuon(){
 		$m_card = new M_card();
		$card = $m_card->get_the();
		return array('card'=>$card);
 	}
 	function delete_themuon(){
 		$id_Card = $_GET['id_Card'];
		$m_card = new M_card();
		$delete_card = $m_card->delete_card($id_Card);
		echo "<script>alert(' Xóa thẻ thành công, tiếp tục !');location.href='Card.php'</script>";
		$_SESSION['success'] = "Xóa thẻ thành công";
		if (isset($_SESSION['error'])) {
			unset($_SESSION['error']);
		}

		
 	}
 	// 
 	// update lại card khi có người đăng kí
 	function update_themuonkhiDK($id,$tien_muon,$status,$id_type_cards,$id_customer){
		$m_card = new M_card();
		$update_card = $m_card->update_card($id,$tien_muon,$status,$id_type_cards,$id_customer);
		// print_r($update_card);exit;
		echo "<script>alert(' Đăng kí thẻ thành công, tiếp tục !');location.href='Customer.php'</script>";
		$_SESSION['success'] = "Đăng kí thẻ thành công";
		if (isset($_SESSION['error'])) {
			unset($_SESSION['error']);
		}
 	}
 	//END CARD
 	//
 	//CUSTOMERS
 	function get_Allcustomers(){
 		$m_card = new M_card();
		$customers = $m_card->get_customer();
		return array('customers'=>$customers);
 	}

 	function set_customer($CMND,$name,$address,$SDT,$sex,$DOB,$id_type_card){
 		$m_card = new M_card();
 		$id_user = $m_card->DK_customers($CMND,$name,$address,$SDT,$sex,$DOB,$id_type_card);
 		if ($id_user > 0) {
 			// print_r($id_type_card);exit;
 			if ($id_type_card == 1){
 				echo "<script>alert(' Điền thông tin thành công, tiếp tục !');location.href='Customer_FormTratruoc.php'</script>";
 			}
 			else if ($id_type_card == 2) {
 				echo "<script>alert(' Điền thông tin thành công, tiếp tục !');location.href='Customer_FormTrasau.php'</script>";
 			}
			$_SESSION['success'] = "Điền thông tin thành công";
			if (isset($_SESSION['error'])) {
				unset($_SESSION['error']);
			}
 		}
 		else {
 			$_SESSION['error'] = "Điền thông tin không thành công";
 			header('location:Customer_Dangki.php');
 		}
 	}

 	
 	//END CUSTOMERS
 	//
 	//Bank card
 	//
 	function check_bank($code_bank,$bank_name,$cmnd){
 		$m_card = new M_card();
 		$check = $m_card->check_bankcard($code_bank,$bank_name,$cmnd);
 		// print_r($check);exit;
 		// if ($check != 0) {
 			echo "<script>alert(' Điền thông tin thành công, tiếp tục !');location.href='Customer_FormTratruoc.php'</script>";
			$_SESSION['success'] = "Điền thông tin thành công";
			if (isset($_SESSION['error'])) {
				unset($_SESSION['error']);
			}
 		// }
 		// else {
 		// 	$_SESSION['error'] = "Điền thông tin không thành công";
 		// 	header('location:Customer_FormTrasau.php');
 		// }
 	}

 	//end bank card
 	//
 	//Nạp tiền
 	
 	function naptienchothe($id,$money_in_card,$id_customer){
		$m_card = new M_card();
		$naptien = $m_card->naptien($id,$money_in_card,$id_customer);
		// print_r($update_card);exit;
		echo "<script>alert(' Nạp tiền thành công, tiếp tục !');location.href='Card.php'</script>";
		$_SESSION['success'] = "Nạp tiền thành công";
		if (isset($_SESSION['error'])) {
			unset($_SESSION['error']);
		}
 	}

 	//end nạp
}
?>