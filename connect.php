<?php

$dbhost = "172.31.24.227";
$dbuser = "root";
$dbpass = "my-secret-pw";
$dbname = "progettoaws"; 
$dbport = 3306;

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);
if($conn->error){
    echo "Errore di connessione"; 
}else{
    //echo "Connesso al server";
}

function stampa($query, $colonna){
    $i=0;
    global $conn;
    $array=array();

    $res = $conn->query($query);
    if($res !== FALSE && $res->num_rows > 0){
        while($row = $res->fetch_assoc()){
            $array[$i] = $row[$colonna];
            $i++;
        } 
        return $array;
    }
}
