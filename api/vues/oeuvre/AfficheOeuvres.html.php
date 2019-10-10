    <!-- 
**************************************************************************
**************************************************************************
**************************************************************************
    TODO: 

    - SÉCURISER GOOGLE API KEY (lignes 13-15)
    - HIDE/SHOW CARTE/LISTE
    - BULLES D'INFO (ELEVER INLINE CSS)

**************************************************************************
**************************************************************************
**************************************************************************
    -->
<!--
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8S4xg4xxyN0iGGBdUOpR3xRa4DIkD710&callback=initMap"
    async defer>
    </script>
-->
<script src = "../js/choixAffichage.js"></script>

<article class="filtres hidden">
	<section class="mesOeuvres">
		<h2>Mes oeuvres</h2>
		<section>
			<div class= "critere">
				<i class="material-icons">check_circle_outline</i>
				<p>Déja visitées</p>
			</div>
			<div class= "critere">
				<i class="material-icons">star_border</i>
				<p>À visiter</p>
			</div>
			<div class= "critere">
				<i class="material-icons">favorite_border</i>
				<p>Favorites</p>
			</div>
		</section>
		
	</section>
	<section class="type">
		<h2>Type d'oeuvre</h2>
		<section>
		<!-- Faire L'affichage des types d'oeuvre dynamiquement -->
		<?php
			//var_dump($aTypes);
			foreach ($aTypes as $cle => $type) {
				?>
				<div class= "critere">
				<i class="material-icons">check_box_outline_blank</i>
				<p>
				<?php
				echo $type["Nom"];
				?>
				</p>
			</div>
			<?php
			}
				?>
		</section>
	</section>

	<!-- Faire L'affichage des dates dynamiquement -->
	<!-- Aller chercher dans la BD les dates la plus récente et la plus vieille-->
	<section class="date">
		<h2>Dates</h2>
		<section>
		<?php
	
		$aDatesC=[];
		foreach($aDates as $cle => $date){
			if($date["dateCreation"] !== NULL && $date["dateCreation"] !== "NULL"){
				$dates= explode("/", $date["dateCreation"]);
				if(count($dates)>1){
					$aDatesC[] = $dates[2];
				}
			}
		}
		sort($aDatesC);
		echo "<p>".$aDatesC[0]."</p>";
		echo "<p>".$aDatesC[count($aDatesC)-1]."</p>";

		?>
		</section>
	</section>
	<!-- Faire L'affichage des arrondissements dynamiquement -->
	<section class="arrond">
		<h2>Arrondissement</h2>
		<section>

		<!-- Faire L'affichage des arrondissements dynamiquement -->
		<?php
			//var_dump($aArrond);
			foreach ($aArrond as $cle => $arrond) {
				?>
				<div class= "critere">
				<i class="material-icons">check_box_outline_blank</i>
				<p>
				<?php
				echo $arrond["Arrondissement"];
				?>
				</p>
			</div>
			<?php
			}
				?>




		<?php
		// $aArrond=[];
		// foreach ($aData as $cle => $oeuvre) {
		// 	extract($oeuvre);
		// 	$verif="";
			//echo $Arrondissement;
		// 	if(count($aArrond)>0 && !is_null($Arrondissement)){
		// 		foreach($aArrond as $cle => $arrond){
		// 			if($Arrondissement !== $arrond && $verif !== false){
		// 				$verif = true;
		// 			}else if ($Arrondissement == $arrond) {
		// 				$verif = false;
		// 			}
		// 		}
		// 		if($verif && !is_null($Arrondissement)){
		// 			$aArrond[]= $Arrondissement;
		// 		}
		// 	}else{
		// 		$aArrond[]= $Arrondissement;
		// 	}
		// }
		// sort($aArrond); 
		// foreach($aArrond as $cle => $arrond){
			?>
			<!-- <div class= "critere">
				<i class="material-icons">check_box_outline_blank</i>
				<p>-->
					<?php 
					//echo $arrond
					?>
				<!-- </p> 
			</div> -->
			<?php
		// }
		?> 

		</section>
	</section>
	<section class="back">
		<i class="material-icons">arrow_back</i>
	</section>
</article>
		<section class="recherche">
			<svg class="vueListe" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
			<div class="vueChoisie">
<!--				<p class="flecheLien">❮</p>-->
				<svg class="vueCarte focus" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
<!--				<a href="" class="flecheLien">❯</a>-->
			</div>
			<svg  class="vueImage" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
		</section>
        <div id="map" class="carte" style="height:500px;"></div>  
		 <section class="contenu listeOeuvres">
			<!-- <section class="rechercher"></section> -->
            <section class="oeuvres flex wrap">
						<?php

        
