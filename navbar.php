<?php  
$dataEmail = array();
$getMail = mysql_query("SELECT * FROM pesan WHERE penerima LIKE '$_SESSION[email]' AND status = 0");
while ($findeEmail = mysql_fetch_assoc($getMail)) {
	$dataEmail[] = $findeEmail;
}
$count = count($dataEmail);
?>
<div class="navbar-buttons navbar-header pull-right" role="navigation">
	<ul class="nav ace-nav">
		<li class="purple">
			<a data-toggle="dropdown" class="dropdown-toggle" href="#">
				<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
				<span class="badge badge-important"><?php echo $count ?></span>
			</a>

			<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
				<li class="dropdown-header">
					<i class="ace-icon fa fa-envelope-o"></i>
					<?php echo $count ?> New Messages
				</li>

				<li class="dropdown-content">
					<ul class="dropdown-menu dropdown-navbar">
						<?php foreach ($dataEmail as $key => $email): ?>
						<?php  
						$length = 3;
						$fills  = implode(' ', array_splice(explode(' ', $email['content']),0, $length));
	                    ?>
						<li>
							<a href="index.php?p=viewMessage&id_message=<?php echo $email['id'] ?>" class="clearfix">
								<img src="dist/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
								<!-- <i class="ace-icon fa fa-envelope bigger-130"></i> -->
								<span class="msg-body">
									<span class="msg-title">
										<span class="blue"><?php echo $email['pengirim'] ?>:</span>
										<?php echo $fills ?> ...
									</span>

									<span class="msg-time">
										<i class="ace-icon fa fa-clock-o"></i>
										<span><?php echo $email['tanggal'] ?></span>
									</span>
								</span>
							</a>
						</li>
						<?php endforeach ?>
					</ul>
				</li>

				<li class="dropdown-footer">
					<a href="index.php?p=inbox">
						See all messages
						<i class="ace-icon fa fa-arrow-right"></i>
					</a>
				</li>
			</ul>
		</li>

		<li class="light-blue">
			<a data-toggle="dropdown" href="#" class="dropdown-toggle">
				<img class="nav-user-photo" src="dist/avatars/user.jpg" alt="Jason's Photo" />
				<span class="user-info">
					<small>Welcome,</small>
					<?php echo $_SESSION['username'] ?>
				</span>

				<i class="ace-icon fa fa-caret-down"></i>
			</a>

			<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
				<li>
					<a href="index.php?p=userProfile&id=<?php echo $_SESSION['id'] ?>">
						<i class="ace-icon fa fa-user"></i>
						Profile
					</a>
				</li>

				<li class="divider"></li>

				<li>
					<a href="index.php?p=logout">
						<i class="ace-icon fa fa-power-off"></i>
						Logout
					</a>
				</li>
			</ul>
		</li>
	</ul>
</div>