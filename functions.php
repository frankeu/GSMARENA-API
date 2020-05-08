<?php
//************* GSMARENA API CORE END **************
//************* CODED BY IZUL WAHIDIN *************

//Fungsi curl/Grab [Start]
function grab($url){
    return preg_replace('/\r|\n/','',file_get_contents($url));
}
//Fungsi curl/Grab [End]

//Fungsi Multi Preg Match [Start]
function pregAll($regex,$data){
    preg_match_all($regex,$data,$result);
    return $result;
}
//Fungsi Multi Preg Match [End]

//Fungsi Single Preg Match [Start]
function pregOne($regex,$data){
    preg_match($regex,$data,$result);
    return $result;
}
//Fungsi Single Preg Match [End]

//Fungsi Strip HTML [Start]
function stripGan($data){
	return strip_tags($data,'<sup>');
}
//Fungsi Strip HTML [End]

//Fungsi Recursive Convert ke utf8 [Start]
function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}
//Fungsi Recursive Convert ke utf8 [End]

//Fungsi GSMARENA [Start]
function gsmarena($gsm){
	$data = grab($gsm);
	$data_explode_table = explode('<table cellspacing="0">',$data);
	unset($data_explode_table[0]);
	foreach($data_explode_table as $key => $value){
		$main = pregOne('/<th(.*?)>(.*?)<\/th>/',$value);
		$subA = pregAll('/<td class="ttl">(.*?)<\/td>/',$value);
		$subB = pregAll('/<td class="nfo"(.*?)>(.*?)<\/td>/',$value);
		$mains[] = $main[2];
		$subAs[] = array_map('stripGan',$subA[1]);
		$subBs[] = array_map('stripGan',$subB[2]);
	}
	$result = array();
	foreach($mains as $key => $value){
		$result = array_merge(
			$result,
			array(
				$value => array(
					$subAs[$key],
					$subBs[$key]
				)
			)
		);
	}
	return json_encode(utf8ize($result),JSON_PRETTY_PRINT);
}
//Fungsi GSMARENA [END]

//*************  CODED BY IZUL WAHIDIN *************
//************* GSMARENA API CORE END **************
?>