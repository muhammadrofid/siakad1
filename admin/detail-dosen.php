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
                    <h3 class="card-title">Detail Dosen</h3>
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
                    <?php
                    $idx=$_GET['id'];
                    require_once "../config.php";
                    $sql="select * from dosen where id='$idx'";
                    $dataku=$db->query($sql);
                    foreach($dataku as $d){
                        switch ($d['matkul']) {
                        case '1': $matkul="Pemrograman Web"; break;
                        case '2': $matkul="PBO"; break;
                        case '3': $matkul="PBP"; break;
                        default:
                        $matkul ="Tidak dikenal";
                        break;
                    }
                    echo "<table class='table table-striped table-hover'>
                        <tr><td>NIDN </td><td>$d[nidn]</td></tr>
                        <tr><td>NAMA </td><td>$d[nama]</td></tr>
                        <tr><td>Jenis Kelamin </td><td>$d[gender]</td></tr>
                        <tr><td>Mata Kuliah </td><td>$matkul</td></tr>
                        <tr><td>Alamat </td><td>$d[alamat]</td></tr>
                    </table>";
                    }
                    ?>
                    <a href="./?p=dosen" class="btn btn-primary">Kembali</a>
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