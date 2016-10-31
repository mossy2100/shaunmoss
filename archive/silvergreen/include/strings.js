// strings.js:
// A variety of handy functions for string manipulation.
// Note: replaces both Write.inc and Toolkit.inc
// Note2 (10 May 2002): Strings.js was split into write.js and this file, strings.js
// Note3 (29 Sep 2002): modified some function names to be java-style, e.g. beginning with lower-case letter.
// Also, added 2 new functions, strtonum() and numberFormat()

function write(str) {
  document.write(str);
}

function writeln(str) {
  write(str + "\n");
}

function writebr(str) {
  writeln(str + "<br>");
}

// trims spaces from the start and end of a string:
function trim(str) {
  // check we have a value:
  if (str == null || str == "") {
    return "";
  }

  // make a new String for the result:
  var result = new String(str);

  // trim spaces from the start of result:
  while (result.charAt(0) == " ") {
    result = result.substr(1, result.length - 1);
  }

  // trim spaces from the end of result:
  while (result.charAt(result.length - 1) == " ") {
    result = result.substr(0, result.length - 1);
  }

  return result
}

// functions to add characters to start of a string until desired length reached:
function padLeft(value, width, chPad) {
  // convert to a string:
  var result = value + "";
  // add pad characters until desired width is reached:
  while (result.length < width) {
    result = chPad + result;
  }
  return result;
}

// functions to add characters to end of a string until desired length reached:
function padRight(value, width, chPad) {
  // convert to a string:
  var result = value + "";
  // add pad characters until desired width is reached:
  while (result.length < width) {
    result = result + chPad;
  }
  return result;
}

// function to make a string of substr repeated n times:
function stringOf(substr, n) {
  var result = "";
  for (var i = 0; i < n; i++) {
    result += substr;
  }
  return result;
}

// commonly used in time/date displays:
// pad numerical string with leading zeroes until 2 chars total:
function twoDigits(n) {
  return padLeft(n, 2, "0");
}

// pad numerical string with leading zeroes until 3 chars total:
function threeDigits(n) {
  return padLeft(n, 3, "0");
}

// pad numerical string with leading zeroes until 4 chars total:
function fourDigits(n) {
  return padLeft(n, 4, "0");
}

// returns n left-most characters from str:
function left(str, n) {
  return str.substr(0, n);
}

// returns n right-most characters from str:
function right(str, n) {
  return str.substr(str.length - n, n);
}

/////////////////////////////////////////////////////////////////////////////////////////
// Basic string and character functions:

// returns true if str is a string with length > 0
function isValidString(str) {
  return (typeof(str) == "string" && str.length > 0)
}

// returns true if character ch is in string str:
function isIn(ch, str) {
  return (str.indexOf(ch) >= 0);
}

/////////////////////////////////////////////////////////////////////////////////////////
// check ASCII codes:

var ASCII_A = 65;
var ASCII_Z = 90;
var ASCII_a = 97;
var ASCII_z = 122;
var ASCII_0 = 48;
var ASCII_9 = 57;

function isUpperCaseLetterCode(code) {
  return (code >= ASCII_A) && (code <= ASCII_Z);
}

function isLowerCaseLetterCode(code) {
  return (code >= ASCII_a) && (code <= ASCII_z);
}

function isLetterCode(code) {
  return isUpperCaseLetterCode(code) || isLowerCaseLetterCode(code);
}

function isDigitCode(code) {
  return (code >= ASCII_0) && (code <= ASCII_9);
}

function isAlphanumericCode(code) {
  return isDigitCode(code) || isLetterCode(code);
}

/////////////////////////////////////////////////////////////////////////////////////////
// check ASCII characters:
function isUpperCaseLetter(ch) {
  return isUpperCaseLetterCode(ch.charCodeAt(0));
}

function isLowerCaseLetter(ch) {
  return isLowerCaseLetterCode(ch.charCodeAt(0));
}

function isLetter(ch) {
  return isLetterCode(ch.charCodeAt(0));
}

function isDigit(ch) {
  return isDigitCode(ch.charCodeAt(0));
}

function isAlphanumeric(ch) {
  return isAlphanumericCode(ch.charCodeAt(0));
}

function isQuoteChar(ch) {
  return ch == '"' || ch == "'" || ch == '`' || ch == '�' || ch == '�' || ch == '�';
}

function isWhitespace(ch) {
  return ch == ' ' || ch == '\n' || ch == '\t' || ch == '\r';
}

