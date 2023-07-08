<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../tournament/tournament.php';
 
// instantiate database and news object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$tournament = new Tournament($db);
 
// read products will be here
// query products
$stmt = $tournament->readDota();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $tournament_arr=array();
    $tournament_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $tournament_item=array(
            "id" => $id,
            "title" => $title,
            "date" => $date,
            "venue" => $venue,
            "contact" => $contact,
            "description" => html_entity_decode($description),
            "type" => $type,
            "img" => $img
        );
 
        array_push($tournament_arr["records"], $tournament_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($tournament_arr);
}
 
// no products found will be here
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}