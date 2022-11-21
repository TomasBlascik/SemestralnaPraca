<?php

class DBstorage
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=movie', "root", "dtb456");
    }

    /**
     * @return TableRecord[]
     */
    public function getAllRecords() {
        $stm = $this->pdo->query("SELECT * FROM movies");
        return $stm->fetchAll(PDO::FETCH_CLASS, TableRecord::class);
    }

    public function storeRecord(TableRecord $record) {
        if (!$record->id) {
            $sql = "INSERT INTO movies (name, director, year) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$record->name, $record->director, $record->year]);
        } else {
            $sql = "UPDATE movies SET name = ?, director = ?, year = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$record->name, $record->director, $record->year, $record->id]);
        }
    }

    public function loadOneRecord($id) : TableRecord {
        $stm = $this->pdo->prepare("SELECT * FROM movies WHERE id = ?");
        $stm->execute([$id]);
        /** @var TableRecord $vysledok */
        return $stm->fetchAll(PDO::FETCH_CLASS, TableRecord::class)[0];
    }

    public function removeRecord($id) {
        $vysledok = $this->loadOneRecord($id);
        $sql = "DELETE FROM movies WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        header("Location: ?");
    }
}