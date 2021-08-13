<?php


require_once 'model.php';

function getTable(){
    $myDb = new Model();
    $data = $myDb->getUsers();

    $template = ('
    <div class="container">
    <div class="row">
    <div class="column text-center">
    <br/>
    <br/>
    <br/>
    <br/>
    <h4 class="text-primary shadow">Listado de usuarios registrados en Cannamed</h4>
    </div>
    </div>
    <div class="row">
    <div class="column">
        <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>TIPO</th>
            <th>EMAIL</th>
            <th>PADECIMIENTO</th>
            <th>MENSAJE</th>
            <th>FECHA</th>
        </tr>
        </thead>
    <tbody>
    ');

    $idx = 1;
    foreach($data as $item){
        $template.= ('<tr>');
        $template.= ('<td>' . $idx  .'</td>');
        $template.= ('<td>' . $item['first_name']  .'</td>');
        $template.= ('<td>' . $item['last_name']  .'</td>');
        $template.= ('<td>' . $item['type']  .'</td>');
        $template.= ('<td>' . $item['email']  .'</td>');
        $template.= ('<td>' . $item['suffering']  .'</td>');
        $template.= ('<td>' . $item['message']  .'</td>');
        $template.= ('<td>' . $item['create_date']  .'</td>');
        $template.= ('</tr>');
        $idx++;
    }
    $template.=('
    </tbody></table>
    </div>
    </div>
    </div>
    ');

return $template;

}

$tile = 'Cannamed-Admin';
$page = file_get_contents('templates/header.html');
$page .= file_get_contents('templates/menu.html');
$pass = null;
if ($_GET){
    $pass = $_GET['pass'];
    if ($pass == 'equipotel'){
        $page .= getTable();
    }else{
            $page .= ('
    <div class="container">
        <div class="row">
        <div class="column">
        <br/>
        <br/>
        <br/>
        <br/>
    <form method="get">
    <div class="form-group">
        <label>Password</label>
        <input type="text" name="pass" class="form-control">
    </div>
    </form>
    </div>
    </div>
    </div>
    ');
    }
}else{
    $page .= ('
    <div class="container">
        <div class="row">
        <div class="column">
        <br/>
        <br/>
        <br/>
        <br/>
    <form method="get">
    <div class="form-group">
        <label>Password</label>
        <input type="text" name="pass" class="form-control">
    </div>
    </form>
    </div>
    </div>
    </div>
    ');
}
$page .= file_get_contents('templates/foter.html');
$page = str_replace('{{ title }}', $tile, $page);
$page = str_replace('{{ admin }}', 'active', $page);
print($page);
