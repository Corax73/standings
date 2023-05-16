<?php
include $_SERVER['DOCUMENT_ROOT'] . '/cli.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <table id="teams">
        <tr>
        <th>Название</th>
        </tr>
        <?php
        foreach ($teams as $team) {?> 
        <tr>
        <td class="teams"><?php print $team; ?></td>
        </tr>
        <?php } ?>      
    </table>
    </div>
    <div class="col-sm">
    <table id="games">
        <tr>
        <th>Дата</th>
        <th>Матч</th>
        <th>Стадион</th>
        </tr>
        <?php
        foreach ($matches as $match) {?> 
        <tr>
        <td><?php print $match -> getDate(); ?></td>
        <td class="match"><?php print $match -> getTeams(); ?></td>
        <td><?php print $match -> getStadium(); ?></td>
        </tr>
        <?php } ?>      
    </table>
    </div>
    </div>
</div>
<script src="js/highlighting.js"></script>
</body>
</html>