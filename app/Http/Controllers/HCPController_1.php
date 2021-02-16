<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use GuzzleHttp\Client;

class HCPController extends Controller {

    public function login(Request $request) {


        $db = DB::table("w_users")
                ->where("w_user_Logon", $request->username)
                ->where("w_user_Password", $request->password)
                ->get();
//        return $db ;

        if (sizeof($db) == 1) {

            $details = DB::table("w_users")
                    ->where("w_user_Logon", $request->username)
                    ->where("w_user_Password", $request->password)
                    ->first();

            $role = "";
            if ($details->w_admin == "1") {
                $role = "Administrator";
            } else {
                $role = "User";
            }

            session([
                'user' => $details,
                'username' => $details->w_user_Name,
                'role' => $role
            ]);
//
//
            $data = array(
                'redirect' => 'home'
            );

            Log::info('login details: ' . $details->w_user_Logon);
//            return self::home();
            return redirect('/home');
        } else {

            return view('login');
        }
    }

    public function home() {


        $data = array(
            'members' => []
        );
        return view('createbusiness', $data);
    }

    public function principalprofile($id) {


        $a_principles = DB::table('a_principles')
                ->where('a_principleID', $id)
                ->first();

        $g_beneficiaries = DB::table('g_beneficiaries')
                ->where('g_principleID', $id)
                ->get();

        $n_transactions = DB::table('n_transactions')
                ->where('n_principleID', $id)
                ->get();

        $data = array(
            'principles' => $a_principles,
            'beneficiaries' => $g_beneficiaries,
            'transactions' => $n_transactions
        );
//        return $data;
        return view('principalprofile', $data);
    }

    public function agents() {

        $data = array(
            'agents' => []
        );
//        return $data;
        return view('agents', $data);
    }

    public function addagent(Request $request) {
        date_default_timezone_set('Africa/Harare');


        $d_agents = DB::table('d_agents')
                ->where('d_email', $request->email)
                ->Orwhere('d_mobile', $request->phone)
                ->get();

        if (sizeof($d_agents) == 0) {

            $a_principles = DB::table('d_agents')->insertGetId([
                "d_name" => $request->name . " " . $request->name,
                "d_email" => $request->email,
                "d_mobile" => $request->phone,
                "d_commission" => $request->commission,
                "d_premium" => 0,
                "d_premium_child" => 0,
            ]);

            $a_principles = DB::table('da_agent_login')->insertGetId([
                "da_name" => $request->name . " " . $request->name,
                "da_email" => $request->email,
                "da_agentID" => $a_principles,
                "da_mobile" => $request->phone,
                "da_password" => "default",
                "da_admin" => 0,
                "da_active" => 1,
                "da_LastLogon" => date("Y-m-d G:i:s", time())
            ]);
        }


        return self::agents();
    }

    public function searchagent(Request $request) {
        self::sessionEx();

        $details = DB::table("d_agents")
                ->where('d_name', 'LIKE', "%" . $request->searchagent . "%")
                ->orWhere('d_email', 'LIKE', "%" . $request->searchagent . "%")
                ->orWhere('d_mobile', 'LIKE', "%" . $request->searchagent . "%")
                ->get();

        $data = array(
            'agents' => $details
        );
//        return $data;
        return view('agents', $data);
    }

