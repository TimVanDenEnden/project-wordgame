<html>
	<head>
		<!-- Set title from browser -->
		<title>POC - WordGame</title>

		<!-- Load bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
		
		<!-- Select2 -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

		<!-- Our css  -->
		<link rel="stylesheet" href="../assets/css/custom.css">

		<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
	</head>
	<body>
		<div class="bg"></div>

		<div class="container-fluid" style="position: relative;">
			<div class="bg-transparent">
				<div class="nav-bar">WordGame
					<p style="position: absolute; right: 30px; top: 8px;"><?php echo $userdata->studentFirstname . " " . $userdata->studentLastname;  ?></p>
				</div>
				<div id="StartScreen">
					<div class="center" style="min-height: 120px;">
						<div id="selectBox">
							<select class="select-list" name="state" style="max-width: 600px; display: block; margin: 20px auto;"></select>
						</div>
						<div class="startText">Click to start!</div>
						<img class="play" onclick="play()" src="../assets/images/play.png" alt="playImage">
						<img class="pointer" onclick="play()" src="../assets/images/pointer.png" alt="pointerImage">
						<div id="number3" class="number" style="display: none">3</div>
						<div id="number2" class="number" style="display: none">2</div>
						<div id="number1" class="number" style="display: none">1</div>
					</div>
				</div>
				<div id="WinScreen" style="display: none;">
					<div class="row justify-content-md-center" style="padding: 20px;">
						<div>
							<img class="cup" src="../assets/images/cup.png" style="height: 120px;" alt="cup">
						</div>
						<div class="total">
							<div id="totalWords_Holder"></div>
							<div id="goodWords_Holder"></div>
							<div id="wrongWords_Holder"></div>
						</div>
					</div>
					<div class="Stats" style="display: none;"></div>
					<div class="row" style="justify-content: center!important;">
						<div class="moreDetails" onclick="loadStats()">
							<p style="margin-bottom: 0px;">Click here to show more details.</p>
						</div>
					</div>
				</div>
				<div id="WordScreen" style="display: none;">
					<div class="center">
						<img src="./assets/images/sound.png" alt="sound" class="soundImg">
						<div class="Word_Holder row justify-content-md-center" style="display: none;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="alertHolder" style="justify-content: center !important;">
			<div class='col alert'> For this game you need to have sound! </div>
		</div>
		<div class="row justify-content-md-center" id="totalWords" style="display: none; justify-content: center!important;">
			<div class='col wordDot' id='wordDot'></div>
		</div>

		<div class="container Keyboard" style="display: none;">
			<div class="row">
				<div class="col" style="max-width: -webkit-fill-available;" onclick="check()">check</div>
				<!-- <div class="col" style="max-width: -webkit-fill-available;">replay</div> -->
			</div>
			<div class="row justify-content-md-center">
				<div class="col" onclick="add('ċ')">ċ</div>
				<div class="col" onclick="add('1')">1</div>
				<div class="col" onclick="add('2')">2</div>
				<div class="col" onclick="add('3')">3</div>
				<div class="col" onclick="add('4')">4</div>
				<div class="col" onclick="add('5')">5</div>
				<div class="col" onclick="add('6')">6</div>
				<div class="col" onclick="add('7')">7</div>
				<div class="col" onclick="add('8')">8</div>
				<div class="col" onclick="add('9')">9</div>
				<div class="col" onclick="add('0')">0</div>
				<div class="col"onclick="backspace()"><-</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col" onclick="add('q')">q</div>
				<div class="col" onclick="add('w')">w</div>
				<div class="col" onclick="add('e')">e</div>
				<div class="col" onclick="add('r')">r</div>
				<div class="col" onclick="add('t')">t</div>
				<div class="col" onclick="add('y')">y</div>
				<div class="col" onclick="add('u')">u</div>
				<div class="col" onclick="add('i')">i</div>
				<div class="col" onclick="add('o')">o</div>
				<div class="col" onclick="add('p')">p</div>
				<div class="col" onclick="add('ġ')">ġ</div>
				<div class="col" onclick="add('ħ')">ħ</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col" onclick="add('a')">a</div>
				<div class="col" onclick="add('s')">s</div>
				<div class="col" onclick="add('d')">d</div>
				<div class="col" onclick="add('f')">f</div>
				<div class="col" onclick="add('g')">g</div>
				<div class="col" onclick="add('h')">h</div>
				<div class="col" onclick="add('j')">j</div>
				<div class="col" onclick="add('k')">k</div>
				<div class="col" onclick="add('l')">l</div>
				<div class="col" style="max-width: 166.656px;" onclick="add('\'')">'</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col" style="max-width: 166.656px;">^</div>
				<div class="col" onclick="add('ż')">ż</div>
				<div class="col" onclick="add('z')">z</div>
				<div class="col" onclick="add('x')">x</div>
				<div class="col" onclick="add('c')">c</div>
				<div class="col" onclick="add('v')">v</div>
				<div class="col" onclick="add('b')">b</div>
				<div class="col" onclick="add('n')">n</div>
				<div class="col" onclick="add('m')">m</div>
				<div class="col" style="max-width: 166.656px;">^</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col" style="max-width: 583.296px; height: 40px;" onclick="add('space')"></div>
			</div>
		</div>
		
		<script>
			
			// create list.
			$(document).ready(function() {
			    $('.select-list').select2({
			    	minimumResultsForSearch: -1
			    });
			});

			// Set some vars.
			var words = [];
			var wordlists = [];
			var listPos = 0;

			var keyboardEnabled = false;

			// Load data for lists.
			$.ajax({
			    url: "/api/load",
			    type:'GET',
			    dataType: "JSON",
			    success: function( dataFromApi ) 
			    {
			    	// console.log(dataFromApi); 
			    	if (dataFromApi['status'] == 'OK')
			    	{
			    		words = dataFromApi['wordlistData']['listWords'];

			    		wordlists = dataFromApi['wordlistData'];

			    		for (var i = 0; i < wordlists.length; i++)
			    		{
			    			// console.log(wordlists[i]);

			    			$( ".select-list" ).append("<option value='" + i + "'>" + wordlists[i]['name'] + "</option>");
			    		}

			    		words = wordlists[0]['words'];

			    		// get total words.
			    		createTotal();

			    		// create stats for the list.
						createStats();
			    	}
			    }

			});

			// Set words after list is selected.
			$('.select-list').on('change', function() 
			{
				listPos = this.value;
				words = wordlists[listPos]['words'];

				// get total words.
				createTotal();

				// create stats for the list.
				createStats();
			});

			function createStats()
			{
				for (var i = 0; i < words.length; i++) 
				{
					words[i]['tryCount'] = 0;
					words[i]['status'] = 'none';
				}
			}

			function createTotal()
			{
				$( "#totalWords" ).html("");
			    for (var i = 0; i < words.length; i++) 
				{
					if (pos != i)
					{
						$( "#totalWords" ).append("<div class='col wordDot' id='wordDot" + i + "'><img id='wordDotImage" + i + "' src='../assets/images/starWrong.png' alt='startIcon' style='height: 40px; width: 40px;'></div>");
					}
					else
					{
						$( "#totalWords" ).append("<div class='col wordDot current' id='wordDot" + i + "'><img id='wordDotImage" + i + "' src='../assets/images/starWrong.png' alt='startIcon' style='height: 40px; width: 40px;'></div>");
					}	
				}
			}

			var pos = 0;
			var tryCount = 1;

			var goodWords = 0;
			var wrongWords = 0;

			var sessionId = 0;
			
			function play()
			{	
				// Create session
				startSession();
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

			function backspace()
			{
				$( ".Word_Holder div" ).last().remove();
			}

			function check()
			{
				keyboardEnabled = false;

				var getTypedIn = "";
				var splittedWord = words[pos]['word'].split("");
				var match = true;

				$.each( $('.Word_Holder'), function(i, left) 
				{
					$('div', left).each(function() {

						// get each letter.
						getTypedIn = getTypedIn + $(this).html();

				   	});
				})

				var splittedgetTypedIn = getTypedIn.split("");

				if (splittedWord.length == splittedgetTypedIn.length)
				{
					for (i = 0; i < splittedgetTypedIn.length; i++) 
					{
					    if (splittedgetTypedIn[i] != splittedWord[i])
					    {
					    	match = false;	
					    }
					}
				}
				else
				{
					match = false;
				}

				if (match == false)
				{
					if (tryCount < 3)
					{
						if ($( ".Word_Holder" ).html() != "")
						{
							$( ".Word_Holder" ).effect("shake");
							tryCount++;

							keyboardEnabled = true;
						}
					}
					else
					{
						$( '#wordDot' + pos ).removeClass( "current" );
						wrongWords++;

						$( ".Keyboard" ).fadeOut( "slow", function() {

							words[pos]['tryCount'] = tryCount;
							words[pos]['status'] = 'wrong';
							nextWord();
						});
					}

				}
				else
				{
					$('#wordDotImage' + pos).attr('src','../assets/images/starRight.png');
					$( '#wordDot' + pos ).removeClass( "current" );

					goodWords++;
					$( ".Keyboard" ).fadeOut( "slow", function() {

						words[pos]['tryCount'] = tryCount;
						words[pos]['status'] = 'good';

						nextWord();
					});
				}
			}

			function nextWord()
			{
				// Go next word.
				$(".Word_Holder").html("");
				pos++;

				if (words[pos] != null)
				{
					$( ".Keyboard" ).fadeOut( "slow", function()
					{
						$('.Word_Holder').css("display", "none");  

						$(".soundImg").fadeIn( "slow", function()
						{
							var audioElement = document.createElement('audio');
							audioElement.setAttribute('src', 'https://spelladmin.easypeasycoding.com/upload/' + words[pos]['id'] + '/' + words[pos]['audio']);

							audioElement.play();
												    
							audioElement.addEventListener('ended', function() {
							    $('.soundImg').css("display", "none");  
							    $( ".Keyboard" ).fadeIn( "slow" );
							    $( ".Word_Holder" ).fadeIn( "slow" );

							    keyboardEnabled = true;

							}, false);
						});
					});

					// reset tryCount
					tryCount = 1;
					$( '#wordDot' + pos ).addClass( "current" );
				}
				else
				{

					$( ".Keyboard" ).fadeOut( "slow" );
					$( "#WordScreen" ).fadeOut( "slow", function() 
					{
						$("#totalWords_Holder").html("Total words: " + words.length);
						$("#goodWords_Holder").html("Good words: " + goodWords);
						$("#wrongWords_Holder").html("Wrong words: " + wrongWords);

						// Animation complete.
					  	$( "#WinScreen" ).fadeIn( "slow" );
					});
				}
			}

			function loadStats()
			{
				$('.moreDetails').fadeOut("slow");

				for (var i = 0; i < words.length; i++) 
				{
					$( ".Stats" ).append("<div class='word_stat'> <div>Word: " + words[i]['word'] + "</div> <div>Status: " + words[i]['status'] + "</div> <div>Try's: " + words[i]['tryCount'] + "</div> </div>" );
				}
 
				$('.Stats').fadeIn("slow");
			}

			function gotSession(sessionData) 
			{
                if (sessionData['data'].sessionid != null)
				{	
					// save sessionId
					sessionId = sessionData['data'].sessionid;

					$( ".startText" ).fadeOut("slow");	
					$( "#selectBox" ).fadeOut("slow");	
					$( ".pointer" ).fadeOut("slow");
					$( "#alertHolder" ).fadeOut("slow");
					$( ".play" ).fadeOut( "slow", function() 
					{
					  	$( "#number3" ).fadeIn( "slow", function() 
					  	{
					  		$( "#number3" ).fadeOut( "slow", function() 
					  		{
					  			$( "#number2" ).fadeIn( "slow", function() 
							  	{
							  		$( "#number2" ).fadeOut( "slow", function() 
							  		{
							  			$( "#number1" ).fadeIn( "slow", function() 
									  	{
									  		$( "#number1" ).fadeOut( "slow", function() 
									  		{
											    // Animation complete.
											    $( "#StartScreen" ).fadeOut( "slow" , function(){
											    	$( "#WordScreen" ).fadeIn("slow");
											    	$( "#totalWords" ).fadeIn( "slow" );

											    	var audioElement = document.createElement('audio');
													audioElement.setAttribute('src', 'https://spelladmin.easypeasycoding.com/upload/' + words[pos]['id'] + '/' + words[pos]['audio']);

													audioElement.play();
													    
													audioElement.addEventListener('ended', function() {
													    $('.soundImg').css("display", "none");  
													    $( ".Keyboard" ).fadeIn( "slow" );
													    $( ".Word_Holder" ).fadeIn( "slow" );

													    keyboardEnabled = true;

													}, false);
											    });
											    
									  		});	
							  			});
							  		});	
					  			});
					  		});	
					  	});	
					});

				}
            }

            function startSession()
            {
                $.ajax({
				  	url: "/api/startSession",
				  	method: "POST",
				  	data: { listId: 1 },
				  	dataType: "JSON",
				  	success: gotSession
				});
            }

			$(window).keydown(function(event) 
			{
				if (keyboardEnabled == true)
	            {


	            	if (event.which == 13 || event.which == 8) 
	            	{
	            		if (event.which == 13)
	            		{
	            			event.preventDefault();
					  		check();
	            		}

	            		if (event.which == 8)
	            		{
	            			event.preventDefault();
					  		backspace();
	            		}
					}
					else
					{
						add(event['originalEvent'].key);
					}
	            }
			});

		</script>

		<!-- Script bootstrap -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="./assets/js/bg_script.js"></script>
	</body>
</html>