<?php

class User {
    // database connection and table name
    private $conn;
    private $table_name = "register";

    public $username;
    public $email;
    public $password;
    public $displayname;

    public function __construct($db) {
        $this->conn = $db;
    }
    // read users
    function read() {

        // select all query
        $query = "SELECT
                    q.username, q.email, q.displayname
                FROM
                    " . $this->table_name . " q
                ORDER BY
                    q.username ASC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create user
    function create() {

        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = $this->password;
        $this->displayname = htmlspecialchars(strip_tags($this->displayname));

        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " (username, email, password, displayname)
                  VALUES ('" . $this->username . "', '" . $this->email . "', '" . $this->password . "', " . $this->displayname . ")";

        // execute query
        if ($this->conn->query($query)) {
            $last_id = $this->conn->insert_id;
            $this->id_user = $last_id;
            return true;
        }

        return false;
    }

    // used when reading one result
    function readOne() {

        // query to read single record
        $query = "SELECT
                    q.username, q.email, q.displayname
                FROM
                    " . $this->table_name . " q
                WHERE
                    q.username = " . $this->username . "
                LIMIT
                    0,1";

        // execute query
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->username = $row['id_user'];
            $this->email = $row['name'];
            $this->displayname = $row['displayname'];
            return true;
        } else {
            return false;
        }
    }

    // update the user
    function update() {

        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = $this->password;
        $this->displayname = htmlspecialchars(strip_tags($this->displayname));

        // query to insert record
        $query = "UPDATE " . $this->table_name . " 
                    SET email ='" . $this->email . "', displayname = '" . $this->displayname . "
                    WHERE username = " . $this->username;

        // execute query
        if ($this->conn->query($query)) {
            return true;
        }

        return false;
    }

    // delete the user setting a flag
    function delete() {

        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->displayname = htmlspecialchars(strip_tags($this->displayname));

        // query to insert record
        $query = "DELETE FROM " . $this->table_name . " 
                    WHERE username = " . $this->username;

        // execute query
        if ($this->conn->query($query)) {
            return true;
        }

        return false;
    }


    // search users
    function search($keywords) {

        // select all query
        $query = "SELECT
                     q.username, q.email, q.displayname
                FROM
                    " . $this->table_name . " q
                    
                WHERE
                    q.displayname LIKE ? OR q.email LIKE ?
                ORDER BY
                    q.username DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        //$stmt->bindParam(3, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // read users with pagination
    public function readPaging($from_record_num, $records_per_page) {

        // select query
        $query = "SELECT
                    q.username, q.email, q.displayname
                FROM
                    " . $this->table_name . " q
                    ORDER BY q.username ASC
                LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values from database
        return $stmt;
    }
    // used for paging users
    public function count() {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->username;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->username = $id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->displayname;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->displayname = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $invitecode
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    public function toArray() {
        return [
            "username" => $this->getId(),
            "email" => $this->getEmail(),
            "displayname" => $this->getName()
        ];
    }
}
