<?php

	$json_source = file_get_contents("data.json");
	$json_data = json_decode($json_source, true);

	$json_source = file_get_contents($_GET["campaign"]."/persos.json");
	$json_persos = json_decode($json_source, true);

	$glabel = "";

	function search_in_data($data, $index){
		global $glabel;

		if(isset($data[$index]["nom"])){
			if(count($data[$index]) <=2 && $glabel != "items"){
				return $data[$index]["nom"];
			}else{
				return $data[$index];
			}
		}else{
			return "Data not found";
		}
	}

	function until_the_end_or_three($n){
		global $json_data;
		if(is_array($n)){
			foreach ($n as $key => $value) {
				if(array_key_exists($key,$json_data)){
					$n[$key]=search_in_data($json_data[$key], $value);
				}
			}
		}
		return $n;
	}

	foreach($json_persos["joueurs"] as $global=>$perso){


		foreach($perso as $label=>$val)
		{
			if($label !="id" && array_key_exists($label, $json_data))
			{
				$glabel = $label;
				if(is_array($val)){
					$json_persos["joueurs"][$global][$label]=array_map("until_the_end_or_three", $val);
				}else{
					$json_persos["joueurs"][$global][$label] = search_in_data($json_data[$label], $val);
				}
			}
		}
		$cpt++;
	}
?>