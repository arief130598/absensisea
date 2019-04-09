<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tinjau Absen - Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar-main.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar-themes.css')?>">
    <link rel="shortcut icon" type="img/png" href="<?php echo base_url('assets/images/sea.png')?>" />
</head>

<body>
    <div class="page-wrapper ice-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">Magang SEA</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img style="height: 60px; width: 60px;" class="img-responsive img-rounded" src="<?php echo base_url('assets/images/sea.png')?>" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            Admin
                        </span>
                        <span class="user-id">
                            Ya Admin
                        </span>
                        <span class="user-role">
                            Dibilang Admin
                        </span>
                    </div>
                </div>
               <!-- sidebar-header  -->
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="dataabsen">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Absen Individu</span>
                            </a>
                        </li>
                        <li>
                            <a href="dataabsenkelompok">
                                <i class="fa fa-chart-line" aria-hidden="true"></i>
                                <span>Absen Kelompok</span>
                            </a>
                        </li>
                        <li>
                            <a href="tinjauabsen">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <span>Tinjau Absen Individu</span>
                            </a>
                        </li>
                        <li>
                            <a href="tinjauabsenkelompok">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <span>Tinjau Absen Kelompok</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <div>
                    <a href="<?php echo base_url(). 'tinjauabsenkelompok/logout'; ?>">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group col-md-12">
                       <table class="table table-striped" style="margin-top: 15px">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Ketua</th>
                              <th scope="col">Anggota 1</th>
                              <th scope="col">Anggota 2</th>
                              <th scope="col">Jam Masuk</th>
                              <th scope="col">Jam Keluar</th>
                              <th scope="col">Tanggal</th>
                              <th scope="col">Keterangan</th>
                              <th scope="col">Terima / Tolak</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $n=0; foreach($data as $datas)
                            {  
                                $ketua = $datas->ketua;
                                $anggota1 = $datas->anggota1;
                                $anggota2 = $datas->anggota2;
                                $jammasuk = $datas->jammasuk;
                                $jamkeluar = $datas->jamkeluar;
                                $tanggal = $datas->tanggal;
                                $keterangan = $datas->keterangan;

                                if($datas->status=='0')
                                {
                            ?>
                                <tr>
                                  <td scope="row"><?php echo ($n+1)?></td>
                                  <td scope="row"><?php echo $ketua?></td>
                                  <td scope="row"><?php echo $anggota1?></td>
                                  <td scope="row"><?php echo $anggota2?></td>
                                  <td scope="row"><?php echo $jammasuk?></td>
                                  <td scope="row"><?php echo $jamkeluar?></td>
                                  <td scope="row"><?php echo $tanggal?></td>
                                  <td scope="row"><?php echo $keterangan?></td>
                                  <td>
                                    <span><a href="<?php echo base_url(). 'tinjauabsenkelompok/terima/'.$ketua."/".$anggota1."/".$anggota2."/".$jammasuk."/".$jamkeluar."/".$tanggal; ?>">Terima</a> / <a href="<?php echo base_url(). 'tinjauabsenkelompok/tolak/'.$ketua."/".$anggota1."/".$anggota2."/".$jammasuk."/".$jamkeluar."/".$tanggal; ?>">Tolak</a></span>
                                  </td>
                                </tr>
                            <?php $n++;
                                }
                            }?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url('assets/js/sidebar-main.js')?>"></script>
    <script src="<?php echo base_url('assets/js/main.js')?>"></script>
    <script src="<?php echo base_url('assets/carousel.js')?>"></script>

</body>

</html>