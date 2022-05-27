<?php 
 $id=(int)$_GET['id'];
$account_id=(int)$_GET['account_id'];
 delete_account_ledger($id);
 redirect("?mod=ledgers&action=accountLedgers&id={$account_id}");
?>