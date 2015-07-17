<?php
// useful string functions:

function println($str = '')
{
	print $str."\n";
}


function printbr($str = '', $noBrIfStrEmpty = false)
{
	print $str;
	if ($str != '' || !$noBrIfStrEmpty)
		print "<br>\n";
}


function extractFilename($path)
{
	$filename = $path;
	$n = strrpos($path, "/");
	if ($n !== false)
		$filename = substr($filename, $n + 1);
	return $filename;
}


function isVowel($ch)
{
	$ch = strtolower($ch);
	return in_array($ch, array("a", "e", "i", "o", "u"));
}


function plural($str, $n = 0, $returnNum = false)
{
	// if $n == 1, returns $str (which should be singular form)
	// if $n != 1, returns the plural form of $str
	// Please note this function covers most but not all English plurals.
	if ($n == 1)
		$result = $str;
	else
	{
		// find plural form:
		$len = strlen($str);
		$lastCh = $str{$len - 1};
		$secondLastCh = $str{$len - 2};
		$last2Chars = $lastCh.$secondLastCh;
		if ($lastCh == ".")
		{
			// it's an abbreviation, no change:
			$result = $str;
		}
		else if ($last2Chars == 'is') // e.g. synopsis -> synopses
		{
			// change 'is' to 'es':
			$result = substr($str, 0, $len - 2).'es';
		}
		else if (
			in_array($lastCh, array('s', 'z', 'x')) ||
			in_array($last2Chars, array('ch', 'sh')) ||
			in_array($str, array('echo', 'embargo', 'hero', 'potato', 'tomato', 'torpedo', 'veto')))
		{
			// add 'es':
			$result = $str.'es';
		}
		else if ($lastCh == 'f') // e.g. elf
		{
			// change 'f' to 'ves':
			$result = substr($str, 0, $len - 1).'ves';
		}
		else if ($last2Chars == 'fe') // e.g. life
		{
			// change 'fe' to 'ves':
			$result = substr($str, 0, $len - 2).'ves';
		}
		else if ($lastCh == "y" && !isVowel($secondLastCh))
		{
			// ends in a consonant followed by 'y', change to 'ies':
			$result = substr($str, 0, $len - 1)."ies";
		}
		else
		{
			// most other cases, add 's':
			$result = $str."s";
		}
	}
	// return result:
	if ($returnNum)
		return $n.' '.$result;
	else
		return $result;
}


function strtonum($str)
{
	// removes the commas inserted by a numberFormat or a user, and converts to a number:
	return str_replace(",", "", trim($str)) / 1;
}


function strtoint($str)
{
	return round(strtonum($str));
}


function nl2brs($str, $add_newlines = true)
{
	$str = trim($str);
	$str = str_replace("\r\n", "<br>", $str);
	$str = str_replace("\n", "<br>", $str);
	$str = str_replace("\r", "<br>", $str);
	if ($add_newlines)
		$str = str_replace("<br>", "<br>\n", $str);
	return $str;
}


function nl2commas($str)
{
	$str = trim($str);
	$str = str_replace(",\r\n", ", ", $str);
	$str = str_replace("\r\n", ", ", $str);
	$str = str_replace(",\n", ", ", $str);
	$str = str_replace("\n", ", ", $str);
	$str = str_replace(",\r", ", ", $str);
	$str = str_replace("\r", ", ", $str);
	return $str;
}


function nl2slashn($str)
{
	// replaces newlines and carriage returns with backslash codes:
	// (useful for outputting strings to javascript)
	$str = trim($str);
	$str = str_replace("\n", "\\n", $str);
	$str = str_replace("\r", "\\r", $str);
	$str = str_replace("\t", "\\t", $str);
	return $str;
}


function addslashes_nl($str)
{
	// same as addslashes but also converts newlines and carriage returns to backslash codes:
	return nl2slashn(addslashes($str));
}


function twoDigits($n)
{
	return str_pad($n, 2, '0', STR_PAD_LEFT);
}


function threeDigits($n)
{
	return str_pad($n, 3, '0', STR_PAD_LEFT);
}


function stripNonDigits($str)
{
	// returns $str with all non-digit chars removed:
	$str = $str.'';
	if ($str == '')
		return '';
	$result = '';
	for ($i = 0; $i < strlen($str); $i++)
	{
		if (ctype_digit($str{$i}))
			$result .= $str{$i};
	}
	return $result;
}


function stripNonAlpha($str)
{
	// returns $str with all non-letter chars removed:
	$str = $str.'';
	if ($str == '')
		return '';
	$result = '';
	for ($i = 0; $i < strlen($str); $i++)
	{
		if (ctype_alpha($str{$i}))
			$result .= $str{$i};
	}
	return $result;
}


