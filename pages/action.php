<html>
	<body>
		<center>
			<form method="POST" action="crud.php">
				<input type="hidden" name="insert" value="1">
				<table cellspacing="5" cellpadding="0">
					<h1>Crud insert</h1>
					<tr>
						<td style="width: 100px;">Name:</td>
						<td>
							<input type="text" name="name" value="">
						</td>
					</tr>
					<tr>
						<td style="width: 100px;">File:</td>
						<td>
							<input type="text" name="file" value="">
						</td>
					</tr>
					<tr>
						<td style="width: 100px;">Text:</td>
						<td>
							<input type="text" name="text" value="">
						</td>
					</tr>
				</table>
				<br>
				<input type="submit" name="insert">
			</form>
		</center>
	</body>
</html>