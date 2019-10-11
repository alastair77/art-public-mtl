<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2016-03-03
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 */
 
 /*
 * TODO : Commenter selon les standards du département.
 *
 */

 
 
class FiltreControlleur extends Controlleur 
{
	// GET : 

	
	public function getAction(Requete $requete)
	{
		echo "get filtre";
        
	}
	
	public function postAction(Requete $requete)
    {
		//echo (JSON_encode($requete));
		if(!empty($requete->parametres)){

		


		// foreach($filtre as $key=> $condition){
		// 	$res .= $key." IN(";
		// 	foreach($condition as $id){
		// 		$res.=$id.",";
		// 	}
		// 	$res.=")";
		// }
			$oOeuvre = new Oeuvre();
			$aOeuvre = $oOeuvre->getListeFiltre();

			echo JSON_encode($aOeuvre);
		}        
		//echo "allo"; 
	}
}
?>