    public function agentprofile($id) {
        date_default_timezone_set('Africa/Harare');
        $d_agents = DB::table('d_agents')
                ->where('d_agentID', $id)
                ->first();


        $date = "(" . " " . Carbon::now()->startOfMonth()->format('d-M-yy') . " - " . Carbon::now()->format('d-M-yy') . " )";

        $from = Carbon::now()->startOfMonth()->format('yy-m-d H:m:s.i');
        $todate = Carbon::now()->format('yy-m-d H:m:s.i');

        $agentcommissionlist = DB::select("Select
    Sum(m_credits.m_amount) As m_amount1,
    m_credits.m_principleID As m_principleID1,
    a_principles.a_firstname,
    a_principles.a_surname,
    m_credits.m_date_created,
    a_principles.a_agentID
From
    a_principles Inner Join
    m_credits On a_principles.a_principleID = m_credits.m_principleID
Where
    m_credits.m_date_created Between '$from' And '$todate' And
    a_principles.a_agentID = '$id'
Group By
    m_credits.m_principleID,
    a_principles.a_firstname,
    a_principles.a_surname,
    m_credits.m_date_created,
    a_principles.a_agentID");


        $totalcredits = 0;
        foreach ($agentcommissionlist as $data) {
            $totalcredits = $data->m_amount1 + $totalcredits;
        };


        $commission = ($d_agents->d_commission / 100) * $totalcredits;


        $data = array(
            'agent' => $d_agents,
            "date" => $date,
            "commission" => $commission,
            "totalcredits" => $totalcredits,
            "agentcommissionlist" => $agentcommissionlist,
            "commpercentage" => $d_agents->d_commission
        );
//        return $data;
        Log::info(session()->get('user')->w_user_Logon . ' viewed agent profile: ' . $d_agents->d_name . " at " . Carbon::now()->format('d-M-yy H:m:s'));
        return view('agentprofile', $data);
    }

    public function reports() {

        return view('reports');
    }

    public function vreports() {
        return view('vreports');
    }

    public function files() {


        $filesArray = Array();
        foreach (\Illuminate\Support\Facades\Storage::files('flexcube') as $filename) {
            $file = \Illuminate\Support\Facades\Storage::get($filename);
        }
        $path = public_path('flexcube');

        $files = \Illuminate\Support\Facades\File::allFiles($path);


        foreach ($files as $f) {

            $fileInfo = new \SplFileInfo($f);
//            echo $fileInfo->ge
        }
        return view('home');
    }

    public function searchmember(Request $request) {

        self::sessionEx();
        $details = DB::table("a_principles")
                ->where('a_firstname', 'LIKE', "%" . $request->searchmember . "%")
                ->orWhere('a_surname', 'LIKE', "%" . $request->searchmember . "%")
                ->orWhere('a_IDNumber', 'LIKE', "%" . $request->searchmember . "%")
                ->orWhere('a_mobile', 'LIKE', "%" . $request->searchmember . "%")
                ->orWhere('a_account', 'LIKE', "%" . $request->searchmember . "%")
                ->get();

        $data = array(
            'members' => $details
        );
// return $data;
        return view('home', $data);
        return $data;
    }

    public function registermember(Request $request) {
        date_default_timezone_set('Africa/Harare');
        self::sessionEx();
        $productArray = array();
//"product=hcp&product=fcp"

        if (strpos($request->product, 'hcp') !== false) {
            $productID = DB::table('e_assurance_types')
                    ->where('e_name', "Hospital Cash Plan")
                    ->first();
            array_push($productArray, $productID->e_assurance_typeID);
        }

        if (strpos($request->product, 'fcp') !== false) {
            $productID = DB::table('e_assurance_types')
                    ->where('e_name', "Funeral Cash Plan")
                    ->first();
            array_push($productArray, $productID->e_assurance_typeID);
        }

        /*
          todo list
          validate phone number
         * validate natid
         * validate dob          */

        try {
            DB::beginTransaction();
            $a_principles = DB::table('a_principles')->insertGetId([
                "a_firstname" => $request->fname,
                "a_surname" => $request->surname,
                "a_IDNumber" => $request->natid,
                "a_male_female" => $request->gender,
                "a_languageID" => "1",
                "a_address1" => $request->address,
                "a_address2" => $request->email,
                "a_city_town" => $request->city,
                "a_mobile" => $request->phone,
                "a_account" => "EE12345",
                "a_branchID" => 1,
                "a_agentID" => 0,
                "a_birthdate" => date("Y-m-d G:i:s", time()),
                "a_assurance_typeID" => 1

//
            ]);



            if (isset($request->dependentArray)) {
                foreach ($request->dependentArray as $data) {

                    $g_beneficiaries = DB::table('g_beneficiaries')->insertGetId([
                        "g_firstname" => $data['dname'],
                        "g_surname" => $data['dsurname'],
                        "g_other_name" => "",
                        "g_IDNumber" => "0000",
                        "g_male_female" => "1",
                        "g_beneficiary_typeID" => 1,
                        "g_principleID" => $a_principles,
                        "g_birthdate" => Carbon::createFromFormat("Y-m-d G:i:s", $data['ddob'] . " " . "00:00:00"),
                        "g_premium" => "0",
                        "g_status" => 1,
                        "g_date" => date("Y-m-d G:i:s", time())
                    ]);
                }
            }


            if (sizeof($productArray) > 0) {

                for ($i = 0; $i < sizeof($productArray); $i++) {

                    DB::table('principles_assurance')->insertGetId([
                        "pa_assurance_typeID" => $a_principles,
                        "pa_principleID" => $productArray[$i]
                    ]);
                }
            }


            DB::commit();
        } catch (Exception $exc) {
            DB::rollBack();

            echo $exc->getTraceAsString();
        }

//{"dependentArray":
//    [{"dname":"zazazu","dsurname":"moyo","ddob":"2020-10-08","drelationship":"son"}],
//            "address":"fff","city":"fff","fname":"ss","surname":"ss","natid":"ss","phone":"ss","email":"ss@gmail.com",
//            "gender":"Male","dob":"2020-10-29"}
//        {"dependentArray":[{"dname":"dff","dsurname":"dd","ddob":"2020-11-04","dgender":"1","dbeneficiarytype":"2"}],
//        "product":"product=fcp","address":"dd","city":"dd",
//        "fname":"ww","surname":"ww","natid":"ww","phone":"ww","email":"ww@yahh.com",
//        "gender":"1","dob":"2020-11-03"}



        $data = array(
            'principles' => $a_principles,
            '$request' => $request
        );
        return $data;
    }

    public function transactions() {
        
    }

    public function products() {
        $assurance_types = DB::table('e_assurance_types')
                ->get();


        $data = array(
            'products' => $assurance_types,
            'members' => []
        );
        return view('products', $data);
    }

    public function sessionEx() {

//        if ((time() - \Symfony\Component\HttpFoundation\Session\Session::activity()) > (Config::get('session.lifetime') * 60)) {
//            // Session expired
//            return view("login");
//            ;
//        }
    }

    public function addDependantToPrincipal(Request $request) {



        $g_beneficiaries = DB::table('g_beneficiaries')
                ->where('g_firstname', $request->name)
                ->where('g_surname', $request->surname)
                ->get();

        if (sizeof($g_beneficiaries) == 0) {

            $g_beneficiaries = DB::table('g_beneficiaries')->insertGetId([
                "g_firstname" => $request->name,
                "g_surname" => $request->surname,
                "g_other_name" => "",
                "g_IDNumber" => "0000",
                "g_male_female" => $request->gender,
                "g_beneficiary_typeID" => $request->dbeneficiarytype,
                "g_principleID" => $request->a_principleID,
                "g_birthdate" => Carbon::createFromFormat("Y-m-d G:i:s", $request->dob . " " . "00:00:00"),
                "g_premium" => "0",
                "g_status" => 1,
                "g_date" => date("Y-m-d G:i:s", time())
            ]);
        }

        return self:: principalprofile($request->a_principleID)->with('message', 'IT WORKS!');
        ;
    }

    public function editDependantByPrincipal(Request $request) {

        $g_beneficiaries = DB::table('g_beneficiaries')
                ->where('g_beneficiaryID', $request->id)
                ->first();

        $data = array(
            'g_beneficiaries' => $g_beneficiaries
        );
        return $data;
    }

    public function deleteDependantByPrincipal(Request $request) {

        if (sizeof($g_beneficiaries) > 1) {

            DB::table('g_beneficiaries')->where('g_beneficiaryID', $request->id)->delete();
        }

        $data = array(
            'g_beneficiaries' => "success"
        );
        return $data;
    }

    public function editdependant(Request $request) {

        date_default_timezone_set('Africa/Harare');
        DB::table('g_beneficiaries')
                ->where('g_beneficiaryID', $request->g_beneficiaryID)
                ->update([
                    "g_firstname" => $request->ename,
                    "g_surname" => $request->esurname,
                    "g_male_female" => $request->egender,
                    "g_beneficiary_typeID" => $request->edbeneficiarytype,
                    "g_birthdate" => Carbon::createFromFormat("Y-m-d G:i:s", $request->edob . " " . "00:00:00")
        ]);

        return self::principalprofile($request->a_principleID);
    }

    public function loadLogin() {

        return view('login');
    }

    public function editAgent(Request $request) {


        $d_agents = DB::table("d_agents")
                ->where('d_agentID', $request->id)
                ->first();

        $data = array(
            'agent' => $d_agents
        );

        return $data;
    }

    public function editagentdata(Request $request) {

        try {
            DB::table('d_agents')
                    ->where('d_agentID', $request->d_agentID)
                    ->update([
                        "d_name" => $request->eaname,
                        "d_email" => $request->eaemail,
                        "d_mobile" => $request->eaphone,
                        "d_commission" => $request->eacommission,
                        "d_city_town" => $request->eacity
            ]);
            Log::info('user: ' . session()->get('user')->w_user_Logon);
            Log::info('function : editagentdata');
            Log::info('editagentdata details: ' . session()->get('user')->w_user_Logon);
        } catch (Exception $exc) {
            Log::error('edit error ====> fuction editagentdata: ' . session()->get('user')->w_user_Logon);
            echo $exc->getTraceAsString();
        }





        return self::agents();
    }

    public function sics() {

        return view('sics');
    }

    public function createclaim(Request $request) {



        $url = 'http://10.170.4.30:9099/claim/web/create';
//
//
// Create a new cURL resource
        $ch = curl_init($url);


        $data = array(
            'scopeOfCoverReferenceIdentifier' => $request->scopeOfCoverReferenceIdentifier,
            'scopeOfCoverReferenceBeginDateTime' => $request->scopeOfCoverReferenceBeginDateTime,
            'scopeOfCoverReferenceSequenceNumber' => "1",
            'scopeOfCoverReferenceName' => "Main Section",
            'claimLossName' => "CAL",
            'claimPartialLossStartingDateVersionNumber' => "1",
            'claimPartialLossStartingDateVersionDay' => $request->claimPartialLossStartingDateVersionDay,
            'claimPartialLossStartingDateVersionMonth' => $request->claimPartialLossStartingDateVersionMonth,
            'claimPartialLossStartingDateVersionYear' => $request->claimPartialLossStartingDateVersionYear,
            'claimsTriggerCode' => "CLMMADE",
            'claimsTriggerSubclassNumber' => "1019",
            'claimsTriggerSubclassDate' => $request->claimsTriggerSubclassDate,
            'recoveryCalculationIsClaimIncluded' => "false",
            'claimTypeCode' => $request->claimTypeCode,
            'claimTypeSubclassNumber' => "527",
            'scopeOfCoverRelationClaimAdvisedDate' => $request->scopeOfCoverRelationClaimAdvisedDate,
            'scopeOfCoverRelationClaimStatusCode' => "O",
            'scopeOfCoverRelationClaimStatusSubclassNumber' => "517",
            'claimDispositionDateOfChange' => $request->claimDispositionDateOfChange,
            'claimDispositionCode' => "A",
            'claimDispositionSubclassNumber' => "515"
        );
        $payload = json_encode(array("claimBusiness" => $data));

// Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
        $result = curl_exec($ch);
//        echo ">>>>>>>>>> " . json_decode($result, true)['responseDesc'];
//        echo ">>>>>>>>>> " . json_decode($result, true)['claimIdentifier'];
//        echo ">>>>>>>>>> " . json_decode($result, true)['responseCode'];
// Close cURL res;ource
        curl_close($ch);


        if (json_decode($result, true)['responseDesc'] == "success") {

            return redirect()->back()->with('message', 'successfully added ,claimIdentifier: ' . json_decode($result, true)['claimIdentifier']);
        }

        if (json_decode($result, true)['responseCode'] == "01") {

            return redirect()->back()->with('error', json_decode($result, true)['responseDesc']);
        }
    }

    public function createbusiness() {


        return view('createbusiness');
    }

    public static function createbusinessPost(Request $request) {




        $startDate = $request->startdate;
        $enddate = $request->enddate;
//        $url = 'http://10.170.4.30:9099/business/web/create';
        $url = 'localhost:9099/business/web/create';
        $ch = curl_init($url);
        $data = array(
            'title' => $request->title,
            'accountGroupCode' => "BETA",
            'accountGroupSubclassNumber' => "225",
            'functionalCurrencyIsoAlpha' => "ZWL",
            'functionalCurrency2IsoAlpha' => "ZWL",
            'businessDirectionCode' => $request->businessDirectionCode,
            'businessDirectionSubclassNumber' => "45",
            'typeOfBusinessCode' => $request->typeOfBusinessCode,
            'typeOfBusinessSubclassNumber' => "46",
//            'iPBeginDateTime' => "2020-01-01T00:00:0000:00",
//            'iPEndDateTime' => "2020-12-31T23:59:5900:00",
            'iPBeginDateTime' => $startDate,
            'iPEndDateTime' => $enddate,
            'iPUnderwritingYear' => $request->IPUnderwritingYear,
            'iPNote' => "insuredPeriodNotes",
            'identifierCR' => $request->identifierCR,
            'relationshipTypeCodeCR' => "CR",
            'referenceCR' => "55",
            'identifierRR' => "A229",
            'relationshipTypeCodeRR' => "RR",
            'roleForCedentCodeFCRR' => "FC",
            'subclassNumberFCRR' => "76",
            'identifierIR' => $request->identifierIR,
            'relationshipTypeCodeIR' => "IR",
            'referenceIR' => "REF",
            'identifierBR' => "A802",
            'relationshipTypeCodeBR' => "BR",
            'businessAdministratorTaskCodePayBR' => "PAY",
            'businessAdministratorTaskCodeADMBR' => "ADM",
            'businessAdministratorTaskCodeBPAYBR' => "BPAY",
            'brokerTaskSubclassNumberBR' => "75",
            'creditTermDurationUnitCodeBR' => "D",
            'creditTermDurationValueBR' => "45",
            'currencyIsoAlpha' => "ZWL",
            'includedCountriesIsoAlpha3' => "ZWE",
            'includedRefDataCode' => "FI",
            'reportingUnitCode' => "HRE",
            'writtenSharePercent' => "100",
            'offeredSharePercent' => "100",
            'dedBrokerageCondNote' => "Brokerage",
            'dedBrokerageCondDeductionTypeCode' => "BRO",
            'dedBrokerageCondCalculationMethodCode' => "PERCENT",
            'dedBrokerageCondPercent' => "2",
            'dedCommCondNote' => "Commission",
            'dedCommCondDeductionTypeCode' => "COMM",
            'dedCommCondCalculationMethodCode' => "PERCENT",
            'dedOtherCondCurrencyIsoAlpha' => "ZWL",
            'dedOtherCondComment' => "Additionalcharges",
            'limPremCondCurrencyIsoAlpha' => "ZWL",
            'limPremCondIsOriginal' => "False",
            'limPremCondRefConditionPerCode' => "TOTAL_SUM",
            'limPremCondRefOptionalFieldCode' => "MAIN_L",
            'limPremCondRefLimitTypeCode' => "ANNUAL",
            'refAgreementLifeCycleStatusCode' => "OA",
            'limPremCondAmount' => $request->limPremCondAmount,
            'limPremCondCurrencyForLimitPremiumCurrencyIsoAlpha' => "ZWL",
            'limPremCondCurrencyForLimitPremiumMinimumHundredPercent' => $request->limPremCondCurrencyForLimitPremiumMinimumHundredPercent,
            'limPremCondInstalmentConditionCurrencyIsoAlpha' => "ZWL",
            'limPremCondInstalmentConditionNumberOfInstalments' => $request->limPremCondInstalmentConditionNumberOfInstalments,
            'limPremCondPaymentOfFirstInstalmentUnitCode' => "D",
            'limPremCondPaymentOfFirstInstalmentUnitSubclassNumber' => "69",
            'limPremCondPaymentOfFirstInstalmentValue' => "45",
            'limPremCondPaymentOfSubsequentInstalmentUnitCode' => "D",
            'limPremCondPaymentOfSubsequentInstalmentUnitSubclassNumber' => "69"
        );




        $payload = json_encode(array("createBusiness" => $data));

// Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
        $result = curl_exec($ch);
//        echo ">>>>>>>>>> " . json_decode($result, true)['responseDesc'];
//        echo ">>>>>>>>>> " . json_decode($result, true)['claimIdentifier'];
//        echo ">>>>>>>>>> " . json_decode($result, true)['responseCode'];
// Close cURL res;ource
        curl_close($ch);




        if (json_decode($result, true)['responseDesc'] == "success") {

            return redirect()->back()->with('message', 'successfully created bussiness ,transactionRef: ' . json_decode($result, true)['transactionRef']);
        }

        if (json_decode($result, true)['responseCode'] == "01") {

            return redirect()->back()->with('error', json_decode($result, true)['responseDesc']);
        }
    }

    function addProduct(Request $request) {

        try {

            $data = DB::table('e_assurance_types')
                    ->where('e_name', $request->product_name)
                    ->get();


            if (sizeof($data) == 0) {

                $e_assurance_typeID = DB::table('e_assurance_types')->insertGetId([
                    "e_name" => $request->product_name,
                    "e_premium" => $request->premium,
                    "e_waiting_period" => $request->waitingperiod,
                    "e_currency" => $request->product_currency,
                    "e_prem_contri_type" => $request->prem_contri_type,
                    "e_premium_frequency" => $request->prem_freq,
                    "e_desc" => $request->product_desc,
                    "e_premium_child" => $request->childpremium,
                ]);


                session([
                    'user' => $details,
                    'username' => $details->w_user_Name,
                    'role' => $role
                ]);

                Log::info('Product: ' . $request->product_name . " Added by " . session()->get('user')->w_user_Logon);

                $data = array(
                    'data' => "success"
                );
                return $data;
            } else {

                $data = array(
                    'data' => "Product already exists"
                );
                return $data;
            }
        } catch (Exception $exc) {
            Log::error('add Product function error : ' . $exc);
        }
    }

    public function viewProduct(Request $request) {


        $e_assurance_types = DB::table('e_assurance_types')
                ->where('e_assurance_typeID', $request->id)
                ->first();

        $data = array(
            'productDetails' => $e_assurance_types
        );

        Log::info('Product details: ' . $e_assurance_types->e_name . " Viewed by " . session()->get('user')->w_user_Logon);
        return $data;
    }

}

//        $client = new Client();
//        $response = $client->request('GET', 'http://localhost:9099/business/test');
//        $statusCode = $response->getStatusCode();
//        $body = $response->getBody()->getContents();
//
//        return $body;
//        $response = $client->request('POST', 'http://localhost:9099/business/testpost', [
//                'form_params' => [
//                'field_name' => 'abc',
//                'other_field' => '123',
//            ]
//        ]);
        // A sample PHP Script to POST data using cURL








//        $endpoint = 'http://localhost:9099/business/testpost';
//        $options = [
//            'headers' => [
//                'Content-Type' => 'application/json',
//                'Accept' => 'application/json'],
//            'json' => [
//                'field1' => $aaa,
//                'field2' => "ujjhhnbg",],
//        ];
//
//        $client = new Client();
//        $client->post($endpoint, $options);
//
//
//        dd($request);
