
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$("#uzduoti").click(function(event){
			event.preventDefault();
			var id = $("#userId").html();
			var uzduotis = $("#uzduotis").val();
			var user = $("#vartotojas").html();
			$.post("uzduotisProcess.php", {
				id: id,
				uzduotis: uzduotis
			});
			$("#display").load("selectedUser.php", {
				user: user
			});
		});
	});
	$(document).ready(function(){
		$(".fa-edit").click(function(){
		var value = $(this).siblings(".uzduotisVal");
		var newVal = value.html();
		var text = '<input type="text" class="naujaUzduotis" value="'+newVal+'">';
		value.html(text);
		});
	});
	$(document).ready(function(){
		$(".fa-trash-alt").click(function(){
			if (confirm('Ar tikrai norite ištrinti šią užduotį?')){
				var id = $(this).siblings()[2];
				id = id.innerHTML;
				console.log(id);
				$.post("delete.php", {
						id: id
				});
				var user = $("#vartotojas").html();
				$("#display").load("selectedUser.php", {
						user: user
				});
			}
		});
	});
	$(document).ready(function(){
		$("body").on('change', '.naujaUzduotis', function(){
			var id = $(this).parent().siblings()[1];
			id = id.innerHTML;
			var value = $(this).val();
			console.log(value);
			console.log(id);
			$.post("edit.php", {
					id: id,
					value: value
			});
			var user = $("#vartotojas").html();
			$("#display").load("selectedUser.php", {
					user: user
			});
		});
	});
	$(document).ready(function(){
		$(".fa-sync").click(function(){
			var user = $("#vartotojas").html();
			$("#display").load("selectedUser.php", {
				user: user
			});
		});
	});

</script>
<body>
<?php
include 'conn.php';
$username = $_POST['user'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_array($result);
$userId = $user['id'];
echo "<h1 id='vartotojas'>". $user['username']. "</h1>";
echo "<span id='userId' style='display:none;'>". $userId."</span>"
?>
<hr>
<h2> Nauja užduotis</h2>
<form>
	<input type="text" id="uzduotis">
	<button id="uzduoti">Užduoti!</button>
</form>
<span id="pranesimas"></span>
<h2> Esamos užduotys <i class="fas fa-sync"></i></h2>
<ul>
<?php 
	$query = "SELECT * FROM uzduotys WHERE users_id = $userId";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)){
		echo "<li> <span class='uzduotisVal'>". $row['uzduotis']. "</span>";
		echo "<span class='status' style='display:none;'>". $row['statusas']."</span>";
		echo "<span id='taskId' style='display:none;'>". $row['id']."</span>";
		echo '<i class="far fa-trash-alt"></i>';
		echo '<i class="far fa-edit"></i>';
		echo "</li>";
	}

?>
	
</ul>
<script type="text/javascript">zymeti();</script>
</body>
</html>