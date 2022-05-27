<?php 
 $id=(int)$_GET['id'];

 delete_manage_ship($id);
 redirect("?mod=ship&action=manageShip");
?>