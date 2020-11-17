
@include('includes.header')
@include('includes.sidebar')


<section role="main" class="content-body">
    <header class="page-header">
        <h2>Products Setup</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                   <a href="{{url('home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Products Setup</span></li>
            </ol>

            <a class="sidebar-right-toggle" ></a>
        </div>
    </header>



    <!-- start: page -->
    <div class="row">

        <div class="col-md-6 col-lg-6 col-xl-6">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Products Setup</h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-md">
                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">Add Product <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>


                    <table id="adddependantTbl" class="table table-striped mb-none">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($products as  $data)
                            <tr class="gradeX">
                                <td><a href="">{{$data->e_assurance_typeID}}</a></td>
                                <td>{{$data->e_name}} </td>
                                <td class="actions">
                                    <a href="" onclick="deleteProduct('{{$data->e_name}}');" class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            </tr>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="col-md-12">

                <div data-collapsed="0" class="panel">

                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="panel-actions">
                                <a href="#" class="fa fa-caret-down"></a>
                                <a href="#" class="fa fa-times"></a>
                            </div>

                            <h2 class="panel-title">Product Details</h2>
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="row">


                            <div class="col-md-12 form-group">
                                <input type="text" disabled="true" class="form-control" value="Hospital Cash Plan">
                            </div>
                            <div class="col-md-6 form-group">
                                <select class="form-control input-sm mb-md">
                                    <option>--Select Currency--</option>
                                    <option>ZWL</option>
                                </select>
                            </div>

                          
                            
                            
                             <div class="col-md-6 form-group">
                               <select class="form-control input-sm mb-md">
                                    <option>--Prem/Contribution Type --</option>
                                    <option>Fixed</option>
                                     <option>Percentage</option>
                                </select>

                            </div>
                            
                            
                              <div class="col-md-12 form-group">
                               <select class="form-control input-sm mb-md">
                                    <option>--Premium Frequency --</option>
                                    <option>Monthly</option>
                                     <option>Quarterly</option>
                                     <option>Half yearly</option>
                                     <option>Annualy; in advance</option>
                                </select>

                            </div>

                            <div class="col-md-12">
                                <div class="input-group mb-md">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success
                                                " type="button">Months</button>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Waiting Period">
                                </div>


                            </div>


                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>




    <!-- end: page -->
</section>


<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Product Name:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Description:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
