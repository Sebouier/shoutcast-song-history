<!-- import libraries -->
<?php include("library/simplehtmldom_1_5/simple_html_dom.php");

////////////////////// Put here your Radio stream url ////////////////////////////////////////////////////////
$CurrentStreamUrl = "http://protostar.shoutca.st:8234";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<!-- Main stylesheet and color file -->
<head>
	<style>
	/* ================ The Timeline ================ */

	#timeline-bloc {
	  margin: 0;
	  margin-top: -20px;
	  padding: 0;
	  background: rgb(230,230,230);
	  
	  color: rgb(50,50,50);
	  font-family: 'Open Sans', sans-serif;
	  font-size: 112.5%;
	  line-height: 1.6em;
	}

	#timeline-bloc h3 {
	  text-align: center;
	  padding-top:10px;
	  margin-bottom:-20px;
	  font-size: 18px;
	  text-decoration: underline;
	}

	.timeline {
	  position: relative;
	  width: 668px;
	  margin: 0 auto;
	  margin-top: 20px;
	  padding: 1em 0;
	  list-style-type: none;
	  font-size:14px;
	}

	.timeline:before {
	  position: absolute;
	  left: 50%;
	  top: 0;
	  content: ' ';
	  display: block;
	  width: 6px;
	  height: 100%;
	  margin-left: -3px;
	  background: rgb(80,80,80);
	  background: -moz-linear-gradient(top, rgba(80,80,80,0) 0%, rgb(80,80,80) 8%, rgb(80,80,80) 92%, rgba(80,80,80,0) 100%);
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,1)));
	  background: -webkit-linear-gradient(top, rgba(80,80,80,0) 0%, rgb(80,80,80) 8%, rgb(80,80,80) 92%, rgba(80,80,80,0) 100%);
	  background: -o-linear-gradient(top, rgba(80,80,80,0) 0%, rgb(80,80,80) 8%, rgb(80,80,80) 92%, rgba(80,80,80,0) 100%);
	  background: -ms-linear-gradient(top, rgba(80,80,80,0) 0%, rgb(80,80,80) 8%, rgb(80,80,80) 92%, rgba(80,80,80,0) 100%);
	  background: linear-gradient(to bottom, rgba(80,80,80,0) 0%, rgb(80,80,80) 8%, rgb(80,80,80) 92%, rgba(80,80,80,0) 100%);
	  
	  z-index: 5;
	}

	.timeline li:after {
	  content: "";
	  display: block;
	  height: 0;
	  clear: both;
	  visibility: hidden;
	}

	.direction-l {
	  position: relative;
	  width: 300px;
	  float: left;
	  text-align: right;
	}

	.direction-r {
	  position: relative;
	  width: 300px;
	  float: right;
	}

	.flag-wrapper {
	  position: relative;
	  display: inline-block;
	  
	  text-align: center;
	}

	.flag {
	  position: relative;
	  display: inline;
	  background: rgb(248,248,248);
	  padding: 4px 10px;
	  border-radius: 5px;
	  font-weight: 600;
	  text-align: left;
	}

	.direction-l .flag {
	  -webkit-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
	  -moz-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
	  box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
	}

	.direction-r .flag {
	  -webkit-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
	  -moz-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
	  box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
	}

	.direction-l .flag:before,
	.direction-r .flag:before {
	  position: absolute;
	  top: 50%;
	  right: -40px;
	  content: ' ';
	  display: block;
	  width: 12px;
	  height: 12px;
	  margin-top: -10px;
	  background: #fff;
	  border-radius: 10px;
	  border: 4px solid rgb(255,80,80);
	  z-index: 10;
	}

	.direction-r .flag:before {
	  left: -40px;
	}

	.direction-l .flag:after {
	  content: "";
	  position: absolute;
	  left: 100%;
	  top: 50%;
	  height: 0;
	  width: 0;
	  margin-top: -8px;
	  border: solid transparent;
	  border-left-color: rgb(248,248,248);
	  border-width: 8px;
	  pointer-events: none;
	}

	.direction-r .flag:after {
	  content: "";
	  position: absolute;
	  right: 100%;
	  top: 50%;
	  height: 0;
	  width: 0;
	  margin-top: -8px;
	  border: solid transparent;
	  border-right-color: rgb(248,248,248);
	  border-width: 8px;
	  pointer-events: none;
	}

	.time-wrapper {
	  display: inline;
	  max-width: 220px;
	  line-height: 1.2em;
	  font-size: 0.9em;
	  color: rgb(250,80,80);
	}

	.direction-l .time-wrapper {
	  float: left;
	}

	.direction-r .time-wrapper {
	  float: right;
	}

	.time {
	  display: inline-block;
	  padding: 4px 6px;
	  background: rgb(248,248,248);
	  color: #ce5252;
	}
	.time a {
	  color: #ce5252;
	}
	.time img{
	  width: 40px;
	  float:left;
	}
	.desc {
	  margin: 1em 0.75em 0 0;
	  
	  font-size: 0.77777em;
	  font-style: italic;
	  line-height: 1.5em;
	}

	.direction-r .desc {
	  margin: 0.5em 0 0 0;
	}
	.direction-l .desc {
	  margin: 0.5em 0 0 0;
	}


	@media screen and (max-width: 660px) {

		.timeline {
			width: 100%;
			padding: 4em 0 1em 0;
		}

		.timeline li {
			padding: 0.5em 0;
		}

		.direction-l,
		.direction-r {
			float: none;
			width: 100%;

			text-align: center;
		}

		.flag-wrapper {
			text-align: center;
		}

		.flag {
			background: rgb(255,255,255);
			z-index: 15;
		}

		.direction-l .flag:before,
		.direction-r .flag:before {
		  position: absolute;
		  top: -30px;
			left: 50%;
			content: ' ';
			display: block;
			width: 12px;
			height: 12px;
			margin-left: -7px;
			background: #fff;
			border-radius: 10px;
			border: 4px solid rgb(255,80,80);
			z-index: 10;
		}

		.direction-l .flag:after,
		.direction-r .flag:after {
			content: "";
			position: absolute;
			left: 50%;
			top: -8px;
			height: 0;
			width: 0;
			margin-left: -8px;
			border: solid transparent;
			border-bottom-color: rgb(255,255,255);
			border-width: 8px;
			pointer-events: none;
		}

		.time-wrapper {
			display: block;
			position: relative;
			margin: 4px 0 0 0;
			z-index: 17;
		}

		.direction-l .time-wrapper {
			float: none;
		}

		.direction-r .time-wrapper {
			float: none;
		}

		.desc {
			position: relative;
			margin: 1em 0 0 0;
			padding: 1em;
			background: rgb(245,245,245);
			-webkit-box-shadow: 0 0 1px rgba(0,0,0,0.20);
			-moz-box-shadow: 0 0 1px rgba(0,0,0,0.20);
			box-shadow: 0 0 1px rgba(0,0,0,0.20);
			float: none;
		  z-index: 16;
		}

		.direction-l .desc,
		.direction-r .desc {
			position: relative;
			margin: 1em 1em 0 1em;
			padding: 1em;
			margin-top: -10px;
		}

		#timeline-bloc h3 {
		  font-size: 14px;
		}

		.table-fill th {
		   font-size: 14px;
		}

		.table-fill td {
		  font-size:12px;
		}
	}
	</style>
