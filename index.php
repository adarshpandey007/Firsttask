<?php   
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require './config/db.php';


$app = new \Slim\App;

require './routes/crud.php';
$app->run();
?>

