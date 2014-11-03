<?php require_once "config/course.php"; ?>
<div class="panel panel-default">
	<?php if ($_SESSION['role'] == 1): ?>
    <div class="panel-heading">
		<a href="index.php?module=addCourse" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Course</a>
    </div>
	<?php endif ?>
    <div class="panel-body">
	    <div class="table-responsive">
	        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	        	<thead>
            		<tr>
            		<th width="5%"><span class="fa fa-check-square-o"></span></th>
            		<th>Course</th>
            		</tr>
        		</thead>
        		<tbody>
					<?php foreach ($courses as $key => $course): ?>
        			<tr class="odd gradeX">
                		<td><a href="index.php?module=viewCourse&id=<?php echo $course['id'] ?>" class="sorting"><span class="fa fa-square-o"></span></a></td>
                		<td>
							<a href="index.php?module=viewCourse&id=<?php echo $course['id'] ?>" class="sorting"><?php echo $course['title'] ?></a>
                		</td>
            		</tr>
					<?php endforeach ?>
        		</tbody>
    		</table>
		</div>
	</div>
</div>
	<!-- <a href="index.php?module=addCourse" class="btn btn-outline btn-primary"><i class="fa fa-plus"></i> Tambah Materi</a> -->