<!DOCTYPE html>
<html lang="zxx">

@include('tools-leader.head')

<body>
@include('tools-leader.navbar')    

@include('tools-leader.upbar')  
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- Logo Selamat Datang -->
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-12 grid-margin">
                        <div class="card">
                            <!-- Background Images -->
                            <div class="background" style="background-image: url('/assets/images/pam.jpeg');" id="bg1"></div>
                            <div class="background" style="background-image: url('/assets/images/pam1.jpeg');" id="bg2"></div>
                            <div class="background" style="background-image: url('/assets/images/pam2.jpeg');" id="bg1"></div>
                            <div class="background" style="background-image: url('/assets/images/pam3.jpeg');" id="bg2"></div>
                            <div class="background" style="background-image: url('/assets/images/pam4.jpeg');" id="bg1"></div>
                            <div class="background" style="background-image: url('/assets/images/pam5.jpeg');" id="bg2"></div>
                            <!-- Overlay -->
                            <div class="overlay"></div>
                            <div class="card-body">
                                <h2>SELAMAT DATANG</h2>
                                <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                                    <img src="/assets/images/logo-admana.png" alt="Logo Admana" style="width: 250px; height: auto;" />
                                </div>
                                <h2>PT. ADMANA</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5>SATPAM</h5>
                                <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <<h2 class="mb-0">👮‍♂️ {{ $jumlahSatpam }} </h2>
                                    </div>
                                </div>
                                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                        <i class="icon-lg mdi mdi-account-group text-primary ml-auto"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] start -->
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
        </footer>
        <!-- [ Footer ] end -->
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    @include('tools-leader.sidebar')
    <!--! ================================================================ !-->
    @include('tools-leader.script')
</body>

</html>