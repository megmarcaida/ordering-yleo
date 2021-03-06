<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\enrollments;
use App\Models\address_locations;
use Carbon\Carbon;
use Auth;

class EnrollmentController extends Controller
{
    public function enrollmentsList(Request $request){

        
        $location = $request->get('location');
        if(isset($location))
            $enrollments = enrollments::where("status", 1)->where("experience_center",$location)->where("queue_number","like","%".$request->input('q')."%")->orderBy('id','desc')->paginate(20);
        else
            $enrollments = enrollments::where("status", 1)->where("queue_number","like","%".$request->input('q')."%")->orderBy('id','desc')->paginate(20);
            

        return view('enrollments.list', ['enrollments' => $enrollments]);
    }

    public function deleteUser(Request $request){
        
        $message = '';
        if(!empty($request->input('id'))){
            $enrollments = enrollments::find($request->input('id'));
            $enrollments->delete();

            $message = $enrollments->member_id_enroller . " user has been remove!";
        }

        return response()->json($message);
    }

    public function getCities(Request $request){
        $cities = address_locations::select('city')->where('province',$request->input('province'))->groupby('city')->orderby('id')->get();
        
        return response()->json($cities);
    }

    public function getZipcode(Request $request){
        $zipcode = address_locations::select('zipcode')->where('city',$request->input('city'))->groupby('zipcode')->orderby('id')->get();
        
        return response()->json($zipcode);
    }

    public function enrollmentForm(Request $request){
        $message = "";
        $filename = "";
        $date = Carbon::now();
        $provinces = address_locations::select('province')->groupby('province')->orderby('id')->get();
        if($request->post()){
           
            if($request->hasfile('valid_id'))
            {
                foreach($request->file('valid_id') as $file)
                {
                    $filename = time().'.'.$file->extension();
                    $file->move(base_path() . '/storage/app/public', $filename);
                }
            }
            
            $enrollments = new enrollments();
            $enrollments->firstname  = $request->post('firstname');
            $enrollments->middlename       = $request->post('middlename');
            $enrollments->lastname        = $request->post('lastname');
            $enrollments->address          = $request->post('address');
            $enrollments->province      = $request->post('province');
            $enrollments->city     = $request->post('city');
            $enrollments->zipcode        = $request->post('zipcode');
            $enrollments->phonenumber            = $request->post('phonenumber');
            $enrollments->experience_center   = $request->post('experience_center');
            $enrollments->email                = $request->post('email');
            $enrollments->member_id_enroller         = $request->post('member_id_enroller');
            $enrollments->member_id_sponsor        = $request->post('member_id_sponsor');
            $enrollments->username          = $request->post('username');
            $enrollments->digit_pin          = $request->post('digit_pin');
            $enrollments->tin          = $request->post('tin');
            $enrollments->order_type          = $request->post('order_type');
            $enrollments->enrollment_kit          = $request->post('enrollment_kit');
            $enrollments->other_info          = $request->post('other_info');
            $enrollments->payment_method          = $request->post('payment_method');
            $enrollments->valid_id          = $filename;
            $enrollments->queue_number          = $request->post('queue_number');
            $enrollments->date          = $request->post('date');
            $enrollments->status              = 1;
            $enrollments->enabled             = 1;
            $enrollments->save();

            $message = "Thank you! Please wait your queuebee to be called";

        }

        return view('enrollments.enroll', ["message" => $message,"date" => $date->format('Y-m-d'),'provinces'=>$provinces]);
    }

    public function completeEnrollment($id,$ec){
        $select = "";
        switch(Auth::user()['role_id']){
            case 1:
                $select = "";
                break;
            case 2:
                $select = "davao";
                break;
            case 3:
                $select = "manila";
                break;
        }
        
        $enrollments = enrollments::where('queue_number',$id)->where('experience_center','like','%'.$ec.'%')->get();
        
        
        return view('enrollments.admin.complete-enrollment', ['enrollments' => $enrollments]);
    }
    
    public function updateStatusEnrollment($id){
        enrollments::where('queue_number',$id)->delete();
        return json_encode("Updated");
    }

    public function autoComplete(Request $request)
    {
        $select = "";
        switch(Auth::user()['role_id']){
            case 1:
                $select = "";
                break;
            case 2:
                $select = "davao";
                break;
            case 3:
                $select = "manila";
                break;
        }
        
        $enrollments = enrollments::where("queue_number","like","%".$request->input('q')."%")->orderBy('id','desc')->get();
        $data = array();
        foreach ($enrollments as $val)
        {
            $data[] = $val->product_name;
        }
   
        return response()->json($data);
    }
    
}
