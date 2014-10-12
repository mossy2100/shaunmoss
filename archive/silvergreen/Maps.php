<?
include("include/init.php");
$title = "Silvergreen - Home";
$menuItem = "Home";
include("tpl/templateTop.php");
?>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA6yX9a6Jp7K8Dk6ISJYO7wBR9hJwgXCL2hB76g4fVJQOACrGq-hSBpLrwlWfTDSlrUzTX6J8JBc_NIg" type="text/javascript"></script>
<script type="text/javascript">

//<![CDATA[

var lat = -27.368566;
var long = 152.85038;


function load() {
  if (GBrowserIsCompatible()) {
	var map4 = new GMap2(document.getElementById("map4"));
	map4.setCenter(new GLatLng(-25.641526, 137.548828), 3);

	var map5 = new GMap2(document.getElementById("map5"));
	map5.setCenter(new GLatLng(-19.725342, 145.766602), 4);

	var map3 = new GMap2(document.getElementById("map3"));
	map3.setCenter(new GLatLng(lat, long), 7);

	var map = new GMap2(document.getElementById("map"));
	map.setCenter(new GLatLng(lat, long), 10);

	var map2 = new GMap2(document.getElementById("map2"));
	map2.setCenter(new GLatLng(lat, long), 12);
  }
}
//]]>
</script>
  
<h1>Maps</h1>

<p>Australia/Oceania:</p>
<div id="map4" style="width: 500px; height: 300px"></div>
<p>&nbsp;</p>

<p>Queensland and Brisbane:</p>
<div id="map5" style="width: 500px; height: 300px"></div>
<p>&nbsp;</p>

<p>South East Queensland:</p>
<div id="map3" style="width: 500px; height: 300px"></div>
<p>&nbsp;</p>

<p>The Samford Valley region is north-west of Brisbane - look for Samford Village:</p>
<div id="map" style="width: 500px; height: 300px"></div>
<p>&nbsp;</p>

<p>Samford Valley:</p>
<div id="map2" style="width: 500px; height: 300px"></div>
<p>&nbsp;</p>

<p>&nbsp;</p>
<?
include("tpl/templateBottom.php");
?>