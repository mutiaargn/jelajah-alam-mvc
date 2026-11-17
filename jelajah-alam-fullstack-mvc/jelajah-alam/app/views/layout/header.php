<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jelajah Alam</title><link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css"></head><body>
<header class="navbar"><a class="brand" href="<?= BASE_URL ?>">Jelajah<span>Alam.</span></a>
<button class="menu-toggle" id="menuToggle" aria-label="Buka menu">☰</button>
<nav id="nav"><a href="<?= BASE_URL ?>">Beranda</a><a href="<?= BASE_URL ?>/wisata">Wisata</a><a href="<?= BASE_URL ?>/edukasi">Edukasi</a>
<?php if (!empty($_SESSION['admin_id'])): ?><a href="<?= BASE_URL ?>/admin">Dashboard</a><a href="<?= BASE_URL ?>/auth/logout">Keluar</a><?php else: ?><a href="<?= BASE_URL ?>/auth/login">Admin</a><?php endif; ?></nav></header>
<main>
