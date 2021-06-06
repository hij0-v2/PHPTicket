<!doctype html>
<head>
    <link rel="stylesheet" href="view/css/style.css"/>
</head>
<body>
<div class="container">
    <form method="post">
        <div class="form-group" id="fullName">
            <label for="fullName">Vardas, pavarde</label>
            <input type="text" class="form-control" id="fullName" name="fullName" aria-describedby="fullNameHelp">
            <small id="fullNameHelp" class="form-text text-muted">Iveskite varda ir pavarde</small>
        </div>
        <div class="form-group" id="inputID">
            <label for="inputID">Asmens kodas</label>
            <input type="text" class="form-control" id="inputID" name="inputID" aria-describedby="idHelp">
            <small id="idHelp" class="form-text text-muted">Jusu asmens kodas</small>
        </div>
        <div class="form-group" id="inputCost">
            <label for="inputCost">Kaina</label>
            <input type="text" class="form-control" id="inputCost" name="inputCost" aria-describedby="costHelp">
            <small id="costHelp" class="form-text text-muted">$</small>
        </div>
        <div class="form-group">
            <select style="width: 200px" class="form-control" name="flyNumber">
                <option selected disabled>-- Pasirinkite skrydzio numeri</option>
                <?php foreach($flyNumbers as $flyNumber):?>
                    <option value="<?=$flyNumber;?>"><?= $flyNumber?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <select style="width: 200px" class="form-control" name="baggage">
                <option selected disabled>-- Pasirinkite bagazo dydi</option>
                <?php foreach($baggages as $baggage):?>
                    <option value="<?=$baggage;?>"><?= $baggage?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <select style="width: 200px" class="form-control" name="from">
                <option selected disabled>-- Pasirinkite is kur skrisite</option>
                <?php foreach($fromCountry as $from):?>
                    <option value="<?=$from;?>"><?= $from?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <select style="width: 200px" class="form-control" name="to">
                <option selected disabled>-- Pasirinkite i kur skrisite</option>
                <?php foreach($toCountry as $to):?>
                    <option value="<?=$to;?>"><?= $to?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group" id="containerMessage">
            <label for="message">Pastabos</label>
            <textarea class="form-control" id="message" rows="3" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="send">Spausdinti</button>
    </form>
</div>

<?php
if(isset($_POST['send'])):?>
<?php
if(!preg_match('/^([A-Z]+[a-z0-9A-Z)\ .-]{2,100})$/',$_POST['fullName']))
{
    $validation[] = "Vardo pirma raide turi buti is didziosios raides";
}
if(!preg_match('/^([1-6]+[0-9]{10,12})$/',$_POST['inputID']))
{
    $validation[] = "Asmens kodas turi buti valid";
}
if(!preg_match('/^([0-9]+[0-9]{1,6})$/',$_POST['inputCost']))
{
    $validation[] = "Enter a valid price";
}
if(!isset($_POST['flyNumber']))
{
    $validation[] = "Nepasirinkote skrydzio numerio";
}
if(!isset($_POST['baggage']))
{
    $validation[] = "Nepasirinkote bagazo dydzio";
}
if(!isset($_POST['from']))
{
    $validation[] = "Nepasirinkote is kur skrisite";
}
if(!isset($_POST['to']))
{
    $validation[] = "Nepasirinkote i kur skrisite";
}
if(!preg_match('/[A-Za-z0-9\ \']{50,1000}$/',$_POST['message']))
{
    $validation[] = "Zinute nuo 50 iki 1000 char";
}
?>
<?php endif;?>
    <?php if(empty($validation)):?>
    <?php if($_POST['baggage']>20):?>
        <?php $_POST['inputCost']+=30;?>
<?php endif;?>

<table style="margin-top: 10px">
    <thead>
    <tr>
        <td>History</td>
    </tr>
    </thead>
    <tbody> <?php foreach (printData() as $data):?>
        <tr>
            <?php $data = explode(',',$data)?>
            <?php foreach ($data as $arr):?>
                <td><?=$arr?></td>
            <?php endforeach?>
            <td><a id="<?=$data[8]?>" href="ticket.php?id=<?=$data[8]?>">Ticket</a></td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
    <?php endif;?>
<?php if(!empty($validation)):?>
<h2>Ivesti neteisingi duomenys prasome bandyti is naujo.</h2>
<?php foreach ($validation as $err):?>
<p><?=$err?></p>
<?php endforeach;?>
<?php endif?>

</body>
