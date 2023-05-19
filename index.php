<?php
include $_SERVER['DOCUMENT_ROOT'] . '/main.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Compilation of the table of competitions</h1>
<div class="container">
  <div class="row">
    <div class="col-sm">
        <form action="" method="POST">
            <div class="form-group">
                <label for="input-team">Enter your commands separated by commas</label>
                <input id="input-team" name="team" type="text" placeholder="Enter team" required>
            </div>
            <div class="form-group">
                <label for="input-stadium">Enter your stadiums separated by commas</label>
                <input id="input-stadium" name="stadium" type="text" placeholder="Enter stadium" required>
            </div>
            <div class="form-group">
                <p>Потребуется дней для всех игр:</p>
                <p id="timing">0</p>
                <label for="date">Enter time interval:</label>
                <p>Start</p>
                <input type="date" id="dateStart" name="dateStart" required>
                <p>Stop</p>
                <input type="date" id="dateStop" name="dateStop" required>
            </div>
            <button id="submitBtn" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php
    if (isset($path)) {?>
    <div class="col-sm">
        <a href="<?php print $path ?>" download>
            <button>Скачать</button>
        </a>
    </div>
    <?php } ?>
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
        <td><?php print $match -> getDate();?></td>
        <td class="match"><?php print $match -> getTeams();?></td>
        <td><?php print $match -> getStadium();?></td>
        </tr>
        <?php } ?>      
    </table>
    </div>
    </div>
</div>
<script src="js/highlighting.js"></script>
<script src="js/timinghint.js"></script>
</body>
</html>