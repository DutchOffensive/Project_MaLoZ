<?php
    include 'crud.php';
?>

<?php
	$result = readId($con);
    while($row = mysqli_fetch_assoc($result)){ 
?>
<html>
	<body>
		<center>
			<form method="POST" action="crud.php">
				<input type="hidden" name="update_id" value="<?php echo $_GET['id'] ?>">
				<table cellspacing="5" cellpadding="0">
					<h1>Crud insert</h1>
					<tr>
						<td style="width: 100px;">Name:</td>
						<td>
							<input type="text" name="name" value="<?php echo $row['name'] ?>">
						</td>
					</tr>
					<tr>
						<td style="width: 100px;">File:</td>
						<td>
							<input type="text" name="file" value="<?php echo $row['file'] ?>">
						</td>
					</tr>
					<tr>
						<td style="width: 100px;">Text:</td>
						<td>
							<input type="text" name="text" value="<?php echo $row['text'] ?>">
						</td>
					</tr>
				</table>
				<br>
				<input type="submit" name="update">
			</form>
		</center>
	</body>
</html>
<?php 
	} 
?>