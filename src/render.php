<?php
//funcion que le pasas un string y un arrray y lo pasa a string
function render(string $template,array $data=[]):string{
    //compruba si existe y si existe extrae los datos de la array con el extract en datos individuals
    if($data){
        extract($data,EXTR_OVERWRITE);
    }
    //inicializar buffer de salida
    ob_start();
    require 'src/views/'.$template.'.tpl.php';
    $rendered=ob_get_clean();
    return (string)$rendered;
}