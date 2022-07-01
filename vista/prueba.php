<?php
$contra = password_hash('1234',PASSWORD_DEFAULT,['cost'=>10]);
echo $contra;
?>