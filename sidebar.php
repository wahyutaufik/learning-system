<?php  
if ($_SESSION['akses'] == 1) {
	$where = 'admin = 1';
} elseif ($_SESSION['akses'] == 2) {
	$where = 'dosen = 1';
} else {
	$where = 'mahasiswa = 1';
}
$sqlMenu = "SELECT * FROM menu WHERE $where";
$menus = mysql_query($sqlMenu);
while ($menu = mysql_fetch_assoc($menus)) {
	$listMenu[] = $menu;
}
?>

<div id="sidebar" class="sidebar responsive">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<ul class="nav nav-list">
		<?php foreach ($listMenu as $key => $lM): ?>
			<?php 
			if (!empty($lM['url'])) {
				$modul = explode('p=', $lM['url']);
			}
			?>
		<li class="">
			<a href="<?php 
					if(empty($lM['url'])) {
						echo "#";
					} else {
						echo $lM['url'];
					} 
				?>" <?php if(empty($lM['url'])) echo 'class="dropdown-toggle"'; ?>>
				<i class="menu-icon fa <?php echo $lM['icon'] ?>"></i>
				<span class="menu-text"> <?php echo $lM['menu'] ?> </span>
				
				<b class="arrow <?php if(empty($lM['url'])) echo 'fa fa-angle-down'; ?>"></b>
			</a>
			<b class="arrow"></b>

			<?php if (empty($lM['url'])): ?>
			<ul class="submenu">
				<?php  
				$querySub = "SELECT * FROM submenu WHERE id_menu = $lM[id] AND $where";
				$dataSub = mysql_query($querySub);
				while ($subs = mysql_fetch_assoc($dataSub)) {
				?>

				<li class="">
					<a href="<?php echo $subs['url'] ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						<?php echo $subs['submenu'] ?>
					</a>

					<b class="arrow"></b>
				</li>

				<?php 
				}
				?>
			</ul>
			<?php endif ?>
		</li>			
		<?php endforeach ?>
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>