<?php
require_once 'Movies.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $movie = new Movie(null, $_POST['title'], $_POST['genre'], $_POST['duration'], $_POST['release_date'], $_POST['director'], $_POST['cast']);
    $movie->save();
    echo "Movie added successfully!";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    $movie = new Movie($_POST['id'], $_POST['title'], $_POST['genre'], $_POST['duration'], $_POST['release_date'], $_POST['director'], $_POST['cast']);
    $movie->save();
    echo "Movie updated successfully!";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $movie = new Movie($_POST['id']);
    $movie->delete();
    echo "Movie deleted successfully!";
}

$movies = Movie::getAllMovies();
?>

<h2>All Movies</h2>
<ul>
    <?php foreach ($movies as $movie): ?>
        <li><?php echo htmlspecialchars($movie['title']); ?></li>
    <?php endforeach; ?>
</ul>
