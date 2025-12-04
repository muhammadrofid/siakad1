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
                  <li class="breadcrumb-item active" aria-current="page">Dashboard admin</li>
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
                <div class="card">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <!--begin::Card Title-->
                    <h3 class="card-title">Dashboard Admin</h3>
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
                    <!--begin::Row-->
                    <div class="row">
                      <!--begin::Col-->
                      <div class="col-md-3">
                       
                        <form method="post" action="#">
                            <table>
                            <tr><td>Password Lama</td>
                            <td><input type="password" name="pwdLama" require class="form-control"></td></tr>
                            <tr><td>Password Baru</td>
                            <td><input type="password" name="pwdBaru1" require class="form-control"></td></tr>
                            <tr><td>Ulangi Password Baru</td>
                            <td><input type="password" name="pwdBaru2" require class="form-control"></td></tr>
                            <tr><td></td><td><input type="submit" name="btnsimpan" class="btn btn-sucsess"></td></tr>
                            </table>
                        </form>
                      </div>

                      if($_POST('btnsimpan')){

                        $pwdbaru1=$_POST[pwdBaru1];
                        $pwdbaru2=$_POST[pwdBaru2];

                        if($pwdbaru1!=pwdBaru2){
                            echo"<script>alert('Password Tidak Sesuai');</script>";
                        }else{
                            echo"<script>alert('Password Sudah Sesuai');</script>";
                        }
                      }

                        ?>
                      <!--end::Col-->
                      <!--begin::Col-->
                    
        <!--end::App Content-->
      </main>