
@include('includes.header')
@include('includes.sidebar')


<section role="main" class="content-body">
    <header class="page-header">
        <h2>SICS -Create Business Form</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{url('sics')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>SICS</span></li>
            </ol>

            <a class="sidebar-right-toggle"></a>
        </div>
    </header>


    @if(session()->has('message'))


    <div class="alert alert-primary">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong> {{ session()->get('message') }}</strong>.
    </div>

    @endif

    @if(session()->has('error'))

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Error!</strong> 
    </div>
    @endif
    <!-- start: page -->
    <div class="row">
        <form  method="POST"   action="{{url('createbusiness')}}" class="form-horizontal form-bordered" method="get">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="col-md-6">
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">Title</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="title" id="title" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">AccountGroupCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="accountGroupCode" id="accountGroupCode" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">AccountGroupSubclassNumber</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="accountGroupSubclassNumber" id="accountGroupSubclassNumber" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">FunctionalCurrencyIsoAlpha</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="functionalCurrencyIsoAlpha" id="functionalCurrencyIsoAlpha" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">FunctionalCurrency2IsoAlpha</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="functionalCurrency2IsoAlpha" id="functionalCurrency2IsoAlpha" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">BusinessDirectionCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="businessDirectionCode" id="businessDirectionCode" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">BusinessDirectionSubclassNumber</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="businessDirectionSubclassNumber" id="businessDirectionSubclassNumber" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">TypeOfBusinessCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="typeOfBusinessCode" id="typeOfBusinessCode" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">TypeOfBusinessSubclassNumber</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="typeOfBusinessSubclassNumber" id="typeOfBusinessSubclassNumber" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">IPBeginDateTime</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control" name="IPBeginDateTime" id="IPBeginDateTime" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">IPEndDateTime</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control" name="IPEndDateTime" id="IPEndDateTime" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">IPUnderwritingYear</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="IPUnderwritingYear" id="IPUnderwritingYear" required="true">
                        </div>
                    </div>

                   

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">IPNote</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="IPNote" id="IPNote" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">IdentifierCR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="identifierCR" id="identifierCR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">RelationshipTypeCodeCR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="relationshipTypeCodeCR" id="relationshipTypeCodeCR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ReferenceCR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="referenceCR" id="referenceCR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">IdentifierRR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="identifierRR" id="identifierRR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">RelationshipTypeCodeRR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="relationshipTypeCodeRR" id="relationshipTypeCodeRR" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">RoleForCedentCodeFCRR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="roleForCedentCodeFCRR" id="roleForCedentCodeFCRR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">SubclassNumberFCRR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="subclassNumberFCRR" id="subclassNumberFCRR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">IdentifierIR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="identifierIR" id="identifierIR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">RelationshipTypeCodeIR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="relationshipTypeCodeIR" id="relationshipTypeCodeIR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ReferenceIR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="referenceIR" id="referenceIR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">IdentifierBR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="identifierBR" id="identifierBR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">RelationshipTypeCodeBR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="relationshipTypeCodeBR" id="relationshipTypeCodeBR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">BusinessAdministratorTaskCodePayBR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="businessAdministratorTaskCodePayBR" id="businessAdministratorTaskCodePayBR" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">BusinessAdministratorTaskCodeADMBR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="businessAdministratorTaskCodeADMBR" id="businessAdministratorTaskCodeADMBR" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">BusinessAdministratorTaskCodeBPAYBR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="businessAdministratorTaskCodeBPAYBR" id="businessAdministratorTaskCodeBPAYBR" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">BrokerTaskSubclassNumberBR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="brokerTaskSubclassNumberBR" id="brokerTaskSubclassNumberBR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">CreditTermDurationUnitCodeBR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="creditTermDurationUnitCodeBR" id="creditTermDurationUnitCodeBR" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">CreditTermDurationValueBR</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="creditTermDurationValueBR" id="creditTermDurationValueBR" required="true">
                        </div>
                    </div>





                </div>
            </div>

            <div class="col-md-6">
                <div class="panel-body">


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">RefAgreementLifeCycleStatusCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="refAgreementLifeCycleStatusCode" id="refAgreementLifeCycleStatusCode" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">CurrencyIsoAlpha</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="currencyIsoAlpha" id="currencyIsoAlpha" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">IncludedCountriesIsoAlpha3</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="includedCountriesIsoAlpha3" id="includedCountriesIsoAlpha3" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">IncludedRefDataCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="includedRefDataCode" id="includedRefDataCode" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">ReportingUnitCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="reportingUnitCode" id="reportingUnitCode" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">WrittenSharePercent</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="writtenSharePercent" id="writtenSharePercent" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">OfferedSharePercent</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="offeredSharePercent" id="offeredSharePercent" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">DedBrokerageCondNote</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dedBrokerageCondNote" id="dedBrokerageCondNote" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">DedBrokerageCondDeductionTypeCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dedBrokerageCondDeductionTypeCode" id="dedBrokerageCondDeductionTypeCode" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">DedBrokerageCondCalculationMethodCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dedBrokerageCondCalculationMethodCode" id="dedBrokerageCondCalculationMethodCode" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">DedBrokerageCondPercent</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dedBrokerageCondPercent" id="dedBrokerageCondPercent" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">DedCommCondNote</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dedCommCondNote" id="dedCommCondNote" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">DedCommCondDeductionTypeCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dedCommCondDeductionTypeCode" id="dedCommCondDeductionTypeCode" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">DedCommCondCalculationMethodCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dedCommCondCalculationMethodCode" id="dedCommCondCalculationMethodCode" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">DedOtherCondCurrencyIsoAlpha</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dedOtherCondCurrencyIsoAlpha" id="dedOtherCondCurrencyIsoAlpha" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">DedOtherCondComment</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="dedOtherCondComment" id="dedOtherCondComment" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">LimPremCondCurrencyIsoAlpha</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondCurrencyIsoAlpha" id="limPremCondCurrencyIsoAlpha  " required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">LimPremCondIsOriginal</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondIsOriginal" id="limPremCondIsOriginal" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limPremCondRefConditionPerCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondRefConditionPerCode" id="limPremCondRefConditionPerCode" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limPremCondCurrencyIsoAlpha</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondCurrencyIsoAlpha" id="limPremCondCurrencyIsoAlpha" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limPremCondRefOptionalFieldCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondRefOptionalFieldCode" id="limPremCondRefOptionalFieldCode" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limPremCondRefLimitTypeCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondRefLimitTypeCode" id="limPremCondRefLimitTypeCode" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limPremCondAmount</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondAmount" id="limPremCondAmount" required="true">
                        </div>
                    </div>





                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limLimitPremiumCurrencyIsoAlpha</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondCurrencyForLimitPremiumCurrencyIsoAlpha" id="limPremCondCurrencyForLimitPremiumCurrencyIsoAlpha" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limLimitPremiumMinimumHundredPercent</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondCurrencyForLimitPremiumMinimumHundredPercent" id="limPremCondCurrencyForLimitPremiumMinimumHundredPercent" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">CondInstalmentConditionCurrencyIsoAlpha</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondInstalmentConditionCurrencyIsoAlpha" id="limPremCondInstalmentConditionCurrencyIsoAlpha" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limConditionNumberOfInstalments</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondInstalmentConditionNumberOfInstalments" id="limPremCondInstalmentConditionNumberOfInstalments" required="true">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limFirstInstalmentUnitCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondPaymentOfFirstInstalmentUnitCode" id="limPremCondPaymentOfFirstInstalmentUnitCode" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limInstalmentUnitSubclassNumber</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondPaymentOfFirstInstalmentUnitSubclassNumber" id="limPremCondPaymentOfFirstInstalmentUnitSubclassNumber" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limInstalmentValue</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondPaymentOfFirstInstalmentValue" id="limPremCondPaymentOfFirstInstalmentValue" required="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limPInstalmentUnitCode</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondPaymentOfSubsequentInstalmentUnitCode" id="limPremCondPaymentOfSubsequentInstalmentUnitCode" required="true">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-5 control-label" for="inputDefault">limInstalmentUnitSubclassNumber</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="limPremCondPaymentOfSubsequentInstalmentUnitSubclassNumber" id="limPremCondPaymentOfSubsequentInstalmentUnitSubclassNumber" required="true">
                        </div>
                    </div>



                    <div class=" form-group col-md-12 text-right">

                        <button  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
                        <button type="submit" class="btn btn-primary modal-confirm">Submit</button>

                    </div>

                </div>


            </div>


        </form>
    </div>




    <!-- end: page -->
</section>



@include('includes.footer')
