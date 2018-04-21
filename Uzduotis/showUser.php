
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include 'conn.php';
$input = $_POST['input'];
$query = "SELECT * FROM users WHERE username LIKE '%$input%' LIMIT 8";
$result = mysqli_query($conn, $query);
echo "<ul>";
 if (mysqli_num_rows($result) < 1) {
    echo "<li> Tokio vartotojo neradau</li>";
}
while ($row = mysqli_fetch_assoc($result)){
	echo "<li>". $row['username']. "</li>";
}
echo "</ul>";
?>
<script> 
	$('#result li').click(function(){
		var user = $(this).html();
		$("#display").load("selectedUser.php", {
				user: user
			});
		$("#result").html('');
	});

</script>
</body>
</html>