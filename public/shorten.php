<html>
<head>
	<title>healkdsf</title>
</head>
<body>
<?php
	function stmt_bind_assoc(&$stmt, &$out)
{
	$data = mysqli_stmt_result_metadata($stmt);
	$fields = array();
	$out = array();
	$fields[0] = $stmt;
	for ($i = 1; $field = mysqli_fetch_field($data); $i++)
		$fields[$i] = &$out[$field->name];
	call_user_func_array('mysqli_stmt_bind_result', $fields);
}
	if (isset($_POST['rawURL']))
	{
		$db = mysqli_connect("127.0.0.1", "homer", "homer", "homer");
		if (!$db)
			die("Database connection failed: " . mysql_error());
		

		$query = "SELECT id FROM url ORDER BY timestamp DESC LIMIT 1";
		
		if ($stmt = mysqli_prepare($db, $query))
		{
			mysqli_stmt_execute($stmt);

			$stmt->store_result();

			echo '<p>hello</p>';
			$resultrow = array();

			stmt_bind_assoc($stmt, $resultrow);

			$numRows = mysqli_stmt_num_rows($stmt);

			if ($numRows < 1)
			{
				echo '<p>0 rows</p>';
				$query = "INSERT INTO url (id, long_url) VALUES ('00000000', ?)";
				
				$stmt = mysqli_prepare($db, $query);
				
				mysqli_stmt_bind_param($stmt, "s", $_POST['rawURL']);
				mysqli_stmt_execute($stmt);
			}
			else
			{
				if (mysqli_stmt_fetch($stmt))
				{
					foreach ($resultrow as $key => $data)
					{
						if ($key == 'id');
					}
				}
			}
		}

		echo '<p>' . $query . '</p>';
		echo '<p>' . $numRows . '</p>';
	}
	else
		echo '<p>url was not set.</p>';
?>
</body>
</html>
