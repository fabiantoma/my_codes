<?php





class Post
{

    private $conn;
    public $vasarlo;
    public $termeknev;
    public $ar;
    public $darab;
    public $termekId;
    public $id;

    public function __construct($db)
    {

        $this->conn = $db;
    }



    public function read()
    {

        $query = "Select v.vasarlo, v.termeknev, t.name, v.ar,v.darab, v.id , v.termekId from vasarolttermek v left join termektipus t on v.termekId= t.id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readSingle()
    {
        $query = "Select v.vasarlo, v.termeknev, t.name, v.ar,v.darab, v.id, v.termekId from vasarolttermek v left join termektipus t on v.termekId= t.id Where v.id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }



    public function readCategories()
    {

        $query = "Select * from termektipus";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function create()
    {

        $query = "Insert into vasarolttermek Set vasarlo=:vasarlo,termeknev=:termeknev,ar=:ar,darab=:darab,termekId=:termekId";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":vasarlo", $this->vasarlo);
        $stmt->bindParam(":termeknev", $this->termeknev);
        $stmt->bindParam(":ar", $this->ar);
        $stmt->bindParam(":darab", $this->darab);
        $stmt->bindParam(":termekId", $this->termekId);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }
    public function update()
    {
        $query = "Update vasarolttermek Set vasarlo=:vasarlo,termeknev=:termeknev,ar=:ar,darab=:darab,termekId=:termekId Where id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":vasarlo", $this->vasarlo);
        $stmt->bindParam(":termeknev", $this->termeknev);
        $stmt->bindParam(":ar", $this->ar);
        $stmt->bindParam(":darab", $this->darab);
        $stmt->bindParam(":termekId", $this->termekId);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }
    public function deleteRecord()
    {
        $query = "Delete from vasarolttermek Where id=:id";
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