function stripWhitespace($str)
{
	// returns $str with all whitespace characters removed:
	$str = $str.'';
	if ($str == '')
		return '';
	$result = '';
	for ($i = 0; $i < strlen($str); $i++)
	{
		if (!ctype_space($str{$i}))
			$result .= $str{$i};
	}
	return $result;
}


function containsDigit($str)
{
	// returns true if $str contains a digit:
	for ($i = 0; $i < strlen($str); $i++)
	{
		if (ctype_digit($str{$i}))
			return true;
	}
	return false;
}


function splitName($name, &$title, &$firstName, &$lastName)
{
	// Splits $name into:
	//    * social title
	//    * first name (including middle names or initials)
	//    * last name (including nobiliary particles)
	// Note, does not work with names where the surname is not at the end, i.e. Asian

	// social titles:
	$socialTitles = array('mr', 'mrs', 'miss', 'ms', 'dr', 'prof');

	// words that belong in the surname:
	$nobiliaryParticles = array('a', 'bat', 'ben', 'bin', 'da', 'das', 'de', 'del', 'della', 'dem', 'den', 'der', 'des', 'di', 'do', 'dos', 'du', 'ibn', 'la', 'las', 'le', 'li', 'lo', 'mac', 'mc', 'op', "'t", 'te', 'ten', 'ter', 'van', 'ver', 'von', 'y', 'z', 'zu', 'zum', 'zur');

	// first parse into words:
	$names = explode(' ', $name);
	$nNames = count($names);

	// look for title:
	$title = '';
	foreach ($socialTitles as $st)
	{
		if (strtolower($names[0]) == $st || strtolower($names[0]) == $st.'.')
		{
			$title = array_shift($names);
			$nNames--;
			// remove the full-stop if present:
			if (strtolower($title) == $st.'.')
				$title = substr($title, 0, strlen($title) - 1);
			break;
		}
	}

	if ($nNames == 1)
	{
		// only one word, assume this is the first name:
		$firstName = $names[0];
		$lastName = '';
	}
	else
	{
		// go through names from right to left building the surname:
		$firstNames = array();
		$lastName = $names[$nNames - 1];
		for ($i = $nNames - 2; $i >= 0; $i--)
		{
			if (in_array(strtolower($names[$i]), $nobiliaryParticles))
				$lastName = $names[$i].' '.$lastName;
			else if ($names[$i] != '')
			{
				// found a name that is not a nobiliary particle, so just append the rest of
				// the middle names (or initials) to the first name:
				for ($j = 0; $j <= $i; $j++)
					$firstNames[] = $names[$j];
				break;
			}
		}
		$firstName = implode(' ', $firstNames);
	}
}


function bool2str($bool)
{
	// converts a boolean value to a string:
	return $bool ? 'true' : 'false';
}


function round2($number, $decimals = 0)
{
	// * my own rounding function which always rounds 0.5 upwards
	// * does not address floating point representation issues
	$mult = pow(10, $decimals);
	$number *= $mult;
	$whole = floor($number);
	$frac = $number - $whole;
	if ($frac >= 0.5)
		$whole++;
	return $whole / $mult;
}


function roundToNearest($n, $m)
{
	// * rounds of $n to nearest $m
	return $m * round2($n / $m);
}


function moneyRound($amount)
{
	// rounds off to 2 decimal places:
	return round2($amount, 2);
}


function numberFormat($number, $decimals = 0, $dec_point = '.', $thousands_sep = ',')
{
	// solves the rounding error in number_format()
	// also, this func will accept 3 parameters which number_format will not
	return number_format(round2($number, $decimals), $decimals, $dec_point, $thousands_sep);
}


function moneyFormat($number)
{
	// * returns $number formatted with either 0 or 2 decimal places
	// * 0 decimal places if $number is an integer
	// * 2 decimal places if $number has a fractional part
	// * $number assumed to be positive
	if (round2($number, 2) == round2($number))
		return numberFormat($number);
	else
		return numberFormat($number, 2);
}


function dollarFormat($number, $decimals = 'auto', $plusSign = false)
{
	if ($decimals == 'auto')
		return sign($number, $plusSign)."$".moneyFormat(abs($number));
	else
		return sign($number, $plusSign)."$".numberFormat(abs($number), $decimals);
}


function expandYN($ch, $Y = 'Yes', $N = 'No', $default = 'same as N')
{
	if ($ch === true || $ch == 'Y')
		return $Y;
	else if ($ch == 'N' || $default == 'same as N')
		return $N;
	else
		return $default;
}


