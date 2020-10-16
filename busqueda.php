<?php
    require 'index.php';
    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;

    $source = 'es';
    $target = 'en';
    $trans = new GoogleTranslate();

    $pais = $_POST['pais'];
    $pais = ucfirst($pais);
    $text = $pais;
    $resultPaisTraducido = $trans->translate($source, $target, $text);
    $resultadoSlugPais = str_replace(' ','-',$resultPaisTraducido);
    $datos = new info();
    $datos = $datos->getAllCountries();
    foreach($datos->Countries as $key){
        if($key->Country == $resultPaisTraducido || $key->Slug == strtolower($resultadoSlugPais)){
            $code = $key->CountryCode;
            $flag = "https://www.countryflags.io/$code/flat/64.png";
            $totalConfirmadosBusqueda = $key->TotalConfirmed;
            $totalFallecidosBusqueda = $key->TotalDeaths;
            $totalRecuperadoBusqueda = $key->TotalRecovered;
        }
    }
?>
<div class="container" id="result">
    <?php if($flag != FALSE):?>
    <b><h2 style="color:black; background: #FFC107;">Registro de <?=$resultPaisTraducido?></h2></b>
    <div class="row align-items-center justify-content-center  text- center">
        <div class="col-sm-12 col-md-6">
            <img src="<?=$flag?>" width="200px" height="auto" alt="bandera">
            <h2><?=$resultPaisTraducido?></h2>
        </div>
        <div class="col-sm-12 col-md-6">
            <h3 style="color: green">Recuperados</h3>
            <p style="color: green"><?=$totalRecuperadoBusqueda?></p>
            <h3 style="color: darkgrey">Confirmados</h3>
            <p style="color: darkgrey"><?=$totalConfirmadosBusqueda?></p>
            <h3 style="color: darkred">Fallecidos</h3>
            <p style="color: darkred"><?=$totalFallecidosBusqueda?></p>
        </div>
    </div>
    <br>
    <br>
    <br>
    <?php else:?>
    <div class="row text- center">
        <div class="col-sm-12">
            <h2>No hay datos para mostrar de <?=$resultPaisTraducido?></h2>
        </div>
    </div>
    <?php endif;?>
</div>
<br>
    <br>
    <br>