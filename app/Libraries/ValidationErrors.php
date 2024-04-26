<?php

/* libreria para personalizar los mensajes de error */

namespace App\Libraries;

class ValidationErrors
{
    public function customErrors()
    {
        $errors = [
            "required" => "El campo {field} es requerido",
            
        ];
        return $errors;
    }
}



?>