<?php
include ('database.php');
class M_card extends database{
   // CARD
	function Taothe($code_card, $status)
   {
      $sql = "INSERT INTO `borrow_card`( `code_card`, `money_in_card`, `tien_muon`, `status`, `id_type_cards`, `id_customer`) VALUES (?,0,0,?,0,0)";
      $this->setQuery($sql);
      $result = $this->execute(array($code_card, $status));
      if ($result) {
         return $this->getLastId();
      }
      else{
         return false;
      }
   }

   

   function get_the(){
      $sql="SELECT * from borrow_card";
      $this->setQuery($sql);
      return $this->loadAllRows();
   }

   // khi khach hang dang ki
   function update_card($id,$tien_muon,$status,$id_type_cards,$id_customer){
      $sql = "UPDATE `borrow_card` SET `tien_muon`=$tien_muon,`status`=$status,`id_type_cards`=$id_type_cards,`id_customer`=$id_customer 
              WHERE id =$id";
      $this->setQuery($sql);
      return $this->loadRow();
   }

   function delete_card($id){
      $sql="DELETE from borrow_card where id = $id";
      $this->setQuery($sql);
      return $this->loadRow();
   }
   // END CARD
   // 
   // 
   // 
   // 
   // CUSTOMERS
   function get_customer(){
      $sql="SELECT * from customers";
      $this->setQuery($sql);
      return $this->loadAllRows();
   }

   function DK_customers($CMND,$name,$address,$SDT,$sex,$DOB,$id_type_card){
      $sql = "INSERT INTO customers(CMND,name,address,SDT,sex,DOB,id_type_card) VALUES(?,?,?,?,?,?,?)";  
      $this->setQuery($sql);
      $result = $this->execute(array($CMND,$name,$address,$SDT,$sex,$DOB,$id_type_card));
      if ($result) {
         return $this->getLastId();
      }
      else{
         return false;
      }
      
   }
   //END CUSTOMERS
   //
   //Bank card
   function check_bankcard($code_bank,$bank_name,$cmnd){
      $sql = "SELECT count(*) from bank_card,customers
               WHERE bank_card.CMND_customer = $cmnd and bank_card.bank_name = $bank_name and (bank_card.money_in_bankcard > 1000000) and bank_card.code_bank=$code_bank";
      $this->setQuery($sql);
      return $this->loadRow();
   }
   //end Bankcard
   //
   //Nạp tiền TRả trước
   
   function naptien($id,$money_in_card,$id_customer){
      $sql = "UPDATE `borrow_card` SET `money_in_card`= $money_in_card
              WHERE id =$id and id_customer=$id_customer";
      $this->setQuery($sql);
      return $this->loadRow();
   }

   //end nạp
}
?>
