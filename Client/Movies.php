<?php
class Movie {
    private $id;
    private $title;
    private $genre;
    private $duration;
    private $release_date;
    private $director;
    private $cast;
    
    public function __construct($id = null, $title = "", $genre = "", $duration = 0, $release_date = "", $director = "", $cast = "") {
        $this->id = $id;
        $this->title = $title;
        $this->genre = $genre;
        $this->duration = $duration;
        $this->release_date = $release_date;
        $this->director = $director;
        $this->cast = $cast;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
    }

    public function getReleaseDate() {
        return $this->release_date;
    }

    public function setReleaseDate($release_date) {
        $this->release_date = $release_date;
    }

    public function getDirector() {
        return $this->director;
    }

    public function setDirector($director) {
        $this->director = $director;
    }

    public function getCast() {
        return $this->cast;
    }

    public function setCast($cast) {
        $this->cast = $cast;
    }

    public function save() {
        $pdo = Database::getConnection();
        
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE movies SET title = ?, genre = ?, duration = ?, release_date = ?, director = ?, cast = ? WHERE id = ?");
            $stmt->execute([$this->title, $this->genre, $this->duration, $this->release_date, $this->director, $this->cast, $this->id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO movies (title, genre, duration, release_date, director, cast) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$this->title, $this->genre, $this->duration, $this->release_date, $this->director, $this->cast]);
            $this->id = $pdo->lastInsertId();
        }
    }

    public function delete() {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM movies WHERE id = ?");
        $stmt->execute([$this->id]);
    }

    public static function getAllMovies() {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM movies");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMovieById($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM movies WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
