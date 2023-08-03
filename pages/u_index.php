<?php
$con = mysqli_connect("localhost", "root", "", "task");
session_start();
$sql = "SELECT * from `tasks` order by t_id desc";
$res = mysqli_query($con, $sql);
if (isset($_SESSION['email'])) {
    ?>
    <!doctype html>
    <html class="no-js " lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

        <title>Tasks</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- Favicon-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <!-- JQuery DataTable Css -->
        <link rel="stylesheet" href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
        <!-- Custom Css -->
        <link rel="stylesheet" href="assets/css/style.min.css">
    </head>

    <body class="theme-blush">
        <!-- Page Loader -->
        <div class="page-loader-wrapper" id="loader">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48"
                        alt="Aero"></div>
                <p>Please wait...</p>
            </div>
        </div>

        <div class="overlay"></div>

        <!-- Right Icon menu Sidebar -->
        <div class="navbar-right">
            <ul class="navbar-nav">
                <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i
                            class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
                <li><a href="#" class="mega-menu" title="Log Out" data-toggle="modal" data-target="#colorModal"><i
                            class="zmdi zmdi-power"></i></a></li>
            </ul>
        </div>

        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <div class="navbar-brand">
                <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
                <a href="a_index.php"><img src="assets/images/logo.svg" width="25" alt="Aero"><span
                        class="m-l-10">Task Manager</span></a>
            </div>
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <a class="image" href="#"><img src="assets/images/profile_av.jpg" alt="User"></a>
                            <div class="detail">
                                <h4>
                                    <?php echo $_SESSION['name']; ?>
                                </h4>
                                <small>User</small>
                            </div>
                        </div>
                    </li>
                    <li class="open"><a href="u_index.php"><i class="zmdi zmdi-account-add"></i><span>Tasks</span></a>
                    </li>
                </ul>
            </div>
        </aside>

        <section class="content">
            <div class="body_scroll">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2>
                                Your Tasks
                            </h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="u_index.php"><i class="zmdi zmdi-home"></i> Home</a>
                                </li>

                                <li class="breadcrumb-item active">Tasks</li>
                            </ul>

                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <button class="btn btn-primary float-right " type="button" href='#' data-toggle="modal"
                                data-target="#largeModalSchedule">Assign a task</button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-hover product_item_list c_table theme-color mb-0">
                                        <thead>
                                            <tr>
                                                <th>Task name</th>
                                                <th>Description</th>
                                                <th>Assigned date</th>
                                                <th>Deadline</th>
                                                <th>Status</th>
                                                <th data-breakpoints="sm xs md">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                while ($row = mysqli_fetch_array($res)) {
                                                    ?>
                                                    <td>
                                                            <?php echo $row['t_name']; ?>
                                                        </td>
                                                    <td>
                                                        <?php echo $row['t_des']?>
                                                    </td>
                                                    <td>
                                                    <?php echo date("d/m/Y", strtotime($row['t_date'])); ?>
                                                    </td>
                                                    <td>
                                                    <?php echo date("d/m/Y", strtotime($row['t_deadline'])); ?>
                                                    </td>
                                                    <td>
                                                    <?php echo $row['t_complete']; ?>
                                                </td>
                                                    <td>
                                                        <?php
                                                        if($_SESSION['id'] == $row['t_created_uid'])
                                                        {
                                                          ?>  
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-default waves-effect waves-float btn-sm waves-green"
                                                            data-toggle="modal" data-target="#largeModalUpdate"
                                                            data-id1="<?php echo $row['t_id']; ?>"
                                                            data-id2="<?php echo $row['t_name']; ?>"
                                                            data-id3="<?php echo $row['t_des']; ?>"
                                                            data-id4="<?php echo $row['t_deadline']; ?>"
                                                             id="updateassbtn"><i
                                                                class="zmdi zmdi-edit"></i></a>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-default waves-effect waves-float btn-sm waves-red"
                                                            data-toggle="modal" data-target="#colorModalDelete"
                                                            data-id1="<?php echo $row['t_id']; ?>" id="delbtn"><i
                                                                class="zmdi zmdi-delete"></i></a>

                                                                <?php
                                                        }
                                                        ?>

<a href="../php/completed.php?t_id=<?php echo $row['t_id']; ?>"
                                                            class="btn btn-default waves-effect waves-float btn-sm waves-red"
                                                           ><i
                                                                class="zmdi zmdi-upload"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
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
        </section>

        <!-- Jquery DataTable Plugin Js -->
        <script src="assets/bundles/datatablescripts.bundle.js"></script>

        <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
        <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <!-- Bootstrap Notify Plugin Js -->
        <script src="assets/js/pages/tables/footable.js"></script><!-- Custom Js -->

    </html>

    <!--create task modal-->

    <div class="modal fade" id="largeModalSchedule" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Add a task</h4>
                </div>
                <div class="modal-body">
                    <form id="form_validation" method="POST" enctype="multipart/form-data">
                        <div class="form-group form-float">
                            <input type="hidden" id="ta_cuid" value="<?php echo $_SESSION['id']?>">
                            <input type="text" id="ta_name" class="form-control" placeholder=" name" required>
                        </div>
                        <div class="form-group form-float">
                            <div class="input-group masked-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control date" name="ddate"
                                    placeholder="Due date Ex: 30/07/2016" id="ta_duedate">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <textarea id="ta_des" cols="30" rows="5" placeholder="Description"
                                class="form-control no-resize" required></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addtask" data-dismiss="modal"
                        class="btn btn-default btn-round waves-effect">ASSIGN</button>
                    <button type="button" class="btn btn-danger waves-effect" id="closem"
                        data-dismiss="modal">CLOSE</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--Update task modal-->

    <div class="modal fade" id="largeModalUpdate" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Update Task</h4>
                </div>
                <div class="modal-body">
                    <form id="form_validation1" method="POST">
                        <div class="form-group form-float">
                            <input type="hidden" id="tu_id">
                            <input type="text" class="form-control" placeholder="Task Name" required id="tu_name">
                        </div>
                        <div class="form-group form-float">
                            <div class="input-group masked-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-calendar"></i> &nbspDue Date</span>
                                </div>
                                <input type="date" id="tu_duedate" class="form-control date">
                            </div>
                                            </div>
                        <div class="form-group form-float">
                            <textarea id="tu_des" cols="30" rows="5" placeholder="Description" class="form-control no-resize"
                                required></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-round waves-effect" id="confirmupdateassignment"
                        data-dismiss="modal">UPDATE</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--Delete task modal-->
    <div class="modal fade" id="colorModalDelete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-teal">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">DELETE</h4>
                </div>
                <div class="modal-body text-light">Are you sure that you want to delete the task</div>
                <div class="modal-footer">
                    <input type="hidden" id="ass_id">
                    <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal"
                        id="delassignmentconfirm">CONFIRM</button>
                    <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <!--Logout modal-->
    <div class="modal fade" id="colorModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-red">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">LOG OUT</h4>
                </div>
                <div class="modal-body text-light">Are you sure that you want to exit the current session</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect text-light" id="logout">LOG OUT</button>
                    <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <script src=../js/assignTask.js></script>
    <script src="../js/logout.js"></script>
    <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#ta_duedate').attr('min', today);
        $('#date_picker').attr('min', today);
    </script>
        <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
<script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->


    <?php
} else {
    header("Location: index.php");
}
?>