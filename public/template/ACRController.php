<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ACRController extends Controller {

    public function login(Request $request) {

        $db = DB::table('users')
                ->where('username', '=', $request->username)
                ->where('password', '=', $request->password)
                ->get();



        if (sizeof($db) == 1) {

            $details = DB::table('users')
                    ->join('persons', 'persons.id', '=', 'users.person_id')
                    ->where('username', '=', $request->username)
                    ->where('password', '=', $request->password)
                    ->first();

            session([
                'firstname' => ($details->name),
                'surname' => ($details->surname),
                'userid' => ($details->users_id),
                'role' => ($details->role),
                'personid' => strtoupper($details->id),
                'user' => $details
            ]);


            $data = array(
                'redirect' => 'home'
            );

//            return response()->json($data);
            return self::home();
        } else {

            return view('login');
        }
    }

    public function home() {

        $personid = session('personid');
        $role = session('role');

        if ($role == "Administrator") {

            $accepted = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Accepted')");

            $rejected = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Rejected')");

            $Pending = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Pending')");


            $issues = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues");

            $percent = (sizeof($accepted) / sizeof($issues)) * 100;

            $data = array(
                "issues" => sizeof($issues),
                "percent" => $percent,
                "rejected" => sizeof($rejected),
                "accepted" => sizeof($accepted),
                "pending" => sizeof($Pending)
            );

            return view('home', $data);
        } else {

            $accepted = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Accepted') AND iss_from_personid ='$personid'");

            $rejected = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Rejected') AND iss_from_personid ='$personid'");

            $Pending = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Pending') AND iss_from_personid ='$personid'");


            $issues = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues");

            $percent = (sizeof($accepted) / sizeof($issues)) * 100;

            $data = array(
                "issues" => sizeof($issues),
                "percent" => $percent,
                "rejected" => sizeof($rejected),
                "accepted" => sizeof($accepted),
                "pending" => sizeof($Pending)
            );

            return view('home', $data);
        }
    }

    public function myrequests() {

        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_from_personid')
                ->where('iss_from_personid', "=", session('personid'))
                ->get();

        $data = array(
            "issues" => $issue
        );

//        return $data;

        return view('myrequests', $data);
    }

    public function sectors() {

        $users = DB::table('users')
                ->join('persons', 'persons.id', '=', 'users.person_id')
                ->get();

        $sectors = DB::table('sectors')
                ->where('status', 1)
                ->get();

//        return  $users;
        $data = array(
            "users" => $users,
            "sectors" => $sectors
        );
        return view('sectors', $data);
    }

    public function agents() {

        $users = DB::table('users')
                ->join('persons', 'persons.id', '=', 'users.person_id')
                ->get();

        $districts = DB::table('districts')
                ->OrderBy("district", "ASC")
                ->get();

//        return  $users;
        $data = array(
            "users" => $users,
            "districts" => $districts
        );
        return view('agents', $data);
    }

    public function compose(Request $request) {


        date_default_timezone_set('Africa/Harare');
        DB::table('isssues')->insert([
            "iss_from" => session('firstname') . " " . session('surname'),
            "iss_subject" => $request->issuesubject,
            "iss_desc" => $request->iss_desc,
            "iss_status" => "Pending",
            "iss_assignedto" => 0,
            'iss_date' => date("Y-m-d G.i:s", time()),
            'iss_from_personid' => session('personid'),
            "iss_progress" => 0
        ]);

        return self::myrequest();
    }

    public function getissue($id) {


        $issue = DB::table('isssues')
                ->where('iss_id', "=", $id)
                ->first();

        $users = DB::table('users')
                ->join('persons', 'persons.id', '=', 'users.person_id')
                ->get();

        $assignedto = DB::table('persons')
                ->where('id', '=', $issue->iss_assignedto)
                ->first();

        $sum = DB::table('est_expenses')
                ->join('isssues', 'isssues.iss_id', '=', 'est_expenses.ee_issueid')
                ->where('isssues.iss_id', '=', $id)
                ->sum('est_expenses.ee_estcost');

        $timeline = DB::table('issue_history')
                ->join('persons', 'persons.id', '=', 'issue_history.ih_assignedto')
                ->where('issue_history.ih_issueid', '=', $id)
                ->OrderBy('ih_id', 'DESC')
                ->get();

        $aray = explode(" ", $issue->iss_from);
        $surname = $aray[1];
        $name = $aray[0];

        $Pending = DB::table('isssues')
                ->join('issue_history', 'issue_history.ih_issueid', '=', 'isssues.iss_id')
                ->join('persons', 'persons.id', '=', 'isssues.iss_personid')
                ->where('persons.name', 'Like', "%" . $name . "%")
                ->where('persons.surname', 'Like', "%" . $surname . "%")
                ->where('issue_history.ih_status', '=', "Pending")
                ->count();

        $accepted = DB::table('isssues')
                ->join('issue_history', 'issue_history.ih_issueid', '=', 'isssues.iss_id')
                ->join('persons', 'persons.id', '=', 'isssues.iss_personid')
                ->where('persons.name', 'Like', "%" . $name . "%")
                ->where('persons.surname', 'Like', "%" . $surname . "%")
                ->where('issue_history.ih_status', '=', "Accepted")
                ->count();

        $rejected = DB::table('isssues')
                ->join('issue_history', 'issue_history.ih_issueid', '=', 'isssues.iss_id')
                ->join('persons', 'persons.id', '=', 'isssues.iss_personid')
                ->where('persons.name', 'Like', "%" . $name . "%")
                ->where('persons.surname', 'Like', "%" . $surname . "%")
                ->where('issue_history.ih_status', '=', "Rejected")
                ->count();

        $timeline = DB::table('issue_history')
                ->join('persons', 'persons.id', '=', 'issue_history.ih_assignedto')
                ->where('issue_history.ih_issueid', '=', $id)
                ->OrderBy('ih_id', 'DESC')
                ->get();

        $data = array(
            "users" => $users,
            "isssueid" => $id,
            "status" => $issue->iss_status,
            "subject" => $issue->iss_subject,
            "iss_id" => $issue->iss_id,
            "iss_desc" => $issue->iss_desc,
            "iss_date" => $issue->iss_date,
            "iss_progress" => $issue->iss_progress,
            "iss_status" => $issue->iss_status,
            "destination" => $issue->destination,
            "dates" => $issue->departuredate . " ::: " . $issue->returndate,
            "airline" => $issue->airlinename,
            "preferredseat" => $issue->preferredseat,
            "expensecategory" => $issue->expensecategory,
            "nights" => $issue->nights,
            "timeline" => $timeline,
            "hotel" => $issue->hotelname,
            "assignedto" => $assignedto->name . " " . $assignedto->surname,
            "cost" => $sum,
            'pending' => $Pending,
            'rejected' => $rejected,
            'accepted' => $accepted,
            "iss_from" => $issue->iss_from
        );

//        return $data;
        return view('myissue_admin', $data);
    }

    public function allrequests() {

        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_assignedto')
                ->get();

        $data = array(
            "issues" => $issue
        );
//        return $data ;
        return view('adminissues', $data);
    }

    public function adminissue($id) {

        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_assignedto')
                ->where('iss_id', "=", $id)
                ->first();


        $agents = DB::table('users')
                ->join('persons', 'persons.id', '=', 'users.person_id')
                ->where('role', "=", "Agent")
                ->get();

        $data = array(
            "iss_id" => $issue->iss_id,
            "subject" => $issue->iss_subject,
            "iss_desc" => $issue->iss_desc,
            "iss_date" => $issue->iss_date,
            "iss_progress" => $issue->iss_progress,
            "iss_status" => $issue->iss_status,
            "assignedto" => $issue->name . " " . $issue->surname,
            "iss_from" => $issue->iss_from,
            "agents" => $agents
        );
//        return $data;
        return view('myissue_admin', $data);
    }

    public function assignto($id, $issueid) {
//

        date_default_timezone_set('Africa/Harare');
        $issuedetail = DB::table('isssues')
                ->where('iss_id', "=", $issueid)
                ->first();

        DB::table('issue_history')
                ->insert([
                    'ih_assignedto' => $id,
                    'ih_issueid' => $issueid,
                    'ih_status' => $issuedetail->iss_status,
                    'ih_date' => date("Y-m-d", time())
        ]);

        DB::table('isssues')
                ->where('iss_id', "=", $issueid)
                ->update([
                    'iss_assignedto' => $id
        ]);

//        return self::adminissue($issueid);
        return self::getissue($issueid);
    }

    public function close($issueid) {

        DB::table('isssues')
                ->where('iss_id', "=", $issueid)
                ->update([
                    'iss_status' => "Rejected"
        ]);

        DB::table('issue_history')
                ->insert([
                    'ih_assignedto' => 0,
                    'ih_issueid' => $issueid,
                    'ih_status' => "Rejected",
                    'ih_date' => date("Y-m-d", time())]);

//        return self::adminissue($issueid);
        return self::getissue($issueid);
    }

    public function accept($issueid) {

        DB::table('isssues')
                ->where('iss_id', "=", $issueid)
                ->update([
                    'iss_status' => "Accepted"
        ]);

        DB::table('issue_history')
                ->insert([
                    'ih_assignedto' => 0,
                    'ih_issueid' => $issueid,
                    'ih_status' => "Accepted",
                    'ih_date' => date("Y-m-d", time())]);

//        return self::adminissue($issueid);
        return self::getissue($issueid);
    }

    public function pending($issueid) {

        DB::table('isssues')
                ->where('iss_id', "=", $issueid)
                ->update([
                    'iss_status' => "Pending"
        ]);

        DB::table('issue_history')
                ->insert([
                    'ih_assignedto' => 0,
                    'ih_issueid' => $issueid,
                    'ih_status' => "Pending",
                    'ih_date' => date("Y-m-d", time())]);

//        return self::adminissue($issueid);
        return self::getissue($issueid);
    }

    public function adduser(Request $request) {



        date_default_timezone_set('Africa/Harare');
        $id = DB::table('persons')->insertGetId([
            "name" => $request->firstname,
            "surname" => $request->surname,
            "date_created" => date("Y-m-d", time())
        ]);


        $userdexists = DB::table('users')
                ->where("username", $request->email)
                ->get();

        if (sizeof($userdexists) == 0) {

            DB::table('users')->insert([
                "person_id" => $id,
                "role" => "user",
                "username" => $request->email,
                "password" => "password123*",
                "organisationtype" => $request->organisationtype,
                "province" => $request->Province,
                "city" => $request->city,
                "organisation" => $request->organisation,
                "position" => $request->position,
                "phonenumber" => $request->phonenumber
            ]);
        }

        return self::agents();
    }

    public function timeDetails($timeline) {



        $timeline = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       issue_history.ih_id,
       issue_history.ih_assignedto,
       issue_history.ih_date,
       issue_history.ih_issueid,
       issue_history.ih_status,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM (acr.issue_history issue_history
        INNER JOIN acr.isssues isssues
           ON (issue_history.ih_issueid = isssues.iss_id))
       INNER JOIN acr.persons persons
          ON (persons.id = issue_history.ih_assignedto)
          where  isssues.iss_id = '$timeline'
ORDER BY issue_history.ih_id DESC, issue_history.ih_date DESC");

        $data = array(
            "timeline" => $timeline
        );
//        return $data;
        return view('timelinedetails', $data);
    }

    public function timeline() {


        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_from_personid')
//                ->where('iss_from_personid', "=", session('personid'))
                ->get();

        $data = array(
            "issues" => $issue
        );

//        return $data;

        return view('issuehistory', $data);
    }

    public function assignedrequest() {

        $issue = DB::table('isssues')
                ->join('persons', 'persons.id', '=', 'isssues.iss_assignedto')
                ->where('iss_assignedto', "=", session('personid'))
                ->get();

        $data = array(
            "issues" => $issue
        );
//        return $data ;
        return view('assignedissues', $data);
    }

    public function statusreport() {

        $accepted = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Accepted')");

        $rejected = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Rejected')");

        $Pending = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues
 WHERE (isssues.iss_status = 'Pending')");


        $issues = DB::select("SELECT isssues.*,
       isssues.iss_id,
       isssues.iss_from,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       isssues.iss_assignedto,
       isssues.iss_progress,
       isssues.iss_from_personid
  FROM acr.isssues isssues");


        $data = array(
            "issues" => sizeof($issues),
            "rejected" => sizeof($rejected),
            "accepted" => sizeof($accepted),
            "Pending" => sizeof($Pending)
        );
        //statusreport
        return view('statusreport', $data);
    }

    public function approvedreport() {

        $issues = DB::select("SELECT DISTINCT isssues.iss_id,
                isssues.iss_from,
                isssues.iss_subject,
                isssues.iss_desc,
                isssues.iss_status,
                isssues.iss_date,
                isssues.iss_progress,
                isssues.iss_from_personid,
                isssues.iss_assignedto,
                users.users_id,
                users.person_id,
                users.username,
                users.password,
                users.role,
                persons.name,
                persons.surname
  FROM (acr.users users
        INNER JOIN acr.persons persons ON (users.person_id = persons.id))
       INNER JOIN acr.isssues isssues
          ON (isssues.iss_assignedto = users.person_id)
 WHERE (isssues.iss_status = 'Accepted' AND users.role = 'Head IT')");

        $data = array(
            "issues" => $issues
        );
//        return $data ;
        return view('approvesreports', $data);
    }

    public function createnewrequest(Request $request) {

//_token=e3mmRIDopQIUtiCt7JbKGENdxlmS6g3cUS6xFA3w&reason=qqq&destination=qqqq&departuredate=2019-11-10&returndate=&airline=&seat=qqqq&car=on&hotelname=qwww&nights=&expensecategory=&km=&descriptionexpense=&estcost=0
        $car = 0;
        $hotel = 0;
        if (isset($_POST['hotel'])) {
            $hotel = 1;
        }
        if (isset($_POST['car'])) {
            $car = 1;
        }
        date_default_timezone_set('Africa/Harare');
        $id = DB::table('isssues')->insertGetId([
            "iss_from" => session('firstname') . " " . session('surname'),
            "iss_personid" => session('personid'),
            "iss_subject" => $request->reason,
            "iss_desc" => $request->reason,
            "iss_status" => "Pending",
            "iss_assignedto" => 0,
            'iss_date' => date("Y-m-d G.i:s", time()),
            'iss_from_personid' => session('personid'),
            "iss_progress" => 0,
            "destination" => $request->destination,
            "departuredate" => $request->departuredate,
            "returndate" => $request->returndate,
            "airlinename" => $request->airline,
            "preferredseat" => $request->seat,
            'carneeded' => $car,
            'hotelneeded' => $hotel,
            "hotelname" => $request->hotelname,
            "nights" => $request->nights,
            "expensecategory" => $request->expensecategory,
            "km" => $request->km,
            "estcost" => $request->estcost
        ]);

        $exp = DB::table('est_expenses_temp')
                ->where('ee_personid', '=', session('personid'))
                ->get();
        if ($exp) {
            foreach ($exp as $data) {

                DB::table('est_expenses')->insert([
                    "ee_category" => $data->ee_category,
                    "ee_km" => $data->ee_km,
                    "ee_desc" => $data->ee_desc,
                    "ee_personid" => session('personid'),
                    "ee_issueid" => $id,
                    "ee_estcost" => $data->ee_estcost
                ]);
            }
            DB::table('est_expenses_temp')
                    ->where('ee_personid', '=', session('personid'))
                    ->delete();
        }


        return response()->json($request);
    }

    public function addtoexpensetable(Request $request) {
//        "expensecategory":"Rental Vehicle","km":"12","descriptionexpense":"dddd","estcost":"013"
        DB::table('est_expenses_temp')->insert([
            "ee_category" => $request->expensecategory,
            "ee_km" => $request->km,
            "ee_desc" => $request->descriptionexpense,
            "ee_personid" => session('personid'),
            "ee_estcost" => $request->estcost
        ]);

        $exp = DB::table('est_expenses_temp')
                ->where('ee_personid', '=', session('personid'))
                ->get();

        $data = array(
            "exp" => $exp
        );
        return response()->json($data);
    }

    public function reports() {
        $from = "00:00:00";
        $to = "23:59:59";

        $exp = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       SUM(est_expenses.ee_estcost) AS cost,
       est_expenses.ee_issueid,
       isssues.destination
  FROM (acr.isssues isssues
        INNER JOIN acr.est_expenses est_expenses
           ON (isssues.iss_id = est_expenses.ee_issueid))
       INNER JOIN acr.persons persons ON (isssues.iss_personid = persons.id)
 WHERE (isssues.iss_date BETWEEN '$from' AND '$to')
GROUP BY est_expenses.ee_issueid");

        $data = array(
            "exp" => $exp
        );
        return view('reports', $data);
    }

    public function reports2(Request $request) {

        $from = $request->datefrom . " " . "00:00:00";
        $to = $request->dateto . " " . "23:59:59";

        $exp = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       SUM(est_expenses.ee_estcost) AS cost,
       est_expenses.ee_issueid,
       isssues.destination
  FROM (acr.isssues isssues
        INNER JOIN acr.est_expenses est_expenses
           ON (isssues.iss_id = est_expenses.ee_issueid))
       INNER JOIN acr.persons persons ON (isssues.iss_personid = persons.id)
 WHERE (isssues.iss_date BETWEEN '$from' AND '$to')
      AND isssues.iss_status = '$request->statusrpt'
GROUP BY est_expenses.ee_issueid");

        $sum = 0;
        foreach ($exp as $data) {

            $sum = $sum + $data->cost;
        }

        $data = array(
            "exp" => $exp,
            "sum" => $sum
        );
        return view('reports2', $data);
    }

    public function report1form(Request $request) {
//2019-06-27 15:39:30
        $from = $request->datefrom . " " . "00:00:00";
        $to = $request->dateto . " " . "23:59:59";

        $exp = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       SUM(est_expenses.ee_estcost) AS cost,
       est_expenses.ee_issueid,
       isssues.destination
  FROM (acr.isssues isssues
        INNER JOIN acr.est_expenses est_expenses
           ON (isssues.iss_id = est_expenses.ee_issueid))
       INNER JOIN acr.persons persons ON (isssues.iss_personid = persons.id)
 WHERE (isssues.iss_date BETWEEN '$from' AND '$to')
GROUP BY est_expenses.ee_issueid");
        $sum = 0;

        foreach ($exp as $data) {

            $sum = $sum + $data->cost;
        }

        $data = array(
            "exp" => $exp,
            "sum" => $sum
        );
//        return $data;
        return view('reports', $data);
    }

    public function getmyissue($id) {

        $issue = DB::table('isssues')
                ->where('iss_id', "=", $id)
                ->first();

        $users = DB::table('users')
                ->join('persons', 'persons.id', '=', 'users.person_id')
                ->get();

        $assignedto = DB::table('persons')
                ->where('id', '=', $issue->iss_assignedto)
                ->first();

        $sum = DB::table('est_expenses')
                ->join('isssues', 'isssues.iss_id', '=', 'est_expenses.ee_issueid')
                ->where('isssues.iss_id', '=', $id)
                ->sum('est_expenses.ee_estcost');

        $timeline = DB::table('issue_history')
                ->join('persons', 'persons.id', '=', 'issue_history.ih_assignedto')
                ->where('issue_history.ih_issueid', '=', $id)
                ->OrderBy('ih_id', 'DESC')
                ->get();

        $aray = explode(" ", $issue->iss_from);
        $surname = $aray[1];
        $name = $aray[0];

        $Pending = DB::table('isssues')
                ->join('issue_history', 'issue_history.ih_issueid', '=', 'isssues.iss_id')
                ->join('persons', 'persons.id', '=', 'isssues.iss_personid')
                ->where('persons.name', 'Like', "%" . $name . "%")
                ->where('persons.surname', 'Like', "%" . $surname . "%")
                ->where('issue_history.ih_status', '=', "Pending")
                ->count();

        $accepted = DB::table('isssues')
                ->join('issue_history', 'issue_history.ih_issueid', '=', 'isssues.iss_id')
                ->join('persons', 'persons.id', '=', 'isssues.iss_personid')
                ->where('persons.name', 'Like', "%" . $name . "%")
                ->where('persons.surname', 'Like', "%" . $surname . "%")
                ->where('issue_history.ih_status', '=', "Accepted")
                ->count();

        $rejected = DB::table('isssues')
                ->join('issue_history', 'issue_history.ih_issueid', '=', 'isssues.iss_id')
                ->join('persons', 'persons.id', '=', 'isssues.iss_personid')
                ->where('persons.name', 'Like', "%" . $name . "%")
                ->where('persons.surname', 'Like', "%" . $surname . "%")
                ->where('issue_history.ih_status', '=', "Rejected")
                ->count();

        $timeline = DB::table('issue_history')
                ->join('persons', 'persons.id', '=', 'issue_history.ih_assignedto')
                ->where('issue_history.ih_issueid', '=', $id)
                ->OrderBy('ih_id', 'DESC')
                ->get();

        $data = array(
            "users" => $users,
            "isssueid" => $id,
            "status" => $issue->iss_status,
            "subject" => $issue->iss_subject,
            "iss_id" => $issue->iss_id,
            "iss_desc" => $issue->iss_desc,
            "iss_date" => $issue->iss_date,
            "iss_progress" => $issue->iss_progress,
            "iss_status" => $issue->iss_status,
            "destination" => $issue->destination,
            "dates" => $issue->departuredate . " ::: " . $issue->returndate,
            "airline" => $issue->airlinename,
            "preferredseat" => $issue->preferredseat,
            "expensecategory" => $issue->expensecategory,
            "nights" => $issue->nights,
            "timeline" => $timeline,
            "hotel" => $issue->hotelname,
            "assignedto" => $assignedto->name . " " . $assignedto->surname,
            "cost" => $sum,
            'pending' => $Pending,
            'rejected' => $rejected,
            'accepted' => $accepted,
            "iss_from" => $issue->iss_from
        );

//        return $data;
        return view('myissue_user', $data);
    }

    public function reports2form() {
        $from = "00:00:00";
        $to = "23:59:59";

        $exp = DB::select("SELECT persons.id,
       persons.name,
       persons.surname,
       isssues.iss_subject,
       isssues.iss_desc,
       isssues.iss_status,
       isssues.iss_date,
       SUM(est_expenses.ee_estcost) AS cost,
       est_expenses.ee_issueid,
       isssues.destination
  FROM (acr.isssues isssues
        INNER JOIN acr.est_expenses est_expenses
           ON (isssues.iss_id = est_expenses.ee_issueid))
       INNER JOIN acr.persons persons ON (isssues.iss_personid = persons.id)
 WHERE (isssues.iss_date BETWEEN '$from' AND '$to')
     
GROUP BY est_expenses.ee_issueid");

        $data = array(
            "exp" => $exp
        );
        return view('reports2', $data);
    }

    public function indicators(Request $request) {


        $indicatorsArray = array();
        $indicators = DB::table('indicators')
                ->where('ind_sector_id', $request->sectorid)
                ->get();

        foreach ($indicators as $indicator) {

            $variables = DB::table('variables')
                    ->where('var_ind_id', $indicator->ind_id)
                    ->get();


            $ic = new IndicatorsClass;
            $ic->ind_id = $indicator->ind_id;
            $ic->ind_description = $indicator->ind_description;
            $ic->ind_sector_id = $indicator->ind_sector_id;
            $ic->variables = $variables;

            array_push($indicatorsArray, $ic);
        }

        $sectors = DB::table('sectors')
                ->where('sec_id', $request->sectorid)
                ->first();

        $data = array(
            "indicatorsArray" => $indicatorsArray,
            "sector" => $sectors->sec_description,
            "year" => $request->year,
        );

//        return $data;
        return view('indicators', $data);
    }

    public function values(Request $request) {

        date_default_timezone_set('Africa/Harare');
        $data = array(
            "sz" => sizeof($request->all()),
            "dd" => $request->all(),
//            "ff" => $request->all()[33]
        );

        return self::sectors();

        for ($i = 1; $i <= sizeof($request->all()); $i++) {
            if (isset($request->all()[$i])) {

                try {
                    DB::table('statistics')->insert([
                        "stat_var_id" => $i,
                        "stat_data" => $request->all()[$i],
                        "stat_user_id" => session('user')->users_id,
                        "stat_year" => $request->year,
                        'stat_date_created' => date("Y-m-d G.i:s", time())
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {
//                    var_dump($e->errorInfo);
                }
            }
        }
        return $data;
    }

    public function organisationalreport() {
        $organisationtype = session('user')->organisationtype;
        $city = session('user')->city;
        $province = session('user')->province;

        $organisationalreport = DB::select("SELECT Male_Data.ind_description,
       Male_Data.Males_Description,
       Female_Data.Females_Description,
       Male_Data.stat_data_males,
       Female_Data.stat_data_females,
       users.username,
       users.province,
       users.organisationtype,
       users.city,
       users.organisation ,
       Male_Data.stat_year,
       (Male_Data.stat_data_males+
       Female_Data.stat_data_females) as Total ,
       ROUND(((Male_Data.stat_data_males/(Male_Data.stat_data_males+
       Female_Data.stat_data_females))*100),1) as malepercentage ,
       
       ROUND(((Female_Data.stat_data_females/(Male_Data.stat_data_males+
       Female_Data.stat_data_females))*100),1) as femalepercentage
       
  FROM (acr.Male_Data Male_Data
        INNER JOIN acr.users users
           ON (Male_Data.stat_user_id = users.users_id))
       INNER JOIN acr.Female_Data Female_Data
          ON (Female_Data.ind_id = Male_Data.ind_id)
          
        where users.province='$province' AND  users.organisationtype='$organisationtype' AND users.city='$city'");

        $data = array(
            "organisationalreport" => $organisationalreport,
            "user" => session('user')
        );

//        return $data;


        return view("organisationalreport", $data);
    }

    public function provincialreport() {

        $provinces = DB::table("provinces")
                ->get();

        $organisationtype = session('user')->organisationtype;
        $city = session('user')->city;
        $province = session('user')->province;

        $organisationalreport = DB::select("SELECT Male_Data.ind_description,
       Male_Data.Males_Description,
       Female_Data.Females_Description,
       Male_Data.stat_data_males,
       Female_Data.stat_data_females,
       users.username,
       users.province,
       users.organisationtype,
       users.city,
       users.organisation ,
       Male_Data.stat_year,
       (Male_Data.stat_data_males+
       Female_Data.stat_data_females) as Total ,
       ROUND(((Male_Data.stat_data_males/(Male_Data.stat_data_males+
       Female_Data.stat_data_females))*100),1) as malepercentage ,
       
       ROUND(((Female_Data.stat_data_females/(Male_Data.stat_data_males+
       Female_Data.stat_data_females))*100),1) as femalepercentage
       
  FROM (acr.Male_Data Male_Data
        INNER JOIN acr.users users
           ON (Male_Data.stat_user_id = users.users_id))
       INNER JOIN acr.Female_Data Female_Data
          ON (Female_Data.ind_id = Male_Data.ind_id)
          
        where users.province='$province' AND  users.organisationtype='$organisationtype' AND users.city='$city'");

        $data = array(
            "organisationalreport" => $organisationalreport,
            "provinces" => $provinces
        );


        return view("provincialreport", $data);
    }

}

class IndicatorsClass {
    
}

;

