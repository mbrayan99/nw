<?php

/**
 * Libreria de PayPal 
 */

//En modelos se llama este archivo, y este conecta con vendor donde esta la API
require_once "vendor/autoload.php";

/*die("<h1>Revisar el archivo libs/paypal.php</h1> 
       <h1>Comentar o eliminar lineas 10-12 despues de agregar las credenciales de sandbox de la cuenta de developer.paypal.com</h1>
       <h2><a href=\"index.php?page=dashboard\">Regresar</a></h2>");*/

/**
 * Retorna el API Context de Paypal
 * 
 * @return void
 */

 function getApiContext()
 {
    //// SI DESEAN HACER PRUEBAS AGREGAR SUS PROPIAS CREDENCIALES. EN SU CUENTA, EN ACCOUNTS, ESTAN LAS CUENTAS PARA HACER PRUEBAS

     $apiContext = new \PayPal\Rest\ApiContext(
         new \PayPal\Auth\OAuthTokenCredential(
             'AU2M5E3wyyOE4Y-uRFnGDtkU1z3HrtvHd7mbkrAdDBHwhObXOL3DnfMcDQzLJWUtolkUNaSxQuaoAuCp', //ClientID
             'EBAAfyupDoewbOEgaGbtf1cFM8aVhuw3WiftUtcACwwjGLFPN_7wFpksxqIbRNSKYTouK9AH9jkJYMC0'  //ClientSecret
         )
     ); 

     return $apiContext;
 }

?>