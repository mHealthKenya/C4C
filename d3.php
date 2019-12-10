<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "c4c";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
        $query = "SELECT tbl_patientdetails.p_mobile,tbl_patientdetails.names,cadres.name as cadre,"
                . "tbl_master_facility.name as facility,tbl_county.name as county, tbl_sub_county.name"
                . " as sub_county from tbl_patientdetails INNER JOIN tbl_master_facility on tbl_master_facility"
                . ".code=tbl_patientdetails.mfl_no INNER JOIN cadres_dictionary on cadres_dictionary."
                . "specified_cadre=tbl_patientdetails.cadre inner join cadres on cadres.level=cadres_dictionary"
                . ".cadre_id inner join tbl_county on tbl_county.id = tbl_master_facility.county_id inner "
                . "join tbl_sub_county on tbl_sub_county.id =tbl_master_facility.Sub_County_ID";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {

			$data = array();
    
    		for ($x = 0; $x < $result->num_rows; $x++) {

        		$data[] = $result->fetch_assoc();
    		}

    		echo json_encode($data);

        }

?>

