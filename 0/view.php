<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Les Marcheurs, le Retour de la Vengeance</title>
  <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Cinzel+Decorative|Playfair+Display+SC|Sacramento|Uncial+Antiqua" rel="stylesheet">
  <link rel="stylesheet" href="<?php print $_GET["campaign"]."/"; ?>style.css">

</head>
<body>
	<?php 

	function get_item_name($needle, $haystack){
		foreach($haystack as $hay=>$strand){
			if($strand["items"]["id"]==$needle){
				return $strand["items"]["nom"];
			}
		}
		return "Item not Found";
	}

	?>

	<header><?php print $json_persos["campagne"]; ?></header>

	<div id="fiches">
	<?php
	foreach($json_persos["joueurs"] as $key=>$value){?>
		<div class="fiche_perso">
			<div class="avatar"><div class="cadreavatar"><img src="<?php print $_GET["campaign"];?>/img/<?php print $value["img"]; ?>"/></div></div>
			<div class="abs"><h2><?php print $value["prenom"]." ".$value["nom"];?></h2>
			</div><div class="demi infos openable"><h3>Informations de base</h3>
				<p><span>Joueur: </span><?php print $value["joueur"]; ?></p>
				<p><span>Niveau: </span><?php print $value["niveau"];?></p>
				<p><span>Classe: </span><?php print $value["classe"]."/".$value["spe"]["nom"]; ?></p>
				<p><span>Alignement: </span><?php print $value["alignement"];?></p>
				<p><span>Totem: </span><?php print $value["totem"];?></p>
				<p><span>Posture de base: </span><?php print $value["posture"]["nom"];?></p>
				
			</div><div class="demi subtitle"><?php print $value["subtitle"];?>
			</div>
			<div>
				<table>
					<tr><!--
						--><th><span>Physique</span></th><!--
						--><th><span>Esprit</span></th><!--
						--><th><span>Social</span></th>
					</tr>
					<tr>
						<td><?php print $value["physique"];?></td>
						<td><?php print $value["esprit"];?></td>
						<td><?php print $value["social"];?></td>
					</tr>
				</table><!--
				--><table>
					<tr><!--
						--><th><span>Magie</span></th><!--
						--><th><span>Vie</span></th><!--
						--><th><span>Totem</span></th>
					</tr>
					<tr>
						<td><?php print $value["magie"];?></td>
						<td><?php print $value["vie"];?></td>
						<td><?php print $value["pts_totem"];?></td>
					</tr>			
				</table>
				<div class="inventory openable">
					<h3>Inventaire</h3>
					<ul>
						<?php
							foreach($value["items"] as $items=>$item){
								
								print "<li><span>".$item["items"]["nom"]."</span>";
								
								if(isset($item["items"]["carac"]) && $item["items"]["carac"] != ""){
									print " - ".$item["items"]["carac"];
								}

								print "</li>";
							}
						?>
					</ul>
				</div>
			</div>
			<div class="dons openable">
				<h3>Dons</h3>
				<ul>
				<?php
					foreach($value["don"] as $don=>$pouvoir){
						print "<li><span>".$pouvoir["don"]["nom"].":</span> ".$pouvoir["level"];
						if(!isset($pouvoir["other_count"])){
							print " / +".($pouvoir["level"]*5)."%";
						}
						print "</li>";
					}
				?>
				</ul>
			</div><div class="aptitudes openable">
				<h3>Aptitudes</h3>
				<ul>
					<?php
						foreach($value["sorts"] as $sorts=>$sort){
							print "<li><span>".$sort["sorts"]["nom"];

							if(isset($sort["sorts"]["carac"]) && $sort["sorts"]["carac"] != ""){
								print ": </span>".$sort["sorts"]["carac"];
							}else{
								print "</span>";
							}

							print "</li>";
						}

						foreach($value["enchant"] as $enchant=>$ench){
							print "<li><span>".$ench["enchant"]["nom"];

							if(isset($ench["enchant"]["carac"]) && $ench["enchant"]["carac"] != ""){
								print ": </span>".$ench["enchant"]["carac"];
							}else{
								print "</span>";
							}

							if(isset($ench["on"])){
								$on_item = get_item_name($ench["on"], $value["items"]);
								print " - sur ".$on_item;
							}

							print "</li>";
						}
					?>
				</ul>
			</div>
			<div class="histoire openable">
				<h3>Histoire</h3>
				<div class="histoire_content"><?php print $value["histoire"]; ?></div>
			</div>
		</div>
	<?php } ?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$("document").ready(function(){
			$("h3").click(function(e){
				if( ! $(e.target).parent().hasClass("histoire") ) {
					$(e.target).parent().children().not("h3").slideToggle();
				}
			});
		});
	</script>
</body>
</html>