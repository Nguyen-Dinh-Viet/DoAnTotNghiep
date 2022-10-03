<?php
$id = (int)$_GET['id'];
delete_card($id);
redirect("?mod=cardrfid&action=listCardRFID");