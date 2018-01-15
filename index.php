<?php
include_once ('config/config.live.php');
include_once ('header.php'); 
?>

<body>
<div id="header">
 <div id="logo">
  <a href="index.php"><img style="margin-top: 7px;" src="img/logo-bncf.jpg" alt="Logo Biblioteca Nazionale Centrale di Firenze" /></a>
  </div>
 <h2>Biblioteca Nazionale Centrale di Firenze - Repertori in rete</h2>
 <div class="clear"></div>
</div>
<?php
$riga_file = 1;
$richiedente = getRealIpAddr();
$accesso_interno = searcharray($ip_ammesso,$richiedente);
echo "<div id='leftwidecol'>\n";

 if (($handle = fopen($indirizzo_file, "r")) !== FALSE)
 {
    //echo "<p> aperto file\n";
    while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE)
	{
	#riga 1
	if (($riga_file == 1)  and (substr($data[0],0,5)) == "#ATTE")
		{
		echo "<p></p>\n";
		}	
	#riga 2
	if ($riga_file == 2 and substr($data[0],0,5) == "#TEST")
		{
		echo "<p><i>".$data[1]."</i></p>\n";
		}	

	#riga 3
	if ($riga_file == 3 and substr($data[0],0,4) == "#URL")
		{
		echo "<p></p>\n";
		}	

	#riga 4
	if ($riga_file == 4 and substr($data[0],0,4) == "http")
		{
		if($accesso_interno !==  NULL)
			{
			echo "<ol>\n";
			echo "<li>\n";
			echo "<a href =\"$data[0]\">".$data[1]."</a>\n";
			echo "<br><i>".$data[2]."</i>";
			echo "</li>\n";
			}	
		
		elseif($accesso_interno ===  NULL and substr($data[3],0,2) == "**")
			{
			echo "<ol>\n";
			echo "<li>\n";
			echo "<a href =\"$data[0]\">".$data[1]."</a>\n";
			echo "<br><i>".$data[2]."</i>";
			echo "</li>\n";
			}	
		elseif($accesso_interno ===  NULL and substr($data[3],0,2) == "!!")
			{
			echo "<ol>\n";
			echo "<li>\n";
			echo "<b>".$data[1]."</b>\n";
			echo "<br><i>".$data[2]."</i>";
			echo "</li>\n";
			}	
		
		}

	#tutte le righe dopo la 4
	if ($riga_file > 4 and substr($data[0],0,4) == "http")
		{
		if($accesso_interno !==  NULL)
			{
			echo "<li>\n";
			echo "<a href =\"$data[0]\">".$data[1]."</a>\n";
			echo "<br><i>".$data[2]."</i>";
			echo "</li>\n";
			}	
		elseif($accesso_interno ===  NULL and substr($data[3],0,2) == "**")
			{
			echo "<li>\n";
			echo "<a href =\"$data[0]\">".$data[1]."</a>\n";
			echo "<br><i>".$data[2]."</i>";
			echo "</li>\n";

			}	
		elseif($accesso_interno ===  NULL and substr($data[3],0,2) == "!!")
			{
			echo "<li>\n";
			echo "<b>".$data[1]."</b>\n";
			echo "<br><i>".$data[2]."</i>";
			echo "</li>\n";
			}	
		
		}


	$riga_file++;
	}	
		
}
else
{
echo "<p><i>Repertori non disponibili -- riprovare più tardi </i> </p>";
exit;
}
if ($riga_file > 4)
	{
	echo "</ol>\n";
	}

fclose($handle);

?>


</div>

 <div id="clear"></div>

<?php include_once('footer.php'); ?>

</body>
</html>
