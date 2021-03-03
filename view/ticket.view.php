<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="view/css/styleTicket.css"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php $id = $_GET['id']?>
<?php foreach (readData() as $data): ?>
<?php if ($data != ""): ?>
<?php $data = explode(",", $data) ?>
<?php if ($id == $data[8]): ?>

            <div class="container">
                <div class="main">
                    <div class="userTicket">
                        <div class="name"><strong><?=$data[0]?></strong></div>
                        <div class="id"><strong>Your ID#<?=$data[8]?></strong></div>
                        <div class="priceTag">
                            <div class="price"><strong>Price: <?=$data[2]?> $</strong></div>
                        </div>
                    </div>
                    <div class="fromTo">
                        <div class="from">
                            <div class="time"><?=date("H:i") ?></div>
                            <div class="text">Isvykimas is:</div>
                            <div class="country"><?=$data[5]?></div>
                        </div>
                        <div class="to">
                            <div class="time">22:30</div>
                            <div class="text">Atvykimas i:</div>
                            <div class="country"><?=$data[6]?></div>
                        </div>
                    </div>
                    <div class="notesContainer">
                        <div class="notesHeader"><strong>Notes:</strong></div>
                        <div class="notes"><?=$data[7]?></div>
                    </div>

                </div>
            </div>

    <?php endif ?>
    <?php endif ?>
    <?php endforeach; ?>

</body>
</html>
