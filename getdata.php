<?php 

	// PHP/MySQL code
	include 'connect.inc.php';

	$sourceLat = $_POST['lat'];
	$sourceLon = $_POST['lng'];
	$radiusKm  = $_POST['radiusKm'];
	$searchtext = $_POST['searchtext'];

	$proximity = mathGeoProximity($sourceLat, $sourceLon, $radiusKm);
	$result    = mysql_query("
	    SELECT * 
	    FROM   localstore1
	    WHERE  (lat BETWEEN " . number_format($proximity['latitudeMin'], 12, '.', '') . "
	            AND " . number_format($proximity['latitudeMax'], 12, '.', '') . ")
	      AND (lng BETWEEN " . number_format($proximity['longitudeMin'], 12, '.', '') . "
	            AND " . number_format($proximity['longitudeMax'], 12, '.', '') . ")
	AND (storename LIKE '%" . $searchtext . "%' OR tags LIKE '%" . $searchtext . "%')"
	);

	// fetch all record and check wether they are really within the radius
	$recordsWithinRadius = array();
	while ($record = mysql_fetch_assoc($result)) {
	    $distance = mathGeoDistance($sourceLat, $sourceLon, $record['lat'], $record['lng']);

	    if ($distance <= $radiusKm) {
	        $recordsWithinRadius[] = $record;
	    }
	}

	echo json_encode( $recordsWithinRadius );

	// calculate geographical proximity
	function mathGeoProximity( $latitude, $longitude, $radius, $miles = false )
	{
	    $radius = $miles ? $radius : ($radius * 0.621371192);

	    $lng_min = $longitude - $radius / abs(cos(deg2rad($latitude)) * 69);
	    $lng_max = $longitude + $radius / abs(cos(deg2rad($latitude)) * 69);
	    $lat_min = $latitude - ($radius / 69);
	    $lat_max = $latitude + ($radius / 69);

	    return array(
	        'latitudeMin'  => $lat_min,
	        'latitudeMax'  => $lat_max,
	        'longitudeMin' => $lng_min,
	        'longitudeMax' => $lng_max
	    );
	}

	// calculate geographical distance between 2 points
	function mathGeoDistance( $lat1, $lng1, $lat2, $lng2, $miles = false )
	{
	    $pi80 = M_PI / 180;
	    $lat1 *= $pi80;
	    $lng1 *= $pi80;
	    $lat2 *= $pi80;
	    $lng2 *= $pi80;

	    $r = 6372.797; // mean radius of Earth in km
	    $dlat = $lat2 - $lat1;
	    $dlng = $lng2 - $lng1;
	    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
	    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
	    $km = $r * $c;

	    return ($miles ? ($km * 0.621371192) : $km);
	}

 ?>