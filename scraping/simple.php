
<?php 

	//$html = file_get_contents('https://www.milenio.com/'); //Convierte la información de la URL en cadena
	//echo $html;
	require_once('simple_html_dom.php');

	$html = file_get_html('http://slashdot.org/');
	//$articles = [];

	var_dump($html->find('article'));

	// Find all article blocks
	//foreach($html->find('article') as $article) {
		//print_r($article);
		//$item = [];
	    //$item['title']     = $article->find('div.story-title', 0)->plaintext;
	    //$item['intro']    = $article->find('div.body', 0)->plaintext;
	    //$item['details'] = $article->find('div.details', 0)->plaintext;
	    //print_r($item);
	    //array_push($articles, $item);
	//}

	//print_r($articles);

?>