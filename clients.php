<?php

$con =  mysqli_connect('localhost','id18311038_root','MXAOx%Jb6qAXF~Q4','id18311038_vraboteni');


//if(isset($_POST['submit']))

   

	$ime_prezime = $_POST['ime_prezime'];
	$ime_kompanija = $_POST['ime_kompanija'];
	$email = $_POST['email'];
	$telefon = $_POST['telefon'];
	$tip_studii = $_POST['tip_studii'];



	// Database connection

	
	$sql = "INSERT INTO vraboteni(`id`, `ime_prezime`, `ime_kompanija`, `email`, `telefon`, `tip_studii`) VALUES('0', '$ime_prezime', '$ime_kompanija', '$email', '$telefon', '$tip_studii' )";
		$rs = mysqli_query($con, $sql);

        if($rs)
            {
	            echo "Contact Records Inserted";
            }


		else
			{
				header("Location: clients.html");
	
			}
?>