/////////////////////////////////////////////////////////////////////////////////////////
// check strings of digits or letters:

function isAllDigits(str) {
  // check str:
  if (!isValidString(str)) {
    return false;
  }

  // check that each character is a digit:
  for (var j = 0; j < str.length; j++) {
    if (!isDigitCode(str.charCodeAt(j))) {
      return false;
    }
  }

  // all ok:
  return true;
}

function isAllLetters(str) {
  // check str:
  if (!isValidString(str)) {
    return false;
  }

  // check that each character is a letter:
  for (var j = 0; j < str.length; j++) {
    if (!isLetterCode(str.charCodeAt(j))) {
      return false;
    }
  }

  // all ok:
  return true;
}

function isAllAlphanumeric(str) {
  // check str:
  if (!isValidString(str)) {
    return false;
  }

  // check that each character is a letter:
  var ch;
  for (var j = 0; j < str.length; j++) {
    ch = str.charCodeAt(j);
    if (!isDigitCode(ch) && !isLetterCode(ch)) {
      return false;
    }
  }

  // all ok:
  return true;
}

// replaces every occurence of 'search' with 'replace' in 'subject':
// (mimics behaviour of PHP function)
function str_replace(search, replace, subject) {
  var result = subject;
  var left, right;
  var minSearchPos = 0;
  var searchPos = result.indexOf(search);
  while (searchPos >= minSearchPos) {
    // get whatever is to the left of search string:
    left = result.substring(0, searchPos);
    right = result.substr(searchPos + search.length);
    // update result:
    result = left + replace + right;
    // move the minimum search pos to just past the new replacement:
    minSearchPos = searchPos + replace.length;
    // look for search string again:
    searchPos = right.indexOf(search) + minSearchPos;
  }
  return result;
}

function quote_replace(str) {
  return str_replace("'", "''", str);
}

function strtonum(str) {
  // removes the commas inserted by a numberFormat or a user, and
  // converts to a floating point number:
  str = str_replace(",", "", str);
  // convert to float:
  var num = parseFloat(str);
  // if not a number then return 0:
  return isNaN(num) ? 0 : num;
}

function strtoint(str) {
  // removes the commas inserted by a numberFormat or a user, and
  // converts to an integer:
  str = str_replace(",", "", str);
  // convert to integer:
  var num = parseInt(str);
  // if not a number then return 0:
  if (isNaN(num)) {
    return 0;
  }
  else {
    return num;
  }
}

function strtonat(str) {
  // removes the commas inserted by a numberFormat or a user, and
  // converts to a natural number (non-negative integer):
  str = str_replace(",", "", str);
  // convert to integer:
  var num = parseInt(str);
  // if not a number or a negative number then return 0:
  if (isNaN(num) || num < 0) {
    return 0;
  }
  else {
    return num;
  }
}

function round(val, precision) {
  // * rounds a val off to a certain val of decimal places
  // * mimics PHP function of same name
  // * val must be a number (integer or float)
  // * precision must be an integer
  // * halves (0.5) always rounded up

  // default value for precision:
  if (precision == null) {
    precision = 0;
  }

  if (precision == 0) {
    return Math.round(val);
  }
  else if (precision > 0) {
    var multiplier = Math.pow(10, precision);
    return Math.round(val * multiplier) / multiplier;
  }
  else // precision < 0
  {
    var multiplier = Math.pow(10, -precision);
    return Math.round(val / multiplier) * multiplier;
  }
}

function roundToNearest(n, m) {
  // * rounds of n to nearest m
  return m * round(n / m);
}

function numberFormat(number, decimals, dec_point, thousands_sep)
// Mimics behaviour of PHP function number_format
// Adds zeroes to fill decimal places, and adds commas to show thousands, millions, etc.
{
  // default values:
  if (decimals == null) {
    decimals = 0;
  }
  if (dec_point == null) {
    dec_point = '.';
  }
  if (thousands_sep == null) {
    thousands_sep = ',';
  }

  // check number is actually a number:
  number = parseFloat(number);
  if (isNaN(number)) {
    number = 0;
  }

  // round off:
  number = round(number, decimals);

  // if number is negative, make it positive first then switch it back later:
  var negative = number < 0;
  if (negative) {
    number = -number;
  }

  // string left of decimal point:
  var left = Math.floor(number);
  if (left == 0) {
    var strLeft = '0';
  }
  else {
    var strLeft = '';
    var left2 = left;
    while (left2 > 0) {
      thousands = left2 % 1000;
      left2 = (left2 - thousands) / 1000;
      if (left2 > 0) {
        strLeft = thousands_sep + padLeft(thousands, 3, '0') + strLeft;
      }
      else {
        strLeft = thousands + strLeft;
      }
    }
  }
  var result = strLeft;

  // string right of decimal point:
  if (decimals > 0) {
    var right = number - left;
    right = Math.round(right * Math.pow(10, decimals));
    strRight = padLeft(right, decimals, '0');
    result = strLeft + dec_point + strRight;
  }

  // if number was negative, add sign:
  if (negative) {
    result = '-' + result;
  }

  return result;
}

