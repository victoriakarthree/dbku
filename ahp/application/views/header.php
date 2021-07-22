
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="<?= base_url('favicon.ico') ?>" />

  <title>Source Code SPK Metode AHP CI</title>
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/general.css') ?>" rel="stylesheet" />
  <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= site_url() ?>">AHP CI</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span> Kriteria <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?= site_url('kriteria') ?>"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
              <li><a href="<?= site_url('rel_kriteria') ?>"><span class="glyphicon glyphicon-signal"></span> Nilai Kriteria</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="?m=alternatif" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Alternatif <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?= site_url('alternatif') ?>"><span class="glyphicon glyphicon-user"></span> Alternatif</a></li>
              <li><a href="<?= site_url('relasi') ?>"><span class="glyphicon glyphicon-signal"></span> Nilai Alternatif</a></li>
            </ul>
          </li>
          <li><a href="<?= site_url('hitung') ?>"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>
          <li><a href="<?= site_url('user/password') ?>"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
          <li><a href="<?= site_url('user/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">
    <div class="page-header">
      <h1><?= $title ?></h1>
    </div>