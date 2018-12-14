<html>
	<head>
		<!-- Set title from browser -->
		<title>POC - WordGame </title>

		<!-- Load bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
		<!-- Our css  -->
		<link rel="stylesheet" href="../assets/css/custom.css">
	</head>
	<body>
		<div class="bg"></div>

		<div class="container-fluid" style="position: relative;">
			<div class="bg-transparent">
				<div class="nav-bar">WordGame</div>
				<div id="StartScreen">
					<div class="center">
						<img class="play" onclick="play()" src="../assets/images/play.png" alt="playImage">
					</div>
				</div>
				<div id="WordScreen" style="display: none;">
					<div class="center">
						<div class="Word_Holder row justify-content-md-center"></div>

						<div class="row justify-content-md-center">
							<div class="keyboard-left">
								<div class="row">
									<div onclick="add('ċ')">ċ</div>
								</div>
								<div class="row">
									<div onclick="add('ġ')">ġ</div>
								</div>
								<div class="row">
									<div onclick="add('ż')">ż</div>
								</div>
								<div class="row">
									<div onclick="add('ħ')">ħ</div>
								</div>
							</div>
							<div class="keyboard-center">
								<div class="row justify-content-md-center">
									<div onclick="add('q')">q</div>
									<div onclick="add('w')">w</div>
									<div onclick="add('e')">e</div>
									<div onclick="add('r')">r</div>								
									<div onclick="add('t')">t</div>								
									<div onclick="add('y')">y</div>								
									<div onclick="add('u')">u</div>
									<div onclick="add('i')">i</div>
									<div onclick="add('o')">o</div>
									<div onclick="add('p')">p</div>
								</div>
								<div class="row justify-content-md-center">
									<div onclick="add('a')">a</div>
									<div onclick="add('s')">s</div>
									<div onclick="add('d')">d</div>
									<div onclick="add('f')">f</div>								
									<div onclick="add('g')">g</div>								
									<div onclick="add('h')">h</div>								
									<div onclick="add('j')">j</div>
									<div onclick="add('k')">k</div>
									<div onclick="add('l')">l</div>
								</div>
								<div class="row justify-content-md-center">
									<div onclick="add('z')">z</div>
									<div onclick="add('x')">x</div>
									<div onclick="add('c')">c</div>
									<div onclick="add('v')">v</div>								
									<div onclick="add('b')">b</div>								
									<div onclick="add('n')">n</div>								
									<div onclick="add('m')">m</div>
									<div onclick="add('\'')">'</div>
								</div>
								<div class="row justify-content-md-center">
									<div class="keySpace" onclick="add('space')"></div>
								</div>
							</div>
							<div class="keyboard-center">
								<div class="row">
									<div onclick="add('7')">7</div>
									<div onclick="add('8')">8</div>
									<div onclick="add('9')">9</div>
								</div>
								<div class="row">
									<div onclick="add('4')">4</div>
									<div onclick="add('5')">5</div>
									<div onclick="add('6')">6</div>
								</div>
								<div class="row">
									<div onclick="add('1')">1</div>
									<div onclick="add('2')">2</div>
									<div onclick="add('3')">3</div>
								</div>
								<div class="row">
									<div class="keyZero" onclick="add('0')">0</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			
			function play()
			{				
				  $( "#StartScreen" ).fadeOut( "slow", function() 
				  {
				    // Animation complete.
				    $( "#WordScreen" ).fadeIn( "slow" );
				  });
			}

			function add(key)
			{
				if (key == "space")
				{
					$( ".Word_Holder" ).append("<div class='space'></div>" );
				}
				else
				{
					$( ".Word_Holder" ).append("<div>" + key + "</div>" );
				}
			}

		</script>




		<!-- Script bootstrap -->
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>