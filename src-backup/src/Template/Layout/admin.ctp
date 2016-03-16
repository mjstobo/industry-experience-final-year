<!DOCTYPE html>
<html lang="en">

<?php $fname = $this->request->session()->read('Auth.User.given_name');?>
<?php $lname = $this->request->session()->read('Auth.User.family_name');?>
<?= $this->Flash->render() ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <link href="http://www.eatingdisorders.org.au/templates/eatingdisorders/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EDV Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
    <?php echo $this->Html->css('/css/jquery.dataTables.min.css'); ?>
    <?php echo $this->Html->css('/fonts/css/font-awesome.min.css'); ?>
    <?php echo $this->Html->css('/css/adminPanel/animate.min.css'); ?>


    <!-- Custom styling plus plugins -->
    <?php echo $this->Html->css('/css/adminPanel/custom.css'); ?>
    <?php echo $this->Html->css('/css/adminPanel/maps/jquery-jvectormap-2.0.1.css'); ?>
    <?php echo $this->Html->css('/css/adminPanel/icheck/flat/green.css'); ?>
    <?php echo $this->Html->css('/css/adminPanel/floatexamples.css'); ?>

    <?php echo $this->Html->script('/js/adminPanel/jquery.min.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/nprogress.js'); ?>

    <script>
        NProgress.start();
    </script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <?php echo $this->Html->link('<i class="fa fa-leaf"></i> EDV Admin Panel', ['prefix'=>'admin','controller'=>'users','action'=>'index'],['class'=>'site_title','escapeTitle'=>false]); ?>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->

                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <br><br>
                        <div class="menu_section">
                            <h3>Navigation</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><?php echo $this->Html->link('Admin Panel', ['prefix'=>'admin','controller'=>'users','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link(' Website', ['prefix'=>false,'controller'=>'users','action'=>'home']); ?>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-user"></i> Members <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><?php echo $this->Html->link(' Register New Member', ['prefix'=>'admin','controller'=>'users','action'=>'add']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link(' Renew Member', ['prefix'=>'admin','controller'=>'users','action'=>'renew']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link(' View All Members', ['prefix'=>'admin','controller'=>'users','action'=>'viewall']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link(' View All Memberships', ['prefix'=>'admin','controller'=>'memberships','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link(' View Active Members', ['prefix'=>'admin','controller'=>'users','action'=>'viewactiveusers']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link(' View Inactive Members', ['prefix'=>'admin','controller'=>'users','action'=>'viewinactiveusers']); ?>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-book"></i> Library <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><?php echo $this->Html->link('Lend to Member', ['prefix'=>'admin','controller'=>'loans','action'=>'createloan']); ?>
                                        <li><?php echo $this->Html->link('Search Barcode', ['prefix'=>'admin','controller'=>'items','action'=>'barcodeSearch']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Add New Item', ['prefix'=>'admin','controller'=>'items','action'=>'addItem']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Add Copy of Existing Item', ['prefix'=>'admin','controller'=>'items','action'=>'addDeskCopy']); ?>
                                                                                </li>


                                        <li><?php echo $this->Html->link('Return Item', ['prefix'=>'admin','controller'=>'LoanItemCopies','action'=>'returnItem']); ?></li>




                                        <li><?php echo $this->Html->link('View Catalogue', ['prefix'=>'admin','controller'=>'items','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('View Loans', ['prefix'=>'admin','controller'=>'loans','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Current Reservations (All Users)', ['prefix'=>'admin','controller'=>'items','action'=>'viewReserves']); ?>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-usd"></i></i> Payments <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><?php echo $this->Html->link('View All Payment Records', ['prefix'=>'admin','controller'=>'settlements','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('View Member Payment Records', ['prefix'=>'admin','controller'=>'settlements','action'=>'history']); ?>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Database Management <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><?php echo $this->Html->link('Manage Authors', ['prefix'=>'admin','controller'=>'authors','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Manage Subjects', ['prefix'=>'admin','controller'=>'subjects','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Manage Publishers', ['prefix'=>'admin','controller'=>'publishers','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Manage Contact Types', ['prefix'=>'admin','controller'=>'contact_types','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Manage Item Types', ['prefix'=>'admin','controller'=>'item_types','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Manage Membership Types', ['prefix'=>'admin','controller'=>'mem_types','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Manage Item Status', ['prefix'=>'admin','controller'=>'item_statuses','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Manage Borrowing Limits', ['prefix'=>'admin','controller'=>'loan_limits','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Manage Payment Methods', ['prefix'=>'admin','controller'=>'payment_methods','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Manage Shelf Categories', ['prefix'=>'admin','controller'=>'shelf_sections','action'=>'index']); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('Manage Postage Costs', ['prefix'=>'admin','controller'=>'postages','action'=>'index']); ?>
                                        </li>
                                    </ul>
                                </li>
                                <li><?php echo $this->Html->link('<i class="fa fa-envelope-o "></i> Mailing List Management', ['prefix'=>'admin','controller'=>'mailing','action'=>'index'],['escapeTitle'=> false]); ?>
                                </li>
                                <br><br>
                                <li>
                                    <a ref onclick="goBack()"><i class="fa  fa-chevron-left "></i> Back</a>
                                </li>
                            </ul>
                        </div>



                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', ['prefix'=>'admin','controller'=>'users','action'=>'index'],['escapeTitle' => false, 'title' => 'Home']); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search" aria-hidden="true"></span>',[],['escapeTitle' => false, 'title' => 'Logout']); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-user" aria-hidden="true"></span>',['controller' => 'users', 'action' => 'view', $this->request->session()->read('Auth.User.id')],['escapeTitle' => false, 'title' => 'Profile']); ?>
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-off" aria-hidden="true"></span>',['controller'=>'users', 'action' => 'logout'],['escapeTitle' => false, 'title' => 'Logout']); ?>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right topMargin">
                            <li><span class="padding"><span class="padding"><i class="fa fa-sign-out fa-fw"></i></span><span><?php echo $this->Html->link('Logout', ['controller'=>'users', 'action' => 'logout']); ?></span></span>
                            </li>
                            <li><i class="fa fa-user fa-fw"></i></span><span><?php echo $this->Html->link('Welcome'." ".$fname." ".$lname, ['controller' => 'users', 'action' => 'view', $this->request->session()->read('Auth.User.id')]); ?>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->




            <!-- page content -->
            <div class="right_col" role="main">
                            <div class="paddingLeft">


                                <?= $this->fetch('content') ?>


                            </div>
            </div>
            <!-- /page content -->

        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <?php echo $this->Html->script('/js/adminPanel/bootstrap.min.js'); ?>

    <!-- gauge js -->
    <?php echo $this->Html->script('/js/adminPanel/gauge/gauge.min.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/gauge/gauge_demo.js'); ?>

    <!-- chart js -->
    <?php echo $this->Html->script('/js/adminPanel/chartjs/chart.min.js'); ?>

    <!-- bootstrap progress js -->
    <?php echo $this->Html->script('/js/adminPanel/progressbar/bootstrap-progressbar.min.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/nicescroll/jquery.nicescroll.min.js'); ?>

    <!-- icheck -->
    <?php echo $this->Html->script('/js/adminPanel/icheck/icheck.min.js'); ?>


    <!-- daterangepicker -->
    <?php echo $this->Html->script('/js/adminPanel/moment.min.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/datepicker/daterangepicker.js'); ?>


    <?php echo $this->Html->script('/js/adminPanel/custom.js'); ?>

    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->

    <?php echo $this->Html->script('/js/adminPanel/flot/jquery.flot.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/flot/jquery.flot.pie.jss'); ?>
    <?php echo $this->Html->script('/js/adminPanel/flot/jquery.flot.orderBars.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/flot/jquery.flot.time.min.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/flot/date.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/flot/jquery.flot.spline.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/flot/jquery.flot.stack.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/flot/curvedLines.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/flot/jquery.flot.resize.js'); ?>

    <script>
        $(document).ready(function () {
            // [17, 74, 6, 39, 20, 85, 7]
            //[82, 23, 66, 9, 99, 6, 2]
            var data1 = [[gd(2012, 1, 1), 17], [gd(2012, 1, 2), 74], [gd(2012, 1, 3), 6], [gd(2012, 1, 4), 39], [gd(2012, 1, 5), 20], [gd(2012, 1, 6), 85], [gd(2012, 1, 7), 7]];

            var data2 = [[gd(2012, 1, 1), 82], [gd(2012, 1, 2), 23], [gd(2012, 1, 3), 66], [gd(2012, 1, 4), 9], [gd(2012, 1, 5), 119], [gd(2012, 1, 6), 6], [gd(2012, 1, 7), 9]];
            $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
                data1, data2
            ], {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    verticalLines: true,
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#fff'
                },
                colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
                xaxis: {
                    tickColor: "rgba(51, 51, 51, 0.06)",
                    mode: "time",
                    tickSize: [1, "day"],
                    //tickLength: 10,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Verdana, Arial',
                    axisLabelPadding: 10
                        //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
                },
                yaxis: {
                    ticks: 8,
                    tickColor: "rgba(51, 51, 51, 0.06)",
                },
                tooltip: false
            });

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }
        });
    </script>

    <!-- worldmap -->
    <?php echo $this->Html->script('/js/adminPanel/maps/jquery-jvectormap-2.0.1.min.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/maps/gdp-data.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/maps/jquery-jvectormap-world-mill-en.js'); ?>
    <?php echo $this->Html->script('/js/adminPanel/maps/jquery-jvectormap-us-aea-en.js'); ?>

    <script>
        $(function () {
            $('#world-map-gdp').vectorMap({
                map: 'world_mill_en',
                backgroundColor: 'transparent',
                zoomOnScroll: false,
                series: {
                    regions: [{
                        values: gdpData,
                        scale: ['#E6F2F0', '#149B7E'],
                        normalizeFunction: 'polynomial'
                    }]
                },
                onRegionTipShow: function (e, el, code) {
                    el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                }
            });
        });
    </script>
    <!-- skycons -->
    <?php echo $this->Html->script('/js/adminPanel/skycons/skycons.js'); ?>
    <script>
        var icons = new Skycons({
                "color": "#73879C"
            }),
            list = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    </script>

    <!-- dashbord linegraph -->
    <script>
        var doughnutData = [
            {
                value: 30,
                color: "#455C73"
            },
            {
                value: 30,
                color: "#9B59B6"
            },
            {
                value: 60,
                color: "#BDC3C7"
            },
            {
                value: 100,
                color: "#26B99A"
            },
            {
                value: 120,
                color: "#3498DB"
            }
    ];
        var myDoughnut = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutData);
    </script>
    <!-- /dashbord linegraph -->
    <!-- datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function () {
                $('#reportrange').data('daterangepicker').remove();
            });
        });
    </script>
    <script>
        NProgress.done();
    </script>

    <script>
      function goBack() {
          window.history.back();
      }
    </script>

    <!-- /datepicker -->
    <!-- /footer content -->
</body>

</html>
