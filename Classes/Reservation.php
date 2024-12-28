<?php
class Reservation {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getAllReservations() {
        $stmt = $this->pdo->prepare("
            SELECT reservations.id, clients.name AS client_name, movies.title AS movie_title, reservations.seats
            FROM reservations
            JOIN clients ON reservations.client_id = clients.id
            JOIN projections ON reservations.projection_id = projections.id
            JOIN movies ON projections.movie_id = movies.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}