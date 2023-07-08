<?php
class Tournament{
 
    // database connection and table name
    private $conn;
    private $table_name = "tournaments";
 
    // object properties
    public $id;
    public $title;
    public $date;
    public $venue;
    public $contact;
    public $description;
    public $type;
    public $img;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
    
        // select all query
        $query = "SELECT
                    n.id, n.title, n.date, n.venue, n.contact,  n.description, n.type, n.img
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
                    n.id, n.title, n.date, n.venue, n.contact,  n.description, n.type, n.img
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
                    n.id, n.title, n.date, n.venue, n.contact,  n.description, n.type, n.img
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
                   n.id, n.title, n.date, n.venue, n.contact,  n.description, n.type, n.img
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
                    n.id, n.title, n.date, n.venue, n.contact,  n.description, n.type, n.img
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

}
?>