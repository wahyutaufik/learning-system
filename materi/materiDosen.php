<?php  
$table  = 'materi';
$result = mysql_query("SELECT * FROM $table WHERE id_dosen = $_SESSION[id]");

if (!$result) {
    echo 'Tidak bisa menjalankan Query, ' . mysql_error().'. </br>';
}

if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        $contents[] = $row;
    }
}

$result = mysql_query("SHOW COLUMNS FROM $table");
if (!$result) {
    echo 'Tidak bisa menjalankan Query, ' . mysql_error().'. </br>';
}

if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        $field[] = $row['Field'];
    }
    unset($field[0]);
    $fields = implode(",", $field);
}

$url = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1); 
?>

<div>
	<a href="index.php?p=addMateriDosen" class="btn btn-primary <?php if ($_GET['p'] == listMahasiswa) echo "hide"; ?>">
		<i class="ace-icon fa fa-plus align-top bigger-125"></i>
		Tambah Materi
	</a>
    <div class="table-responsive">
    	<table id="sample-table-2" class="table table-responsive table-striped table-bordered table-hover">
    		<thead>
    			<tr>
    				<?php foreach ($field as $key => $th): ?>
                    <th><?php echo $th ?></th>
                    <?php endforeach ?>
                    <th>aksi</th>
    			</tr>
    		</thead>

    		<tbody>
            <?php foreach ($contents as $key => $content): ?>
                <tr>
                <?php  
                	if (isset($content['content'])) {
                		$content['content'] = '*detail';
                	}
                	
                    if (isset($content['password'])) {
                        $content['password'] = '*hidden';
                    }

                    if (isset($content['email'])) {
                        $content['email'] = '*detail';
                    }

                    if (isset($content['jenis_kelamin'])) {
                        if ($content['jenis_kelamin'] == 1) {
                            $content['jenis_kelamin'] = "Laki-Laki";
                        } else {
                            $content['jenis_kelamin'] = "Perempuan";
                        }
                    }

                    if (isset($content['status'])) {
                        if ($content['status'] == 1) {
                            $content['status'] = "Aktif";
                        } else {
                            $content['status'] = "Non-aktif";
                        }
                    }

                    if (isset($content['id_jurusan'])) {
                        $jurusan = mysql_query("SELECT * FROM jurusan WHERE id = $content[id_jurusan]");
                        while ($idJurusan = mysql_fetch_assoc($jurusan)) {
                            $content['id_jurusan'] = $idJurusan['nm_jurusan']; 
                        }
                    }

                    if (isset($content['id_semester'])) {
                        $semester = mysql_query("SELECT * FROM semester WHERE id = $content[id_semester]");
                        while ($idSemester = mysql_fetch_assoc($semester)) {
                            $content['id_semester'] = $idSemester['semester']; 
                        }
                    }

                    if (isset($content['id_kelas'])) {
                        $kelas = mysql_query("SELECT * FROM kelas WHERE id = $content[id_kelas]");
                        while ($idKelas = mysql_fetch_assoc($kelas)) {
                            $content['id_kelas'] = $idKelas['nama']; 
                        }
                    }

                    if (isset($content['id_matkul'])) {
                        $matakuliah = mysql_query("SELECT * FROM matakuliah WHERE id = $content[id_matkul]");
                        while ($idMatkul = mysql_fetch_assoc($matakuliah)) {
                            $content['id_matkul'] = $idMatkul['nm_matkul']; 
                        }
                    }

                    if (isset($content['id_bab'])) {
                        $bab = mysql_query("SELECT * FROM bab WHERE id = $content[id_bab]");
                        while ($idBAB = mysql_fetch_assoc($bab)) {
                            $content['id_bab'] = $idBAB['nama']; 
                        }
                    }

                    if (isset($content['image'])) {
                        $content['image'] = '*detail';
                    }

                    $id = $content['id'];
                    unset($content['id']);
                    $fill        = implode(",", $content);
                    $fillContent = explode(',', $fill);
                ?>
                <?php foreach ($fillContent as $key => $value): ?>
                    <?php  
                        $length = 5;
                        $fills = implode(' ', array_splice(explode(' ', $value),0, $length));
                    ?>
                    <td>
                        <a class="sorting" href="index.php?p=detailMateriDosen&id=<?php echo $id?>"><?php echo $fills ?></a>
                    </td>
                <?php endforeach ?>
                	<td>
    					<div class="hidden-sm hidden-xs action-buttons">
    						<a class="blue" href="index.php?p=detailMateriDosen&id=<?php echo $id ?>" title="Detail">
    							<i class="ace-icon fa fa-search-plus bigger-130"></i>
    						</a>

    						<a class="green" href="index.php?p=updateMateriDosen&id=<?php echo $id ?>" title="Edit">
    							<i class="ace-icon fa fa-edit bigger-130"></i>
    						</a>

    						<a class="red" href="index.php?p=deleteMateriDosen&id=<?php echo $id ?>" title="Hapus">
    							<i class="ace-icon fa fa-trash-o bigger-130"></i>
    						</a>
    					</div>
                        <div class="hidden-md hidden-lg">
                            <div class="inline position-relative">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="index.php?p=detailMateriDosen&id=<?php echo $id ?>" class="tooltip-info" data-rel="tooltip" title="Detail">
                                            <span class="blue">
                                                <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="index.php?p=updateMateriDosen&id=<?php echo $id ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                                            <span class="green">
                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="index.php?p=deleteMateriDosen&id=<?php echo $id ?>" class="tooltip-error" data-rel="tooltip" title="Hapus">
                                            <span class="red">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
    				</td>
                </tr>
            <?php endforeach ?>
            </tbody>
    	</table>
    </div>
</div>