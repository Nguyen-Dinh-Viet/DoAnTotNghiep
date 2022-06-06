<?php
$id = (int)$_GET['id'];
delete_client($id);
redirect("?mod=client&action=listClient");