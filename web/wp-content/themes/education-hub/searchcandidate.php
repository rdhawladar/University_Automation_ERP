<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'pundro_demo1';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['skills'];
//get matched data from skills table
$query = $db->query("SELECT * FROM money_receipt WHERE MobileNumber LIKE '%".$searchTerm."%' ORDER BY id DESC");
while ($row = $query->fetch_assoc()) {
    $data[] = "Name: ".$row['CandidateName'].",  Mobile Number: ".$row['MobileNumber'];
}
//return json data
echo json_encode($data);
?>