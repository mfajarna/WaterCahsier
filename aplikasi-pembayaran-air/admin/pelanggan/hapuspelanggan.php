<?php

    include "../../controller/koneksi.php";

    $id = $_GET['id'];

    if(hapusPelanggan($id) > 0) {
        echo "
        <script>
            alert('Success Delete Data');
            document.location.href = 'pelanggan.php';
        </script>
        ";
    }
    else{
        echo "
        <script>
            alert('Failed Delete Data');
            document.location.href = 'pelanggan.php';
        </script>
        ";
    }




?>