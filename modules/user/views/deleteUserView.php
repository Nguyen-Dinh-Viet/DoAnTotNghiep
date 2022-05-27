<?php 
 $id=(int)$_GET['id'];

 delete_user($id);
 redirect("?mod=home&action=index");
?>