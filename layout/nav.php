<div class="navbar">
 	<div class="navbar-inner">
 		<a class="brand" href="./">My Contacts</a>
		<ul class="nav">
			<?php foreach($pages as $file => $text): ?>
				<li><a href="./?p=<?php echo $file ?>"><?php echo $text ?></a></li>
			<?php endforeach ?>
		</ul>
		<form method="get" class="from-inline pull-right">
			<input type="hidden" name="p" value="list_contacts" />
			<div class="input-append">
	 			<input class="span2"type="text" name="q" />
	 			<button type="submit" class="add-on btn"><i class="icon-search"></i></button>
			</div>
		</form>
	</div>
</div>	
