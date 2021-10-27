<?php

include("conexion4.php");
$query4="SELECT*FROM  usuario WHERE id_usuario=68";
$resultado4=$conexion->query($query4);
while($row4=$resultado4->fetch_assoc()){

$id=$row4['contraseña'];


  }
//Configuración del algoritmo de encriptación

//Debes cambiar esta cadena, debe ser larga y unica
//nadie mas debe conocerla
$clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion';

//Metodo de encriptación
$method = 'aes-256-cbc';
  $desencriptar = function ($valor) use ($method, $clave, $id) {
      $encrypted_data = base64_decode($valor);
      return openssl_decrypt($valor, $method, $clave, false, $id);
  };
 
  /*
  Genera un valor para IV
  */
  $getIV = function () use ($method) {
      return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
  };  