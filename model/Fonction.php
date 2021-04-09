<?php

 function roulette($mise,$argent,$nombre,$parite){

if ($mise>0 && $mise<=$argent) 
{

	$argent = $argent-$mise;
	

	if ($nombre>0 || $parite=='pair' || $parite=='impair')
	{

		echo "<p>DEBUT JEU ! Vous avez misé : ".$mise."€</p>";

		$pif=rand(1,36);
		

		if ($nombre>0 && $nombre<37) 
		{

		
			if ($nombre==$pif) 
				{
					$mise=$mise*35;
					$argent=$mise+$argent;
					echo "<p>Vous avez parié ".$nombre." et ".$pif." est tombé.... Bravo vous avez gagné ".$mise."€</p>";
					
				}

			else echo "<p>Vous avez parié ".$nombre." et ".$pif." est tombé.... Dommage vous perdez tout... Retentez votre chance on ne va pas rester sur un échec ;)</p>";

		}

		else if ($parite!="")
		{
			

			if ($pif%2==0) 
			{
				if ($parite=='pair') 
				{
					$mise=$mise*4;
					$argent=$mise+$argent;
					echo '<p>Vous avez parié pair et le nombre '.$pif.' est tombé.... Bravo vous avez gagné '.$mise."€</p>";
				}

				else echo '<p>Vous avez parié impair et '.$pif.' est tombé.... Dommage vous perdez tout... On ne va pas rester sur un échec ;)</p>';
			}

			elseif ($pif%2!=0) 
			{
				if($parite=='impair')
				{
					$mise=$mise*4;
					$argent=$mise+$argent;
					echo '<p>Vous avez parié impair et le nombre '.$pif.' est tombé.... Bravo vous avez gagné '.$mise."€</p>";

				}

				else echo '<p>Vous avez parié pair et '.$pif.' est tombé.... Dommage vous perdez tout... On ne va pas rester sur un échec ;)</p>';

			}

		
		}

		else{
			echo "Vous n'avez pas parié sur une parité et votre nombre n'est pas compris dans l'intervalle 1-36.";
			$argent = $argent+$mise;

		}
		
	}

	else 
	{

		echo "<p>Vous n'avez pas parié sur un nombre ou une parité.";
		$argent = $argent+$mise;
		return $argent;
	

	}

return $argent;

}


else echo "<p>Vous n'avez pas misé ou n'avez pas asssez d'argent veuillez en rajoutez ou misez moins</p>";
	return $argent;

}