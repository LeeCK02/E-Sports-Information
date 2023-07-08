<?php
class News{
 
    // database connection and table name
    private $conn;
    private $table_name = "news";
 
    // object properties
    public $id;
    public $title;
    public $description;
    public $type;
    public $latest;
    public $img;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.description, n.type, n.latest, n.img
                FROM
                    " . $this->table_name . " n;
                ORDER BY
                    n.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function readLeague(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.description, n.type, n.latest, n.img
                FROM
                    " . $this->table_name . " n
                WHERE 
                    n.type = 'League';
                ORDER BY
                    n.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function readCsgo(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.description, n.type, n.latest, n.img
                FROM
                    " . $this->table_name . " n
                WHERE 
                    n.type = 'Csgo';
                ORDER BY
                    n.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function readDota(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.description, n.type, n.latest, n.img
                FROM
                    " . $this->table_name . " n
                WHERE 
                    n.type = 'Dota';
                ORDER BY
                    n.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function readValorant(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.description, n.type, n.latest, n.img
                FROM
                    " . $this->table_name . " n
                WHERE 
                    n.type = 'Val';
                ORDER BY
                    n.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function readLatest(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.description, n.type, n.latest, n.img
                FROM
                    " . $this->table_name . " n
                WHERE 
                    n.latest = 'Yes';
                ORDER BY
                    n.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function readLatestLeague(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.description, n.type, n.latest, n.img
                FROM
                    " . $this->table_name . " n
                WHERE 
                    n.type = 'League' && n.latest = 'Yes';
                ORDER BY
                    n.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function readLatestCsgo(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.description, n.type, n.latest, n.img
                FROM
                    " . $this->table_name . " n
                WHERE 
                    n.type = 'Csgo' && n.latest = 'Yes';
                ORDER BY
                    n.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function readLatestDota(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.description, n.type, n.latest, n.img
                FROM
                    " . $this->table_name . " n
                WHERE 
                    n.type = 'Dota' && n.latest = 'Yes';
                ORDER BY
                    n.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function readLatestValorant(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.description, n.type, n.latest, n.img
                FROM
                    " . $this->table_name . " n
                WHERE 
                    n.type = 'Val' && n.latest = 'Yes';
                ORDER BY
                    n.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // create product
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                title=:title, description=:description, type=:type, latest=:latest, img=:img";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->type=htmlspecialchars(strip_tags($this->type));
    $this->latest=htmlspecialchars(strip_tags($this->latest));
    $this->img=htmlspecialchars(strip_tags($this->img));
 
    // bind values
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":type", $this->type);
    $stmt->bindParam(":latest", $this->latest);
    $stmt->bindParam(":img", $this->img);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

// used when filling up the update product form
function readOne(){
 
    // query to read single record
    $query = "SELECT
                n.id, n.title, n.description, n.type, n.latest, n.img
            FROM
                " . $this->table_name . " n
            WHERE
                n.id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->title = $row['title'];
    $this->type = $row['type'];
    $this->description = $row['description'];
    $this->latest = $row['latest'];
    $this->img = $row['img'];
}

// update the product
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                title = :title,
                description = :description,
                type = :type,
                latest = :latest,
                img = :img
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->type=htmlspecialchars(strip_tags($this->type));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->latest=htmlspecialchars(strip_tags($this->latest));
    $this->img=htmlspecialchars(strip_tags($this->img));
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind new values
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':type', $this->type);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':latest', $this->latest);
    $stmt->bindParam(':img', $this->img);
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

// search products
function search($keywords){
 
    // select all query
    $query = "SELECT
                n.id, n.title, n.description, n.type, n.latest, n.img
            FROM
                " . $this->table_name . " n
            WHERE
                n.title LIKE ? OR n.description LIKE ? OR n.type LIKE ?
            ORDER BY
                n.id DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

}
?>