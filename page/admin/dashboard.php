<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            News</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            include 'koneksi.php';

                            $data_barang = mysqli_query($koneksi2, "SELECT * FROM news");
                            $jumlah_barang = mysqli_num_rows($data_barang);

                            echo $jumlah_barang;

                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Testimonial</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            include 'koneksi.php';

                            $data_barang = mysqli_query($koneksi2, "SELECT * FROM testi");
                            $jumlah_barang = mysqli_num_rows($data_barang);

                            echo $jumlah_barang;

                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Patner</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            include 'koneksi.php';

                            $data_barang = mysqli_query($koneksi2, "SELECT * FROM partnerr");
                            $jumlah_barang = mysqli_num_rows($data_barang);

                            echo $jumlah_barang;

                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-handshake fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Latest Message
            </div>
            <div class="card-body overflow-auto" style="height: 250px; background-color: #051219;">
                <div class="alert-bal border-left-primary alert" role="alert">
                    <p>2022-12-06 15:33</p>
                    <p class="alert-heading">Kaspi - Mau Pesan</p>
                    <hr>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                </div>
                <div class="alert-bal border-left-primary alert" role="alert">
                    <p>2022-12-06 15:33</p>
                    <p class="alert-heading">Kaspi - Mau Pesan</p>
                    <hr>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                </div>
                <div class="alert-bal border-left-primary alert" role="alert">
                    <p>2022-12-06 15:33</p>
                    <p class="alert-heading">Kaspi - Mau Pesan</p>
                    <hr>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                </div>
                <div class="alert-bal border-left-primary alert" role="alert">
                    <p>2022-12-06 15:33</p>
                    <p class="alert-heading">Kaspi - Mau Pesan</p>
                    <hr>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                </div>
                

            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Bar Chart Example
            </div>
            <div class="card-body">
                <canvas id="myBarChart" width="100%" height="40"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data User
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="text-white">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Opsi</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh564</td>
                    <td>Tiger@gmail.com</td>
                    <th><a href="" class="btn btn-success">Edit</a> <a href="" class="btn btn-danger">Hapus</a></th>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <th><a href="" class="btn btn-success">Edit</a> <a href="" class="btn btn-danger">Hapus</a></th>

                </tr>
                <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <th><a href="" class="btn btn-success">Edit</a> <a href="" class="btn btn-danger">Hapus</a></th>
                </tr>
            </tbody>
        </table>
    </div>
</div>