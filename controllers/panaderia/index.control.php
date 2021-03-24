<?php
/**
 * Controlador de pagina principal
 * 
 * @return void
 */

 function run()
 {
     $arrViewData = array();
     $arrViewData['page_title'] = 'Inicio';
     addJsRef('public/js/mainindex.js');

     //Añadir linea debajo de la pestaña que esta seleccionada en el menu 
     addToContext("index","active");
     addToContext("reposteria","");
     addToContext("panaderia","");
     addToContext("home","");
     addToContext("login","");
     addToContext("register","");
     addToContext("cart","");

     renderizar("panaderia/index",$arrViewData);
 }

 run();
?>