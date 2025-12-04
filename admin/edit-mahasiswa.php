<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h3 class="mb-0">Dashboard Admin</h3></div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard Admin</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-12">
                <!--begin::Card-->
                <div class="card mt-4">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <!--begin::Card Title-->
                    <h3 class="card-title">Edit Data Mahasiswa</h3>
                    <!--end::Card Title-->
                    <!--begin::Card Toolbar-->
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                      >
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                    <!--end::Card Toolbar-->
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  <div class="card-body">
                    <div class="col-lg-6">
                    <form method="post" action="#">
                    <?php
                    $idx=$_GET['id'];
                    require_once "../config.php";
                    
                    if(isset($_POST['simpanEdit'])) {
                        $nim=$_POST['nim'];
                        $nama=$_POST['nama'];
                        $jk=$_POST['jk'];
                        $prodi=$_POST['prodi'];
                        $alamat=$_POST['alamat'];
                        $sql="update mhs set nim='$nim',nama='$nama',alamat='$alamat',
                        prodi='$prodi',gender='$jk' where id='$idx'";
                        $hasil=$db->query($sql);
                        if($hasil){
                        echo"<script>
                        window.location.href='./?p=mahasiswa';
                        </script>";
                        }
                    }

                    $sql="select * from mhs where id='$idx'";
                    $dataku=$db->query($sql);
                    foreach($dataku as $d) {
                        switch ($d['prodi']) {
                        case '1': $prodi="Informatika"; $inf="selected"; break;
                        case '2': $prodi="Arsitektur"; $ars="selected"; break;
                        case '3': $prodi="Ilmu Lingkungan"; $ilk="selected"; break;
                        default:
                        $prodi ="Tidak dikenal";
                        break;
                        }

                        if($d['gender']=='L'){
                            $l="checked";
                            $p="";
                        }else{
                            $l="";
                            $p="checked";
                        }

                    echo"<table class='table table-striped table-hover'>
                        <tr><td>NIM </td><td><input type='number' name='nim' value='$d[nim]' class='form-control'></td></tr>
                        <tr><td>NAMA </td><td><input type='text' name='nama' value='$d[nama]' class='form-control'></td></tr>
                        <tr><td>Jenis Kelamin </td><td>
                        <input type='radio' name='jk' value='L' $l> Laki-Laki
                        <input type='radio' name='jk' value='P' $p> Perempuan</td></tr>
                        <tr><td>Prodi </td><td>
                        <select name='prodi' class='form-control'>
                        <option value=''></option>
                        <option value='1' $inf>Informatika</option>
                        <option value='2' $ars>Arsitektur</option>
                        <option value='3' $ilk>Ilmu Lingkungan</option>
                        </select>
                        </td></tr>
                        <tr><td>Alamat </td><td>
                        <textarea name='alamat' class='form-control'>$d[alamat]</textarea></td></tr>
                        <tr><td></td><td>
                        <input type='submit' value='Simpan Perubahan' name='simpanEdit'
                        class='btn btn-primary'>
                        </td></tr>
                        </table>";
                    }
                    ?>
                    <a href="./?p=mahasiswa" class="btn btn-secondary">Kembali</a>
                    </form>
                    </div>
                  </div>
                  <!--end::Card Body-->
                  <!--begin::Card Footer-->
                  <div class="card-footer">
                    
                  </div>
                  <!--end::Card Footer-->
                </div>
                <!--end::Card-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>