//echo '<pre>';
//print_r($aData);
//echo '</pre>';
                        $data2 = [];
						foreach ($aData as $cle => $oeuvre) {
                            array_push($data2, $oeuvre);
							extract($oeuvre);
							?>
							<section class="oeuvre conteneur_oeuvre_courante">
								
			                    <header class="image dummy image_oeuvre_courante">
								<a class="ouvrir-oeuvre" href="oeuvre/<?php echo $id_oeuvre ?>" data-link="/artPublic/api/oeuvre/<?php echo $id_oeuvre ?>/" data-id="<?php echo $id_oeuvre ?>">
								<h2 class="titre-oeuvre"><?php echo $Titre?></h2>
								</a>	
									<a class="ouvrir-oeuvre" href="oeuvre/<?php echo $id_oeuvre ?>" data-link="/artPublic/api/oeuvre/<?php echo $id_oeuvre ?>/" data-id="<?php echo $id_oeuvre ?>"><div class="img" data-img="<?php if(isset($NoImage) && !empty($NoImage)){ echo $NoImage;}else{ echo "default";}?>"></div>
									<!-- <img src="/art-public-mtl/img/placeholder_640_480.jpg" /> -->
								</a>
			                    </header>
			                    <section class="texte_pied_image">
			                        <!-- <p class="description">
			                            <?php echo $Description ?> 
									</p> -->
									<?php 
									foreach($Artistes as $artiste){
										extract($artiste);
										?>
										<p class="auteur_liste_oeuvre"><a href="artiste/<?php echo $id_artiste ?>">
                           <?php 
                            if(isset($Nom) && $Nom!=""){
                                echo $Nom ." ". $Prenom;
                            }
                            else
                            {
                                echo $NomCollectif;
                            }
                                        ?></a></p>
									<?php
									}
									?>
									<p class="date_creation">
										<?php 
										$dateOeuvre= explode("/", $dateCreation);
										if(count($dateOeuvre)>1){
											$anneeOeuvre = $dateOeuvre[2];
										}
										echo $anneeOeuvre;
									
									?></p>
			                    </section>
			                    <!-- <footer class="barre-action">
			
								<!<button class="ouvrir-oeuvre" data-link="/artPublic/api/oeuvre/<?php echo $id_oeuvre ?>/" data-id="<?php echo $id_oeuvre ?>">En savoir plus...</button>
			                    </footer> -->
			                </section>
							<?php
							/*
							 <section class="oeuvre">
								<h2 class="titre"><a href="/artPublic/api/oeuvre/<?php echo $oeuvre['id'] ?>"><?php echo $oeuvre['Titre']?></a></h2>	
							</section>
							 */
						}
						?>
					</section>
				
			</section>
			<article class="filtre">
				<i class="material-icons">filter_list</i>
			</article>

<script>
    
    var map;
        
    //data oeuvres  
    
    var oeuvres = [];
    let aOeuvres=<?php echo(json_encode($aData));?>;
//    console.log(JSON.parse(aOeuvres));
//    console.log(aOeuvres[0]);
    aOeuvres.forEach(function(element)
    {
        var titre = element["Titre"];
        var lat = element["CoordonneeLatitude"];
        var lng = element["CoordonneeLongitude"];
        var artiste = element["Artistes"];
        var nom = artiste[0]["Nom"];
        var date = element["dateCreation"];
        if(date=="NULL" || typeof date != "string"){
            date="";
        }else{
            date = date.substr(6,4);
        }
        var id = element["id_oeuvre"];
        var oeuvre = [];
//        oeuvre.push(titre+", "+lat+", "+lng+", "+nom+", "+date+", "+id);
        oeuvre.push(titre,parseFloat(lat),parseFloat(lng),nom,date,parseFloat(id));
        oeuvres.push(oeuvre);
    })
//    console.log(oeuvres);

    function setMarkers(map) 
    {
        //marqueur pour chaque oeuvre
        var icon = {
            url: "../img/icons/mapmarker.png", // url
             scaledSize: new google.maps.Size(28, 40), // size
        };

//        console.log("l");
        
        //pour chaque oeuvre dans le tableau
        for (var i = 0; i < oeuvres.length; i++) 
        {
            var oeuvre = oeuvres[i];

            
/************
*************
            
TODO : enlever inline CSS
            
*************
*************
*/
            //contenu de la bulle d'information
            var content = '<div><p style="color:#103C61; font-size:30px; font-family: Open Sans; font-style: normal; font-weight: bold; font-size: 18px; line-height: 25px; display: flex; align-items: center; text-transform: uppercase;">'+oeuvre[0]+'</p>'+'<p style="color:#103C61;">'+oeuvre[3]+', '+oeuvre[4]+'</p>'+'<a href="oeuvre/'+oeuvre[5]+'" style="color:#DF8E32; text-decoration:none;">'+"Plus d'informations >"+'</a></div>';
            var infowindow = new google.maps.InfoWindow();
            
            //paramètres des marqueurs
            var marker = new google.maps.Marker({
                position: {lat: oeuvre[1], lng: oeuvre[2]},
                map: map,
                icon: icon,
                title: oeuvre[0]
            });  
            
            //ouvrir la bulle d'information de l'oeuvre
            google.maps.event.addListener(marker, 'click', function(content)
            {
                return function()
                {
                    infowindow.setContent(content);
                    infowindow.open(map, this);
                }
            }(content));
            
            // Limites de la carte
            var allowedBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(45.4079982, -73.9446209), 
                new google.maps.LatLng(45.6876557, -73.5051969));
                // Après avoir drag (glissé) le curseur
                google.maps.event.addListener(map, 'dragend', function()
                {
                    if (allowedBounds.contains(map.getCenter())) return;

                 // Rediriger la carte vers la dernière limite connue

                 var c = map.getCenter(),
                     x = c.lng(),
                     y = c.lat(),
                     maxX = allowedBounds.getNorthEast().lng(),
                     maxY = allowedBounds.getNorthEast().lat(),
                     minX = allowedBounds.getSouthWest().lng(),
                     minY = allowedBounds.getSouthWest().lat();

                 if (x < minX) x = minX;
                 if (x > maxX) x = maxX;
                 if (y < minY) y = minY;
                 if (y > maxY) y = maxY;

                 map.setCenter(new google.maps.LatLng(y, x));
               });
        }
    }        
    </script>
    <script src = "../js/initMapOeuvres.js"></script>
			
			