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
                                                aria-current="page">Applicable Fees</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Applicable fees for <?php echo $data['class_name']; ?></h1>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="feesDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Add Fee
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="feesDropdown">
                                        <form>
                                            <?php
                                            $classId = $data['class_id'];
                                            $fees = $data['all_fees'];
                                            if (is_array($fees) && !empty($fees)) {
                                                foreach ($fees as $fee) {
                                                    echo '<div class="dropdown-item">';
                                                    echo '<input class="form-check-input" type="checkbox" id="fee_' . $fee->fee_id . '" value="' . $fee->fee_id . '">';
                                                    echo '<label class="form-check-label" for="fee_' . $fee->fee_id . '">' . $fee->fee_description . '</label>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo '<div class="dropdown-item">No fees available</div>';
                                            }
                                            ?>
                                            <div class="dropdown-divider"></div>
                                            <button type="button" class="btn btn-primary" id="addFeesButton">Add Selected Fees</button>
                                        </form>
                                    </div>
                                </div>

                                <script>
                                    // Handle click event on "Add Selected Fees" button
                                    var addFeesButton = document.getElementById('addFeesButton');
                                    addFeesButton.addEventListener('click', function (event) {
                                        event.preventDefault();
                                        var selectedFees = [];
                                        var checkboxes = document.querySelectorAll('.dropdown-item input[type="checkbox"]');
                                        checkboxes.forEach(function (checkbox) {
                                            if (checkbox.checked) {
                                                selectedFees.push(checkbox.value);
                                            }
                                        });
                                        // Redirect to the add_fees page with selected fee IDs and class ID
                                        var classId = <?php echo $classId; ?>;
                                        var fees = selectedFees.join(',');
                                        var url = 'http://localhost/membership/public/add_fees?class_id=' + classId + '&fees=' + fees;
                                        window.location.href = url;
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="container-fluid page__container">

                            <div class="card card-form">
                                    <div class="row no-gutters">
                                        
                                        <div class="col-lg-8 card-form__body">

                                            <div class="table-responsive border-bottom"
                                                data-toggle="lists"
                                                data-lists-values='["js-lists-values-employee-name"]'>

                                                <div class="search-form search-form--light m-3">
                                                    <input type="text"
                                                        class="form-control search"
                                                        placeholder="Search">
                                                    <button class="btn"
                                                            type="button"><i class="material-icons">search</i></button>
                                                </div>

                                                <table class="table mb-0 thead-border-top-0">
                                                    <thead>
                                                        <tr>

                                                            <th>Description</th>

                                                            
                                                            <th style="width: 257px;">Amount</th>
                                                            
                                                            <th style="width: 24px;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list"
                                                        id="staff02">
                                                        
                                                        <?php 
                                                        $fees = $data['fees'];
                                                        $classId = $data['class_id'];

                                                        if (is_array($fees) && !empty($fees)) {
                                                            foreach ($fees as $fee) :
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $fee->fee_description; ?></td>
                                                                    <td><?php echo "K".$fee->amount; ?></td>
                                                                    <td>
                                                                    <a href="http://localhost/membership/public/add_fees?class_id=<?php echo $classId; ?>&fee_id=<?php echo $fee->fee_id; ?>"
                                                                        class="btn btn-success ml-3">Remove</a>

                                                                    </td>
                                                                    <!-- Add more table cells here -->
                                                                </tr>
                                                                <?php
                                                            endforeach;
                                                        } else {
                                                            // Handle the case when there are no fees available or an error occurred
                                                            echo "<tr><td colspan='2'>No fees applicable.</td></tr>";
                                                        }
                                                        ?>



                                                    </tbody>
                                                </table>

                                                


                                                
                                            </div>

                                            


                                        </div>
                                    </div>
                                </div>
                                
                                





                                
                            </div>

                            
                        </div>

                    </div>
                    <!-- // END drawer-layout__content -->

                    <div class="mdk-drawer  js-mdk-drawer"
                         id="default-drawer"
                         data-align="start">
                        <div class="mdk-drawer__content">
                            <div class="sidebar sidebar-light sidebar-left sidebar-p-t"
                                 data-perfect-scrollbar>
                                <div class="sidebar-heading">Menu</div>
                                <ul class="sidebar-menu">
                                    <li class="sidebar-menu-item active open">
                                        <a class="sidebar-menu-button"
                                           data-toggle="collapse"
                                           href="#dashboards_menu">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                            <span class="sidebar-menu-text">Dashboards</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse show "
                                            id="dashboards_menu">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="home.php">
                                                    <span class="sidebar-menu-text">Default</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item active">
                                                <a class="sidebar-menu-button"
                                                   href="classes.php">
                                                    <span class="sidebar-menu-text">Classes</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="staff.html">
                                                    <span class="sidebar-menu-text">Staff</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="ecommerce.html">
                                                    <span class="sidebar-menu-text">E-commerce</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="dashboard-quick-access.html">
                                                    <span class="sidebar-menu-text">Quick Access</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           data-toggle="collapse"
                                           href="#apps_menu">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                            <span class="sidebar-menu-text">Apps</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse"
                                            id="apps_menu">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="app-activities.html">
                                                    <span class="sidebar-menu-text">Activities</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="app-trello.html">
                                                    <span class="sidebar-menu-text">Trello</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="app-projects.html">
                                                    <span class="sidebar-menu-text">Projects</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="app-fullcalendar.html">
                                                    <span class="sidebar-menu-text">Event Calendar</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="app-chat.html">
                                                    <span class="sidebar-menu-text">Chat</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="app-email.html">
                                                    <span class="sidebar-menu-text">Email</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item ">
                                                <a class="sidebar-menu-button"
                                                   data-toggle="collapse"
                                                   href="#course_menu">
                                                    <span class="sidebar-menu-text">Education</span>
                                                    <span class="ml-auto d-flex align-items-center">
                                                        <span class="badge badge-primary">NEW</span>
                                                        <span class="sidebar-menu-toggle-icon"></span>
                                                    </span>
                                                </a>
                                                <ul class="sidebar-submenu collapse "
                                                    id="course_menu">
                                                    <li class="sidebar-menu-item ">
                                                        <a class="sidebar-menu-button"
                                                           href="app-browse-courses.html">
                                                            <span class="sidebar-menu-text">Browse Courses</span>
                                                        </a>
                                                    </li>
                                                    <li class="sidebar-menu-item ">
                                                        <a class="sidebar-menu-button"
                                                           href="app-course.html">
                                                            <span class="sidebar-menu-text">Course</span>
                                                        </a>
                                                    </li>
                                                    <li class="sidebar-menu-item ">
                                                        <a class="sidebar-menu-button"
                                                           href="app-lesson.html">
                                                            <span class="sidebar-menu-text">Lesson</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           data-toggle="collapse"
                                           href="#pages_menu">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                                            <span class="sidebar-menu-text">Pages</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse"
                                            id="pages_menu">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="companies.html">
                                                    <span class="sidebar-menu-text">Companies</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="stories.html">
                                                    <span class="sidebar-menu-text">Stories</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="discussions.html">
                                                    <span class="sidebar-menu-text">Discussions</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="invoice.html">
                                                    <span class="sidebar-menu-text">Invoice</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="pricing.html">
                                                    <span class="sidebar-menu-text">Pricing</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="edit-account.html">
                                                    <span class="sidebar-menu-text">Edit Account</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="profile.html">
                                                    <span class="sidebar-menu-text">User Profile</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="payout.html">
                                                    <span class="sidebar-menu-text">Payout</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="digital-product.html">
                                                    <span class="sidebar-menu-text">Digital Product</span>
                                                    <span class="badge badge-primary ml-auto">NEW</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   data-toggle="collapse"
                                                   href="#login_menu">
                                                    <span class="sidebar-menu-text">Login</span>
                                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                                </a>
                                                <ul class="sidebar-submenu collapse"
                                                    id="login_menu">
                                                    <li class="sidebar-menu-item">
                                                        <a class="sidebar-menu-button"
                                                           href="login.html">
                                                            <span class="sidebar-menu-text">Login / Background Image</span>
                                                        </a>
                                                    </li>
                                                    <li class="sidebar-menu-item">
                                                        <a class="sidebar-menu-button"
                                                           href="login-centered-boxed.html">
                                                            <span class="sidebar-menu-text">Login / Centered Boxed</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   data-toggle="collapse"
                                                   href="#signup_menu">
                                                    <span class="sidebar-menu-text">Sign Up</span>
                                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                                </a>
                                                <ul class="sidebar-submenu collapse"
                                                    id="signup_menu">
                                                    <li class="sidebar-menu-item">
                                                        <a class="sidebar-menu-button"
                                                           href="signup.html">
                                                            <span class="sidebar-menu-text">Sign Up / Background Image</span>
                                                        </a>
                                                    </li>
                                                    <li class="sidebar-menu-item">
                                                        <a class="sidebar-menu-button"
                                                           href="signup-centered-boxed.html">
                                                            <span class="sidebar-menu-text">Sign Up / Centered Boxed</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="product-listing.html">
                                                    <span class="sidebar-menu-text">Product Listing</span>
                                                    <span class="badge badge-primary ml-auto">NEW</span>
                                                </a>
                                            </li>

                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="blank.html">
                                                    <span class="sidebar-menu-text">Blank Page</span>
                                                    <span class="badge badge-primary ml-auto">NEW</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           data-toggle="collapse"
                                           href="#layouts_menu">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">view_compact</i>
                                            <span class="sidebar-menu-text">Layouts</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse"
                                            id="layouts_menu">
                                            <li class="sidebar-menu-item active">
                                                <a class="sidebar-menu-button"
                                                   href="classes.php">
                                                    <span class="sidebar-menu-text">Default</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="fluid-classes.php">
                                                    <span class="sidebar-menu-text">Full Width Navs</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="fixed-classes.php">
                                                    <span class="sidebar-menu-text">Fixed Navs</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="mini-classes.php">
                                                    <span class="sidebar-menu-text">Mini Sidebar + Navs</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="sidebar-heading">Components</div>
                                <div class="sidebar-block p-0 mb-0">
                                    <ul class="sidebar-menu"
                                        id="components_menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-buttons.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">mouse</i>
                                                <span class="sidebar-menu-text">Buttons</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-alerts.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">notifications</i>
                                                <span class="sidebar-menu-text">Alerts</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-avatars.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person</i>
                                                <span class="sidebar-menu-text">Avatars</span>
                                                <span class="badge badge-primary ml-auto">NEW</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-modals.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">aspect_ratio</i>
                                                <span class="sidebar-menu-text">Modals</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-charts.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">pie_chart_outlined</i>
                                                <span class="sidebar-menu-text">Charts</span>
                                                <span class="badge badge-warning ml-auto">PRO</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-icons.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">brush</i>
                                                <span class="sidebar-menu-text">Icons</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-forms.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">text_format</i>
                                                <span class="sidebar-menu-text">Forms</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-range-sliders.html">
                                                <!-- tune or low_priority or linear_scale or space_bar or swap_calls -->
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">tune</i>
                                                <span class="sidebar-menu-text">Range Sliders</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-datetime.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">event_available</i>
                                                <span class="sidebar-menu-text">Time &amp; Date</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-tables.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dns</i>
                                                <span class="sidebar-menu-text">Tables</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-tabs.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">tab</i>
                                                <span class="sidebar-menu-text">Tabs</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-loaders.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">refresh</i>
                                                <span class="sidebar-menu-text">Loaders</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-drag.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">control_point</i>
                                                <span class="sidebar-menu-text">Drag &amp; Drop</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-pagination.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">last_page</i>
                                                <span class="sidebar-menu-text">Pagination</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button"
                                               href="ui-vector-maps.html">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">location_on</i>
                                                <span class="sidebar-menu-text">Vector Maps</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="sidebar-p-a sidebar-b-y">
                                        <div class="d-flex align-items-top mb-2">
                                            <div class="sidebar-heading m-0 p-0 flex text-body js-text-body">Progress</div>
                                            <div class="font-weight-bold text-success">60%</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success"
                                                 role="progressbar"
                                                 style="width: 60%"
                                                 aria-valuenow="60"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                                    <a href="profile.html"
                                       class="flex d-flex align-items-center text-underline-0 text-body">
                                        <span class="avatar avatar-sm mr-2">
                                            <img src="<?=ASSETS?>/images/avatar/demi.png"
                                                 alt="avatar"
                                                 class="avatar-img rounded-circle">
                                        </span>
                                        <span class="flex d-flex flex-column">
                                            <strong>Adrian Demian</strong>
                                            <small class="text-muted text-uppercase">Site Manager</small>
                                        </span>
                                    </a>
                                    <div class="dropdown ml-auto">
                                        <a href="#"
                                           data-toggle="dropdown"
                                           data-caret="false"
                                           class="text-muted"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-item-text dropdown-item-text--lh">
                                                <div><strong>Adrian Demian</strong></div>
                                                <div>@adriandemian</div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item"
                                               href="home.php">Dashboard</a>
                                            <a class="dropdown-item"
                                               href="profile.html">My profile</a>
                                            <a class="dropdown-item"
                                               href="edit-account.html">Edit account</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item"
                                               href="login.html">Logout</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-p-a">
                                    <a href="https://themeforest.net/item/stack-admin-bootstrap-4-dashboard-template/22959011"
                                       class="btn btn-primary btn-block">Purchase &dollar;35</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- // END drawer-layout -->

            </div>
            <!-- // END header-layout__content -->

        </div>
        <!-- // END header-layout -->

        <!-- App Settings FAB -->
        <div id="app-settings">
            <app-settings layout-active="default"
                          :layout-location="{
      'default': 'classes.php',
      'fixed': 'fixed-classes.php',
      'fluid': 'fluid-classes.php',
      'mini': 'mini-classes.php'
    }"></app-settings>
        </div>

        
        <div id="dialogContainer" class="dialog-container">
            <div id="dialogOverlay" class="dialog-overlay"></div>

            <div id="dialog" class="dialog">
            <h2 class="dialog-title">AlertDialog Title</h2>
            <form>
                <div class="text-field">
                <label for="field1">Field 1:</label>
                <input type="text" id="field1" name="field1">
                </div>
                <div class="text-field">
                <label for="field2">Field 2:</label>
                <input type="text" id="field2" name="field2">
                </div>
                <div class="text-field">
                <label for="field3">Field 3:</label>
                <input type="text" id="field3" name="field3">
                </div>
                <div class="dialog-buttons">
                <button type="submit">Submit</button>
                </div>
            </form>
            </div>
        </div>

        <script>
            // JavaScript code to show and hide the dialog
            document.addEventListener('DOMContentLoaded', function() {
            var dialogContainer = document.getElementById('dialogContainer');
            var showDialogButton = document.getElementById('showDialogButton');
            var dialogOverlay = document.getElementById('dialogOverlay');

            showDialogButton.addEventListener('click', function() {
                dialogContainer.style.display = 'block';
                dialogOverlay.style.display = 'block';
            });

            dialogOverlay.addEventListener('click', function() {
                dialogContainer.style.display = 'none';
                dialogOverlay.style.display = 'none';
                });
            });
        </script>

        <!-- jQuery -->
        <script src="<?=ASSETS?>/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="<?=ASSETS?>/vendor/popper.min.js"></script>
        <script src="<?=ASSETS?>/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="<?=ASSETS?>/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="<?=ASSETS?>/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="<?=ASSETS?>/vendor/material-design-kit.js"></script>

        <!-- App -->
        <script src="<?=ASSETS?>/js/toggle-check-all.js"></script>
        <script src="<?=ASSETS?>/js/check-selected-row.js"></script>
        <script src="<?=ASSETS?>/js/dropdown.js"></script>
        <script src="<?=ASSETS?>/js/sidebar-mini.js"></script>
        <script src="<?=ASSETS?>/js/app.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="<?=ASSETS?>/js/app-settings.js"></script>

        <!-- Flatpickr -->
        <script src="<?=ASSETS?>/vendor/flatpickr/flatpickr.min.js"></script>
        <script src="<?=ASSETS?>/js/flatpickr.js"></script>

        <!-- Global Settings -->
        <script src="<?=ASSETS?>/js/settings.js"></script>

        <!-- Chart.js -->
        <script src="<?=ASSETS?>/vendor/Chart.min.js"></script>

        <!-- App Charts JS -->
        <script src="<?=ASSETS?>/js/charts.js"></script>
        <script src="<?=ASSETS?>/js/progress-charts.js"></script>

        <!-- Chart Samples -->
        <script src="<?=ASSETS?>/js/page.analytics.js"></script>

        <!-- Vector Maps -->
        <script src="<?=ASSETS?>/vendor/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?=ASSETS?>/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="<?=ASSETS?>/js/vector-maps.js"></script>

    </body>

</html>