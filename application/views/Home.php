<!DOCTYPE html>
<html ng-app="edsapp" ng-controller="controllerpagina">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MERCSCHOOL | </title>

    <link rel="stylesheet" href="<?= base_url()?>util/bootstrap.css" type="text/css" charset="utf-8">
    <link href="<?= base_url()?>util/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url()?>util/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?= base_url()?>util/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="<?= base_url()?>util/css/animate.css" rel="stylesheet">
    <link href="<?= base_url()?>util/css/style.css" rel="stylesheet">
    <link href="<?= base_url()?>util/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <script src="<?= base_url()?>util/jquery.min.js" charset="utf-8"></script>
    <script src="<?= base_url()?>util/angular.min.js" charset="utf-8"></script>
    <script src="<?= base_url()?>util/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="<?= base_url()?>util/angular-datatables.min.js" charset="utf-8"></script>

    <script src="<?= base_url()?>util/table/angular-datatables.directive.js" charset="utf-8"></script>
    <script src="<?= base_url()?>util/table/angular-datatables.factory.js" charset="utf-8"></script>
    <script src="<?= base_url()?>util/table/angular-datatables.instances.js" charset="utf-8"></script>
    <script src="<?= base_url()?>util/table/angular-datatables.js" charset="utf-8"></script>
    <script src="<?= base_url()?>util/table/angular-datatables.options.js" charset="utf-8"></script>
    <script src="<?= base_url()?>util/table/angular-datatables.renderer.js" charset="utf-8"></script>
    <script src="<?= base_url()?>util/table/angular-datatables.util.js" charset="utf-8"></script>
    <link rel="stylesheet" href="<?= base_url()?>util/table/angular-datatables.css" media="screen" title="no title" charset="utf-8">
<script src="<?= base_url()?>util/angular-resource.js" charset="utf-8"></script>
  <script src="<?= base_url()?>util/ui-bootstrap-tpls-2.0.2.min.js" charset="utf-8"></script>
    <!--<script src="https://code.angularjs.org/1.5.8/angular-resource.js" charset="utf-8"></script>
    --><script src="<?= base_url()?>util/appangular.js" charset="utf-8"></script>

</head>

