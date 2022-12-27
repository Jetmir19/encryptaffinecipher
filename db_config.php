<?php
// https://b8b1-92-55-126-19.ngrok.io/encryptaffinecipher/
$link = mysqli_connect("localhost", "root", "", "encryptim");
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
