<?php

    include "../../controller/koneksi.php";

    $id = $_GET['id'];

    if(hapusTagihan($id) > 0) {
        echo "
        <script>
            alert('Success Delete Data');
            document.location.href = 'tagihan.php';
        </script>
        ";
    }
    else{
        echo "
        <script>
            alert('Failed Delete Data');
            document.location.href = 'tagihan.php';
        </script>
        ";
    }




?>