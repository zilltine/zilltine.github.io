				<?php	$mysqli = mysqli_connect("localhost", "mpdelt_02", "IsmokKodint333", "mpdelt_02");
		if (!$mysqli){
			echo "Error!";
		} ?>
			<div id="table">
				<div style = "float:left; width: 100px;"> ID </div>
				<div style = "float:left; width: 100px;"> USERNAME </div>
				<div style = "float:left; width: 100px; overflow: hidden;"> PASSWORD </div>
				<div style = "float:left; width: 100px;"> EMAIL </div>
				<div style = "float:left; width: 100px;"> CREATION DATE </div>
				<div style = "float:left; width: 100px;"> UPDATE DATE </div>	
				<div style = "float:left; width: 100px;"> IS ADMIN </div>
				<div style = "float:left; width: 100px;"> TOKEN </div>
				<div style="clear:both"> </div><?php
			$result = $mysqli->query("SELECT * FROM Users LIMIT 20");
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				?>
				<form method ="post" style = "display: inline-block; float:left;"><?php
				foreach ($row as $key => $item){
					?>
					<input style="float:left; width: 100px; overflow: hidden;" type ='text' value ='<?php echo $item;?>' name='<?php echo $key;?>' ><?php
					?>
					<?php
					}
					?>
				<input type='submit' name='edit' value='Edit'>
				<input type='submit' name='remove' class='remove' value='Remove'>
				</form>	
				<div style="clear:both"> </div><?php 
		}