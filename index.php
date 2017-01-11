<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trivia</title>
		<meta name="description" content="A Collection of Dialog Effects" />
		<meta name="keywords" content="dialog, effect, modal, overlay, animation, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<!-- common styles -->
		<link rel="stylesheet" type="text/css" href="css/dialog.css" />
		<!-- individual effect -->
		<link rel="stylesheet" type="text/css" href="css/dialog-sally.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
	</head>
	<body>
	<?php
	$url = "http://jservice.io/api/random";
	$json = file_get_contents($url);
	$obj = json_decode($json);


	$question = $obj[0]->question;
	$answer = $obj[0]->answer;
	$value = $obj[0]->value;
	$category = $obj[0]->category->title;
	?>
		<div class="container">
			<div class="content">
				<header class="codrops-header">
					<h1><span>A collection of</span> Tricky Trivia <span><?php echo $category; ?></span></h1>
					<div class="button-wrap"><button data-dialog="somedialog" class="trigger"><?php echo $question; ?></button></div>
				</header>
				<div id="somedialog" class="dialog">
					<div class="dialog__overlay"></div>
					<div class="dialog__content">
						<h2><strong>Answer</strong><br><?php echo $answer; ?></h2><h3><?php echo $value; ?></h3><div><button class="action" data-dialog-close id="close">Next</button></div>
					</div>
				</div>
			</div><!-- /content -->
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/dialogFx.js"></script>
		<script>
			(function() {

				var dlgtrigger = document.querySelector( '[data-dialog]' ),
					somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
					dlg = new DialogFx( somedialog );

				dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );

			})();

			$(document).ready(function(){
			    $('#close').click(function(){
			    	location.reload();
			    });
			});
		</script>
		<?php echo "<pre style='display:none;'>"; print_r($obj); echo "</pre>";?>
	</body>
</html>
