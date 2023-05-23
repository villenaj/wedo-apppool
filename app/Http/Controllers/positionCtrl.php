<?php

namespace App\Http\Controllers;

use Validator;

use App\Mail\mailbody;
use App\Models\mdlJD;
use App\Models\mdlSkill;
use App\Models\position;
use App\Models\mdlapplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class positionCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getAllPosition(Request $request)
    {

        $result = position::latest()->get();
        return json_encode(array('status' => 1, 'data' => $result));
    }

    public function position(Request $request)
    {
        $result = position::get();
        return view('Members.position')->with('result', $result);
        ;
    }

    //getposition
    public function getposition(Request $request)
    {
        $id = $request->id;
        $getPosition = position::where('id', $id)
            ->get();

        $getSkill = mdlSkill::where('pid', $id)
            ->get();

        $getJD = mdlJD::where('pid', $id)
            ->get();

        return response()->json(['stat' => 1, 'data' => $getPosition, 'data1' => $getSkill, 'data2' => $getJD]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'position' => 'required',
            'vacancies' => 'required',
            // 'remarks'=>'required',
        ], [
                'position.required' => "Position is required!",
                'vacancies.required' => "Vacancies is required!",
                // 'remarks.required'=>"Job description is required!",
            ]);

        $values = [
            'pos' => $request->position,
            'vac' => $request->vacancies,
            'status' => "Active",
        ];


        if (!$validator->passes()) {
            return response()->json(['status' => 201, 'error' => $validator->errors()->toArray()]);
        } else {
            $insert = position::create($values);


            if ($insert) {
                return response()->json(['status' => 200, 'msg' => "Position succesfully created!"]);

            } else {
                return response()->json(['status' => 202, 'msg' => "Error saving!"]);

            }

        }


    }
    public function edit(Request $request)
    {
        $id = $request->id;

        $result = position::where('id', $id)->get();
        $resultSkill = mdlSkill::where('pid', $id)->get();
        $resultJD = mdlJD::where('pid', $id)->get();
        return json_encode(array('status' => 1, 'data' => $result, 'data1' => $resultSkill, 'data2' => $resultJD));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uposition' => 'required',
            'uvacancies' => 'required',
            'skills' => 'required',
            'ujd' => 'required',
        ], [
                'uposition.required' => "Position is required!",
                'uvacancies.required' => "Vacancies is required!",
                'skills.required' => "This is required!",
                'ujd.required' => "This is required!",
            ]);
        $values = [
            'pos' => $request->uposition,
            'vac' => $request->uvacancies
        ];
        if (!$validator->passes()) {
            return response()->json(['status' => 203, 'error' => $validator->errors()->toArray()]);
        }
        $dataskill = [];
        $dataskill = explode(".", $request->skills);
        $skillID = [];
        $x = 0;
        $str = preg_replace('/\s+/', '', $request->skillID);
        $skillID = explode(".", $str);

        ##jd
        $jd = [];
        $jd = explode(".", $request->ujd);
        $jdID = [];
        $y = 0;
        $strJD = preg_replace('/\s+/', '', $request->jdID);
        $jdID = explode(".", $strJD);


        if (count($dataskill) != count($skillID)) {
            return json_encode(array('status' => 201, 'msg' => "Invalid token for skill! Please contact your System admin."));
        } elseif (count($jd) != count($jdID)) {
            return json_encode(array('status' => 201, 'msg' => "Invalid token for jd! Please contact your System admin."));

        } else {
            foreach ($dataskill as $key => $val) {
                $valData = [
                    'skill_desc' => $val
                ];
                if ($val != "" or $val != NULL) {
                    mdlSkill::where('id', $skillID[$x])->update($valData);
                }
                $x = $x + 1;
            }

            foreach ($jd as $key => $val) {
                $valData1 = [
                    'desc' => $val
                ];
                if ($val != "" or $val != NULL) {
                    mdlJD::where('id', $jdID[$y])->update($valData1);
                }
                $y = $y + 1;
            }
            position::where('id', $request->id)->update($values);
            return json_encode(array('status' => 200, 'msg' => "Position Updated!"));
        }
    }

    public function jd_add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'jdRemark' => 'required'
        ], [
                'jdRemark.required' => "This is required!"
            ]);

        $values = [
            'desc' => $request->jdRemark,
            'pid' => $request->posID,
        ];
        $values2 = [
            'desc' => $request->jdRemark,

        ];
        // dd()

        if ($request->jdSwitch == 0) {
            if (!$validator->passes()) {
                return response()->json(['status' => 201, 'error' => $validator->errors()->toArray()]);
            } else {
                $insert = mdlJD::create($values);
                if ($insert) {
                    return response()->json(['status' => 200, 'msg' => "JD succesfully created!"]);
                } else {
                    return response()->json(['status' => 202, 'msg' => "Error saving!"]);
                }
            }
        } else {
            if (!$validator->passes()) {
                return response()->json(['status' => 201, 'error' => $validator->errors()->toArray()]);
            } else {
                $insert = mdlJD::where('id', $request->id)->update($values2);
                if ($insert) {
                    return response()->json(['status' => 200, 'msg' => "JD succesfully updated!"]);
                } else {
                    return response()->json(['status' => 202, 'msg' => "Error saving!"]);
                }
            }
        }

    }

    public function get_jd(Request $request)
    {
        $resultJD = mdlJD::where('pid', $request->posID)->get();
        return json_encode(array('status' => 200, 'data' => $resultJD));
    }


    public function deleteJD(Request $request)
    {

        $res = mdlJD::where('id', $request->id)->delete();

        if ($res) {
            return json_encode(array('status' => 200, 'msg' => "JD deleted"));

        } else {
            return json_encode(array('status' => 201, 'msg' => "error"));

        }


    }
    public function deleteSkil(Request $request)
    {

        $rest = mdlSkill::where('id', $request->id)->delete();

        if ($rest) {
            return json_encode(array('status' => 200, 'msg' => "Skill deleted"));

        } else {
            return json_encode(array('status' => 201, 'msg' => "error"));

        }


    }

    public function getSpecificJD(Request $request)
    {
        $resultJD = mdlJD::where('id', $request->id)->get();
        return json_encode(array('status' => 200, 'data' => $resultJD));

    }

    public function getskill(Request $request)
    {

        $resultskill = mdlSkill::where('pid', $request->skillPosID)->get();

        return json_encode(array('status' => 200, 'data' => $resultskill));

    }

    public function skill_add(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'txtskill' => 'required'
        ], [
                'txtskill.required' => "This is required!"
            ]);

        $values = [
            'skill_desc' => $request->txtskill,
            'pid' => $request->skillPosID,
        ];
        $values2 = [
            'skill_desc' => $request->txtskill,

        ];
        // dd()

        if ($request->skillSwitch == 0) {
            if (!$validator->passes()) {
                return response()->json(['status' => 201, 'error' => $validator->errors()->toArray()]);
            } else {
                $insert = mdlSkill::create($values);
                if ($insert) {
                    return response()->json(['status' => 200, 'msg' => "JD succesfully created!"]);
                } else {
                    return response()->json(['status' => 202, 'msg' => "Error saving!"]);
                }
            }
        } else {
            if (!$validator->passes()) {
                return response()->json(['status' => 201, 'error' => $validator->errors()->toArray()]);
            } else {
                $insert = mdlSkill::where('id', $request->id)->update($values2);
                if ($insert) {
                    return response()->json(['status' => 200, 'msg' => "JD succesfully updated!"]);
                } else {
                    return response()->json(['status' => 202, 'msg' => "Error saving!"]);
                }
            }
        }

    }

    public function getSpecificskill(Request $request)
    {
        $resultJD = mdlSkill::where('id', $request->id)->get();
        return json_encode(array('status' => 200, 'data' => $resultJD));
    }

    //update position status
    public function updatePositionStatus(Request $request)
    {

        $values = [
            'status' => "Closed",
        ];
        position::where('id', $request->id)->update($values);
        return json_encode(array('status' => 200, 'msg' => "Position Updated!"));
    }

    //this is for applicant pool controllers
    public function get_applicant(Request $request)
    {
        $data = mdlapplicant::join('tbl_position', 'tbl_applicant.posid', '=', 'tbl_position.id')
            ->select('first', 'last', 'pos', 'ct', 'prov', 'brgy', 'strt', 'tbl_applicant.created_at', 'tbl_applicant.id', 'appstat')
            ->latest()
            ->get();

        return json_encode(array('status' => 200, "data" => $data));
    }

    public function inviteInterview(Request $request)
    {

        $data = mdlapplicant::join('tbl_position', 'tbl_applicant.posid', '=', 'tbl_position.id')
            ->select('eml', 'first', 'last', 'pos', 'ct', 'prov', 'brgy', 'strt', 'tbl_applicant.created_at', 'tbl_applicant.id', 'appstat')

            ->first();


        $dd = [
            'value1' => $data->eml,
            'value2' => "Dear " . $data->first . ',',
            'value3' => "Thank you for applying for the position of " . $data->pos . " with WeDo Inc." . PHP_EOL . "

        Something\r\nOn\r\nA\r\nNew\r\nLine


        We would like to invite you to come to our office to interview for the position. Your interview has been scheduled for 1 pm on May 23, 2022, at addres sa pasig. " . PHP_EOL . "


        Please  email me at sysad@wedoinc.ph if you have any questions or need to reschedule. " . PHP_EOL . "


        Sincerely,


        John Smith",

            'url' => ''
        ];

        $values2 = [
            'appstat' => "Invited",

        ];

        
        $response = Http::post('https://maker.ifttt.com/trigger/invitation/with/key/bJtIyrDnF3VnDUSyTTqRkX', $dd);

        if ($response->successful()) {
            // $responseBody = $response->body();
            // $responseStatusCode = $response->status(); 

            mdlapplicant::where('id', $request->id)->update($values2);
            return json_encode(array('status' => 200, "msg" => "Email successfully sent."));
        } else {
            // $responseStatusCode = $response->status();

            return json_encode(array('status' => 200, "msg" => "System encounter error while sending the email."));
        }

        // $send = Mail::to($data->eml)->send(new mailbody($dd));
        // Check if the email was sent
        // if ($send) {
        //     // Email was sent successfully
        //     return json_encode(array('status' => 200, "msg" => "Email successfully sent."));

        // } else {
        //     // Email was not sent
        //     return json_encode(array('status' => 200, "msg" => "System encounter error while sending the email."));

        // }
    }

    public function get_selected_applicant(Request $request)
    {

        $startdate = date('Y-m-d', strtotime($request->txtDateFrom));
        $enddate = date('Y-m-d', strtotime($request->txtDateto . ' + 1 days'));


        $data = mdlapplicant::join('tbl_position', 'tbl_applicant.posid', '=', 'tbl_position.id')
            ->where('posid', $request->id)
            ->whereBetween('tbl_applicant.created_at', [$startdate, $enddate])

            ->select('eml', 'first', 'last', 'pos', 'ct', 'prov', 'brgy', 'strt', 'tbl_applicant.created_at', 'tbl_applicant.id', 'appstat')
            ->get();

        return json_encode(array('status' => 200, 'data' => $data));


    }
}
