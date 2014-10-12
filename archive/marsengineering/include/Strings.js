<!-- <%
/*
 * This is an example of how to use the same .js file on either the client or the server.
 * Note the tags at beginning and end of the file.
 */

// Strings.inc:
// A variety of handy functions for string manipulation.
// Note: replaces both Write.inc and Toolkit.inc

// abbreviation for Response.Write:
function Write(str) {
	// check for no param:
	if (str + "" == "undefined") str = "";
	Response.Write(str);
}


// Writes string with a newline appended:
function WriteLn(str) {
	// check for no param:
	if (str + "" == "undefined") str = "";
	Write(str + '\n');
}


// Writes string with a break tag <br> appended:
function WriteBr(str) {
	// check for no param:
	if (str + "" == "undefined") str = "";
	WriteLn(str + "<br>");
}


// Writes string wrapped in <td> tags:
function WriteTD(str) {
	// check for no param:
	if (str + "" == "undefined") str = "&nbsp;";
	WriteLn("<td>" + str + "</td>");
}


// Writes first string if IE, otherwise second string:
function ifIE(strIE, strNS) {
	if (BrowserIsMicrosoft)
		return strIE;
	else
		return strNS;
}


// Trims spaces from the start and end of a string:
function Trim(str)
{
	// check we have a value:
	if (str == null || str == "") return "";

	// make a new String for the result:
	var result = new String(str);

	// trim spaces from the start of result:
	while (result.charAt(0) == " ")
		result = result.substr(1, result.length - 1);

	// trim spaces from the end of result:
	while (result.charAt(result.length - 1) == " ")
		result = result.substr(0, result.length - 1);

	return result
}


// functions to add characters to start of a string until desired length reached:
function PadLeft(value, width, chPad)
{
	// convert to a string:
	var result = value + "";
	// add pad characters until desired width is reached:
	while (result.length < width)
		result = chPad + result;
	return result;
}


// functions to add characters to end of a string until desired length reached:
function PadRight(value, width, chPad)
{
	// convert to a string:
	var result = value + "";
	// add pad characters until desired width is reached:
	while (result.length < width)
		result = result + chPad;
	return result;
}


// function to make a string of substr repeated n times:
function StringOf(substr, n) {
	var result = "";
	for (var i = 0; i < n; i++)
		result += substr;
	return result;
}


// commonly used in time/date displays:
// pad numerical string with leading zeros until 2 chars total:
function TwoDigits(n)
{
	return PadLeft(n, 2, "0");
}


// pad numerical string with leading zeros until 3 chars total:
function ThreeDigits(n)
{
	return PadLeft(n, 3, "0");
}

// %> -->