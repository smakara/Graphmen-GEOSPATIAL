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

                    <h2 class="panel-title">Indicators For {{$sector}} <strong style="color: #bd2d29; font-size: 14px;"> ({{$year}})</strong></h2>
                </header>

                <div class="panel-body">
                    <form  method="POST" action="{{url('values')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                          <input type="hidden" name="year" value="{{$year}}"/>
                           <input type="hidden" name="sector" value="{{$sector}}"/>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($indicatorsArray as $indicator )
                                        <div class="panel-group" id="accordion{{$indicator->ind_id}}">
                                            <div class="panel panel-accordion">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#{{$indicator->ind_id}}">
                                                            <i class=" fa fa-question-circle"></i>  {{$indicator->ind_description}}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="{{$indicator->ind_id}}" class="accordion-body collapse">
                                                    <div class="panel-body">

                                                        <div class="form-group">

                                                            <div class="col-sm-12">
                                                                 @if(sizeof($indicator->variables)>0)
                                                                  @foreach($indicator->variables as $variable )
<!--                                                                <div class="row">-->
                                                                    <div class=" form-group col-sm-6">
                                                                        <input  name="{{$variable->var_id}}"  type="{{$variable->var_datatype}}" min="0" class="form-control" placeholder="{{$variable->var_description}}">
                                                                    </div>
                                                                    <div class="visible-xs mb-md"></div>
                                                                    
                                                                    <div class="visible-xs mb-md"></div>

                                                                <!--</div>-->
                                                                   @endforeach
                                                                @endif
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

                        <div class="form-group">
                            <div class="col-md-2">
                                <a  href="{{url('sectors')}}" class="btn btn-block btn-primary">  << Back</a>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-success"> Next >></button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
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