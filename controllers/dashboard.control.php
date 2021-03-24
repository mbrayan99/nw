<?php

/**
 * Controlador de Dashboard - Catalogo 
 * 
 * @return void
 */

require_once "models/mantenimientos/productos.model.php";

function run()
{
    $arrDataView = array();

    //Tomar productos de cada categoria
    $arrDataView["panaderia"] = categoriaCatalogo("P");
    $arrDataView["reposteria"] = categoriaCatalogo("R");
    

    //Añadir linea debajo de la pestaña que esta seleccionada en el menu
    addToContext("index","");
    addToContext("reposteria","");
    addToContext("panaderia","");
    addToContext("home","active");
    addToContext("login","");
    addToContext("register","");
    addToContext("cart","");

    renderizar("dashboard", $arrDataView); 
}

run();

?>
