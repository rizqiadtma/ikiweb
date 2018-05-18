<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Edit Data Peserta Kursus</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi kembali formulir pendaftaran
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url()?>user/welcome/ubah/<?php  echo $dt_peserta->id?>" method="post">
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>NPM</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="npm" value="<?php echo $dt_peserta->npm?>"></th>
                        </tr>
                        <tr class="info">
                            <th>Nama Peserta</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="nm_peserta" value="<?php echo $dt_peserta->nama?>"></th>
                        </tr>
                        <tr>
                            <th>Nama Kursus</th>
                            <th>:</th>
                            <th><input type="text" name="nm_kursus" size=50 value="<?php echo $dt_peserta->nm_kursus?>"></th>
                        </tr>
                        <tr class="info">
                            <th>Kelas</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="kelas" value="<?php echo $dt_peserta->kelas?>"></th>
                        </tr>
                        <tr class="info">
                            <th>Jurusan</th>
                            <th>:</th>
                            <th>
                            <select name="jurusan" value="<?php echo $dt_peserta->jurusan?>">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="sistem Informasi">Sistem Informasi</option>
                                <option value="Manjemen Informatika">Manajemen Informatika</option>
                            </select>
                            </th>
                        </tr>
                        </thead>
                    </table>
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Ubah" name="submit"/>
            </div>
            </div>
            </div>   
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
    