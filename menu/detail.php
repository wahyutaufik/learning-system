<?php  
require_once "config/get_data.php";
?>


<div class="row">
	<div class="col-xs-12">
		<form action="index.php?p=simpan" method="POST" class="form-horizontal">
			<?php foreach ($datas as $key => $menu): ?>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right"> Menu </label>
					<div class="col-sm-10">
						<input type="text" value="<?php echo $menu['menu'] ?>" name="menu" placeholder="Username" class="col-xs-10 col-sm-5" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right"> URL</label>
					<div class="radio">
						<label>
							<input name="by_url" type="radio" class="ace radio-url" value="1" <?php if($menu['by_url'] == 1)echo "checked"; ?> readonly>
							<span class="lbl"> Yes</span>
						</label>
						<label>
							<input name="by_url" type="radio" class="ace radio-url" value="2" <?php if($menu['by_url'] == 2)echo "checked"; ?> readonly>
							<span class="lbl"> No</span>
						</label>
					</div>
				</div>
				<div class="form-group" id="address">
					<label class="col-sm-2 control-label no-padding-right"> URL Address </label>
					<div class="col-sm-10">
						<input type="text" value="<?php echo $menu['url'] ?>" name="url" placeholder="URL Address" class="col-xs-10 col-sm-5" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right"> Icon </label>
					<div class="col-sm-10">
						<input type="text" value="<?php echo $menu['icon'] ?>" name="icon" placeholder="Icon" class="col-xs-10 col-sm-5" readonly>
						<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank"><span class="help-button" style="cursor: pointer;">?</span></a>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> Akses </label>
				<div class="col-sm-10">
					<div class="checkbox">
						<label>
							<input type="hidden" name="admin" value="0">
							<input name="admin" class="ace ace-checkbox-2" type="checkbox" value="1" <?php if($menu['admin'] == 1)echo "checked"; ?> readonly>
							<span class="lbl"> Admin</span>
						</label>
						<label>
							<input type="hidden" name="dosen" value="0">
							<input name="dosen" class="ace ace-checkbox-2" type="checkbox" value="1" <?php if($menu['dosen'] == 1)echo "checked"; ?> readonly>
							<span class="lbl"> Dosen</span>
						</label>
						<label>
							<input type="hidden" name="mahasiswa" value="0">
							<input name="mahasiswa" class="ace ace-checkbox-2" type="checkbox" value="1" <?php if($menu['mahasiswa'] == 1)echo "checked"; ?> readonly>
							<span class="lbl"> Mahasiswa</span>
						</label>
					</div>
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<a href="index.php?p=update<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-info" type="submit" id="submit">
						<i class="ace-icon fa fa-edit bigger-110"></i>
						Edit
					</a>

					&nbsp; &nbsp; &nbsp;
					<a href="index.php?p=delete<?php echo ucfirst($modulecase); ?>&id=<?php echo $id ?>" class="btn btn-danger" type="reset">
						<i class="ace-icon fa fa-trash bigger-110"></i>
						Hapus
					</a>

					&nbsp; &nbsp; &nbsp;
					<a href="index.php?p=list<?php echo ucfirst($modulecase); ?>" class="btn btn-success">
						<i class="ace-icon fa fa-backward bigger-110"></i>
						Kembali
					</a>
				</div>
			</div>
			<?php endforeach ?>
		</form>
	</div>
</div>
<script src="dist/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#address").hide();	
		$("input[type=radio]").each(function(){
	        if ($(this).is(':checked') && $(this).val() === '1') {
	            $('#address').show();
	        } else if ($(this).is(':checked') && $(this).val() === '2') {
	            $('#address').hide();
	            $('input:text[name=url]').val('')
	        }
	    });
	    $(".radio-url").click(function(){
	        if ($(this).val() === '1') {
	            $('#address').show();
	        } else {
	            $('#address').hide();
	            $('input:text[name=url]').val('')
	        }
	    });
	})
</script>