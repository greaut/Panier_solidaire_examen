<SCRIPT type="text/javascript">
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Fonction permettant de d'instancier l'objet XMLHttpRequest
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	function getObjetXMLHttpRequest()
		{
		var requeteHttp;
		if (window.XMLHttpRequest) //Mozilla
			{
			requeteHttp=new XMLHttpRequest();
			if (requeteHttp.overrideMimeType) //Firefox
				{
				requeteHttp.overrideMimeType('text/xml');
				}
			}
		else
			{
			if (window.ActiveXObject) //IE < 7
				{
				try
					{
					requeteHttp=new ActiveXObject("Msxml2.XMLHTTP");
					}
				catch(e)
					{
					try
						{
						requeteHttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
					catch(e)
						{
						requeteHttp=null;
						alert ("Navigateur incompatible");
						}
					}
				}
			}
		return requeteHttp;
		}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Fonctions permettant de faire des appels Ajax
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	function appelAjax()
		{
		var requeteHttp=getObjetXMLHttpRequest();
		if (requeteHttp!=null)
			{
			var laListe;
			laListe = document.getElementById('listePaniers');
			var unItem;
			unItem = laListe.options[laListe.selectedIndex].value;
			requeteHttp.open("POST","Vues/constructionContenuPanier.php",true);
			requeteHttp.setRequestHeader("Content-Type",
				"application/x-www-form-urlencoded");
			requeteHttp.send('itemDate='+unItem);
			requeteHttp.onreadystatechange = 
				function () {recevoirReponseContenu(requeteHttp)};
			}
		}
		
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Fonctions permettant de recevoir et de traiter la reponse des requetes Ajax
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------				
	function recevoirReponseContenu(requeteHttp)
		{
		if (requeteHttp.readyState==4)
			{
			if (requeteHttp.status==200)
				{
				var lesContenus = requeteHttp.responseText;
				document.getElementById('zoneContenu').innerHTML = lesContenus;
				}
			else
				alert("Erreur requete");
			}
		}
</SCRIPT>

<TABLE border='1'>
	<TR>
		<TD valign='top'>
			<?php
				echo $_SESSION['lesPaniers'];
			?>
		</TD>
		<TD>
			<DIV id='zoneContenu'></DIV>
		</TD>
	</TR>
</TABLE>
