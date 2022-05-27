<?php 
 $id=(int)$_GET['id'];

 delete_bank($id);
 redirect("?mod=bank&action=listBank");
?>