<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\SubCounty;
use App\Models\Appeal;
use App\Notifications\NewAppeal;
use App\Models\BloodBank;

class UsersController extends Controller
{
    public function sub_counties()
    {
        $subcounties = SubCounty::all();

        return $subcounties;
    }
    public function new_user(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->subcounty = $request->subcounty;
        $user->password = Hash::make($request->password);

        if ($request->dob) {
            $user->dob = $request->dob;
        }
        if ($request->blood_type) {
            $user->blood_type = $request->blood_type;
        }
        if ($request->gender) {
            $user->gender = $request->gender;
        }
        if ($request->phone) {
            $user->phone = $request->phone;
        }
        if ($request->is_patient) {
            $user->is_patient = $request->is_patient;
        }
        if ($request->is_admin) {
            $user->is_admin = $request->is_admin;
        }
        if ($request->is_blood_bank) {
            $user->is_blood_bank = $request->is_blood_bank;
        }
        if ($request->is_donor) {
            $user->is_donor = $request->is_donor;
        }
        if (auth()->user()) {
            $user->admin_id = auth()->id();
        }

        $user->save();

        if ($request->is_blood_bank) {
            $user = User::where('is_blood_bank', 1)->latest()->first();
            $bb = new BloodBank;
            $bb->user_id = $user->id;
            $bb->name = $user->name;
            $bb->save();
        }
        Session::flash('message', 'User added Successfully!');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    public function deleteUser(Request $request)
    {
        $userId = $request->id;
        $user = User::find($userId);
        $user->delete();
        Session::flash('message', 'User Deleted Successfully!');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    public function new_user_form()
    {
        $subcounties = $this->sub_counties();
        return view('client.pages.register', \compact('subcounties'));
    }

    public function new_donor_form()
    {
        $subcounties = $this->sub_counties();
        return view('client.pages.become_donor', \compact('subcounties'));
    }

    public function new_appeal()
    {
        return view('client.pages.new_appeal');
    }
    public function new_appeal_confirm()
    {
        $userAppeals = Appeal::where('user_id', auth()->id())->where('status', 0)->first();
        if ($userAppeals) {
            Session::flash('message', 'You have pending appeals and so you cant send another appeal!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
        $admins = User::where('is_admin', 1)->get();
        $userId = auth()->id();
        $appeal = new Appeal;

        $appeal->user_id =$userId;
        $appeal->appeal_type ="need_blood";
        $appeal->save();

        $recentAppeal = Appeal::where('user_id', auth()->id())->latest()->first();

        foreach ($admins as $admin) {
            $admin->notify(new NewAppeal($recentAppeal));
        }
        
        Session::flash('message', 'Appeal sent Successfully! The nearest donor or blood bank will contact you soon!');
        Session::flash('alert-class', 'alert-success');
        return back();
    }
}
