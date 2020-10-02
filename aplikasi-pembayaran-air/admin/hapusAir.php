<?php

    include "../controller/koneksi.php";

    $id = $_GET['id'];

    if(hapusAir($id) > 0) {
        echo "
        <script>
            alert('Success Delete Data');
            document.location.href = 'tarifAir.php';
        </script>
        ";
    }
    else{
        echo "
        <script>
            alert('Failed Delete Data');
            document.location.href = 'tarifAir.php';
        </script>
        ";
    }




?>