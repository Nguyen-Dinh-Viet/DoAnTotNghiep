<?php 
 $id=(int)$_GET['id'];

 delete_ship($id);
 redirect("?mod=ship&action=listShip");
?>