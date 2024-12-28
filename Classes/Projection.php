<?php
class Projection {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getAllProjections() {
        $stmt = $this->pdo->prepare("
            SELECT projections.id, movies.title AS movie_title, projections.schedule, projections.room
            FROM projections
            JOIN movies ON projections.movie_id = movies.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}