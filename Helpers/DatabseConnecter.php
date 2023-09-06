<?php

/* Connect to a MySQL database using driver invocation */
// $dsn = 'mysql:dbname=message_app;host=db';
// $user = 'user';
// $password = 'password';

// $dbh = new PDO($dsn, $user, $password);


// IGNORE THIS - DATABASE STUFF I"M STILL WORKING ON
// class CompanyJsonImporter extends JsonImporter
// {
  
//   function writeJsonDataToDatabase($jsonFilePath)
//   {
//     $companyTable = 'company';

//     $valuesArr = self::importJsonData($jsonFilePath);

//     try {
//         // Prepare and execute INSERT queries to insert JSON data into the database
//       foreach ($valuesArr as $row) {
//         $query = "INSERT INTO" . $companyTable . " (column1, column2, column3) VALUES (:value1, :value2, :value3)";
//         $stmt = $pdo->prepare($query);
        
//         // Replace column1, column2, column3 with your actual column names
//         $stmt->bindParam(':value1', $row['id']);
//         $stmt->bindParam(':value2', $row['json_key2']);
//         $stmt->bindParam(':value3', $row['json_key3']);
        
//         $stmt->execute();
//       }

//       return true; // Data successfully imported to the database
//     } catch (PDOException $e) {
//       // Handle any database errors here
//       echo "Database Error: " . $e->getMessage();
//       return false; // Return false in case of an error
//     }
    
//   }
    
// }