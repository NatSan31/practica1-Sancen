<?php
session_start();

if (!isset($_SESSION['staff_id'])) {
    header("Location: /practica1-Sancen/film/index.php");
    exit;
}