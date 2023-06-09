<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\position;
use App\Models\mdlapplicant;
use Illuminate\Http\Request;
use DB;
class applicantCtrl extends Controller
{
    public function index(Request $request)
    {
        $result= position::get();
        return view('Applicants.form')->with('result',$result);
    }
    // // public function index1(Request $request)
    // {
    //     $resultpro= refprovince::get();
    //     return view('Applicants.form')->with('result',$resultpro);
    // }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
            'gender'=>'required',
            'citizenship'=>'required',
            'religion'=>'required',
            'birthdate'=>'required',
            'status'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'province'=>'required',
            'city'=>'required',
            'barangay'=>'required',
            'zipcode'=>'required',
            'country'=>'required',
        ],[
            'fname.required'=>"First name is required!",
            'mname.required'=>"Middle name is required!",
            'lname.required'=>"Last name is required!",
            'gender.required'=>"Gender is required!",
            'citizenship.required'=>"Citizenship is required!",
            'religion.required'=>"Religion is required!",
            'birthdate.required'=>"Birthdate is required!",
            'status.required'=>"Civil Status is required!",
            'mobile.required'=>"Mobile Number is required!",
            'email.required'=>"Email Address is required!",
            'province.required'=>"Province is required!",
            'city.required'=>"City is required!",
            'barangay.required'=>"Barangay is required!",
            'zipcode.required'=>"Zipcode is required!",
            'country.required'=>"Country is required!",
            'g-recaptcha-response' => 'required|captcha',
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
            'resume.required' => 'Resume is required!',
            'resume.mimes' => 'Only PDF, DOC, and DOCX files are allowed for resume!',
            'resume.max' => 'Resume should not exceed 2MB in size!',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>201, 'error'=>$validator->errors()->toArray()]);
        }else{
            $id = $request->id;
            $firstName = $request->fname;
            $lastName = $request->lname;
            $extension = $request->file('resume')->getClientOriginalExtension();
            $fileName = $lastName . '_' . $firstName . '_' . $id . '.' . $extension;
            $filePath = 'resume/' . $fileName;
            $request->file('resume')->move(public_path('resume'), $fileName);


            $values= [
                'first'=>$request->fname,
                'middle'=>$request->mname,
                'last'=>$request->lname,
                'suf'=>$request->suffix,
                'gen'=>$request->gender,
                'citizen'=>$request->citizenship,
                'rel'=>$request->religion,
                'bdate'=>$request->birthdate,
                'stat'=>$request->status,
                'mob'=>$request->mobile,
                'eml'=>$request->email,
                'prov'=>$request->province,
                'ct'=>$request->city,
                'brgy'=>$request->barangay,
                'strt'=>$request->street,
                'zip'=>$request->zipcode,
                'cntry'=>$request->country,
                'chse'=>$request->choose,
                'posid'=>$request->choose,
                'path'=> $filePath,
            ];

            $insert = mdlapplicant::create($values);
            if($insert){
                return response()->json(['status'=>200,'msg'=>"Position succesfully created!"]);
            }else{
                return response()->json(['status'=>202,'msg'=>"Error saving!"]);
            }
        }
    }

    //load province
    public function load_province(Request $request)
    {
        $data = DB::table('refprovince')
                // ->where('provCode','0410')
                ->get();
        return response()->json(['status'=>200,'data'=>$data]);
    }

    //load city base on province
    public function onselect_province_load_city(Request $request)
    {
    $provcode=$request->id;
    $data = DB::table('refcitymun')
        ->where('provCode',$provcode)
        ->get();
    return response()->json(['status'=>200,'data'=>$data]);
    }

    //load brgy base on city
    public function onselect_city_load_brgy(Request $request)
    {
    $citycode=$request->id;
    $data = DB::table('refbrgy')
        ->where('citymunCode',$citycode)
        ->get();
    return response()->json(['status'=>200,'data'=>$data]);
    }
}
