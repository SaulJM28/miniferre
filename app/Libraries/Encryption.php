<?php

namespace App\Libraries;

class Encryption{

    public function encrypt_var($toEncrypt) {
        $data = base64_encode($toEncrypt);
        $data = urlencode($data);
        if(!empty($data)){
            return $data;
        }
    return null;

    }

    public function decrypt_var($toDecrypt){
        $data = urldecode($toDecrypt);
        $data = base64_decode($data);
        if(!empty($data)){
            return $data;
        }
        return null;
    }

}