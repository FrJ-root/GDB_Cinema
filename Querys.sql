CREATE DATABASE cinema_db;
USE cinema_db;
CREATE TABLE clients (
    id INT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE movies (
    id INT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    duration INT NOT NULL,
    release_date DATE NOT NULL,
    director VARCHAR(100) NOT NULL,
    cast TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE projections (
    id INT PRIMARY KEY,
    movie_id INT NOT NULL,
    schedule DATETIME NOT NULL,
    room VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
);
CREATE TABLE reservations (
    id INT PRIMARY KEY,
    client_id INT NOT NULL,
    projection_id INT NOT NULL,
    seats VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE,
    FOREIGN KEY (projection_id) REFERENCES projections(id) ON DELETE CASCADE
);
INSERT INTO clients (name, email, password) VALUES
('John Doe', 'johndoe@example.com', 'hashed_password1'),
('Jane Smith', 'janesmith@example.com', 'hashed_password2');
INSERT INTO movies (title, genre, duration, release_date, director, cast) VALUES
('Inception', 'Sci-Fi', 148, '2010-07-16', 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page'),
('The Dark Knight', 'Action', 152, '2008-07-18', 'Christopher Nolan', 'Christian Bale, Heath Ledger, Aaron Eckhart'),
('Avatar', 'Fantasy', 162, '2009-12-18', 'James Cameron', 'Sam Worthington, Zoe Saldana, Sigourney Weaver');
INSERT INTO projections (movie_id, schedule, room) VALUES
(1, '2024-12-29 20:00:00', 'Room 1'),
(2, '2024-12-29 18:00:00', 'Room 2'),
(3, '2024-12-30 21:00:00', 'Room 1');
INSERT INTO reservations (client_id, projection_id, seats) VALUES
(1, 1, 'A1,A2'),
(2, 2, 'B3,B4'),
(1, 3, 'C5');