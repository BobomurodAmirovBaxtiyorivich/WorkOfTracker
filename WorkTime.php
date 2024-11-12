<?php

class WorkTime
{
    public $stmt;
    public $db;
    public $conn;
    public $query;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function select()
    {
        $this->query = "SELECT * FROM work_time ORDER BY id DESC";
        $this->stmt = $this->conn->query($this->query);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($name, $arrived_at, $leaved_at, $total)
    {
        $this->query = "INSERT INTO work_time(name, arrived_at, leaved_at, required_of) VALUES(:name, :arrived_at, :leaved_at, :required_of)";

        $this->stmt = $this->conn->prepare($this->query);

        $this->stmt->bindParam(':name', $name);
        $this->stmt->bindParam(':arrived_at', $arrived_at);
        $this->stmt->bindParam(':leaved_at', $leaved_at);
        $this->stmt->bindParam(':required_of', $total);

        $this->stmt->execute();
    }

    public function total_required_of(string $name)
    {
        $this->query = "SELECT required_of FROM work_time WHERE name = '{$name}'";
        $this->stmt = $this->conn->query($this->query);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function CountDates()
    {
        $this->query = "SELECT COUNT(id) as count FROM work_time";
        $this->stmt = $this->conn->query($this->query);
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countPages()
    {
        return ceil($this->CountDates()['count'] / 10);
    }

    public function panigation($offset)
    {
        $this->query = "SELECT * FROM work_time ORDER BY arrived_at DESC LIMIT 10 OFFSET " . ($offset * 10) - 10;
        $this->stmt = $this->conn->query($this->query);
        return $this->stmt->fetchALL(PDO::FETCH_ASSOC);
    }
}
