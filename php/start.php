<?php
require_once 'personalInfo.php';

try {
    $conn = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
     
    # Prepare the query ONCE
//    $stmt = $conn->prepare('INSERT INTO contacts(companyName, companyAddress, name, phone, notes) '
//            . 'VALUES(:companyName, :companyAddress, :name, :phone, :notes)');
//    $stmt->bindParam(':companyName', $data['companyName']);
//    $stmt->bindParam(':companyAddress', $data['companyAddress']);
//    $stmt->bindParam(':name', $data['name']);
//    $stmt->bindParam(':phone', $data['phone']);
//    $stmt->bindParam(':notes', $data['notes']);

    # First insertion
//    $name = 'Keith';

    $stmt = $conn->query('SELECT * FROM contacts');
//    $stmt->setFetchMode(PDO::FETCH_CLASS, '');
//    $stmt->execute(array('id' => $id));
// 
    $count = 0;
    while($ans = $stmt->fetch()) {
       $row[$count] = $ans;
        $count++;
    }
//    var_dump($row);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}