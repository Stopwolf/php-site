<?php 

include '../Database.php';

$db = new Database('db-domaci');

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    parse_str(file_get_contents('php://input'), $del_vals);

    if($db->delete('obligations', 'id', $del_vals['id'])){
        http_response_code(204); //no content success status
        exit();
    } else {
        http_response_code(400);
        echo "Deletion unsuccessful...";
        exit();
    }
} else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $post_vals = [
        "'".$_POST['name']."'",
        "'".$_POST['description']."'",
        "'".$_POST['date']."'",
        "'".$_POST['isDone']."'",
        "'".$_POST['subject_id']."'"
    ];

    if($db->insert('obligations', 'name, description, date, isDone, subject_id', $post_vals)){
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
        "'".$put_vals['name']."'",
        "'".$put_vals['description']."'",
        "'".$put_vals['date']."'",
        "'".$put_vals['isDone']."'",
        "'".$put_vals['subject_id']."'"
    ];

    if($db->update('obligations', $put_vals['id'], ['name', 'description', 'date', 'isDone', 'subject_id'], $values)){
        http_response_code(200); //success message
        exit();
    } else {
        http_response_code(400);
        echo "Update unsuccessful...";
        exit();
    }
}

?>