<?php  
$recipient = '';
$subject = '';

if (isset($_GET['rep']) && isset($_GET['rec'])) {
	$recipient = "value="."'$_GET[rec]'";
	$subject   = "value='Re:".$_GET[rep]."'";
}
?>
<a href="index.php?p=inbox" class="btn-new-mail">
	<span class="btn btn-purple no-border">
		<i class="ace-icon fa fa-envelope bigger-130"></i>
		<span class="bigger-110">Inbox</span>
	</span>
</a>
<form id="id-message-form" class="form-horizontal message-form col-xs-12" action="index.php?p=sendMail" method="POST">
	<div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Recipient:</label>

			<div class="col-sm-9">
				<span class="input-icon">
					<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d h:i:s') ?>">
					<input type="hidden" name="pengirim" value="<?php echo $_SESSION['email'] ?>">
					<input type="email" name="penerima" <?php echo $recipient ?> id="form-field-recipient" placeholder="Recipient" />
					<i class="ace-icon fa fa-user"></i>
				</span>
			</div>
		</div>

		<div class="hr hr-18 dotted"></div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-subject">Subject:</label>

			<div class="col-sm-6 col-xs-12">
				<div class="input-icon block col-xs-12 no-padding">
					<input maxlength="100" type="text" <?php echo $subject ?> class="col-xs-12" name="subject" id="form-field-subject" placeholder="Subject" />
					<i class="ace-icon fa fa-comment-o"></i>
				</div>
			</div>
		</div>

		<div class="hr hr-18 dotted"></div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right">
				<span class="inline space-24 hidden-480"></span>
				Message:
			</label>

			<div class="col-sm-9">
				<textarea class="col-xs-12" rows="10" name="content"></textarea>
					<input class="btn btn-purple no-border" style="margin-top:20px" type="submit" value="Kirim">
				<div class="space"></div>
			</div>
		</div>

		<div class="space"></div>
	</div>
</form>