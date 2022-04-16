<html>
<head><title>Oracle demo</title></head>
<body>

	<?php 

		$conn=oci_connect("system","dbms106AJ","localhost/orcl");
		
		If (!$conn)
			echo 'Failed to connect to Oracle';
		else 
			echo 'Succesfully connected with Oracle DB';


		// $statement = oci_parse($conn, 'select 1 from dual');
		// oci_execute($statement);
		// $row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS);	

		$array = oci_parse($conn, "SELECT * from teacher");

		oci_execute($array);

		while($row=oci_fetch_array($array)) {
			echo "<br>";
			echo $row[0]. " " .$row[1];

		}

		oci_close($conn);
	?>

</body>
</html>