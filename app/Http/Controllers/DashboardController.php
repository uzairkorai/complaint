<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('user')) {
            return view('userdash');
        } elseif (Auth::user()->hasRole('writer')) {
            return view('writerdash');
        } elseif(Auth::user()->hasRole('admin')) {
            return view('dashboard');
        } elseif(Auth::user()->hasRole('csr')) {
            return view('st.csr');
        }elseif(Auth::user()->hasRole('elite')) {
            return view('st.csr');
        }elseif(Auth::user()->hasRole('bootcamp')) {
            return view('st.csr');
        }elseif(Auth::user()->hasRole('incubator')) {
            return view('st.csr');
        }elseif(Auth::user()->hasRole('vbc')) {
            return view('st.csr');
        }elseif(Auth::user()->hasRole('meetups')) {
            return view('st.csr');
        }elseif(Auth::user()->hasRole('teachers')) {
            return view('st.csr');
        }elseif(Auth::user()->hasRole('services')) {
            return view('st.csr');
        }elseif(Auth::user()->hasRole('digitalmarketing')) {
            return view('st.csr');
        }


    }

    public function myprofile()
    {
        return view('myprofile')->with('user', auth()->user());
    }
    public function update(UpdateProfileRequest $req)
    {
        $user = auth()->user();

        $user->update([
            'name' => $req->name,
            'email' => $req->email,
        ]);

        session()->flash('success', 'user update successfully');

        return redirect()->back();
    }
    public function complaint()
    {
        return view('complaint');
    }

}
