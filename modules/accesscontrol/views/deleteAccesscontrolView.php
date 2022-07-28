<?php
$id = (int)$_GET['id'];
delete_accesscontrol($id);
redirect("?mod=accesscontrol&action=listAccesscontrol");