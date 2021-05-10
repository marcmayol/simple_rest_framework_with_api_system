<?php
function clean($data)
{
    return trim(htmlspecialchars($data, ENT_COMPAT, 'UTF-8'));
}

function cleanUrl($url)
{
    return str_replace(['%20', ' '], '-', $url);
}

function obtenerPorcentaje($cantidad, $total)
{
    $porcentaje = ((float)$cantidad * 100) / $total;
    $porcentaje = round($porcentaje, 2);
    return $porcentaje;
}

function getMonth($i)
{
    $mes = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
    return $mes[$i];
}
function paramizaiter()
{
    $x = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $x = ltrim($x, '/');
    $params = explode('/', $x);
    return $params;
}