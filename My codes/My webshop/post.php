<?php





class Post
{

    private $conn;
    public $title;
    public $body;
    public $author;
    public $category_id;
    public $id;

    public function __construct($db)
    {

        $this->conn = $db;
    }



    public function read()
    {

        $query = "Select p.author, p.body, c.name, p.title, p.id , p.category_id from posts p left join categories c on p.category_id= c.id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readSingle()
    {
        $query = "Select p.author, p.body, c.name, p.title, p.id, p.category_id from posts p left join categories c on p.category_id= c.id Where p.id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id); //hozzáfüszöm a where feltételhez lévő paraméterhez a z url ből levő paraméter értékét//
        $stmt->execute();
        return $stmt;
    }



    public function readCategories()
    {

        $query = "Select * from categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function create() //API végpont amibe küldjük JSON-t//
    {

        $query = "Insert into  posts Set title=:title,body=:body,author=:author,category_id=:category_id";
        $stmt = $this->conn->prepare($query);
        //SQL be beleteszi 
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":body", $this->body);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":category_id", $this->category_id);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }
    public function update()
    {
        $query = "Update posts Set title=:title,body=:body,author=:author,category_id=:category_id Where id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":body", $this->body);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":category_id", $this->category_id);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }
    public function deleteRecord()
    {
        $query = "Delete from posts Where id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        } else {
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }
}
