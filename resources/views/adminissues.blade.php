@include('includes.header')
@include('includes.sidebar')



<section role="main" class="content-body">
    <header class="page-header">
        <h2> Travel Requests</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>All Requests</span></li>
            </ol>

            <a class="sidebar-right-toggle" ><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">All Requests</h2>
        </header>
        <div class="panel-body">
            
             <table class="table table-responsive-sm table-hover table-striped table-outline mb-none" id="datatable-tabletools">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            <i class="icon-people"></i>
                                        </th>

                                        <th>From</th>
                                        <th>Subject</th>
                                        <th></th>
                                        <th class="text-center"></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($issues as $data)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{url('/myissue_admin/'.$data->iss_id)}}"> {{$data->iss_id}}</a>
                                        </td>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <span class="avatar-status badge-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            {{$data->iss_from}}
                                        </td>
                                        <td>
                                            <div> <strong>{{$data->iss_subject}}</strong></div>
                                            <div class="small text-muted">
                                                <span  class="label bg-danger">Assigned to</span> | {{$data->name}} {{$data->surname}}</div>
                                        </td>

                                        <td>
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <small class="text-muted"> Issue Progress</small>
                                                </div>

                                            </div>

                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{$data->iss_date}}
                                        </td>
                                        
                                        @if($data->iss_status!="Rejected")
                                        <td class="text-center">
                                            <div class="pull-right">
                                                
                                                <span class="label label-success"> {{$data->iss_status}}</span>
                                            </div>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <div class="pull-right">
                                                
                                                <span class="label label-danger"> {{$data->iss_status}}</span>
                                            </div>
                                        </td>
                                        @endif
                                        
                                        

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
<!--            <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                <thead>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th class="hidden-phone">Engine version</th>
                        <th class="hidden-phone">CSS grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td class="center hidden-phone">4</td>
                        <td class="center hidden-phone">X</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0
                        </td>
                        <td>Win 95+</td>
                        <td class="center hidden-phone">5</td>
                        <td class="center hidden-phone">C</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5
                        </td>
                        <td>Win 95+</td>
                        <td class="center hidden-phone">5.5</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 6
                        </td>
                        <td>Win 98+</td>
                        <td class="center hidden-phone">6</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Trident</td>
                        <td>Internet Explorer 7</td>
                        <td>Win XP SP2+</td>
                        <td class="center hidden-phone">7</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Trident</td>
                        <td>AOL browser (AOL desktop)</td>
                        <td>Win XP</td>
                        <td class="center hidden-phone">6</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 1.0</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center hidden-phone">1.7</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 1.5</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 2.0</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 3.0</td>
                        <td>Win 2k+ / OSX.3+</td>
                        <td class="center hidden-phone">1.9</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                        <td>Gecko</td>
                        <td>Mozilla 1.7</td>
                        <td>Win 98+ / OSX.1+</td>
                        <td class="center hidden-phone">1.7</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.8</td>
                        <td>Win 98+ / OSX.1+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Seamonkey 1.1</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Epiphany 2.20</td>
                        <td>Gnome</td>
                        <td class="center hidden-phone">1.8</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>Safari 1.2</td>
                        <td>OSX.3</td>
                        <td class="center hidden-phone">125.5</td>
                   
                    
                   
                   
                    
                    
                    
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Nokia N800</td>
                        <td>N800</td>
                        <td class="center hidden-phone">-</td>
                        <td class="center hidden-phone">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td class="center hidden-phone">8.5</td>
                        <td class="center hidden-phone">C/A<sup>1</sup></td>
                    </tr>
                    <tr class="gradeC">
                        <td>KHTML</td>
                        <td>Konqureror 3.1</td>
                        <td>KDE 3.1</td>
                        <td class="center hidden-phone">3.1</td>
                        <td class="center hidden-phone">C</td>
                    </tr>
                    <tr class="gradeA">
                        <td>KHTML</td>
                        <td>Konqureror 3.3</td>
                        <td>KDE 3.3</td>
                        <td class="cen  </tr>
                   
                  
                    
                </tbody>
            </table>-->
        </div>
    </section>

  
    
</section>



<!--<main class="main">
     Breadcrumb
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a href="{{url('/allrequests')}}">All Requests</a>
        </li>

    </ol>
    

    <div class="container-fluid">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">All Requests</div>
                        <div class="card-body">
                             /.row
                            <br>
                           
                        </div>
                    </div>
                </div>
                 /.col
            </div>
             /.row
        </div>
    </div>
</main>-->

@include('includes.footer')