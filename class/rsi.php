<?php

class rsi{

	function rsiAnaliz($ticks,$birim,$aralik,$sonkac){

			$sayma=json_decode($ticks,true);
			$say= count($sayma);
			$i=0;
			$son_kapanis=0;
			$negatif=0;
			$pozitif=0;
			$negatif_say=0;
			$pozitif_say=0;
			$kapanisagore=[];
			$kapanisagore_son="";

			foreach($sayma as $key) {
				
				
				$son_kapanis=$key["close"];
				 $kapanisagore[$i]=$son_kapanis;	
				if($i>$say-$sonkac-1)
				{
					
					
					if($kapanisagore_son == "" ) {$kapanisagore_son="0";}
					else{
					$kapanisagore_son =$kapanisagore[$i]-$kapanisagore[$i-1];}
					if($kapanisagore_son<0)
					{
						$negatif_say++;
						$negatif = $negatif+$kapanisagore_son;
					}
					else
					{	
						$pozitif_say++;
						$pozitif = $pozitif+$kapanisagore_son;
					}
				}
				$i++;
			}

			$yeni_rsi=($pozitif/$pozitif_say)/(($negatif/$negatif_say)*(-1));
			$rsi=100-(100/(1+$yeni_rsi));
			$data["rsi"]=$rsi;
			$data["price"]=$son_kapanis;
			return $data;
			}

	}