<body  ng-controller="BindAngularDirectiveCtrl as showCase">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img style="width:35%" alt="image" class="img-circle" src="https://scontent.fgru3-1.fna.fbcdn.net/v/t1.0-9/10402956_947273561988797_7738645419641521132_n.jpg?oh=51bb1cc4ede9a35efd2872f369732be0&oe=5838BFBC" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Edson suarez Loli</strong>
                            </span> <span class="text-muted text-xs block">Super Administrador <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <?php

                    $i=1;
                    $activi='active';
                    foreach ($_listgroupNAVTitle as $key){
                      if($i>1){
                          $activi='';
                      }
                      $lista = $this->NavMod->get_element_a($key->titulopag);
                      echo '<li class="'.$activi.'">
                          <a href="index.html"><i class="'.$key->iconpag.'"></i> <span class="nav-label">'.$key->titulopag.'</span> <span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                            <li>';
                              foreach($lista as $ax) {
                                echo '<a href="#" href ng-click="paginanew('.$ax->identificadorpag.')">'.$ax->vistapag.'</a>';
                              }
                        echo'</li>
                          </ul>
                      </li>';
                      $i++;
                    } ?>
              <!--      <li class="active">
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                          <li  ng-repeat="paginaresult in paginas" ng-click="paginanew(paginaresult.controladorpag)">
                            <a href="#">{{paginaresult.vistapag}}</a>
                          </li>
                        </ul>
                    </li>
                  -->

                    <li class="special_link">
                        <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.5/search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome </span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?= base_url()?>util/img/a1.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?= base_url()?>util/img/a1.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?= base_url()?>util/img/a1.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row  border-bottom white-bg dashboard-header">
              <div ng-include src="newpag" >
              </div>
            </div>
        </div>


        <div class="small-chat-box fadeInRight animated">
            <div class="heading" draggable="true">
                <small class="chat-date pull-right">
                    02.19.2015
                </small>
                chat
            </div>
            <div class="content">

                <div class="left">
                    <div class="author-name">
                        Monica  <small class="chat-date">
                        10:02 am
                    </small>
                    </div>
                    <div class="chat-message active">
                        Hola :).
                    </div>

                </div>
                <div class="right">
                    <div class="author-name">
                        Edson J
                        <small class="chat-date">
                            11:24 am
                        </small>
                    </div>
                    <div class="chat-message">
                        Salut Comment va-tu
                    </div>
                </div>
                <div class="left">
                    <div class="author-name">
                        Alicia
                        <small class="chat-date">
                            08:45 pm
                        </small>
                    </div>
                    <div class="chat-message active">
                        Que tal Insensibles
                    </div>
                </div>
                <div class="right">
                    <div class="author-name">
                        Luis
                        <small class="chat-date">
                            11:24 am
                        </small>
                    </div>
                    <div class="chat-message">
                        Holaaa!!!
                    </div>
                </div>
                <div class="left">
                    <div class="author-name">
                        Pedro
                        <small class="chat-date">
                            08:45 pm
                        </small>
                    </div>
                    <div class="chat-message active">
                      Party!!
                    </div>
                </div>


            </div>
            <div class="form-chat">
                <div class="input-group input-group-sm"><input type="text" class="form-control"> <span class="input-group-btn"> <button
                        class="btn btn-primary" type="button">Send
                </button> </span></div>
            </div>

        </div>
        <div id="small-chat">

            <span class="badge badge-warning pull-right">5</span>
            <a class="open-small-chat">
                <i class="fa fa-comments"></i>

            </a>
        </div>
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active"><a data-toggle="tab" href="#tab-1">
                        Notes
                    </a></li>
                    <li><a data-toggle="tab" href="#tab-2">
                        Projects
                    </a></li>
                    <li class=""><a data-toggle="tab" href="#tab-3">
                        <i class="fa fa-gear"></i>
                    </a></li>
                </ul>

                <div class="tab-content">


                    <div id="tab-1" class="tab-pane active">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> Latest Notes</h3>
                            <small><i class="fa fa-tim"></i> You have 10 new message.</small>
                        </div>

                        <div>

                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="<?= base_url()?>util/img/a1.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">

                                        There are many variations of passages of Lorem Ipsum available.
                                        <br>
                                        <small class="text-muted">Today 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="<?= base_url()?>util/img/a2.jpg">
                                    </div>
                                    <div class="media-body">
                                        The point of using Lorem Ipsum is that it has a more-or-less normal.
                                        <br>
                                        <small class="text-muted">Yesterday 2:45 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="<?= base_url()?>util/img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        Mevolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                        <br>
                                        <small class="text-muted">Yesterday 1:10 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="<?= base_url()?>util/img/a4.jpg">
                                    </div>

                                    <div class="media-body">
                                        Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the
                                        <br>
                                        <small class="text-muted">Monday 8:37 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="<?= base_url()?>util/img/a8.jpg">
                                    </div>
                                    <div class="media-body">

                                        All the Lorem Ipsum generators on the Internet tend to repeat.
                                        <br>
                                        <small class="text-muted">Today 4:21 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="<?= base_url()?>util/img/a7.jpg">
                                    </div>
                                    <div class="media-body">
                                        Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                        <br>
                                        <small class="text-muted">Yesterday 2:45 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="<?= base_url()?>util/img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below.
                                        <br>
                                        <small class="text-muted">Yesterday 1:10 pm</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="<?= base_url()?>util/img/a4.jpg">
                                    </div>
                                    <div class="media-body">
                                        Uncover many web sites still in their infancy. Various versions have.
                                        <br>
                                        <small class="text-muted">Monday 8:37 pm</small>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div id="tab-2" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-cube"></i> Latest projects</h3>
                            <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                        </div>

                        <ul class="sidebar-list">
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Business valuation</h4>
                                    It is a long established fact that a reader will be distracted.

                                    <div class="small">Completion with: 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Contract with Company </h4>
                                    Many desktop publishing packages and web page editors.

                                    <div class="small">Completion with: 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Meeting</h4>
                                    By the readable content of a page when looking at its layout.

                                    <div class="small">Completion with: 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NEW</span>
                                    <h4>The generated</h4>
                                    <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="small">Completion with: 22%</div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Business valuation</h4>
                                    It is a long established fact that a reader will be distracted.

                                    <div class="small">Completion with: 22%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Contract with Company </h4>
                                    Many desktop publishing packages and web page editors.

                                    <div class="small">Completion with: 48%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9 hours ago</div>
                                    <h4>Meeting</h4>
                                    By the readable content of a page when looking at its layout.

                                    <div class="small">Completion with: 14%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary pull-right">NEW</span>
                                    <h4>The generated</h4>
                                    <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="small">Completion with: 22%</div>
                                    <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                </a>
                            </li>

                        </ul>

                    </div>

                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3><i class="fa fa-gears"></i> Settings</h3>
                            <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                        </div>

                        <div class="setings-item">
                    <span>
                        Show notifications
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                    <label class="onoffswitch-label" for="example">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Disable Chat
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" checked class="onoffswitch-checkbox" id="example2">
                                    <label class="onoffswitch-label" for="example2">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Enable history
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                    <label class="onoffswitch-label" for="example3">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Show charts
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                    <label class="onoffswitch-label" for="example4">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Offline users
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox" id="example5">
                                    <label class="onoffswitch-label" for="example5">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Global search
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox" id="example6">
                                    <label class="onoffswitch-label" for="example6">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                    <span>
                        Update everyday
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                    <label class="onoffswitch-label" for="example7">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-content">
                            <h4>Settings</h4>
                            <div class="small">
                                I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                And typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url()?>util/js/jquery-2.1.1.js"></script>
    <script src="<?= base_url()?>util/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>util/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url()?>util/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url()?>util/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="<?= base_url()?>util/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= base_url()?>util/js/inspinia.js"></script>

    <div id="modalmodalidadmatricula"  class="modal fade " tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#42DE8D;color:#FFF">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Registro de Modalidad ' Matricula</h4>
          </div>
          <div class="modal-body">
            <form class="" ng-submit="showCase.registromodalidadmatricula()">
              <div class="row">
                <div class="col-md-12">

                  <div class="form-group">
                    <input type="hidden" ng-model="datos.identificador">
                    <input type="hidden" ng-model="datos.accion">
                    <label for="descripcionmodalidad">Descripcion.:</label>
                    <input type="text" class="form-control" ng-model="datos.descripcion" id="descripcionmodalidad" >
                  </div>
                </div>

              </div>
           </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="showCase.registromodalidadmatricula()">Guardar Cambios</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div id="modalgradoinstruccion"  class="modal fade " tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#42DE8D;color:#FFF">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-center">Registro de Grado de Instruccion</h4>
            </div>
            <div class="modal-body">
              <form class="" ng-submit="showCase.registroGradoInstruccion()">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="hidden" ng-model="datos.identificador">
                      <input type="hidden" ng-model="datos.accion">
                      <label for="descripcionrol">Descripcion.:</label>
                      <input type="text" class="form-control" ng-model="datos.descripcion" id="descripcionrol" placeholder="ingrese descripcion del curso">
                    </div>
                  </div>
                </div>
             </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" ng-click="showCase.registroGradoInstruccion()">Guardar Cambios</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

  <div id="modalcurso"  class="modal fade " tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#42DE8D;color:#FFF">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Registro de curso</h4>
          </div>
          <div class="modal-body">
            <form class="" ng-submit="showCase.registroCurso()">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" ng-model="datos.identificador">
                    <input type="hidden" ng-model="datos.accion">
                    <label for="descripcionrol">Descripcion.:</label>
                    <input type="text" class="form-control" ng-model="datos.descripcion" id="descripcionrol" placeholder="ingrese descripcion del curso">
                  </div>
                </div>
              </div>
           </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="showCase.registroCurso()">Guardar Cambios</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  <div  id="modalservicio"  class="modal fade " tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#42DE8D;color:#FFF">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Registro de servicio educativo </h4>
          </div>
          <div class="modal-body"  >
            <form class="" ng-submit="showCase.registro()">
              <div class="row">
                <div class="col-md-12">

                  <div class="form-group">
                    <input type="hidden" ng-model="identificador">
                    <input type="hidden" ng-model="accion">
                    <label for="descripcionservicio">Descripcion.:</label>
                    <input type="text" class="form-control" ng-model="datos.descripcionservicio" id="descripcionservicio" placeholder="servicio educativo">
                  </div>
                </div>

              </div>
           </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="showCase.registro()">Guardar Cambios</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <div id="modalrol"  class="modal fade " tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#42DE8D;color:#FFF">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Registro de Roles</h4>
          </div>
          <div class="modal-body">
            <form class="" ng-submit="showCase.registroROL()">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" ng-model="datos.identificador">
                    <input type="hidden" ng-model="datos.accion">
                    <label for="descripcionrol">Descripcion.:</label>
                    <input type="text" class="form-control" ng-model="datos.descripcion" id="descripcionrol" placeholder="ingrese rol">
                  </div>
                </div>
              </div>
           </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="showCase.registroROL()">Guardar Cambios</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
  <div id="modalTipoPago"  class="modal fade " tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#42DE8D;color:#FFF">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-center">Registro de Tipos ' Pago</h4>
            </div>
            <div class="modal-body">
              <form class="" ng-submit="showCase.registroTipoPago()">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="hidden" ng-model="datos.identificador">
                      <input type="hidden" ng-model="datos.accion">
                      <label for="descripcionrol">Descripcion.:</label>
                      <input type="text" class="form-control" ng-model="datos.descripcion" id="descripcionrol" placeholder="ingrese tipo de pago">
                    </div>
                  </div>
                </div>
             </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" ng-click="showCase.registroTipoPago()">Guardar Cambios</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

       <div ng-controller="HomeCtrl" id="modalEntidad"  class="modal fade " tabindex="-1" role="dialog">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#42DE8D;color:#FFF">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Registro de Entidades de Pago</h4>
              </div>
              <div class="modal-body" >
                <form name="upload" class="" ng-submit="uploadFile()">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" ng-model="datos.identificador">
                        <input type="hidden" ng-model="datos.accion">
                        <label for="descripcionrol">Descripcion.:</label>
                        <input type="text" class="form-control" ng-model="datos.descripcion" id="descripcionrol" placeholder="ingrese tipo de pago">
                      </div>
                      <div class="form-group">
                        <label for="razonsocial">Razon Social.:</label>
                        <input type="text" class="form-control" ng-model="datos.razonsocialentidad" id="razonsocial" >
                      </div>
                      <div class="form-group">
                        <label for="rucentidad">Ruc.:</label>
                        <input type="text" class="form-control" ng-model="datos.rucentidad" id="rucentidad" >
                      </div>
                      <div class="form-group">
                        <label for="lgoentidad">Logotipo.:</label>
                        <input type="file" class="form-control" name="file" uploader-model="datos.file" id="lgoentidad" >
                      </div>
                    </div>
                  </div>
               </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" ng-click="uploadFile()">Guardar Cambios</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>

</html>
