<?php 

include '../Database.php';

$db = new Database('db-domaci');

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    parse_str(file_get_contents('php://input'), $del_vals);

    if($db->delete('subjects', 'id', $del_vals['id'])){
        http_response_code(204); //no content success status
        exit();
    } else {
        http_response_code(400);
        echo "Deletion unsuccessful...";
        exit();
    }
} else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $post_vals = [
        "'".$_POST['name']."'"
    ];

    if($db->insert('subjects', 'name', $post_vals)){
        http_response_code(201); //created success message
        exist();
    } else {
        http_response_code(400);
        echo "Insertion unsuccessful...";
        exist();
    }
} else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    parse_str(file_get_contents('php://input'), $put_vals);

    $values = [
        "'".$put_vals['name']."'"
    ];

    if($db->update('subjects', $put_vals['id'], ['name'], $values)){
        http_response_code(200); //success message
        exit();
    } else {
        http_response_code(400);
        echo "Update unsuccessful...";
        exit();
    }
}

?>