function trimhttp($str)
{
	// if $str begins with 'http://', then this is removed and the resulting string returned:
	$str = trim($str);
	if (strpos(strtolower($str), 'http://') === 0)
		$str = substr($str, 7);
	return $str;
}


function numberToWords($num)
{
	// * returns $num in words
	// * $num should be an integer
	// * supports numbers up to but not including an English billion (1e12)
	// * note, uses English 'thousand million', not American 'billion'
	if ($num < 20)
	{
		switch ($num)
		{
			case 0: return 'Zero';
			case 1: return 'One';
			case 2: return 'Two';
			case 3: return 'Three';
			case 4: return 'Four';
			case 5: return 'Five';
			case 6: return 'Six';
			case 7: return 'Seven';
			case 8: return 'Eight';
			case 9: return 'Nine';
			case 10: return 'Ten';
			case 11: return 'Eleven';
			case 12: return 'Twelve';
			case 13: return 'Thirteen';
			case 14: return 'Fourteen';
			case 15: return 'Fifteen';
			case 16: return 'Sixteen';
			case 17: return 'Seventeen';
			case 18: return 'Eighteen';
			case 19: return 'Nineteen';
		}
	}
	else if ($num < 100)
	{
		$tens = floor($num / 10);
		$units = $num - (10 * $tens);
		if ($units > 0)
			$units = '-'.numberToWords($units);
		else
			$units = '';
		switch ($tens)
		{
			case 2: return 'Twenty'.$units;
			case 3: return 'Thirty'.$units;
			case 4: return 'Forty'.$units;
			case 5: return 'Fifty'.$units;
			case 6: return 'Sixty'.$units;
			case 7: return 'Seventy'.$units;
			case 8: return 'Eighty'.$units;
			case 9: return 'Ninety'.$units;
		}
	}
	else if ($num < 1000)
	{
		$hundreds = floor($num / 100);
		$result = numberToWords($hundreds).' Hundred';
		$rem = $num - (100 * $hundreds);
	}
	else if ($num < 1000000)
	{
		$thousands = floor($num / 1000);
		$result = numberToWords($thousands).' Thousand';
		$rem = $num - (1000 * $thousands);
	}
	else if ($num < 1e12)
	{
		$millions = floor($num / 1000000);
		$result = numberToWords($millions).' Million';
		$rem = $num - (1000000 * $millions);
	}
	else
		$result = 'One Billion or more';
	if ($rem > 0)
	{
		if ($rem < 100)
			$result .= ' and '.numberToWords($rem);
		else
			$result .= ', '.numberToWords($rem);
	}
	return $result;
}


function moneyToWords($amount)
{
	$dollars = floor($amount);
	$cents = round(($amount - $dollars) * 100);
	$result = numberToWords($dollars)." Australian Dollar";
	if ($dollars != 1)
		$result .= "s";
	if ($cents > 0)
		$result .= " and ".numberToWords($cents)." Cent";
	if ($cents > 1)
		$result .= "s";
	return $result;
}


function gibberish($nParagraphs, $minWordsPerParagraph, $maxWordsPerParagraph)
{
	for ($p = 0; $p < $nParagraphs; $p++)
	{
		$words = '';
		$nWords = rand($minWordsPerParagraph, $maxWordsPerParagraph);
		// paragraph is $nWords of gibberish:
		for ($n = 0; $n < $nWords; $n++)
		{
			$wordLen = rand(1, 12);
			$word = '';
			for ($c = 0; $c < $wordLen; $c++)
			{
				$ch = chr(rand(97, 122));
				if ($c == 0)
					$ch = strtoupper($ch);
				$word .= $ch;
			}
			$words[] = $word;
		}
		$paragraphs[] = implode(' ', $words).".";
	}
	return implode("\r\n\r\n", $paragraphs);
}


function colourStr($red, $green, $blue)
{
	// returns a hexadecimal colour string (e.g F3BC3E) given values for red, green, blue (0..255)
	return strtoupper(str_pad(base_convert($red, 10, 16), 2, '0', STR_PAD_LEFT).
		str_pad(base_convert($green, 10, 16), 2, '0', STR_PAD_LEFT).
		str_pad(base_convert($blue, 10, 16), 2, '0', STR_PAD_LEFT));
}


function instr($needle, $haystack)
{
	// returns true if $needle is in $haystack otherwise false
	if ($needle == '')
		return false;
	return strpos($haystack, $needle) !== false;
}


