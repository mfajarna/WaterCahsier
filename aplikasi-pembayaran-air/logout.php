<?php

session_start();
session_destroy();
echo "<script> alert('Terima kasih, Anda Berhasil Logout');
document.location.href = 'login.php';
</script>";

?>