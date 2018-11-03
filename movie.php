<!DOCTYPE html>

	<head>
		<title> Rancid Tomatoes</title>   <!-- Titolo standard del sito -->
    	<link href="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/rotten.gif" type="image/gif" rel="icon"> <!-- Link per immagine Favicon -->
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<link href="movie.css" type="text/css" rel="stylesheet"> <!-- Link di collegamento per pagina css -->
	</head>
	<?php
			$movie=$_GET["film"];             //Variabile film, in base al suo valore la pagina si crea dinamicamente
			$a=file("$movie/info.txt");       //Salvataggio dati dal file info nell'array a
	    list($nome,$anno,$voto)=$a;       //Spacchettamento dell'array in variabili
			$b=file("$movie/overview.txt");   //Salvataggio dati dal file overview  nell'array b
			$lun=sizeof($b);                  //Calcolo lunghezza dell'array che contiene i dati di overview,che usero dopo per un ciclo
			$r=glob("$movie/review*.txt");		//Salvataggio dati dal tutti i file che contengono recensioni.
		  $lunt=sizeof($r);									//Calcola quante recensioni ci sono in ogni cartella
			$CRI="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif"; //Variabile per l'immagine del critico
	?>
  <body>
    <div id = "banner">
			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes">
    </div>
		<h1><?=$nome?> (<?=$anno?>)</h1>      <!--Si creano dinamicamente il Nome e l'anno con le variabili che ho preso prima dall'array a -->
		<div id = "main">
  	<div id = "right">
			<div>
				<img src="<?=$movie?>/overview.png" alt="general overview">   <!-- Si carica l'immagine dalla cartella che indichiamo tramite la variabile film -->
			</div>
			<?php
				for($i=0;$i<$lun;$i++)                    //Ciclo for che ho usato per creare tutta la parte destra della pagina,inserendo i dati del file overfiew
					{
						$a1=explode(":",$b[$i]);						//Ho usato la funzione explode per poter dividere le stringhe preso da overview
			?>
			<dl>
        <dt><?=$a1[0] ?></dt>										<!-- Inserimento vero e proprio dei dati di overview-->
						<dd><?=$a1[1] ?></dd>
			<?php } ?>
			</dl>
		</div>
    <div id = "left">
			<div id ="left-top">
				<?php
					$G="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rottenbig.png";
					if($voto>60)        //Costrutto if usato per scegliere che immagine mettere:rottenbig o freshbig
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
					for($Y=0;$Y<5;$Y++)    //Ciclo for usato per creare le recensioni nella parte sinistra
					{
						list($recensione,$tipo,$recens,$bho)=file("$r[$Y]"); //Scompongo i dati dalle varie recensioni e li inserisco nelle proprie variabili
						$stringa="FRESH";																		//Variabile usata per il costrutto if che segue.
						if(strcmp($stringa,$tipo)==0)												//Costrutto if usato per mettere l'immagine ad ogni recensione, non sono riuscito a farlo funzionare!Non mi rendo conto del perchè
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
				<img src="<?=$ING?>" >         <!-- Inserimento dell'immagine per ogni recensione-->
				<q><?=$recensione?></q>			<!-- Inserimento del testo della recensione -->
    	</span>
    </p>
		<p class="reviewers">
			<img src="<?=$CRI?>" alt="Critic">		<!-- Immagine standar  -->
			<?=$recens?> <br>											<!-- Nome della persona che ha svolto la recensione -->
      <span class="publications"> <?=$bho?></span>  <!-- link di ogni recensione -->
				</p>
					 	<?php } ?>
</div>
<div id = "rightcolumn">       	<!-- Recensioni della parte destra,identica a sopra -->
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
			</div>
		</div>
	</div>
	<p id="bottom">(1-10) of 88</p>
</div>
		<div id="validators">
			<a href="http://validator.w3.org/check/referer">
       <img src="http://webster.cs.washington.edu/w3c-html.png" alt="Validate"></a> 			<br>
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!"></a>
		</div>
	</body>
</html>