</head>

<?php
	$htmlContent = file_get_contents($CurrentStreamUrl.'/played.html');
		
	$aDataTableHeaderHTML = Array();
	
	$DOM = new DOMDocument();
	@$DOM->loadHTML($htmlContent);
	
	$Detail = $DOM->getElementsByTagName('td');

	//#Get row data/detail table without header name as key
	$j = 0;
	foreach($Detail as $sNodeDetail) 
	{
		$aDataTableDetailHTML[$j] = trim($sNodeDetail->textContent);
		$j = $j + 1;
	}
	
	if (sizeof($aDataTableDetailHTML) > 20) { ?>
		
	<div id="timeline-bloc">
		<h3>ABC Lounge - Last songs played</h3>
		<p>This list is refreshed automatically every 10 sec</p>
		<!-- The Timeline -->
		<ul class="timeline">			
		
		<?php 
		$nbarticle = 0;
		for ($i=(sizeof($aDataTableDetailHTML) - 17) ; $i < sizeof($aDataTableDetailHTML) ; $i=$i+2) {
			$nbarticle = $nbarticle + 1;
			?>		
			<!-- Item list -->
			<li><?php 
			if ($nbarticle % 2 == 0) {?>
				<div class="direction-r">
			<?php }else {?>
				<div class="direction-l">
			<?php } ?>
					<div class="flag-wrapper">
						<span class="flag"><?php echo ((int)substr($aDataTableDetailHTML[$i-1], 0, 2)+2).substr($aDataTableDetailHTML[$i-1],-6,6); ?></span>
						<span class="time-wrapper">
							<span class="time"><?php echo $aDataTableDetailHTML[$i]; ?></span>
						</span>
					</div>
				</div>
			</li>
			
		<?php	
		}?>
		
		</ul>
	</div><?php				
	}
?>