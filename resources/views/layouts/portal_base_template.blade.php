<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta content="" name="author" />
		<title>LRC Ghana</title>

	    
	    <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/omanye_logo2.png') }}">

	    <!-- jquery.vectormap css -->
	    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

	    <!-- DataTables -->
	    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

	    <!-- Responsive datatable examples -->
	    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  

        <!-- twitter-bootstrap-wizard css -->
        <link rel="stylesheet" href="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.css') }}">

        <!-- select2 css -->
        <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- dropzone css -->
        <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />


	    <!-- Bootstrap Css -->
	    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
	    <!-- Icons Css -->
	    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

	    <!-- App Css-->
	    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Custom Css-->
        <link href="{{ asset('assets/css/customize.css') }}" rel="stylesheet" type="text/css" />

	</head>

<!-- <body data-sidebar="dark"> -->
	<body>

		<!-- Begin page -->
        <div id="layout-wrapper">

            <!-- ========== Top Navbar ========== -->
        	<header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <!-- <img src="{{ asset('assets/images/logo/omanye_logo2.png') }}" alt="Omanye Logo" height="22"> -->
                                </span>
                                <span class="logo-lg">
                                    <!-- <img src="{{ asset('assets/images/logo/omanye_logo1.png') }}" alt="Omanye Logo" height="20"> -->
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>
                    </div>
                    @php
                        $user_session_details = Session::get('user_session');
                    @endphp

                    <div class="d-flex">
                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/dummy_pic.png') }}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{ $user_session_details[0]->first_name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <!-- =========== Drop down under name ============== -->
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <!-- <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="/logout"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <!-- <li class="menu-title font-size-15">Menu</li> -->
                        @php
                          if ($user_session_details[0]->user_group != NULL || $user_session_details[0]->user_group != '')
                        {
                        @endphp
                            <li>
                                <a href="#" class="waves-effect font-size-15">
                                    <i class="ri-stack-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect font-size-15">
                                    <i class="mdi mdi-arrow-expand-all"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span>Setup</span>
                                </a> 
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ url('pages.payable_setup') }}"><i class="ri-clockwise-2-line"></i>Payable</a></li>
                                    <li><a href="{{ url('pages.receivable_setup') }}"><i class="ri-anticlockwise-line"></i>Receivable</a></li>
                                    <li><a href="{{ url('pages.project_setup') }}"><i class="ri-todo-line"></i>Project</a></li>
                                    <li><a href="{{ url('pages.bank_setup') }}"><i class="ri-honour-line"></i>Bank Account</a></li>
                                </ul>
                            </li>

                              <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect font-size-15">
                                    <i class="ri-currency-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span>Transactions</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ url('pages.cheque_disbursement') }}"><i class="ri-file-paper-2-line"></i>Cheque Disbursement</a></li>
                                    <li><a href="{{ url('pages.prepayment') }}"><i class="ri-honour-line"></i>Prepayment</a></li>
                                    <li><a href="{{ url('pages.payable') }}"><i class="ri-clockwise-2-line"></i>Other Payables</a></li>
                                    <li><a href="{{ url('pages.receivable') }}"><i class="ri-anticlockwise-line"></i>Receivables</a></li>
                                </ul>
                            </li>
                            @php
                                if ($user_session_details[0]->user_group == 'Reviewer' || $user_session_details[0]->user_group == 'Approver'){
                                 @endphp   
                                        <li>
                                            <a href="javascript: void(0);" class="has-arrow waves-effect font-size-15">
                                                <i class="ri-paint-brush-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                                <span>Reviews</span>
                                            </a>
                                            <ul class="sub-menu" aria-expanded="false">
                                                <li><a href="{{ url('pages.review_payable') }}"><i class="ri-clockwise-2-line"></i>Payables</a></li>
                                                <li><a href="{{ url('pages.review_receivable') }}"><i class="ri-anticlockwise-line"></i>Receivables</a></li>
                                            </ul>
                                        </li>
                                @php
                                   
                                }
                                else {
                                    echo '';
                                }
                            @endphp

                            @php
                                if ($user_session_details[0]->user_group == 'Approver'){
                                   @endphp
                                        <li>
                                            <a href="javascript: void(0);" class="has-arrow waves-effect font-size-15">
                                                <i class="mdi mdi-arrange-bring-forward"></i><span class="badge rounded-pill bg-success float-end"></span>
                                                <span>Approvals</span>
                                            </a>
                                            <ul class="sub-menu" aria-expanded="false">
                                                <li><a href="{{ url('pages.approve_payable') }}"><i class="ri-clockwise-2-line"></i>Payables</a></li>
                                                <li><a href="{{ url('pages.approve_receivable') }}"><i class="ri-anticlockwise-line"></i>Receivables</a></li>
                                            </ul>
                                        </li>
                                    @php
                                }
                                else {
                                    echo '';
                                }
                            @endphp
                            

                            

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect font-size-15">
                                    <i class="ri-git-repository-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span>Reports</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ url('pages.cashbook') }}"><i class="ri-book-2-line"></i>Cash Book</a></li>
                                    <li><a href="{{ url('pages.trial_balance') }}"><i class="ri-wallet-line"></i>Trial Balance</a></li>
                                    <li><a href="{{ url('pages.income_statement') }}"><i class="ri-swap-line"></i>Income Statement</a></li>
                                    <li><a href="{{ url('pages.expenditure_statement') }}"><i class="ri-red-packet-line"></i>Expenditure Statement</a></li>
                                    <li><a href="#"><i class="ri-book-open-line"></i>Accounts Ledger</a></li>
                                    
                                </ul>
                            </li>
                            @php
                                if ($user_session_details[0]->user_group == 'Approver'){
                                @endphp
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow waves-effect font-size-15">
                                            <i class="ri-user-3-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                            <span>Administrator</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li><a href="{{ url('pages.user_setup') }}"> <i class="ri-user-add-line"></i> User Setup</a>
                                            </li>
                                            <li><a href="{{ url('pages.user_group') }}"> <i class="ri-group-line"></i>Change User Group</a>
                                            </li>
                                        </ul>
                                    </li>
                            @php        
                            }
                            else {
                                echo '';
                            }
                            @endphp

                        @php
                        }
                            else {
                                echo '';
                            }
                        @endphp
                        
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- End of Left Sidebar -->
        </div>


            <!-- ============================================================== -->
                    <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @include('sweetalert::alert')

                @yield('content')

            </div>



		<!-- JAVASCRIPT -->
        <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
	    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script> -->
	    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
	    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
	    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

	    
	    <!-- apexcharts -->
	    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- Added for Edit function-->
        
        <!-- twitter-bootstrap-wizard js {{ asset('') }}-->
        <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

        <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

        <!-- select 2 plugin -->
        <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

        <!-- dropzone plugin -->
        <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ asset('assets/js/pages/ecommerce-add-product.init.js') }}"></script>

        <!-- End of Added -->

	    <!-- jquery.vectormap map -->
	    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
	    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

	    <!-- Required datatable js -->
	    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	    
	    <!-- Responsive examples -->
	    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
	    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

	    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

	    <!-- App js -->
	    <script src="{{ asset('assets/js/app.js') }}"></script>


        
        @yield('Menu_JS')
        @yield('DataTable_JS')
        @yield('DeleteAlert_JS')
        @yield('BankNames_JS')
	</body>
</html>