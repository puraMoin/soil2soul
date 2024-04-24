<?php  //dump($menuLinks);exit;?>
<?php 
foreach ($menuLinks as $key => $menuLink) { 
	$hasChildren = ($menuLink->children->isNotEmpty()) ? 'nav-item-has-children' : ''; 
	$routeKey = $menuLink->link;
	$url = ($routeKey != '#') ? route($routeKey) : '';
?>
<li class="nav-item <?php echo $hasChildren;?>">

<?php if(!empty($hasChildren)){ ?>

 <a href="{{ $url }}" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_<?php echo $menuLink->id;?>" aria-controls="ddmenu_<?php echo $menuLink->id;?>" aria-expanded="false" aria-label="Toggle navigation"><span class="text"><?php echo $menuLink->title;?></span></a>

<ul id="ddmenu_<?php echo $menuLink->id;?>" class="collapse dropdown-nav">
	<?php 
		foreach($menuLink->children as $childLink){ 
			$routeKey1 = $childLink->link;
			$url1 = ($routeKey1 != '#') ? route($routeKey1) : '';
	?>
		<li><a href="{{ $url1 }}"><?php echo $childLink->title;?></a></li>
	<?php } ?>
	
	</ul>
<?php }else{ ?>
<a href="{{ $url }}" aria-expanded="false" aria-label="Toggle navigation"><span class="text"><?php echo $menuLink->title;?></span></a>	
<?php } ?>	
</li>
<?php }  ?>
