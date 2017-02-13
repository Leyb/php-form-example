<?php
require_once 'personalInfo.php';

$data = filter_input_array(INPUT_POST);
$id = 0;
try {
    $conn = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
     
    if($data['newOrEdit'] == 'new'){
    $stmt = $conn->prepare('INSERT INTO contacts(companyName, companyAddress, name, phone, notes) '
            . 'VALUES(:companyName, :companyAddress, :name, :phone, :notes)');
    $stmt->bindParam(':companyName', $data['companyName']);
    $stmt->bindParam(':companyAddress', $data['companyAddress']);
    $stmt->bindParam(':name', $data['name']);
    $stmt->bindParam(':phone', $data['phone']);
    $stmt->bindParam(':notes', $data['notes']);

    $stmt->execute();

    } else if($data['newOrEdit'] == 'edit'){
        
        $stmt = $conn->prepare('UPDATE contacts SET companyName = :companyName, companyAddress = :companyAddress, name = :name '
                . ', phone = :phone , notes = :notes '
                . ' WHERE id = :id');
        $success = $stmt->execute(array(
          ':id'   => $data['contactId'],
          ':companyName' => $data['companyName'],
          ':companyAddress' => $data['companyAddress'],
          ':name' => $data['contactName'],
          ':phone' => $data['contactPhone'],
          ':notes' => $data['contactNotes'],
        ));
        echo $success;
//    $stmt = $conn->prepare('SELECT * FROM contacts WHERE id = :id');
//    $stmt->execute(array('id' => $id));
// 
//    while($row = $stmt->fetch()) {
//        print_r($row);
//    }
    }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
//echo json_encode($data);