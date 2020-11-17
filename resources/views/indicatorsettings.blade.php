@include('includes.header')
@include('includes.sidebar')

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Indicator Settings</h2>

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

                    <h2 class="panel-title">Indicators For {{$sector}} <strong style="color: #bd2d29; font-size: 14px;">   <a href="#" data-target="#exampleModal" data-toggle="modal" > <i class="fa fa-plus-circle"> </i> Click to Add Indicator</a></strong></h2>

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
                                <a  href="{{url('capturedatasettings')}}" class="btn btn-block btn-primary">  << Back</a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </section>
        </div>



    </div>





    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Settings </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="{{url('valuessettings')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="year" value="{{$year}}"/>
                        <input type="hidden" name="sector" value="{{$sector}}"/>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Indicator</label>
                            <textarea type="text" rows="5"   class="form-control" name="indicator"  placeholder="" ></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required="true" name="malevariable" placeholder="Male Variable">
                        </div>
                        
                          <div class="form-group">
                            <input type="text" class="form-control" required="true" name="femalevariable" placeholder="Female Variable">
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@include('includes.footer')