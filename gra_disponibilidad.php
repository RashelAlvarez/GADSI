 
 
	 
	 
		
 
	<body>
		<div style="width:40%">
			<div>
				<canvas id="canvas" height="450" width="600"></canvas>
			</div>
		</div>


	<script>
		 
		

			var lineChartData = {
			labels : ["15min","30min","1h","2h","6h","1d","2d","1sem","2sem","1mes","2mes","6mes","1a"],
			datasets : [
				
				{
					label: "My Second dataset",
					fillColor : "#D1EEFA",
					
					strokeColor : "#3681A9",
					pointColor : "#122B38",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [0,0,0,0.5,1,1,2,2,2,2.5,3,3]

				}
			]

		}


		 
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
	</body>
</html>
