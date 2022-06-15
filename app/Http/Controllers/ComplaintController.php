<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\message;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    public function store(Request $request)
    {
        $requestData = $request->all();
        $fillName = time().$request->file('thumbnail')->getClientOriginalName();
        $path = $request->file('thumbnail')->storeAs('images', $fillName, 'public');
        $requestData["thumbnail"] = '/storage/'.$path;
        $request = request()->validate([
            'subject' => 'required',
            'thumbnail' => 'required',
            'body' => 'required',
            'phone_number' => 'required',
        ]);
        Complaint::create($requestData);
        return redirect('/dashboard')->with('flash', 'added!');


        // return redirect('/dashboard');
    }

    function index()
    {
        $data = Complaint::all();

        return view('admin.complaints',['complaints'=>$data]);
    }

    function dash()
    {
        $data = Complaint::count();
        $dataa = Complaint::where('status',1)->count();
        $pending = Complaint::where('status',0)->count();


        // $dataa = Complaint::all();

        return view('dashboard',  compact('data', 'dataa', 'pending'));
    }

    // function dashb($id)
    // {
    //     $dataa = Complaint::find($id);

    //     return view('components.data',['complain'=>$dataa]);
    // }

    //
    public function changeStatus($id)
    {
        $getStatus = Complaint::select('status')->where('id', $id)->first();
        if($getStatus->status==1){
            $status = 0;
        } else {
            $status = 1;
        }
        Complaint::where('id', $id)->update(['status'=>$status]);
        return redirect()->back();
    }
    public function view($id)
    {
        $data = Complaint::find($id);
        $comments = message::all();

        //dd($data);
        return view('admin.viewcomplaint',['complaints'=>$data,'comments'=>$comments]);
    }

    public function create(Request $request) {
        $requestData = $request->all();
        message::create($requestData);
        return redirect('/dashboard')->with('flash', 'added!');
    }

    public function show()
    {
        $data = message::all();
        dd($data);
        // return view('admin.viewcomplaint',['messages'=>$data]);
    }
}