function moneyFormat(number) {
  if (round(number, 2) == round(number)) {
    return numberFormat(number, 0);
  }
  else {
    return numberFormat(number, 2);
  }
}

function formatNumberField(form, fieldName, decimalPlaces, min, max) {
  // Formats a text field as a number.
  // Min and max values can be specified.
  // The number can be formatted to a certain number of decimal places.  To prevent this, set decimalPlaces=null.

  // set default values:
  if (min == null) {
    min = 0;
  }
  if (max == null) {
    max = Infinity;
  }
  // get value:
  var value = strtonum(form[fieldName].value);
  // limit negatives if necessary:
  if (value < min) {
    value = min;
  }
  if (value > max) {
    value = max;
  }
  // update text field:
  if (decimalPlaces == null) {
    form[fieldName].value = value;
  }
  else {
    form[fieldName].value = numberFormat(value, decimalPlaces);
  }
}

function formatMoneyField(form, fieldName, negativesAllowed) {
  // formats a money field to either whole dollars or cents:
  // get value:
  var value = strtonum(form[fieldName].value);
  // if an integer, then round off to an integer, else 2 decimal places:
  var min = negativesAllowed ? -Infinity : 0;
  if (round(value, 2) == round(value)) {
    formatNumberField(form, fieldName, 0, min);
  }
  else {
    formatNumberField(form, fieldName, 2, min);
  }
}

function numberToWords(num) {
  // * returns num in words:
  // * supports numbers up to but not including an English billion (1e12)
  // * note, uses English 'thousand million', not American 'billion'
  if (num < 20) {
    switch (num) {
      case 0:
        return 'Zero';
      case 1:
        return 'One';
      case 2:
        return 'Two';
      case 3:
        return 'Three';
      case 4:
        return 'Four';
      case 5:
        return 'Five';
      case 6:
        return 'Six';
      case 7:
        return 'Seven';
      case 8:
        return 'Eight';
      case 9:
        return 'Nine';
      case 10:
        return 'Ten';
      case 11:
        return 'Eleven';
      case 12:
        return 'Twelve';
      case 13:
        return 'Thirteen';
      case 14:
        return 'Fourteen';
      case 15:
        return 'Fifteen';
      case 16:
        return 'Sixteen';
      case 17:
        return 'Seventeen';
      case 18:
        return 'Eighteen';
      case 19:
        return 'Nineteen';
    }
  }
  else if (num < 100) {
    var tens = Math.floor(num / 10);
    var units = num - (10 * tens);
    if (units > 0) {
      units = '-' + numberToWords(units);
    }
    else {
      units = '';
    }
    switch (tens) {
      case 2:
        return 'Twenty' + units;
      case 3:
        return 'Thirty' + units;
      case 4:
        return 'Forty' + units;
      case 5:
        return 'Fifty' + units;
      case 6:
        return 'Sixty' + units;
      case 7:
        return 'Seventy' + units;
      case 8:
        return 'Eighty' + units;
      case 9:
        return 'Ninety' + units;
    }
  }
  else if (num < 1000) {
    var hundreds = Math.floor(num / 100);
    var result = numberToWords(hundreds) + ' Hundred';
    var rem = num - (100 * hundreds);
  }
  else if (num < 1000000) {
    var thousands = Math.floor(num / 1000);
    var result = numberToWords(thousands) + ' Thousand';
    var rem = num - (1000 * thousands);
  }
  else if (num < 1e12) {
    var millions = Math.floor(num / 1000000);
    var result = numberToWords(millions) + ' Million';
    var rem = num - (1000000 * millions);
  }
  else {
    result = 'One Billion or more';
  }
  if (rem > 0) {
		if (rem < 100) {
			result += ' and ' + numberToWords(rem);
		}
		else {
			result += ', ' + numberToWords(rem);
		}
	}
	return result;
}

