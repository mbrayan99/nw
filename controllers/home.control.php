<?php

/**
 * Controlador de Home - Catalogo de panaderia
 * 
 * @return void
 */

require_once "models/mantenimientos/productos.model.php";

function run()
{
    $arrDataView = array();

    $arrDataView['page_title'] = "Catálogo";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

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

    renderizar("home", $arrDataView); 
}

run();

?>
