<?php
$config = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 4096,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);
   
// Create the private and public key
$res = openssl_pkey_new($config);

// Extract the private key from $res to $privKey
openssl_pkey_export($res, $privKey);


// Extract the public key from $res to $pubKey
$pubKey = openssl_pkey_get_details($res);
$pubKey = $pubKey["key"];
echo $pubKey;
echo "&&&&&&&&&";
echo $privKey;

/data = 'Raouf';

// Encrypt the data to $encrypted using the public key
openssl_public_encrypt($data, $encrypted, $pubKey);
//echo "*****************************".$encrypted ;
// Decrypt the data using the private key and store the results in $decrypted
openssl_private_decrypt($encrypted, $decrypted, $privKey);

echo $decrypted;


/*$private_key = openssl_pkey_new();
$public_key_pem = openssl_pkey_get_details($private_key)['key'];
echo $public_key_pem;
$public_key = openssl_pkey_get_public($public_key_pem);
var_dump($public_key);*/

?>