function moneyToWords(amount) {
  var dollars = Math.floor(amount);
  var cents = Math.round((amount - dollars) * 100);
  var result = numberToWords(dollars) + " Australian Dollar";
	if (dollars != 1) {
		result += "s";
	}
	if (cents > 0) {
		result += " and " + numberToWords(cents) + " Cent";
	}
	if (cents > 1) {
		result += "s";
	}
	return result;
}

function uniformBreakTags(str) {
  // replaces all versions of break tags with <br>
  str = str_replace('<BR', '<br', str);
  str = str_replace('<br >', '<br>', str);
  str = str_replace('<br />', '<br>', str);
  return str;
}

function stripHtmlTags(str) {
  // removes html tags from a string:

  // check str:
	if (!isValidString(str)) {
		return false;
	}

	var intag = false;
  var ch;
  var result = '';
  for (var j = 0; j < str.length; j++) {
    ch = str.charAt(j);
		if (!intag && ch == '<') {
			intag = true;
		}
		else if (intag && ch == '>') {
			intag = false;
		}
		else if (!intag) {
			result += ch;
		}
	}
  return result;
}

debugMode = false;

function debug(str) {
	if (debugMode) {
		alert(str);
	}
}

function capitalizeField(form, field) {
  form[field].value = (form[field].value).toUpperCase();
}

function buildPhoneNumberString(phHome, phWork, phMobile) {
  // make a string for the phone numbers:
  phoneNumbers = '';
  if (phHome != "") {
		if (phoneNumbers != '') {
			phoneNumbers += ', ';
		}
		phoneNumbers += "H: " + phHome;
  }
  if (phWork != "") {
		if (phoneNumbers != '') {
			phoneNumbers += ', ';
		}
		phoneNumbers += "W: " + phWork;
  }
  if (phMobile != "") {
		if (phoneNumbers != '') {
			phoneNumbers += ', ';
		}
		phoneNumbers += "M: " + phMobile;
  }
  return phoneNumbers;
}

function ucfirst(str) {
  // matches PHP function
  // makes the first letter of str upper case
	if (str.length == 0) {
		return '';
	}
	if (str.length == 1) {
		return str.toUpperCase();
	}
  return (left(str, 1)).toUpperCase() + right(str, str.length - 1);
}

function ucwords(text) {
  // Makes the first letter of each word uppercase.
  // A word is any string of characters after a whitespace character.
  var ch, prev_ch;
  var result = "";
  for (var i = 0; i < text.length; i++) {
    ch = text.charAt(i);
		if (i == 0 || isWhitespace(prev_ch)) {
			result += ch.toUpperCase();
		}
		else {
			result += ch;
		}
		prev_ch = ch;
  }
  return result;
}

function extractPrice(displayPrice) {
  // extracts an actual number from the displayPrice
  // returns an empty string if no price found
  var re = /[\d\,\.]+(k|M| Million)?/i;
  var matches = displayPrice.match(re);
  //debug_r(matches);
  var prices = new Array(0, 0);
	if (matches) {
		prices[0] = matches[0];
		var rem = displayPrice.substr(matches.lastIndex);
		matches = rem.match(re);
		if (matches) {
			prices[1] = matches[0];
		}
	}
	else {
		return prices;
	}
	//alert('loPrice=' + prices[0] + '; hiPrice=' + prices[1]);
  // process matches - convert strings to numbers:
  var i, price, mult;
  for (i = 0; i <= 1; i++) {
    price = (prices[i] + '').toLowerCase();
    if (price.indexOf(' million') != -1) {
      price = str_replace(' million', '', price);
      mult = 1000000;
    }
    else if (price.indexOf('k') != -1) {
      price = str_replace('k', '', price);
      mult = 1000;
    }
    else if (price.indexOf('m') != -1) {
			price = str_replace('m', '', price);
			mult = 1000000;
		}
		else {
			mult = 1;
		}
		prices[i] = strtonum(price) * mult;
  }
  // multiply first number to make both numbers the same order of magnitude:
	while (prices[0] < prices[1] / 10) {
		prices[0] *= 10;
	}
	return prices;
}

function getExtension(filename) {
  var dotpos = filename.lastIndexOf(".");
	if (dotpos == -1) {
		return "";
	}
	return filename.substr(dotpos + 1);
}

function writeEmailLink(user, domain, link, cssClass) {
  document.write("<a href='mailto:" + user + "@" + domain + "'");
	if (cssClass != null) {
		document.write(" cssClass='" + cssClass + "'");
	}
	document.write(">" + link + "</a>");
}
