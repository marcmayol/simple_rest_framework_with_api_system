<?php


namespace MVC;

class View
{
    function __construct()
    {
    }

    public function show($name, $vars = array())
    {
        $path = SCRIPT . 'Application/Views/' . strtolower($name) . '.php';

        //Si no existe el fichero en cuestion, mostramos un 404
        if (file_exists($path) == false) {
            trigger_error('Template `' . $path . '` does not exist.', E_USER_NOTICE);
            echo 'no funciona ' . $path;
            return false;
        }
        //Si hay variables para asignar, las pasamos una a una.
        if (is_array($vars)) {
            foreach ($vars as $key => $value) {
                ${$key} = $value;
            }
        }

        //Finalmente, incluimos la plantilla.

        require_once VIEWS . '/includes/header.php';
        require_once $path;
        require_once VIEWS . '/includes/footer.php';
    }

}