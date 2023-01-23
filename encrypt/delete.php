<?php

// Attempt delete query execution
if (isset($_GET['delete'])) {
    # code...


    $sqli = "DELETE  FROM encryptim
 INNER JOIN encrypt_details ON encryptim.id=encrypt_details.encryptim_ID
 WHERE encryptim.id=$id
 ";
    echo $id;
    if (mysqli_query($link, $sql)) {

        header('Location: ../index.php?page=encrypt/index');

        $_SESSION['message'] = " U fshi me sukses ";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
// Close connection
mysqli_close($link);
