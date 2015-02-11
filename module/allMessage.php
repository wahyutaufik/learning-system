<?php  
$getMails = mysql_query("SELECT * FROM pesan WHERE penerima LIKE '$_SESSION[email]'");
while ($findeEmails = mysql_fetch_assoc($getMails)) {
	$dataEmails[] = $findeEmails;
}
$counts = count($dataEmails);
?>
<div class="row">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12">
				<div class="tabbable">
					<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
						<li class="li-new-mail pull-right">
							<a href="index.php?p=writeEmail" class="btn-new-mail">
								<span class="btn btn-purple no-border">
									<i class="ace-icon fa fa-envelope bigger-130"></i>
									<span class="bigger-110">Write Message</span>
								</span>
							</a>
						</li>

						<li class="active">
							<a data-toggle="tab" href="#inbox" data-target="inbox">
								<i class="blue ace-icon fa fa-inbox bigger-130"></i>
								<span class="bigger-110">Inbox</span>
							</a>
						</li>

					</ul>

					<div class="tab-content no-border no-padding">
						<div id="inbox" class="tab-pane in active">
							<div class="message-container">
								<div id="id-message-list-navbar" class="message-navbar clearfix">
									<div class="message-bar">
										<div class="message-infobar" id="id-message-infobar">
											<span class="blue bigger-150">Inbox</span>
											<span class="grey bigger-110">(<?php echo $count ?> unread messages)</span>
										</div>
									</div>
								</div>

								<div class="message-list-container">
									<div class="message-list" id="message-list">
										<?php foreach ($dataEmails as $key => $emails): ?>
										<a href="index.php?p=viewMessage&id_message=<?php echo $emails['id'] ?>">
											<div class="message-item <?php if($emails['status'] == 0) echo "message-unread"; ?>">

												<span class="sender" style="width:250px" title="<?php echo $emails['pengirim'] ?>"><?php echo $emails['pengirim'] ?> </span>
												<span class="time" style="width:150px" title="<?php echo $emails['tanggal'] ?>"><?php echo $emails['tanggal'] ?></span>

												<span class="summary">
													<span class="text">
														<?php echo $emails['content'] ?>
													</span>
												</span>
											</div>
										</a>
										<?php endforeach ?>

									</div>
								</div>

								<div class="message-footer clearfix">
									<div class="pull-left"> <?php echo $counts ?> messages total </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>