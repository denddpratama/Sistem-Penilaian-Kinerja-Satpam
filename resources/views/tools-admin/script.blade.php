<!--! Footer Script !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Vendors JS !-->
    <script src="assets/vendors/js/vendors.min.js"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="assets/vendors/js/daterangepicker.min.js"></script>
    <script src="assets/vendors/js/apexcharts.min.js"></script>
    <script src="assets/vendors/js/circle-progress.min.js"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="assets/js/common-init.min.js"></script>
    <script src="assets/js/dashboard-init.min.js"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="assets/js/theme-customizer-init.min.js"></script>
    <!--! END: Theme Customizer !-->
    <script>
        let currentIndex = 0;
        const backgrounds = document.querySelectorAll('.background');
        const totalBackgrounds = backgrounds.length;

        function showNextBackground() {
            backgrounds[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % totalBackgrounds;
            backgrounds[currentIndex].classList.add('active');
        }

        setInterval(showNextBackground, 5000); // Change every 5 seconds

        // Initialize the first background as active
        backgrounds[currentIndex].classList.add('active');
    </script>

