<link rel="stylesheet" href="view/css/style.css"/>
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
            <small id="costHelp" class="form-text text-muted">€</small>
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
</body>

<?php
echo "<div class='listContainer'>";
if(isset($_POST['send'])):?>
<ul>
        <?php foreach($_POST as $label => $item):?>
           <li><?=$item;?></li>
        <?php endforeach;?>
</ul>
<?php endif;
echo "</div>";
?>