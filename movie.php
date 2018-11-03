<!DOCTYPE html>

	<head>
		<title>- Rancid Tomatoes</title>
                <link href="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/rotten.gif" type="image/gif" rel="icon">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="movie.css" type="text/css" rel="stylesheet">
	</head>
	<?php
			$movie=$_GET["film"];
			$a=file("$movie/info.txt");
	    list($nome,$anno,$voto)=$a;
			$b=file("$movie/overview.txt");
			$lun=sizeof($b);
			$r=glob("$movie/review*.txt");
		  $lunt=sizeof($r);
			$CRI="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif";

	?>
        <body>
          	<div id = "banner">
				<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes">
            </div>


            <h1><?=$nome?> (<?=$anno?>)</h1>

            <div id = "main">
                <div id = "right">
					<div>
						<img src="<?=$movie?>/overview.png" alt="general overview">
					</div>
					<?php
						for($i=0;$i<$lun;$i++)
						{
							$a1=explode(":",$b[$i]);
					?>
					<dl>
          	<dt><?=$a1[0] ?></dt>
							<dd><?=$a1[1] ?></dd>
					<?php } ?>
					</dl>

                </div> <!-- chiusura div "right" -->
                <div id = "left">
					<div id ="left-top">
						<?php
						$G="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rottenbig.png";
						if($voto>60)
						{
 							$G="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/freshbig.png";
						}
						?>
						<img src="<?=$G?>" alt="Rotten">
                        <span class="evaluation"><?=$voto?>%</span>
					</div>
        <div id="columns">
          <div id="leftcolumn">
						<?php
							for($Y=0;$Y<5;$Y++)
							{
								list($recensione,$tipo,$recens,$bho)=file("$r[$Y]");
								$stringa="FRESH";
								if(strcmp($stringa,$tipo)==0)
								{
									$ING="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif";

								}
								else
								{
									$ING="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif";
								}





						?>
						<p class="quotes">
            	<span >
								<img src="<?=$ING?>" >
									<q><?=$recensione?></q>
              	</span>
            </p>
						<p class="reviewers">
								<img src="<?=$CRI?>" alt="Critic">
								<?=$recens?> <br>
                <span class="publications"> <?=$bho?></span>
					 </p>
					 	<?php } ?>
			</div> <!-- chiusura div "leftcolumn" -->
	 		<div id = "rightcolumn">
				<?php
					while($Y<$lunt)
					{
						list($recensione,$tipo,$recens,$bho)=file("$r[$Y]");
					
						if($tipo=="FRESH")
							$ING="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif";
						else
							$ING="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif";

				?>
				<p class="quotes">
					<span >
						<img src="<?=$ING?>" >
							<q><?=$recensione?></q>
						</span>
				</p>
				<p class="reviewers">
						<img src="<?=$CRI?>" alt="Critic">
						<?=$recens?> <br>
						<span class="publications"> <?=$bho?></span>
			 </p>
				<?php $Y++; } ?>

			</div> <!-- chiudo "rightcolumn" -->

                    </div> <!-- chiusura div "columns" -->

            </div> <!-- chiusura div "left" -->

			<p id="bottom">(1-10) of 88</p>

        </div><!-- chiusura div "main" -->
		<div id="validators">
			<a href="http://validator.w3.org/check/referer">
       <img src="http://webster.cs.washington.edu/w3c-html.png" alt="Validate"></a> 			<br>
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!"></a>
		</div> <!-- chiusura div "validators" -->
	</body>
</html>
