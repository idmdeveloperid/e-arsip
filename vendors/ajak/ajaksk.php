<?php 
require '../../include/fungsi.php';

$search = $_GET["search"];
$suratk = query("SELECT * FROM surat_keluar WHERE perihal_surat LIKE '%$search%'
OR pengolah_surat LIKE '%$search%' OR nomor_surat LIKE '%$search%' ORDER BY id DESC ");

?>

        <table id="datatable-buttons" class="table table-hover table-bordered dt-responsive nowrap no-footer dtr-inline dataTable" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"     >
<thead>
    <tr role="row">
    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 232px;" aria-label="Data Surat: activate to sort column descending" aria-sort="ascending">
        Data Surat Keluar
    </th>
    </tr>
</thead>
<tbody>
<?php foreach($suratk as $a) : ?>
<tr role="row" class="odd">
    <td class="sorting_1" tabindex="0"><div class="text-wrap width-300">
            <div class="row">
                <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title"><input type="text" class="form-control col-md-1" value="<?= $a["nomor_urut"] ; ?>" disabled></h4>
                    <div class="template-demo">
                    Tanggal Surat : <h7><?= $a["tanggal_surat"] ?></h7>
                    <br>
                    Nomor Surat : <h7><?= $a["nomor_surat"] ?></h7>
                    <br>
                    Tujuan Surat : <h7><?= $a["tujuan_surat"] ?></h7>
                    <br>
                    Pengolah : <h7><?= $a["pengolah_surat"] ?></h7>
                    <br>
                    Perihal Surat : <h7><?= $a["perihal_surat"] ?></h7>
                    </div>
                    <div class="mt-2">
                    <a class="btn btn-secondary btn-sm me-1 ml-1" href="detail-suratk.php?id=<?=$a["id"]; ?>"><i class="fa fa-question-circle"></i> Detail</a>
                    <a class="btn btn-primary btn-sm me-1 ml-2" target="_blank" href="file/surat_keluar/<?= $a["file_surat"] ?>"><i class="fa fa-eye"></i> Lihat</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </td>
    </tr>
            </div>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
			</table>