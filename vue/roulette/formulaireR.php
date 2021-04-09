<p>Bonjour <?= htmlspecialchars($_SESSION['util']) ?>, vous disposez de <?= $_SESSION['argent'] ?>€</p>

<form action="index.php" method="post">
    			
    				<label>Votre mise : <input type="number" name="Somme" min="1"></label>
    				<label>Votre nombre : <input type="number" name="Nombre" min="1" max="36" step="1"></label>
    				<fieldset id="parite">
    				<p>Pair ou impair</p>
    				<label>Pair<input type="radio" name="Pair" value="pair"></label>
    				<label>Impair<input type="radio" name="Impair" value="impair"></label>
    				</fieldset>
    				
    				<button name="Mise" value="Mise">Miser !</button>

    		</form>

    	</section>