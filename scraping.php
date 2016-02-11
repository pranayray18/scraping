<head>
<title>Scraping</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
</head>
<body>
		<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
		<div class="row">
			<div class="col-lg-4 col-xs-2 col-md-3">
			</div>
				<div class="col-lg-4 col-xs-8 col-md-6">
					<h1>Scraping</h1>
					<div class="form-group">
					<input autocomplete="off" class="form-control"type="text" placeholder="Enter a Word" name="name">
					</div>
					<button class="btn btn-default" type="submit" name="submit">
					<span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
					Submit</button>
					</form>
					
					
				</div>
			<div class="col-lg-4 col-xs-2 col-md-3">
			</div>
		</div>
		</form>
		</body>




<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
		$word=$_POST["name"];
		$lnk='http://dictionary.reference.com/browse/'.$word;
 
$string=file_get_contents($lnk);
//$string =preg_replace('/\s+/', ' ', $string);
if(preg_match_all('@<div class="def-content">\s+(.*)\s+<div class="def-block def-inline-example">@',$string,$match_mean))
{
	//var_dump($match_mean) ;
}
else
{
	echo "not found";
}
if(preg_match_all('@<span class="dbox-example">(.*?)</span>@',$string,$match_ex))
{
	//var_dump($match_ex) ;
}
else
{
	echo "not found";
}

/*echo "Normal count MM: " . sizeof($match_mean)."<br>";
echo "Recursive count MM: " . sizeof($match_mean,1)."<br>";

echo "Normal count:ME " . sizeof($match_ex)."<br>";
echo "Recursive count:ME " . sizeof($match_ex,1)."<br>";*/

$size=(sizeof($match_mean,1)-sizeof($match_mean))/2;
for($i=0;$i<$size;$i++)
{
	echo "Meaning : ".$match_mean[1][$i]."<br>";
	echo "Example : ".$match_ex[1][$i]."<br>";
	echo "<br>";
}


}
?>


