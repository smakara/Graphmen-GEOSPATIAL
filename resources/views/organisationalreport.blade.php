@include('includes.header')
@include('includes.sidebar')
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Manage Statistics</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="row ">
        <div class="col-md-2 ">
            <!--<a class="mb-xs mt-xs mr-xs modal-basic btn btn-primary" href="#modalPrimary">Primary</a>-->

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Organisational Details</h2>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-none">
                            <thead>

                            </thead>
                            <tbo
                                <tr>
                                    <td>Name of Organisation</td>
                                    <td>Zimbabwe Republic Police </td>

                                </tr>
                                <tr>
                                    <td>Type of Organisation</td>
                                    <td>Security Sector</td>

                                </tr>
                                <tr>
                                    <td>Province</td>
                                    <td>Bulawayo</td>

                                </tr>


                                </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>


    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tabs tabs-primary">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#popular3" data-toggle="tab"><i class="fa fa-table"></i> Tabular Report</a>
                    </li>
                    <li>
                        <a href="#recent3" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> Graphical  Report</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="popular3" class="tab-pane active">

                        <div class="row">

                            <div class="col-md-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
                                            <a href="#" class="fa fa-caret-down"></a>
                                            <a href="#" class="fa fa-times"></a>
                                        </div>

                                        <div><h2 class="panel-title">Organisational Report</h2></div>

                                        <div class="panel-body "> 

                                            <a  href="{{url('organisationalreport')}}"type="button" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-refresh"></i> Reload Report</a>

                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-success "> <i class="fa fa-file-excel-o"></i> Export as Excel</button>

                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                                        </div>
                                    </header>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-none">
                                                <thead>
                                                <th>Indicator</th>
                                                <th>Year</th>
                                                <th># Males</th>
                                                <th># Female</th>
                                                <th>Total</th>
                                                <th>% Males</th>
                                                <th>% Females</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($organisationalreport as $data)

                                                    @if($data->femalepercentage<50)
                                                    <tr style="color: #800">
                                                        <td>{{$data->ind_description}}</td>
                                                        <td>{{$data->stat_year}}</td>
                                                        <td>{{$data->stat_data_males}}</td>
                                                        <td>{{$data->stat_data_females}}</td>
                                                        <td>{{$data->Total}}</td>
                                                        <td >{{$data->malepercentage}}</td>
                                                        <td>{{$data->femalepercentage}}</td>


                                                    </tr>
                                                    @else
                                                    <tr     >
                                                        <td>{{$data->ind_description}}</td>
                                                        <td>{{$data->stat_year}}</td>
                                                        <td>{{$data->stat_data_males}}</td>
                                                        <td>{{$data->stat_data_females}}</td>
                                                        <td>{{$data->Total}}</td>
                                                        <td >{{$data->malepercentage}}</td>
                                                        <td>{{$data->femalepercentage}}</td>


                                                    </tr>
                                                    @endif

                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </div>


                        </div> 

                    </div>
                    <div id="recent3" class="tab-pane">
                        <div id="container" style="width: 100%;">
                            <canvas id="canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="modalPrimary" class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Are you sure?</h2>
            </header>
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-icon">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <div class="modal-text">
                        <h4>Primary</h4>
                        <p>Are you sure that you want to delete this image?</p>
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary modal-confirm">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </section>
    </div>
    <!-- end: page -->
</section>

@include('includes.footer')