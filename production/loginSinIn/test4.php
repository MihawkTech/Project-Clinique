<?php
    $private = file_get_contents("../PRIVATE KEY.txt");
    $pubKey = file_get_contents("../PUBLIC KEY.txt");
echo $private;
echo"+++++++++++++++";
echo $pubKey;

            // Encrypt the data to $encrypted using the public key
           // openssl_public_encrypt($_POST['email'], $email, $pubKey);

?>