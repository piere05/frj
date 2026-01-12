<?

function password_pro($password,$type){
    $ency_type="AES-256-CBC";
    $secret_key="whatiswrong";
    $key = hash('sha256', $secret_key, true);
    $iv_val = substr(hash('sha256', $secret_key), 0, 16);

    if($type=="encrypt"){
        return base64_encode(openssl_encrypt($password, $ency_type, $key, OPENSSL_RAW_DATA, $iv_val));
    }elseif($type=="decrypt"){
        return openssl_decrypt(base64_decode($password), $ency_type, $key, OPENSSL_RAW_DATA, $iv_val);
    }

    return false;
}

?>