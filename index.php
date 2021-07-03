<?php

/**
 * Representa la pagina de home del sitio
 *
 * @param array $data
 */
function show_page(string $path)
{   
    $tile = 'Cannamed-'. ucfirst($path);
    $page = file_get_contents('templates/header.html');
    $page .= file_get_contents('templates/menu.html');
    $page .= file_get_contents('templates/' . $path . '.html');
    $page .= file_get_contents('templates/foter.html');
    $page = str_replace('{{ title }}', $tile, $page);
    $page = str_replace('{{ ' . $path . ' }}', 'active', $page);
    print($page);
}

function p404()
{
    $page = file_get_contents('templates/header.html');
    $page .= file_get_contents('templates/menu.html');
    $page .= file_get_contents('templates/404.html');
    $page .= file_get_contents('templates/foter.html');
    return $page;
}

$path = 'home';

if ($_GET) {
    $path = (isset($_GET['path'])) ? $_GET['path'] : 'home';
}

show_page($path);
