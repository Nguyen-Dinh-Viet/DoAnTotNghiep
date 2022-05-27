<?php 
 $id=(int)$_GET['id'];

 delete_account($id);
 redirect("?mod=account&action=listAccount");
?>