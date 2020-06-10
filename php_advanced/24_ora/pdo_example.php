<?php 

 

$serverName="localhost";
$userName="root";
$password="";
$dbName="mydb";

 

try{
    $conn = new PDO("mysql:host=$serverName; dbName=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    
    
    //Adattábla létrehozás
    /*
    $sql="
        use mydb;
        Create table MyGuests(
        
            id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname varchar(30) not null,
            lastname varchar(30) not null,
            email varchar(60),
            reg_date Timestamp
        )
    ";
    */
    
    //Egy record beszúrása az adattáblába
    /*
    $sql="
        use mydb;
        Insert into MyGuests(firstname, lastname, email) 
        Values ('Balazs', 'Szabo','balazs.szabo@example.com')
    ";
    
    $conn->exec($sql);
    
    $lastId=$conn->lastInsertId();
    echo "<br/> last inserted ID: ".$lastId;
    */
    
    //Tranzakció létrehozás, statementekkel
    /*
    $sm1="
        use mydb;
        Insert into MyGuests(firstname, lastname, email) 
        Values ('fname1', 'lname1','fname1.lname1@example.com')
    ";
    
    $sm2="
        use mydb;
        Insert into MyGuests(firstname, lastname, email) 
        Values ('fname2', 'lname2','fname2.lname2@example.com')
    ";
    
    $sm3="
        use mydb;
        Insert into MyGuests(firstname, lastname, email) 
        Values ('fname3', 'lname3','fname3.lname3@example.com')
    ";
    
    
    $conn->beginTransaction();
        $conn->exec($sm1);
        $conn->exec($sm2);
        $conn->exec($sm3);
    $conn->commit();
    */
    
    //Prepare
    /*
    $stmt=$conn->prepare("use mydb; Insert into MyGuests(firstname, lastname, email) 
        Values (:firstname, :lastname, :email)");
        
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    
    $firstname="Hallgató1";
    $lastname="Attila";
    $email="h1.attila@citec.hu";
    $stmt->execute();
    $stmt->closeCursor();
    
    $firstname="Hallgató2";
    $lastname="Attila";
    $email="h1.attila@citec.hu";
    $stmt->execute();
    $stmt->closeCursor();
    
    $firstname="Hallgató3";
    $lastname="Attila";
    $email="h1.attila@citec.hu";
    $stmt->execute();
    $stmt->closeCursor();
    */
    
    //Select elements
    $data = $conn->query("SELECT * FROM mydb.MyGuests")->fetchAll();
    foreach ($data as $row) {
        echo $row['id']."<br />\n";
    }
    
    $stmt = $conn->query("SELECT * FROM mydb.MyGuests");
    while ($row = $stmt->fetch()) {
        echo $row['firstname']."<br />\n";
    }
    
    echo "<br/> Query was executed successfully";
}
catch(PDOException $e){
    echo "Connection failed: ".$e->getMessage();
}
