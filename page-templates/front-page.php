<?php get_header()?>

<div id="left"> 
	Type in Linear Equation: y = mx + b
	</br></br>
	
	<form action="" method="post">
	<?php 
	  if(isset($_POST["yInt"]) || isset($_POST["slope"])){
	?>
  	  y = <input type="text" name="slope" size="7" id="slopeInput" value="<?php echo $_POST["slope"] ?>">x + <input type="text" size="7" name="yInt" id="yIntInput" value="<?php echo $_POST["yInt"] ?>">
  	  <input type="submit" value="Submit" class="btn btn-primary">
  	</br>
  	</br>
  	  <div id="chartContainer" style="height: 300px; width: 100%;"></div>
  	<?php 
  	} else{
  		?>
  		y = <input type="text" size="7" name="slope" id="slopeInput">x + <input type="text" size="7" name="yInt" id="yIntInput">
  		<input type="submit" value="Submit" class="btn btn-primary">
  		<?php
  	}
  	?>
  	  
	</form>

	<?php 
		if(isset($_POST["yInt"]) || isset($_POST["slope"])){

			$coordinates = [];
			
			for($i=0;$i<=10;$i++){
				$yCor = ($_POST["slope"] * $i) + $_POST["yInt"];
				$coordinates[$i] = ['x'=>$i,'y'=>$yCor];
			}
			
			?>
			<script>	
			var coordinates = <?= json_encode($coordinates) ?>;
			console.log(coordinates);
			
			window.onload = function () {
		    var chart = new CanvasJS.Chart("chartContainer",
		    {
		       data: [
		      {
		        type: "line",
		        dataPoints: coordinates
		      }
		      ],axisX:{
				  minimum:0,
				 
				  }
		    });

		    chart.render();
		  }
			</script>
		<?php	
		}
	?>

</div>

<?php get_footer()?>