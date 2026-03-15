# TrailerFlix 🎬

TrailerFlix is a movie trailer streaming web app built using **PHP, MySQL, HTML, CSS and JavaScript**.
The project shows movies in a YouTube-like layout using data imported from the **TMDB dataset (JSON files)**.

This project was created as a full-stack practice project to learn how to work with large datasets, database integration, and dynamic UI rendering using PHP.

---

## ✨ Features

* Login / Register system
* Admin upload panel
* Import large movie dataset from JSON
* Poster + Trailer integration
* YouTube-style homepage grid
* Embedded video player
* MySQL database storage
* Handles large dataset (1000+ movies)

---

## 📁 Project Structure

TrailerFlix/

config/ → database connection
css/ → styles
dataset/ → TMDB json files (not included)
importer.php → import movies
import_posters.php → import posters
import_trailers.php → import trailers

login.php
register.php
admin.php
upload.php
home.php
play.php
dashboard.php

README.md

---

## 📦 Dataset

Dataset used: TMDB movie dataset

Files used:

main_movies.json
poster_data.json
trailer_data.json

Poster URL format:

https://image.tmdb.org/t/p/w500/{poster_path}

Trailer URL format:

https://www.youtube.com/embed/{video_key}

Dataset not included in repo because of large size.

---

## ⚙️ Setup

Clone repo

git clone https://github.com/AbhishekkASR/TrailerFlix.git

Move to XAMPP

C:\xampp\htdocs\TrailerFlix

Start XAMPP

Apache → Start
MySQL → Start

Create database

trailerflix

Create table

CREATE TABLE movies (
movie_id INT,
title TEXT,
poster TEXT,
video_key TEXT,
site TEXT,
overview TEXT
);

Import data

http://localhost/TrailerFlix/importer.php
http://localhost/TrailerFlix/import_posters.php
http://localhost/TrailerFlix/import_trailers.php

Run project

http://localhost/TrailerFlix/home.php

---

## 🛠 Tech Used

PHP
MySQL
HTML
CSS
JavaScript
TMDB Dataset
XAMPP

---

## 📌 Notes

Dataset is large so it is not uploaded to GitHub.
Only scripts are included to import data.

This project is for learning / portfolio / practice.

---

## 👨‍💻 Author

Abhishek Singh
Manipal University Jaipur
GitHub: https://github.com/AbhishekkASR
