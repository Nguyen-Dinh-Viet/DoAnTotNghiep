<?php 
 $id=(int)$_GET['id'];

 delete_category($id);
 redirect("?mod=category&action=listCategory");
?>