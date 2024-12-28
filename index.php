<?php
require_once './classes/Database.php';
require_once './classes/Movies.php';
require_once './classes/Projection.php';
require_once './classes/Reservation.php';
$movie = new Movie();
$projection = new Projection();
$reservation = new Reservation();
$movies = $movie->getAllMovies();
$projections = $projection->getAllProjections();
$reservations = $reservation->getAllReservations();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Cinema Management System</h1>
    <h2>Movies</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Duration</th>
                <th>Release Date</th>
                <th>Director</th>
                <th>Cast</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?= htmlspecialchars($movie['id']) ?></td>
                    <td><?= htmlspecialchars($movie['title']) ?></td>
                    <td><?= htmlspecialchars($movie['genre']) ?></td>
                    <td><?= htmlspecialchars($movie['duration']) ?> mins</td>
                    <td><?= htmlspecialchars($movie['release_date']) ?></td>
                    <td><?= htmlspecialchars($movie['director']) ?></td>
                    <td><?= htmlspecialchars($movie['cast']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Projections</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Movie Title</th>
                <th>Schedule</th>
                <th>Room</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projections as $projection): ?>
                <tr>
                    <td><?= htmlspecialchars($projection['id']) ?></td>
                    <td><?= htmlspecialchars($projection['movie_title']) ?></td>
                    <td><?= htmlspecialchars($projection['schedule']) ?></td>
                    <td><?= htmlspecialchars($projection['room']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Reservations</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Client Name</th>
                <th>Movie Title</th>
                <th>Seats</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= htmlspecialchars($reservation['id']) ?></td>
                    <td><?= htmlspecialchars($reservation['client_name']) ?></td>
                    <td><?= htmlspecialchars($reservation['movie_title']) ?></td>
                    <td><?= htmlspecialchars($reservation['seats']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>