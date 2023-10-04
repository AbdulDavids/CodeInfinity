<?php
require 'vendor/autoload.php';

// change connection settings to your mongo confif
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->CodeInfinity; 
$collection = $database->users; 


//-------------------------------------------------------------------


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // declarations
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $idNumber = $_POST['id_number'];
    $dob = $_POST['dob'];



    // Validate the ID Number format (numeric and 13 characters)
    if (!is_numeric($idNumber) || strlen($idNumber) !== 13) {
        echo "<script>alert('Invalid ID Number format. It must be a 13-digit numeric value.')</script>";
    } else {



        // check for duplicate ID Number
        $existingRecord = $collection->findOne(['ID Number' => $idNumber]);





        if ($existingRecord) {
        } else {



            // Validate the Date of Birth format (dd/mm/YYYY), 
            $dobDate = DateTime::createFromFormat('d/m/Y', $dob);
            $dobErrors = DateTime::getLastErrors();
            if ($dobDate && $dobErrors['warning_count'] === 0 && $dobErrors['error_count'] === 0) {





                // Insert data into MongoDB
                $data = [
                    'Name' => $name,
                    'Surname' => $surname,
                    'ID Number' => $idNumber,
                    'Date of Birth' => $dobDate->format('Y-m-d'), 
                ];

                $insertResult = $collection->insertOne($data);

                if ($insertResult->getInsertedCount() > 0) {
                    echo '<h1>Data has been successfully inserted into MongoDB.</h1>';






                } else {
                    echo "<script>alert('Error inserting data into MongoDB.')</script>";
                }
            } else {
                echo "<script>alert('Invalid Date of Birth format. Please use dd/mm/YYYY format.')</script>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Form to MongoDB</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1>Enter Data</h1>
    <form method="POST">

        <label for="name">Name:</label>
        <div class="inputbox">
        <input type="text" name="name" required></div><br><br>
        
        <label for="surname">Surname:</label>
        <div>
        <input type="text" name="surname" required></div><br><br>
        
        
        <label for="id_number">ID Number:</label>
        <div>
        <input type="text" name="id_number" required></div><br><br>
        
        
        <label for="dob">Date of Birth (dd/mm/YYYY):</label>
        <div>
        <input type="text" name="dob" required></div><br><br>
        <div> 
        <input type="submit" value="POST">
        <input type="button" value="CANCEL" onclick="window.location.href='cancel_page.php'"></div>
    </form>
</body>
</html>








