@extends('admin.master')
@section('admin')
    <!-- Top Statistics -->
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="card card-mini mb-4">
                <div class="card-body">
                    <h2 class="mb-1"></h2>
                    <p>Online Signups</p>
                    <div class="chartjs-wrapper">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card card-mini  mb-4">
                <div class="card-body">
                    <h2 class="mb-1"></h2>
                    <p>New Visitors Today</p>
                    <div class="chartjs-wrapper">
                        <canvas id="dual-line"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card card-mini mb-4">
                <div class="card-body">
                    <h2 class="mb-1"></h2>
                    <p>Monthly Total Order</p>
                    <div class="chartjs-wrapper">
                        <canvas id="area-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card card-mini mb-4">
                <div class="card-body">
                    <h2 class="mb-1"></h2>
                    <p>Total Revenue This Year</p>
                    <div class="chartjs-wrapper">
                        <canvas id="line"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-md-12">
            <!-- Sales Graph -->
            <div class="card card-default" data-scroll-height="675">
                <div class="card-header">
                    <h2>Sales Of The Year</h2>
                </div>
                <div class="card-body">
                    <canvas id="linechart" class="chartjs"></canvas>
                </div>
                <div class="card-footer d-flex flex-wrap bg-white p-0">
                    <div class="col-6 px-0">
                        <div class="text-center p-4">
                            <h4></h4>
                            <p class="mt-2">Total orders of this year</p>
                        </div>
                    </div>
                    <div class="col-6 px-0">
                        <div class="text-center p-4 border-left">
                            <h4></h4>
                            <p class="mt-2">Total revenue of this year</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <!-- Doughnut Chart -->
            <div class="card card-default" data-scroll-height="675">
                <div class="card-header justify-content-center">
                    <h2>Orders Overview</h2>
                </div>
                <div class="card-body" >
                    <canvas id="doChart" ></canvas>
                </div>
                <div class="card-footer d-flex flex-wrap bg-white p-0">
                    <div class="col-6">
                        <div class="py-4 px-4">
                            <ul class="d-flex flex-column justify-content-between">
                                <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #4c84ff"></i>Order Completed</li>
                                <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #80e1c1 "></i>Order Unpaid</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 border-left">
                        <div class="py-4 px-4 ">
                            <ul class="d-flex flex-column justify-content-between">
                                <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #8061ef"></i>Order Pending</li>
                                <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #ffa128"></i>Order Canceled</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-12">
            <!-- Polar and Radar Chart -->
            <div class="card card-default">
                <div class="card-header justify-content-center">
                    <h2>Sales Overview</h2>
                </div>
                <div class="card-body pt-0">
                    <ul class="nav nav-pills mb-5 mt-5 nav-style-fill nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Sales Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Monthly Sales</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <canvas id="polar"></canvas>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <canvas id="radar"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
            <!-- Top Sell Table -->
            <div class="card card-table-border-none" data-scroll-height="550">
                <div class="card-header justify-content-between">
                    <h2>Sold by Units</h2>
                    <div>
                        <button class="text-black-50 mr-2 font-size-20"><i class="mdi mdi-cached"></i></button>
                        <div class="dropdown show d-inline-block widget-dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-units" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-units">
                                <li class="dropdown-item"><a  href="#">Action</a></li>
                                <li class="dropdown-item"><a  href="#">Another action</a></li>
                                <li class="dropdown-item"><a  href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body slim-scroll py-0">
                    <table class="table ">
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white py-4">
                    <a href="#" class="btn-link py-3 text-uppercase">View Report</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-12">
            <!-- Notification Table -->
            <div class="card card-default" data-scroll-height="550">
                <div class="card-header justify-content-between ">
                    <h2>Latest Notifications</h2>
                    <div>
                        <button class="text-black-50 mr-2 font-size-20"><i class="mdi mdi-cached"></i></button>
                        <div class="dropdown show d-inline-block widget-dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-notification">
                                <li class="dropdown-item"><a  href="#">Action</a></li>
                                <li class="dropdown-item"><a  href="#">Another action</a></li>
                                <li class="dropdown-item"><a  href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body slim-scroll">
                    <div class="media pb-3 align-items-center justify-content-between">
                        <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                            <i class="mdi mdi-cart-outline font-size-20"></i>
                        </div>
                    </div>
                    <div class="media py-3 align-items-center justify-content-between">
                        <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                            <i class="mdi mdi-email-outline font-size-20"></i>
                        </div>
                    </div>
                    <div class="media py-3 align-items-center justify-content-between">
                        <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                            <i class="mdi mdi-stack-exchange font-size-20"></i>
                        </div>
                    </div>
                    <div class="media py-3 align-items-center justify-content-between">
                        <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                            <i class="mdi mdi-cart-outline font-size-20"></i>
                        </div>
                    </div>
                    <div class="media py-3 align-items-center justify-content-between">
                        <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                            <i class="mdi mdi-calendar-blank font-size-20"></i>
                        </div>
                    </div>
                    <div class="media py-3 align-items-center justify-content-between">
                        <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                            <i class="mdi mdi-stack-exchange font-size-20"></i>
                        </div>
                    </div>
                    <div class="media py-3 align-items-center justify-content-between">
                        <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                            <i class="mdi mdi-email-outline font-size-20"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-3"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Recent Order Table -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Recent Orders</h2>
                    <div class="date-range-report ">
                        <span></span>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product Name</th>
                                <th class="d-none d-md-table-cell">Units</th>
                                <th class="d-none d-md-table-cell">Order Date</th>
                                <th class="d-none d-md-table-cell">Order Cost</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <!-- To Do list -->
            <div class="card card-default todo-table" id="todo" data-scroll-height="550">
                <div class="card-header justify-content-between">
                    <h2>To Do List</h2>
                    <a class="btn btn-primary btn-pill" id="add-task" href="#" role="button"> Add task </a>
                </div>
                <div class="mt-3"></div>
            </div>
        </div>
        <div class="col-xl-6">
            <!-- area chart -->
            <div class="card card-default" >
                <div class="card-header d-block d-md-flex justify-content-between">
                    <h2>World Wide Customer </h2>
                    <div class="dropdown show d-inline-block widget-dropdown ml-auto">
                        <a class="dropdown-toggle" href="#" role="button" id="world-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            World Wide
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="world-dropdown">
                            <li class="dropdown-item"><a href="#">Continetal chart</a></li>
                            <li class="dropdown-item"><a href="#">Sub-continental</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body vector-map-world">
                    <div id="world" style="height: 100%; width: 100%;"></div>
                </div>
                <div class="card-footer d-flex flex-wrap bg-white p-0">
                    <div class="col-6">
                        <div class="p-4">
                            <ul class="d-flex flex-column justify-content-between">
                                <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #29cc97"></i>America <span class="float-right"></span></li>
                                <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #4c84ff "></i>Australia <span class="float-right"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 border-left">
                            <ul class="d-flex flex-column justify-content-between">
                                <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #ffa128"></i>Europe <span class="float-right"></span></li>
                                <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #fe5461"></i>Africa <span class="float-right"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5">
            <!-- New Customers -->
            <div class="card card-table-border-none"  data-scroll-height="580">
                <div class="card-header justify-content-between ">
                    <h2>New Customers</h2>
                    <div>
                        <button class="text-black-50 mr-2 font-size-20">
                            <i class="mdi mdi-cached"></i>
                        </button>
                        <div class="dropdown show d-inline-block widget-dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-customar"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-customar">
                                <li class="dropdown-item"><a  href="#">Action</a></li>
                                <li class="dropdown-item"><a  href="#">Another action</a></li>
                                <li class="dropdown-item"><a  href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="media-image mr-3 rounded-circle">
                                            <a href="profile.html"><img class="rounded-circle w-45" src="assets/img/user/u1.jpg" alt="customer image"></a>
                                        </div>
                                    </div>
                                </td>
                                <td > Orders</td>
                                <td class="text-dark d-none d-md-block">$</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <!-- Top Products -->
            <div class="card card-default" data-scroll-height="580">
                <div class="card-header justify-content-between mb-4">
                    <h2>Top Products</h2>
                    <div>
                        <button class="text-black-50 mr-2 font-size-20"><i class="mdi mdi-cached"></i></button>
                        <div class="dropdown show d-inline-block widget-dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-product" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-product">
                                <li class="dropdown-item"><a  href="#">Update Data</a></li>
                                <li class="dropdown-item"><a  href="#">Detailed Log</a></li>
                                <li class="dropdown-item"><a  href="#">Statistics</a></li>
                                <li class="dropdown-item"><a  href="#">Clear Data</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body py-0">
                    <div class="media d-flex mb-5">
                        <div class="media-image align-self-center mr-3 rounded">
                            <a href="#"><img src="assets/img/products/p1.jpg" alt="customer image"></a>
                        </div>
                        <div class="media-body align-self-center">
                            <a href="#"><h6 class="mb-3 text-dark font-weight-medium"> </h6></a>
                            <p class="float-md-right"><span class="text-dark mr-2"></span>Sales</p>
                            <p class="d-none d-md-block"></p>
                            <p class="mb-0">
                                <del>$</del>
                                <span class="text-dark ml-3">$</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection