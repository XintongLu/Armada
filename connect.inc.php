<?php


function connectMySQL() {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=bdd_6_16","grp_6_16","Oox1er8iZa");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo "Erreur !: " . $e->getMessage();
        die();
    }
    return $conn;
}


ini_set('display_errors',1);
error_reporting(E_ALL);

?>


