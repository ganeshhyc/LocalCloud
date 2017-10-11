<?php  
  $jsonData = array(
    "comments" => "Fresh food",
    "container" => false,
    "cookedTime" => 2,
    "description" => "biryani",
    "refridgeration" => true,
    "serves" => 2,
    "veg" => true
);

$jsonData=json_encode($jsonData);
header("Location:ss.php?json=$jsonData");
?>