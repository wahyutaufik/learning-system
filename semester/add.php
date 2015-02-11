<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=simpan" method="POST" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Semester </label>
				<div class="col-sm-10">
					<input type="hidden" name="module" value="<?php echo $modulecase ?>">
					<input type="text" name="semester" placeholder="Semester" class="col-xs-10 col-sm-5" required autocomplete="off">
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit" id="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Simpan
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>

					&nbsp; &nbsp; &nbsp;
					<a href="javascript:history.back()" class="btn btn-danger">
						<i class="ace-icon fa fa-backward bigger-110"></i>
						Kembali
					</a>
				</div>
			</div>
		</form>
	</div>
</div>