<?php require_once'header.php';?>

            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content">

                <div class="mdk-drawer-layout js-mdk-drawer-layout"
                     data-push
                     data-responsive-width="992px">
                    <div class="mdk-drawer-layout__content page">

                        

                        <div class="container-fluid page__heading-container">
                            <div class="page__heading d-flex align-items-center">
                                <div class="flex">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active"
                                                aria-current="page">Members</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Membership Requests</h1>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid page__container">
                            
                            <div class="card">
                                <div class="card-header">
                                    <form class="form-inline">
                                        <label class="mr-sm-2"
                                               for="inlineFormFilterBy">Filter by:</label>
                                        <input type="text"
                                               class="form-control mb-2 mr-sm-2 mb-sm-0"
                                               id="inlineFormFilterBy"
                                               placeholder="Type a name">

                                        <label class="sr-only"
                                               for="inlineFormRole">Role</label>
                                        

                                        
                                    </form>
                                </div>

                                <div class="table-responsive border-bottom"
                                     data-toggle="lists"
                                     data-lists-values='["js-lists-values-employee-name"]'>

                                     <?php
                                        $members = $data['pending_members'];

                                        ?>

                                        <table class="table mb-0 thead-border-top-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 18px;">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#staff" id="customCheckAll">
                                                            <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                                        </div>
                                                    </th>
                                                    <th>Member</th>
                                                    <th style="width: 150px;">Contact No.</th>
                                                    <th style="width: 85px;">Email</th>
                                                    <th style="width: 24px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="staff">
                                                <?php foreach ($members as $member) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_<?php echo $member->fname . " " . $member->lname; ?>">
                                                                <label class="custom-control-label" for="customCheck1_<?php echo $member->fname . " " . $member->lname; ?>"><span class="text-hide">Check</span></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media align-items-center">
                                                                <div class="media-body">
                                                                    <span class="js-lists-values-employee-name"><?php echo $member->fname . " " . $member->lname; ?></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media align-items-center">
                                                                <a href=""><?php echo $member->contact1; ?></a>
                                                                <a href="#" class="rating-link"><i class="material-icons ml-2">star</i></a>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $member->email; ?></td>
                                                        <td><a href="view_cv?cv_file=<?php echo urlencode($member->cv_file); ?>" target="_blank" class="btn btn-success ml-3">View CV</a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                </div>

                                <div class="card-body text-right">
                                    15 <span class="text-muted">of 1,430</span> <a href="#"
                                       class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- // END drawer-layout__content -->

                    <?php require_once'sidebar.php';?>
                <!-- // END drawer-layout -->

            </div>
            <!-- // END header-layout__content -->

        </div>
        <!-- // END header-layout -->

        <!-- App Settings FAB -->
        <div id="app-settings">
            <app-settings layout-active="default"
                          :layout-location="{
      'default': 'staff.html',
      'fixed': 'fixed-staff.html',
      'fluid': 'fluid-staff.html',
      'mini': 'mini-staff.html'
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

        <!-- Chart.js -->
        <script src="assets/vendor/Chart.min.js"></script>

        <!-- UI Charts Page JS -->
        <script src="assets/js/chartjs-rounded-bar.js"></script>
        <script src="assets/js/charts.js"></script>

        <!-- Chart.js Samples -->
        <script src="assets/js/page.staff.js"></script>

    </body>

</html>