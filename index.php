<?php
/**
 * PHP Version 5
 * Application Router
 *
 * @category Router
 * @package  Router
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @author   Luis Fernando Gomez Figueroa <lgomezf16@gmail.com>
 * @license  Comercial http://
 *
 * @version 1.0.0
 *
 * @link http://url.com
 */
session_start();

require_once "libs/utilities.php";

$pageRequest = "index"; //*Pagina de Inicio de la perfumeria

if (isset($_GET["page"])) {
    $pageRequest = $_GET["page"];
}

//Incorporando los midlewares son codigos que se deben ejecutar
//Siempre
require_once "controllers/mw/verificar.mw.php";
require_once "controllers/mw/site.mw.php";
require_once "controllers/infinito/mw/cart.mw.php"; //Para el contador del carrito y pasar de anonima a autenticada

// aqui no se toca jajaja la funcion de este index es
// llamar al controlador adecuado para manejar el
// index.php?page=modulo

    //Este switch se encarga de todo el enrutamiento público
switch ($pageRequest) {
    //Accesos Publicos
case "home":
    //llamar al controlador
    include_once "controllers/home.control.php";
    die();

case "login":
    include_once "controllers/security/login.control.php";
    die();

case "logout":
    include_once "controllers/security/logout.control.php";
    die();

 //*En la carpeta security para el registro de usuarios
 case "register":
    include_once "controllers/security/register.control.php";
    die();


// Desde aqui son los de la panaderia
case "index":
    include_once "controllers/panaderia/index.control.php";
    die();
case "reposteria":
    include_once "controllers/panaderia/reposteria.control.php";
    die();
case "panaderia":
    include_once "controllers/panaderia/panaderia.control.php";
    die();


  /************* CARRETILLA DE COMPRA ***********/
  case "addToCart":
    include_once "controllers/infinito/addToCart.control.php";
   die();

   case "rmvToCart":
    include_once "controllers/infinito/rmvToCart.control.php";
   die();

   case "rmvAllCart":
    include_once "controllers/infinito/rmvAllCart.control.php";
   die();

   case "cartAnon":
    include_once "controllers/infinito/cartAnon.control.php";
   die();
}

//Este switch se encarga de todo el enrutamiento que ocupa login
$logged = mw_estaLogueado();
if ($logged) {
    addToContext("layoutFile", "verified_layout");
    include_once 'controllers/mw/autorizar.mw.php';
    if (!isAuthorized($pageRequest, $_SESSION["userCode"])) {
        include_once"controllers/notauth.control.php";
        die();
    }
    generarMenu($_SESSION["userCode"]);
}

require_once "controllers/mw/support.mw.php";
switch ($pageRequest) {
case "dashboard":
    ($logged)?
      include_once "controllers/dashboard.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "users":
    ($logged)?
      include_once "controllers/security/users.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "user":
    ($logged)?
      include_once "controllers/security/user.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "roles":
    ($logged)?
      include_once "controllers/security/roles.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "rol":
    ($logged)?
      include_once "controllers/security/rol.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "programas":
    ($logged)?
      include_once "controllers/security/programas.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "programa":
    ($logged)?
      include_once "controllers/security/programa.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();

 //*Seguridad
 case "security":
    ($logged)?
      include_once "controllers/security/security.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
 die();

 //*Mantenimientos
 case "parametros":
    ($logged)?
      include_once "controllers/mantenimientos/mantenimientos.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
 die();

 //*Productos
 case "productos":
      ($logged)?
      include_once "controllers/mantenimientos/productos.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
 die();

  case "producto":
      ($logged)?
      include_once "controllers/mantenimientos/producto.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
 die();

  case "productoimg":
      ($logged)?
      include_once "controllers/mantenimientos/productoimg.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
 die();

 //*Carretilla
  case "cartAut":
    include_once "controllers/infinito/cartAut.control.php";
  die();

 //*Checkout
 case "checkout":
    ($logged)?
    include_once "controllers/infinito/paypal/checkout.control.php":
    mw_redirectToLogin($_SERVER["QUERY_STRING"]); 
  die();

 case "checkoutappr":
    ($logged)?
    include_once "controllers/infinito/paypal/checkoutapproved.control.php":
    mw_redirectToLogin($_SERVER["QUERY_STRING"]);
  die();  

 case "checkoutcancel":
    ($logged)?
    include_once "controllers/infinito/paypal/checkoutcancel.control.php":
    mw_redirectToLogin($_SERVER["QUERY_STRING"]);
  die();

  //*favorito
  case "favorito":
    ($logged)?
        include_once "controllers/infinito/favorito.control.php":
        mw_redirectToLogin($_SERVER["QUERY_STRING"]);
  die();

  //*Historial de Transacciones
  case "historial":
    ($logged)?
        include_once "controllers/infinito/paypal/historial.control.php":
        mw_redirectToLogin($_SERVER["QUERY_STRING"]);
  die();

}

addToContext("pageRequest", $pageRequest);
require_once "controllers/error.control.php";
