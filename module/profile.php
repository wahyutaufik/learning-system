<?php 
if ($_SESSION['akses']==1) {
	$table = 'admin';
} elseif ($_SESSION['akses']==2) {
	$table = 'dosen';
} else {
	$table = 'mahasiswa';
}

$sqlProfile = "SELECT * FROM $table WHERE id = $_SESSION[id]";
$dataProfile = mysql_query($sqlProfile);
while ($profiles = mysql_fetch_assoc($dataProfile)) {
	$profile[] = $profiles;
}
?>
<?php foreach ($profile as $key => $pr): ?>
	
<div class="row">
	<div class="col-xs-12">
		<div>
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-3 center">
					<div>
						<span class="profile-picture">
							<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="dist/avatars/profile-pic.jpg" />
						</span>

						<div class="space-4"></div>

						<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
							<div class="inline position-relative">
								<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
									<span class="white"><?php echo $pr['nama'] ?></span>
								</a>
							</div>
						</div>
					</div>
					<div class="hr hr12 dotted"></div>
				</div>

				<div class="col-xs-12 col-sm-9">

					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name"> Username </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $pr['username'] ?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Joined </div>

							<div class="profile-info-value">
								<span class="editable" id="signup"><?php echo $pr['register'] ?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Email </div>

							<div class="profile-info-value">
								<span class="editable" id="about"><?php echo $pr['email'] ?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Phone </div>

							<div class="profile-info-value">
								<span class="editable" id="about"><?php echo $pr['telpon'] ?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Kelamin </div>

							<div class="profile-info-value">
								<span class="editable" id="about"><?php echo $pr['kelamin'] ?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Kelas </div>

							<div class="profile-info-value">
								<span class="editable" id="about"><?php echo $pr['id_kelas'] ?></span>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach ?>