<?php
include_once "../db.php";
header('Content-Type: application/json');

try{
    if(!isset($_GET["id"])) throw new Error("Invalid id.");
    $id=$_GET["id"];

    $fields = [];
    if(isset($_GET["fields"])) $fields = explode(",",$_GET["fields"]);


    $sql = "SELECT * FROM courses WHERE id={$id}";
    $course_data = $conn->query($sql);
    $response = iterator_to_array($course_data)[0];

    if(in_array("instructor",$fields)){
        $sql = "SELECT * FROM  instructors WHERE name LIKE '%{$response["instructor"]}%'";
         $instructor = $conn->query($sql);
     
         $response["instructor_profile"] = iterator_to_array($instructor)[0];
    }
    if(in_array("related_courses",$fields)){
        $sql = "SELECT * FROM  courses WHERE id <> {$id} LIMIT 4";
         $related_courses = $conn->query($sql);
     
         $response["related_courses"]=iterator_to_array($related_courses);
    }
    if(in_array("teachers_more_courses",$fields)){
        $sql = "SELECT * FROM  courses WHERE id <> {$id} AND instructor LIKE '%{$response["instructor"]}%'";
         $related_courses = $conn->query($sql);
     
         $response["teachers_more_courses"]=iterator_to_array($related_courses);
    }

    
    echo json_encode($response);
}catch(Exception $e ){
    echo "Error: " . $e->getMessage();
}



?>


