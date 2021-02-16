<div class="inner-wrapper">
    <!-- start: sidebar -->
    <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
            <div class="sidebar-title">
                Navigation
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <div class="nano">
            <div class="nano-content">
                <nav id="menu" class="nav-main" role="navigation">
                    <ul class="nav nav-main">

                        <li class="nav-parent">
                            <a>
                                <i class="fa fa-building" aria-hidden="true"></i>
                                <span>City Management</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="{{url('cities')}}">
                                        View Cities
                                    </a>
                                </li>

                            </ul>

                        </li>
                        <li class="nav-parent">
                            <a>
                                <i class="fa fa-map-o" aria-hidden="true"></i>
                                <span>Cadastral Maps</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="{{url('maps')}}">
                                        Hillcrest
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="{{url('maps/hilside')}}">
                                        Hillside
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li>
                            <a href="{{url('/')}}">
                                <i class="fa fa-power-off" aria-hidden="true"></i>
                                <span>Logout</span>
                            </a>
                        </li>



                        <!--                        @if(Session::get('role')=='Administrator')-->
                        <!--                        <li>
                                                    <a href="{{url('allrequests')}}">
                        
                                                        <span class="pull-right label label-primary"></span>
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                        <span>All Requests</span>
                                                    </a>
                                                </li>
                        
                                                <li class="nav-parent">
                                                    <a>
                                                        <i class="fa fa-copy" aria-hidden="true"></i>
                                                        <span>Requests</span>
                                                    </a>
                                                    <ul class="nav nav-children">
                                                        <li>
                                                            <a href="{{url('myrequests')}}">
                                                                My Requests
                                                            </a>
                                                        </li>
                        
                        
                                                    </ul>
                                                </li>-->


                        <!--                        <li class="nav-parent">
                                                    <a>
                                                        <i class="fa fa-book" aria-hidden="true"></i>
                                                        <span>Report Management</span>
                                                    </a>
                                                    <ul class="nav nav-children">
                                                        <li>
                                                            <a href="{{url('reports')}}">
                                                                Trip Request Report
                                                            </a>
                                                        </li>
                        
                                                    </ul>
                                                    <ul class="nav nav-children">
                                                        <li>
                                                            <a href="{{url('report2form')}}">
                                                                Trip Status Report
                                                            </a>
                                                        </li>
                        
                                                    </ul>
                                                </li>-->

                        <!--                          <li>
                                                    <a href="{{url("users")}}">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                        <span>User Management</span>
                                                    </a>
                                                </li>
                        
                                                  <li class="nav-parent">
                                                    <a>
                                                        <i class="fa fa-book" aria-hidden="true"></i>
                                                        <span>Manage Reports</span>
                                                    </a>
                                                    <ul class="nav nav-children">
                                                         <li>
                                                            <a href="{{url('organisationalreport')}}">
                                                                Organisational Reports
                                                            </a>
                                                        </li>
                        
                                                         <li>
                                                            <a href="{{url('provincialreport')}}">
                                                                Provincial Reports
                                                            </a>
                                                        </li>
                        
                                                    </ul>
                                                </li>
                        
                                                      <li class="nav-parent">
                                                    <a>
                                                        <i class="fa fa-book" aria-hidden="true"></i>
                                                        <span>System Settings</span>
                                                    </a>
                                                    <ul class="nav nav-children">
                                                         <li>
                                                            <a href="{{url('capturedatasettings')}}">
                                                                Capture Data Settings
                                                            </a>
                                                        </li>-->

                        <!--                                 <li>
                                                            <a href="{{url('provincialreport')}}">
                                                                Provincial Reports
                                                            </a>
                                                        </li>-->

                    </ul>
                    </li>
                    <!--                        @endif-->


                    <!--                        @if(Session::get('role')=='User')-->
                    <!--                        <li class="nav-parent">
                                                <a>
                                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                                    <span>Requests</span>
                                                </a>
                                                <ul class="nav nav-children">
                                                    <li>
                                                        <a href="{{url('myrequests')}}">
                                                            My Requests
                                                        </a>
                                                    </li>
                    
                    
                                                </ul>
                                            </li>-->

                    <!--                        @endif-->

                    </ul>
                </nav>

            </div>

        </div>

    </aside>
    <!-- end: sidebar -->
