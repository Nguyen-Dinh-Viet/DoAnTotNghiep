<?php 
 $id=(int)$_GET['id'];

 delete_currency($id);
 redirect("?mod=currency&action=listCurrency");
?>