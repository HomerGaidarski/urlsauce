<?php
// randomized 0-9, a-z, A-Z
	$baseString = 'K3JoDrnZyuCSFhz1RiIjdG4Tf8kYOUg9qcEP0N2b7QtsHmXpA6BwvLWM5xeVla';
	$base = strlen($baseString);
	$indexToCharMap = str_split($baseString);
	$charToIndexMap = array_flip($indexToCharMap);



	// converts tiny url code to unique index to search in the DB
	function urlToIndex($url)
	{
		global $charToIndexMap, $base;
		$result = 0;
		$charArray = str_split($url);
		$length = count($charArray);
		for ($i = 0; $i < $length; $i++)
		{
			$exponent = $length - $i - 1;
			$result += $charToIndexMap[$charArray[$i]] * pow($base, $exponent);
		}
		return $result;
	}

	// converts unique index from the DB to the tiny url code
	function indexToURL($num)
	{
		if ($num == 0)
			return 'K';
		global $indexToCharMap, $base;
		$url = '';
		$i = 0;
		while ($num != 0)
		{
			$remainder = $num % $base;
			$num =  floor($num / $base);
			$url = $indexToCharMap[$remainder] . $url;
			$i++;
		}
		return $url;
	}
	for ($i = 0; $i < 10000000000000; $i++)
	{
		$tinyUrl = indexToURL($i);
		if (urlToIndex($tinyUrl) == $i)
			echo $i,': ',$tinyUrl,"\n";
		else
			echo "YOU'RE BAD!!!!";
		
	}


