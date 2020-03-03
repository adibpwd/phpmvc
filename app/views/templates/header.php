<?php
  $title = $data['title'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?= BASEURL ?>/css/bootstrap.css">
    <script src="<?= BASEURL ?>/js/jquery-3.4.1.min.js"></script>
  <title>Halaman <?= $title ?> </title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h1 class="text-secondary">PHP MVC</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <!-- PR home dan about taruh bagian kanan -->
  <div class="collapse justify-content-end navbar-collapse">
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php if( $title == "home")  {
            ?>  <a class="nav-link active" href="<?= BASEURL ?>/home">Home</a>  <?php
         } else {
          ?>  <a class="nav-link" href="<?= BASEURL ?>/home">Home</a>  <?php
         }?>
      </li>
      <li class="nav-item">
        <?php if( $title == "mahasiswa")  {
            ?>  <a class="nav-link active" href="<?= BASEURL ?>/mahasiswa/index/1">mahasiswa</a>  <?php
         } else {
          ?>  <a class="nav-link" href="<?= BASEURL ?>/mahasiswa/index/1">mahasiswa</a>  <?php
         }?>
      </li>
      <li class="nav-item">
      <?php if( $title == "about")  {
            ?>  <a class="nav-link active" href="<?= BASEURL ?>/home">About</a>  <?php
         } else {
          ?>  <a class="nav-link" href="<?= BASEURL ?>/about">About</a>  <?php
         }?>
      </li>
    </ul>
  </div>
</nav>