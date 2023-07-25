<?php require_once'header.php';?>

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content">

            <?php
            $members = $data['members'];
            // $pending_members = $data['pending_members'];
            ?>

                <div class="mdk-drawer-layout js-mdk-drawer-layout"
                     data-push
                     data-responsive-width="992px">
                    <div class="mdk-drawer-layout__content page">

                        <div class="container-fluid page__heading-container">
                            <div class="page__heading d-flex align-items-end">
                                <div class="flex">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active"
                                                aria-current="page">Dashboard</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Dashboard</h1>
                                </div>
                                <div class="flatpickr-wrapper ml-3">
                                    <!-- <div id="recent_orders_date"
                                         data-toggle="flatpickr"
                                         data-flatpickr-wrap="true"
                                         data-flatpickr-mode="range"
                                         data-flatpickr-alt-format="d/m/Y"
                                         data-flatpickr-date-format="d/m/Y">
                                        <a href="javascript:void(0)"
                                           class="link-date"
                                           data-toggle>13/03/2018 to 20/03/2018</a>
                                        <input class="flatpickr-hidden-input"
                                               type="hidden"
                                               value="13/03/2018 to 20/03/2018"
                                               data-input>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid page__container">

                            <div class="row card-group-row">
                                <div class="col-lg-4 col-md-6 card-group-row__col">
                                    <div class="card card-group-row__card">
                                        <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                                            <div class="flex">
                                                <div class="card-header__title mb-2">Total Balance</div>
                                                <div class="text-amount">K82,99</div>
                                            </div>
                                            <!-- <div class="ml-3 d-flex flex-column align-items-end text-right">
                                                <a href=""
                                                   class="mb-2">View</a>
                                                <div class="text-stats text-success">2.6% <i class="material-icons">arrow_upward</i></div>
                                            </div> -->
                                        </div>
                                        <div class="card-body flex-0">
                                            <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                                <span class="flex text-body">Online Store</span>
                                                <span class="mx-3">&dollar;50.99</span>
                                                <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i> 3.2%</span>
                                            </small>
                                            <small class="d-flex align-items-center font-weight-bold text-muted">
                                                <span class="flex text-body">Facebook</span>
                                                <span class="mx-3">&dollar;32.00</span>
                                                <span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">arrow_downward</i> 7.0%</span>
                                            </small>
                                        </div>
                                        <div class="card-body text-muted flex d-flex align-items-center">
                                            <div class="chart w-100"
                                                 style="height: 200px;">
                                                <canvas id="totalSalesChart">
                                                    <span style="font-size: 1rem;"><strong>Total Revenue</strong> chart goes here.</span>
                                                </canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 card-group-row__col">
                                    <div class="card card-group-row__card">
                                        <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                                            <div class="flex">
                                                <div class="card-header__title mb-2">Receipts</div>
                                                <div class="text-amount"></div>
                                            </div>
                                            <div class="ml-3 d-flex flex-column align-items-end text-right">
                                                <a href="receipts"
                                                   class="mb-2">View</a>
                                                <!-- <div class="text-stats text-danger"><i class="material-icons">arrow_downward</i></div> -->
                                            </div>
                                        </div>
                                        <div class="card-body text-muted flex d-flex align-items-center">
                                            <div class="chart w-100"
                                                 style="height: 250px;">
                                                <canvas id="totalVisitorsChart">
                                                    <span style="font-size: 1rem;"><strong>Total Visitors</strong> chart goes here.</span>
                                                </canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 card-group-row__col">
                                    <div class="card card-group-row__card">
                                        <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                                        <div class="flex">
                                                <div class="card-header__title mb-2">Invoices</div>
                                                <div class="text-amount"></div>
                                            </div>
                                            <div class="ml-3 d-flex flex-column align-items-end text-right">
                                                <a href="invoices"
                                                   class="mb-2">View</a>
                                                <!-- <div class="text-stats text-danger"><i class="material-icons">arrow_downward</i></div> -->
                                            </div>
                                        </div>
                                        <div class="card-body text-muted flex d-flex align-items-center">
                                            <div class="chart w-100"
                                                 style="height: 250px;">
                                                <canvas id="repeatCustomerRateChart">
                                                    <span style="font-size: 1rem;"><strong>Repeat Customer Rate</strong> chart goes here.</span>
                                                </canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                  
                        </div>

                    </div>
                   
                    <?php require_once'sidebar.php';?>

            </div>
            <!-- // END header-layout__content -->

        </div>
        <!-- // END header-layout -->

        <!-- App Settings FAB -->
        <div id="app-settings">
            <app-settings layout-active="default"
                          :layout-location="{
      'default': 'index.html',
      'fixed': 'fixed-dashboard.html',
      'fluid': 'fluid-dashboard.html',
      'mini': 'mini-dashboard.html'
    }"></app-settings>
        </div>

        <!-- jQuery -->
        <script src="assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/vendor/popper.min.js"></script>
        <script src="assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="assets/vendor/material-design-kit.js"></script>

        <!-- App -->
        <script src="assets/js/toggle-check-all.js"></script>
        <script src="assets/js/check-selected-row.js"></script>
        <script src="assets/js/dropdown.js"></script>
        <script src="assets/js/sidebar-mini.js"></script>
        <script src="assets/js/app.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="assets/js/app-settings.js"></script>

        <!-- Flatpickr -->
        <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
        <script src="assets/js/flatpickr.js"></script>

        <!-- Global Settings -->
        <script src="assets/js/settings.js"></script>

        <!-- Moment.js -->
        <script src="assets/vendor/moment.min.js"></script>
        <script src="assets/vendor/moment-range.js"></script>

        <!-- Chart.js -->
        <script src="assets/vendor/Chart.min.js"></script>

        <!-- App Charts JS -->
        <script src="assets/js/charts.js"></script>
        <script src="assets/js/chartjs-rounded-bar.js"></script>

        <!-- Chart Samples -->
        <script src="assets/js/page.dashboard.js"></script>
        <script src="assets/js/progress-charts.js"></script>

        <!-- Vector Maps -->
        <script src="assets/vendor/jqvmap/jquery.vmap.min.js"></script>
        <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="assets/js/vector-maps.js"></script>

    </body>

</html>