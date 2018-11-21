<?php
include 'connect.inc.php';
$conn = connectMySQL();

$shipName = $_POST['shipName'];
$crew = $_POST['crew'];
$typeShip = $_POST['typeShip'];
$launchYear = $_POST['launchYear'];
$length = $_POST['length'];
$country = $_POST['country'];
$presentation = $_POST['presentation'];
$photo_name = $_FILES['shipPhoto']['name'];

$photo_type = $_FILES['shipPhoto']['type'];
$uploadPath = 'ships_photo/';
$allowedExts = array(
    "gif",
    "jpeg",
    "jpg",
    "png"
);
$temp = explode(".", $photo_name);

$extension = end($temp);

/*
 * if($shipName=="" || $crew=="" || $presentation=="" || $launchYear=="" || $length==""){
 * echo "<script>alert('All information must be completed');history.go(-1)</script>";
 * }else
 */

/*
 * try{
 * $sql = "SELECT * FROM Ship where shipName = '$shipName'";
 * $result = $conn->query($sql);
 *
 *
 *
 *
 * } catch (PDOException $e) {
 * echo "Erreur !: " . $e->getMessage();
 * }
 */
 try {
     
     $sql = "SELECT * FROM Ship where shipName = '$shipName'";
     $result = $conn->query($sql);
     $row = $result->fetchAll();
     
 } catch (PDOException $e) {
     echo "Erreur !: " . $e->getMessage();
 }
 
if (! preg_match('/^\w+$/i', $shipName)) {
    echo "<script>alert('Do not use illegal characters.');history.go(-1)</script>";
} elseif (($crew) > 500) {
    echo "<script>alert('crew members are too much.');history.go(-1)</script>";
} elseif ((($launchYear) < 1500) || (($launchYear) > 2018)) {
    echo "<script>alert('Launch year invalid.');history.go(-1)</script>";
}elseif((($length)<1) || (($length)>100)){
    echo "<script>alert('Length invalid.');history.go(-1)</script>";
}elseif(strlen($presentation)>150){
    echo "<script>alert('Please compress the presentation into 150 words.');history.go(-1)</script>";
}else
if (count($row) == 1) {
    echo "<script>alert('Your ship exist already.');history.go(-1)</script>";
} else     
if ((($photo_type == "image/gif") || ($photo_type == "image/jpeg") || ($photo_type == "image/jpg") || ($photo_type == "image/pjpeg") || ($photo_type == "image/x-png") || ($photo_type == "image/png")) && ($_FILES["shipPhoto"]["size"] < 1048576) && in_array($extension, $allowedExts)) {
    if ($_FILES["shipPhoto"]["error"] > 0) {
        echo "<script>alert('Photo is not allowed.');history.go(-1)</script>";
    } else {

        $uniq = uniqid();
        $uniqName = $uniq . strrchr($_FILES['shipPhoto']['name'], ".");

        if (file_exists($uploadPath . $uniqName)) {
            echo "<script>alert('Please wait a second.');history.go(-1)</script>";
        } else {

            connectMySQL();

            try {

                $sql = "INSERT INTO Ship (shipName,crew,typeShip,launchYear,length,country,presentation,uniqName) VALUES ('$shipName',$crew,'$typeShip',$launchYear,$length,'$country','$presentation','$uniqName')";
                $conn->exec($sql);

                $upload = move_uploaded_file($_FILES["shipPhoto"]["tmp_name"], $uploadPath . $uniqName);
                if ($upload) {

                    echo "<script>alert('added ship successfully!');window.location.href='ships.php'</script>";
                }
            } catch (PDOException $e) {
                echo "Erreur !: " . $e->getMessage();
            }
        }
    }
} else {
    echo "<script>alert('Invalid type.');history.go(-1)</script>";
}
?>




 