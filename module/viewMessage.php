<?php  
$getMails = mysql_query("SELECT * FROM pesan WHERE id = $_GET[id_message]");
while ($findeEmails = mysql_fetch_assoc($getMails)) {
	$dataEmails[] = $findeEmails;
}
mysql_query("UPDATE pesan SET status = 1 WHERE id = $_GET[id_message]");
$counts = count($dataEmails);
?>
<a href="index.php?p=inbox" class="btn-new-mail">
	<span class="btn btn-purple no-border">
		<i class="ace-icon fa fa-envelope bigger-130"></i>
		<span class="bigger-110">Inbox</span>
	</span>
</a>
<?php foreach ($dataEmails as $key => $email): ?>
	<div class="message-content" id="id-message-content">
		<div class="message-header clearfix">
			<div class="pull-left">
				<span class="blue bigger-125"> <?php echo $email['subject'] ?> </span>
				<div class="space-4"></div>
				&nbsp;
				<img class="middle" alt="John's Avatar" src="dist/avatars/avatar.png" width="32" />
				&nbsp;
				<a href="#" class="sender"><?php echo $email['pengirim'] ?></a>

				&nbsp;
				<i class="ace-icon fa fa-clock-o bigger-110 orange middle"></i>
				<span class="time grey"><?php echo $email['tanggal'] ?></span>
			</div>

			<div class="pull-right action-buttons">
				<a href="index.php?p=writeEmail&rep=<?php echo $email['subject'] ?>&rec=<?php echo $email['pengirim'] ?>" class="btn-new-mail">
					<span class="btn btn-purple no-border">
						<i class="ace-icon fa fa-envelope bigger-130"></i>
						<span class="bigger-110">Reply Message</span>
					</span>
				</a>
			</div>
		</div>

		<div class="hr hr-double"></div>

		<div class="message-body">
			<p>
				<?php echo $email['content'] ?>
			</p>
		</div>

		<div class="hr hr-double"></div>

	</div>
<?php endforeach ?>