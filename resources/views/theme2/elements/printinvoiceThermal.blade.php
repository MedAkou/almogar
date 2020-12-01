<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">



<style>
body {
    width: 2500px;
    font-family: 'Raleway', sans-serif;
}

.title_1 {
    font-size: 70px;
}

.dint {
    font-size: 40px;
}

.leftspaced {
    margin-left: 875 px;
}

.hidden {
    display: none;
}

@media print {
    @page {
        margin: 0px 0px !important;
        padding: 0px !imortant;
    }

}
</style>
<p align="center">


<div style='clear:both; '></div>


<img style='width: 250px;margin-left: 400px;'
    src="https://o-bazaar.com/uploads/media/xVqE71pZkbaYeHAnJ5vIMaduPJeyL0WGhkIunrbl.png" alt="">


<div style='clear:both;'></div>

<h2 class="title_1 leftspaced"> ---------------------------------------</h2>



<div style='clear:both;'></div>


<div id="printingDiv">
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'>Bestellnummer #<?php echo $content->id; ?> </h2>
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'> www.o-bazaar.com </h2>
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'> <?php echo $content->store->name; ?> </h2>
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'> <?php echo $content->store->street; ?></h2>
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'> <?php echo $content->store->description; ?></h2>
    <h2 class="title_1 leftspaced" style='margin-left: 270px;'> <?php echo $content->store->postal_code; ?></h2>

    <h2 class="title_1 leftspaced"> ---------------------------------------</h2>


    <h2 class="title_1"> Name : <?php echo $content->addresse->given_name; ?> </h2>
    <h2 class="title_1"> Str.Nr : <?php echo $content->addresse->street; ?></h2>
    <h2 class="title_1"> Hausnummer : <?php echo $content->addresse->housenumber; ?></h2>
    <h2 class="title_1"> Stadt : <?php echo $content->addresse->city; ?></h2>
    <h2 class="title_1"> Plz : <?php echo $content->addresse->postal_code; ?></h2>
    <h2 class="title_1"> E-Mail : <?php echo $content->user->email; ?> </h2>
    <h2 class="title_1"> Telefonnummer : <?php echo $content->user->phone; ?> </h2>
    <h2 class="title_1"> Versand : <?php echo  $content->shipping->name; ?> </h2>
    <h2 class="title_1"> Datum : <?php echo $content->user->created_at; ?> </h2>
    <h2 class="title_1"> Seriennummer : <?php echo $content->serial; ?> </h2>

    <h2 class="title_1 leftspaced"> ---------------------------------------</h2>

    <?php foreach ($content->products as $product) : ?>
    <h2 class="title_1">
        Menge : <?php  echo $product->quantity ; ?>
        <br>
        <?php echo  $product->product->getTranslation('name','de') ; ?>
        <br>
        Preis : <?php  echo $product->price ?> €
    </h2>
    <br>
    <?php endforeach; ?>

    <h2 class="title_1 leftspaced"> ---------------------------------------</h2>
    <h2 class="title_1 "> Versandkosten : <?php echo $content->shipping->cost; ?> € </h2>
    <h2 class="title_1 "> Gesamtsumme : <?php echo $content->getTotal(); ?> € </h2>
    <h2 class="title_1 "> Bezahlen : <?php echo $content->methodinvoice(); ?> </h2>

    <h2 class="title_1 leftspaced"> ---------------------------------------</h2>

    <h2 class="title_1 leftspaced" style='margin-left: 400px;'> Danke für Ihren Einkauf </h2>


</div>
<script type="text/javascript">
function printpage() {
    var printButton = document.getElementById("printingDiv");

    var element = document.getElementById("pr");
    element.classList.add("hidden");


    printButton.style.visibility = 'hidden';
    document.title = "";
    document.URL = "";
    window.print();
    printButton.style.visibility = 'visible';
}
</script>