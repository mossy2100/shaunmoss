<!-- <%
////////////////////////////////////////////////////////////////////////
// Browser.inc
// by Shaun Moss
// Determines platform and browser information from server variables.
// Currently detects:
// Platforms:
//		Windows (various)
//		Macintosh
//		Unix (various)
//		OS/2
// Browsers:
//		Microsoft Internet Explorer
//		Netscape Navigator
//		Opera
//		AvantGo


// All you have to do is include this file to access the following information:
var UserAgent = "";
var UserIP = "";
var UserLanguageCode = "";

var Platform = "";
var PlatformIsWin = false;
var PlatformIsMac = false;
var PlatformIsUnix = false;
var PlatformIsOS2 = false;

var BrowserIsMSIE = false;
var BrowserIsNetscape = false;
var BrowserIsOpera = false;
var BrowserIsAvantGo = false;
var BrowserVersion = "";
var BrowserMajorVersion = "";
var BrowserMinorVersion = "";
var BrowserName = "";

// get server variables:
UserAgent = Request.ServerVariables("HTTP_USER_AGENT") + "";
UserIP = Request.ServerVariables("REMOTE_ADDR") + "";
UserLanguageCode = Request.ServerVariables("HTTP_ACCEPT_LANGUAGE") + "";

// get platform
if (UserAgent.search(/Win/i) > -1) {
	PlatformIsWin = true;
	if (UserAgent.search(/Windows 3\.11/i) > -1)
		Platform = "Windows 3.11";
	else if (UserAgent.search(/Windows 3\.1/i) > -1)
		Platform = "Windows 3.1";
	else if (UserAgent.search(/Windows 95/i) > -1 || UserAgent.search(/Win95/i) > -1)
		Platform = "Windows 95";
	else if (UserAgent.search(/Windows 98/i) > -1 || UserAgent.search(/Win98/i) > -1)
		Platform = "Windows 98";
	else if (UserAgent.search(/Windows NT 5\.0/i) > -1)
		Platform = "Windows 2000";
	else if (UserAgent.search(/Windows NT 3\.51/i) > -1 || UserAgent.search(/WinNT3\.51/i) > -1)
		Platform = "Windows NT 3.51";
	else if (UserAgent.search(/Windows NT 4\.0/i) > -1 || UserAgent.search(/WinNT4\.0/i) > -1)
		Platform = "Windows NT 4.0";
	else if (UserAgent.search(/Windows NT/i) > -1 || UserAgent.search(/WinNT/i) > -1)
		Platform = "Windows NT";
	else {
		// locate the "Win":
		WinPos = UserAgent.search(/Win/i);
		Temp = UserAgent.substr(WinPos);
		EndcharPos = Temp.search(/[;)]/);
		Platform = Temp.substr(0, EndcharPos);
	}
} else if (UserAgent.search(/Mac/i) > -1) {
	PlatformIsMac = true;
	Platform = "Macintosh";
	if (UserAgent.search(/PPC/) > -1 || UserAgent.search(/PowerPC/) > -1)	
		Platform += " PowerPC";
	else if (UserAgent.search(/68K/) > -1)
		Platform += " 68K";
} else if (UserAgent.search(/X11/) > -1) {
	PlatformIsUnix = true;
	X11pos = UserAgent.search(/X11/);
	Temp = UserAgent.substr(X11pos + 8); // strip off the 'X11; I; '
	EndcharPos = Temp.search(/[;)]/);
	Platform = Temp.substr(0, EndcharPos);
} else if (UserAgent.search(/OS\/2/i) > -1) {
	PlatformIsOS2 = true;
	Platform = "OS/2";
} else if (UserAgent.search(/WebTV/i) > -1)
	Platform = "WebTV";
else
	Platform = "Unknown";


// get browser type and version, and language code:
if (UserAgent.search(/MSIE/i) > -1) {
	BrowserIsMSIE = true;
	// get browser version:
	MSIE_Pos = UserAgent.search(/MSIE/i);
	Temp = UserAgent.substr(MSIE_Pos + 5);
	EndcharPos = Temp.search(/[;)]/);
	BrowserVersion = Temp.substr(0, EndcharPos);
	// full browser name:
	BrowserName = "Microsoft Internet Explorer " + BrowserVersion;
} else if (UserAgent.search(/Opera/i) > -1) {
	BrowserIsOpera = true;
	// get browser version:
	OperaPos = UserAgent.search(/Opera/i);
	Temp = UserAgent.substr(OperaPos + 6);
	EndcharPos = Temp.search(/ /);
	BrowserVersion = Temp.substr(0, EndcharPos);
	// full browser name:
	BrowserName = "Opera " + BrowserVersion;
	// get language code from UserAgent:
	OpenBracketPos = Temp.search(/\(/);
	UserLanguageCode = Temp.substr(OpenBracketPos + 1, 2);
} else if (UserAgent.search(/AvantGo/i) > -1) {
	BrowserIsAvantGo = true;
	// get browser version:
	AvantGoPos = UserAgent.search(/AvantGo/i);
	Temp = UserAgent.substr(AvantGoPos + 8);
	EndcharPos = Temp.search(/ /);
	BrowserVersion = Temp.substr(0, EndcharPos);
	// full browser name:
	BrowserName = "AvantGo " + BrowserVersion;
} else if (UserAgent.search(/Mozilla/i) > -1) {
	// assume browser is Netscape if "Mozilla" is in the UserAgent:
	BrowserIsNetscape = true;
	// get browser version:
	Temp = UserAgent.substr(8);
	EndcharPos = Temp.search(/[ (]/);
	BrowserVersion = Temp.substr(0, EndcharPos);
	// full browser name:
	BrowserName = "Netscape ";
	if (UserAgent.search(/Nav/i) > -1)
		BrowserName += "Navigator ";
	BrowserName += BrowserVersion;
}

// get the major and minor browser versions:
DotPos = BrowserVersion.search(/\./);
BrowserMajorVersion = BrowserVersion.substr(0, DotPos);
BrowserMinorVersion = BrowserVersion.substr(DotPos + 1);
// %> -->