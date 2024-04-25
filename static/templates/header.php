<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../static/styles/newfull.css">
    <title> <?= $title ?> </title>
</head>
<body>

<div class="header">
  <div class="logo">
    <a href="/"><strong>LabManager</strong></a>
  </div>
  <div class="menu">
    <a class="menu-link" data-p-open-modal="#example-modal">Выход</a>
    <a class="menu-link" data-p-open-modal="#info-modal">?</a>
  </div>
</div>


<div class="p-modal-background">
  <div class="p-modal" id="example-modal">
      <h3>Подтвердите выход</h3>
      <div class="p-modal-button-container">
        <a href="/logout">Выйти</a>
              <a href="#" data-p-cancel>Остаться</a>
      </div>
  </div>
  <div class="p-modal" id="info-modal">
      <h3>LabManager</h3>
          <h5>UI-build v0.2 beta (Puppertino v1.0,HTML5,CSS3)</h5>
          <h5>Server-build v0.1 beta (PHP7, MySQL8) </h5>
          <h5>Contacts and Support: <a href="t.me/mnesian"></a> </h5>
      <div class="p-modal-button-container">
        <a href="#" data-p-cancel>Закрыть</a>
      </div>
  </div>
  
  </div>

<style>
  .header{ width: 100%; height: 4rem; background-color: whitesmoke; display: flex; justify-content: space-between; align-items: center;}
  .logo{ padding: 10px 30px; font-size: 20px; }
  .menu-link{font-weight: 500; font-size: 15px; padding: 10px 30px;}
  a{text-decoration: none; color: black; cursor: pointer; }
</style>
