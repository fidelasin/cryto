<?php
require 'php-binance-api.php';
require 'class/rsi.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
$api = new Binance\API("BINANCEAPI","BINANCEKEY");
$api->useServerTime() ;

$birim="HOTUSDT"; 
$aralik="1m"; //time limit
$sonkac="14"; //how many data
 $ticks = json_encode($api->candlesticks($birim, $aralik));

 $veri =new rsi();
$data=$veri->rsiAnaliz($ticks,$birim,$aralik,$sonkac);
echo "<br>rsi: ".$data["rsi"];
echo "<br>price: ".$data["price"];
