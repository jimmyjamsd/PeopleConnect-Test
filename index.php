<?php 
$peopledata = json_decode(file_get_contents("people.json"), true);
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Jimmy Nguyen's PeopleConnect test</title>
</head>

<body>
<?php 
echo '<pre>
  <code>';
	
	//singular and plural fixer
	function addS($counted,$addthis){
		if ($counted != '1'){
			echo $addthis;
		} 
	}
	
	foreach ( $peopledata as $persons ) {
	
			$locationcount = count($persons[locations]);
			$phonecount = count($persons[phones]);
			$emailcount = count($persons[emails]);
	
			//template to loop
			echo htmlentities('<title>'.$persons[name][firstName].' '.$persons[name][lastName].' Found | Website.com </title>
<meta name="description" content="'.$persons[name][firstName].' '.$persons[name][lastName].' has lived in 1 of '.$locationcount.' locations including '.$persons[locations][0][city].', '.$persons[locations][0][state].', has '.$phonecount.' phone number');
			
			//add an s if there's more than one phone number
			addS($phonecount,'s');
					  
			echo htmlentities(', and '.$emailcount.' email address');
			
			//add an s if there's more than one email
			addS($emailcount,'es');
			
			echo htmlentities('">'."\n\n");
	  	
}

echo '</code>
</pre>
';
?>


</body>
</html>