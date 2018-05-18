<div id="page-wrapper">
    <div class ="container-fluid">
        <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header" >Form Pendaftaran Kursus</h1>
            </div>
            <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
            Silahkan mengisi formulir pendaftaran
            </div>
            <div class="panel-body">
            <?php echo form_open_multipart('user/welcome/daftar_peserta');?>
            <div class="form-group">
            <table class="table" border=1>
            <div class="table-responsive">
            	
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="info">
                            <th>NPM</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="npm" value=""></th>
                        </tr>
                        <tr class="info">
                            <th>Nama Peserta</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="nm_peserta" value=""></th>
                        </tr>
                        <tr>
                            <th>Nama Kursus</th>
                            <th>:</th>
                            <th><input type="text" name="nm_kursus" size=50 value="<?php echo $nm_kursus?>"></th>
                        </tr>
                        <tr class="info">
                            <th>Kelas</th>
                            <th>:</th>
                            <th><input type="text" size=50 name="kelas" value="" ></th>
                        </tr>
                        <tr class="info">
                            <th>Jurusan</th>
                            <th>:</th>
                            <th>
                            <select name="jurusan" value="<?php echo $pengguna->jurusan;?>">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                            </select>
                            </th>
                        </tr>;
                        <input type="hidden" name="kuota" value="1">
                        </thead>
                    </table>
                    
            </div><hr>
                     <input type="submit" class="btn btn-primary" value="Daftar" name="submit"/>
                    <?php echo form_close();?>
            </div>
            </div>
            </div>   
            </div>
            </div>
        </div>
        </div>
    </div>
</div>


    