function convertHtmlEntities($str)
{
	// convert a few specific html unicode character entities into similar ASCII characters
	// (specifically: long hyphens, fancy quotes, bullets, ellipses, break tags)
	$entities = array(	'&#8211;',	'&#8217;',	'&#8220;',	'&#8221;',	'&#8226;',	'&#8230;',	'<br>');
	$ascii = array(		'-',		"'",		'�',		'�',		'*',		'...',		"\n");
	return str_replace($entities, $ascii, $str);
}


function html2db($str)
{
	// This is used to convert fields submitted using a form into a format suitable for
	// entry into the database.
	// First the slashes are removed, then some html entities are converted,
	// then the slashes are replaced.
	return addslashes(trim(convertHtmlEntities(stripslashes($str))));
}


function post2html($str)
{
	// for displaying fields in a form that have already been sent through post with magic-quotes on/added:
	return htmlSpecialChars(stripslashes($str), ENT_QUOTES);
}


function rec2db($rec)
{
	foreach ($rec as $key => $field)
		$rec[$key] = html2db($field);
	return $rec;
}


function db2html($str)
{
	// This is used to convert database strings into a format useful for displaying in form fields.
	// Basically just htmlSpecialChars with both single and double quotes converted to html entities.
	return htmlSpecialChars($str, ENT_QUOTES);
}


function left($str, $n)
{
	// returns n left-most characters from str:
	return substr($str, 0, $n);
}


function right($str, $n)
{
	// returns n right-most characters from str:
	return substr($str, strlen($str) - $n, $n);
}


function startsWith($str, $substr)
{
	// returns true if $str starts with $substr:
	return left($str, strlen($substr)) == $substr;
}


function endsWith($str, $substr)
{
	// returns true if $str end with $substr:
	return right($str, strlen($substr)) == $substr;
}


function makeList($arr, $conj = "&")
{
	// will return a string in the form of "A, B, C & D", constructed from the supplied array:
	if (count($arr) == 0)
		return "";
	else if (count($arr) == 1)
		return $arr[0];
	else if (count($arr) == 2)
		return "{$arr[0]} $conj {$arr[1]}";
	else
	{
		$first = array_shift($arr);
		return "$first, ".makeList($arr);
	}
}


function editDistance($s, $t)
{
	// note - I did not realise there was a levenshtein function built into PHP
	// when I made this one!

	/*
	ORIGINAL CODE FROM http://www.merriampark.com/ld.htm
	'  Levenshtein distance (LD) is a measure of the similarity between two strings,
	'  which we will refer to as the source string (s) and the target string (t). The
	'  distance is the number of deletions, insertions, or substitutions required to
	'  transform s into t. For example, If s is "test" and t is "test", then LD(s,t) = 0,
	'  because no transformations are needed. The strings are already identical. If s is
	'  "test" and t is "tent", then LD(s,t) = 1, because one substitution
	'  (change "s" to "n") is sufficient to transform s into t. The greater
	'  the Levenshtein distance, the more different the strings are.
	'  Levenshtein distance is named after the Russian scientist Vladimir
	'  Levenshtein, who devised the algorithm in 1965. If you can't spell or pronounce
	'  Levenshtein, the metric is also sometimes called edit distance.
	*/

	// Step 1
	$n = strlen($s);
	$m = strlen($t);
	if ($n == 0)
		return $m;
	if ($m == 0)
		return $n;

	// Step 2
	for ($i = 0; $i <= $n; $i++)
		$d[$i][0] = $i;
	for ($j = 0; $j <= $m; $j++)
		$d[0][$j] = $j;

	// Step 3
	for ($i = 1; $i <= $n; $i++)
	{
		$s_i = $s{$i - 1};  // the $i'th character of $s
		// Step 4
		for ($j = 1; $j <= $m; $j++)
		{
			$t_j = $t{$j - 1}; // the $j'th character of $t

			// Step 5
			$cost = $s_i == $t_j ? 0 : 1;

			// Step 6
			$d[$i][$j] = min($d[$i - 1][$j] + 1, $d[$i][$j - 1] + 1, $d[$i - 1][$j - 1] + $cost);
		}
	}

	// Step 7
	return $d[$n][$m];
}


