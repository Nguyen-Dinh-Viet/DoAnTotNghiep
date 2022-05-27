<?php 
 $id_ship=(int)$_GET['idShip'];
$id_holder=(int)$_GET['idHolder'];
 delete_shareholder($id_ship,$id_holder);
 redirect("?mod=ship&action=changeShip&id={$id_ship}");
?>