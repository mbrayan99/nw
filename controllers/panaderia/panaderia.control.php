<?php

/**
 * Controlador Pagina panaderia
 * 
 * @return void
 */

 function run()
 {
    $arrViewData = array();

    $arrViewData['page_title'] = "Panaderia";
    addJsRef("public/js/main.js");
    addJsRef('public/js/mainindex.js');

    //Añadir linea debajo de la pestaña que esta seleccionada en el menu
    addToContext("index","");
    addToContext("reposteria","");
    addToContext("panaderia","active");
    addToContext("home","");
    addToContext("login","");
    addToContext("register","");

    renderizar("panaderia/panaderia", $arrViewData); 
 }  

 run();

?>