function sig($f, $n)
{
	// * returns string representing floating point value $f rounded off to $n significant digits
	// * doesn't work if number too small or too big because PHP uses 'E' notation when converting float to string
	if ($f != 0)
	{
		// make positive:
		$neg = $f < 0;
		if ($neg)
			$f *= -1;
		// multiply $f until there are $n digits to the left of the decimal:
		$upper = pow(10, $n);
		$lower = $upper / 10;
		$mult = 1;
		while ($f < $lower || $f >= $upper)
		{
			if ($f < $lower)
			{
				$f *= 10;
				$mult *= 10;
			}
			else
			{
				$f /= 10;
				$mult /= 10;
			}
		}
		// round off:
		$whole = floor($f);
		$frac = $f - $whole;
		if ($frac >= 0.5)
			$whole++;
		$f = $whole / $mult;
	}
	// count the digits
	$isInt = $f == (int)$f;
	$f = $f.'';
	if ($isInt)
		$digits = strlen($f);
	else
	{
		$firstDigitFound = false;
		for ($i = 0; $i < strlen($f); $i++)
		{
			$ch = $f{$i};
			if (!$firstDigitFound && $ch >= '1' && $ch <= '9')
				$firstDigitFound = true;
			if ($firstDigitFound && $ch >= '0' && $ch <= '9')
				$digits++;
		}
	}
	// add extra zeroes if necessary:
	if ($digits < $n)
	{
		if ($isInt)
			$f .= '.';
		while ($digits < $n)
		{
			$digits++;
			$f .= '0';
		}
	}
	// add sign if necessary:
	if ($neg)
		$f = '-'.$f;
	return $f;
}


function displayBytes($nBytes)
{
	$k = 1024;
	$M = $k * $k;
	$G = $k * $M;
	if ($nBytes < $k)
		return $nBytes."B";
	else if ($nBytes < $M)
		return numberFormat($nBytes / $k, 0)."kB";
	else if ($nBytes < $G)
		return numberFormat($nBytes / $M, 1)."MB";
	else
		return numberFormat($nBytes / $G, 1)."GB";
}


function extractPrice($displayPrice, &$loPrice, &$hiPrice)
{
	// Extracts dollar amounts from $displayPrice.
	// Checks for things like 'K' for thousand and 'M' for million.
	$nMatches = preg_match_all("/[\d\,\.]+(k|M| Million)?/i", $displayPrice, $matches);
	if ($nMatches == 0)
	{
		$loPrice = 0;
		$hiPrice = 0;
		return;
	}
	$matches = $matches[0];
	// process matches - convert strings to numbers:
	foreach($matches as $key => $price)
	{
		$price = strtolower($price);
		if (strpos($price, ' million') !== false)
		{
			$price = str_replace(' million', '', $price);
			$mult = 1000000;
		}
		else if (strpos($price, 'k') !== false)
		{
			$price = str_replace('k', '', $price);
			$mult = 1000;
		}
		else if (strpos($price, 'm') !== false)
		{
			$price = str_replace('m', '', $price);
			$mult = 1000000;
		}
		else
			$mult = 1;
		$matches[$key] = strtonum($price) * $mult;
	}
	if ($nMatches == 1)
	{
		$loPrice = $matches[0];
		$hiPrice = 0;
	}
	else
	{
		// multiply first number until it's the same order of magnitude:
		$loPrice = $matches[0];
		$hiPrice = $matches[1];
		while ($loPrice < $hiPrice / 10)
			$loPrice *= 10;
	}
}


function sign($num, $plusSign = false)
{
	return $num < 0 ? '-' : ($plusSign ? '+' : '');
}


function swap(&$a, &$b)
{
	// swaps the values of two variables:
	$tmp = $a;
	$a = $b;
	$b = $tmp;
}


function ordinalSuffix($n, $attachNumber = true)
{
	// * returns ordinal suffix of $n: {st, nd, rd, th}
	// * returns false if $n is not a positive integer
	// * if $attachNumber true then the number is included
	if ((int)$n != $n || $n <= 0)
		return false;
	if ($n % 10 == 1 && $n % 100 != 11)
		$suffix = 'st';
	else if ($n % 10 == 2 && $n % 100 != 12)
		$suffix = 'nd';
	else if ($n % 10 == 3 && $n % 100 != 13)
		$suffix = 'rd';
	else
		$suffix = 'th';
	if ($attachNumber)
		$suffix = $n.$suffix;
	return $suffix;
}


function makeDomainWord($str)
{
	// returns str with only alphanumeric or hyphens, any other chars removed:
	$out = "";
	for ($i = 0; $i < strlen($str); $i++)
	{
		$ch = $str{$i};
		if (ctype_alnum($ch) || ($ch == '-' && $out != ''))
			$out .= $ch;
	}
	// trim any trailing hyphens:
	while ($out{strlen($out) - 1} == '-')
		$out = left($out, strlen($out) - 1);
	return strtolower($out);
}


function htmlEntitiesAll($str)
{
	// converts the string to a string of numerical unicode html entities:
	$result = "";
	for ($i = 0; $i < strlen($str); $i++)
		$result .= "&#".ord($str{$i}).";";
	return $result;
}
?>
