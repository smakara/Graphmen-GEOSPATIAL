@include('includes.header')
@include('includes.sidebar')

<section role="main" class="content-body">
    <header class="page-header">
        <h2> Statistics Settings</h2>

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

                    <h2 class="panel-title">Sectors</h2>
                </header>

                <div class="panel-body">
                    <form  method="POST" action="{{url('indicatorsettings')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <div class="col-md-12">
                                <select class="form-control input-rounded" id="sectorid" name="sectorid" required="true">
                                    <option value=''>Select Sector</option>
                                    @foreach($sectors as $sector)
                                    <option  value="{{$sector->sec_id}}">{{$sector->sec_description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <select class="form-control input-rounded" id="year" name="year" required="true"> 
                                    <option >2020</option>
                                    <option   >2019</option>
                                    <option   >2018</option>
                                    <option   >2017</option>
                                    <option   >2016</option>
                                    <option   >2015</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-block btn-primary"> Next >></button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <div class="row">




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