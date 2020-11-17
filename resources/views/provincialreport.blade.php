@include('includes.header')
@include('includes.sidebar')

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
            s
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

                    <h2 class="panel-title">Provincial Report   <strong style="color: #bd2d29; font-size: 14px;"> </strong></h2>
                </header>

                <div class="panel-body">
                    <form  method="POST" action="{{url('values')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($provinces as $data )
                                        <div class="panel-group" id="accordion{{$data->id}}">
                                            <div class="panel panel-accordion">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#{{$data->id}}">
                                                            <i class=" fa fa-question-circle"></i>  {{$data->province}}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="{{$data->id}}" class="accordion-body collapse">
                                                    <div class="panel-body">

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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </section>
        </div>



    </div>


    <!-- end: page -->
</section>

@include('includes.footer')