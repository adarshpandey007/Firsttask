<?php

use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', function (Request $request, Response $response) {
    echo 'home user working';
});

//get all users
$app->get('/api/bemployee', function (Request $request, Response $response) {
    $sql = "SELECT * FROM  bemployee";

    try {

        $db = new db();
        $pdo = $db->connect();

        $stmt = $pdo->query($sql);
        $bemployee = $stmt->fetchAll(PDO::FETCH_OBJ);

        $pdo = null;
        echo json_encode($bemployee);
    } catch (\PDOException $e) {
        echo '{"msg": {"resp": ' . $e->getMessage() . '}}';
    }
});


//get a single user
$app->get('/api/bemployee/{emp_id}', function (Request $request, Response $reponse, array $args) {
    $id = $request->getAttribute('emp_id');

    $sql = "SELECT * FROM bemployee where emp_id = $id";

    try {
        $db = new db();
        $pdo = $db->connect();

        $stmt = $pdo->query($sql);
        $bemployee = $stmt->fetchAll(PDO::FETCH_OBJ);

        $pdo = null;


        echo json_encode($bemployee);
    } catch (\PDOException $e) {
        echo '{"msg": {"resp": ' . $e->getMessage() . '}}';
    }
});


//make a post request
$app->post('/api/bemployee/add', function (Request $request, Response $reponse, array $args) {
    $emp_id =$request->getParam('emp_id');
    $name = $request->getParam('name');
    $city = $request->getParam('city');
    $phone = $request->getParam('phone');

    try {
        //get db object
        $db = new db();
        //conncect
        $pdo = $db->connect();


        $sql = "INSERT INTO bemployee (emp_id,name,city,phone) VALUES (?,?,?,?)";


        $pdo->prepare($sql)->execute([$emp_id,$name,$city,$phone ]);

        echo '{"notice": {"text": "User '. $name .' has been just added now"}}';
        $pdo = null;
    } catch (\PDOException $e) {
        echo '{"error": {"text": ' . $e->getMessage() . '}}';
    }
});

//make a update request
$app->put('/api/bemployee/update/{emp_id}', function (Request $request, Response $reponse, array $args) {
    $emp_id = $request->getAttribute('emp_id');

    $name = $request->getParam('name');
    $city = $request->getParam('city');
    $phone = $request->getParam('phone');

    try {
        //get db object
        $db = new db();
        //conncect
        $pdo = $db->connect();


        $sql = "UPDATE  bemployee SET name =?, city=?, phone=? WHERE emp_id=?";


        $pdo->prepare($sql)->execute([$name, $city, $phone ,$emp_id]);

        echo '{"notice": {"text": "User '. $name .' has been just updated now"}}';
        $pdo = null;
    } catch (\PDOException $e) {
        echo '{"error": {"text": ' . $e->getMessage() . '}}';
    }
});


//make a delete request
$app->delete('/api/bemployee/delete/{emp_id}', function (Request $request, Response $reponse, array $args) {
    $emp_id = $request->getAttribute('emp_id');

    try {
        //get db object
        $db = new db();
        //connect
        $pdo = $db->connect();

        $sql = "DELETE FROM bemployee WHERE emp_id=?";

        $pdo->prepare($sql)->execute([$emp_id]);
        $pdo = null;

        echo '{"notice": {"text": "User with '. $emp_id .' has been just deleted now"}}';

    } catch (\PDOException $e) {
        echo '{"error": {"text": ' . $e->getMessage() . '}}';
    }
});
  
