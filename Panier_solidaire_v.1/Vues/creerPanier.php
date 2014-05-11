<FORM action = 'index.php?vue=panier&action=enregistrer' method = 'post'>
	<TABLE>
		<TR>
			<TD align='right'>
				date
			</TD>
			<TD>
				<INPUT type = 'text' name = 'laDate' value='<?php echo $_SESSION['laDate'];?>'/>
			</TD>
		</TR>
		<?php
		if(isset($_SESSION['lesContenus']))
			{
			for($i=0;$i<count($_SESSION['lesContenus']);$i++)
				{
				$resSplit=explode("#",$_SESSION['lesContenus'][$i]);
				$qte=$resSplit[1];
		?>
			<TR>
				<TD>
					<?php
					echo $_SESSION['lesProduitsPre'][$i];
					?>
				</TD>
				<TD>
					Quantité : <INPUT type = 'text' name = 'qte' value='<?php echo $qte ?>'/>(grammes)
				</TD>
			</TR>
		<?php
				}
			}
		?>
		
		<TR>
			<TD>
				<?php
				echo $_SESSION['lesProduits'];
				?>
			</TD>
			<TD>
				Quantité : <INPUT type = 'text' name = 'qte'/>(grammes)
			</TD>
		</TR>
		
		<TR>
			<TD colspan = '2' align = 'right'>
				<INPUT type = 'submit' value = 'Annuler' name = 'annuler'/>
				
				<INPUT type = 'submit' value = 'Ajouter un Produit' name = 'ajout'/>
				
				<INPUT type = 'submit' value = 'Valider' name = 'valider'/>
			</TD>
		<TR>
	</TABLE>
</FORM>