<style>
    .m-header {
        background-color: #2AB89B !important; /* Use !important to ensure it overrides other styles */
        display: flex; /* Ensure the header can flex items */
        align-items: center; /* Center items vertically */
        padding: 10px; /* Optional padding for better appearance */
    }

    .m-header .logo {
        max-width: 200px; /* Adjust as needed */
        height: auto; /* Maintain aspect ratio */
        background-color: transparent; /* Ensure background color doesn't affect logo visibility */
    }
</style>

<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{url('home-leader')}}" class="b-brand">
                <!-- ========   change your logo here   ============ -->
                <img src="/assets/images/admanaa.png" alt="" class="logo logo-lg" />
                <img src="/assets/images/logo-admana.png" alt="" class="logo logo-sm" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{url('home-leader')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-home"></i></span>
                        <span class="nxl-mtext">Home</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{url('datasatpam')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-user"></i></span>
                        <span class="nxl-mtext">Data Satpam</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{url('datapenilaian')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-layout"></i></span>
                        <span class="nxl-mtext">Penilaian</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{url('dataperingkat')}}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-bar-chart"></i></span>
                        <span class="nxl-mtext">Peringkat</span><span class="nxl-arrow"></span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ url('logout') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-power"></i></span>
                        <span class="nxl-mtext">Log Out</span><span class="nxl-arrow"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
