<?php 
 $id=(int)$_GET['id'];
 
 delete_account_ledger($id);
 redirect("?mod=ledgers&action=shipLedgers");
?>