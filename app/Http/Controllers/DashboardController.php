<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use PDF;
use App\Models\User;
use App\Models\SubCounty;
use App\Models\Appeal;
use App\Models\BloodBank;
use App\Models\Donation;
use App\Models\BloodAppeal;
use App\Notifications\BloodAppealNotification;
use App\Notifications\LowBlood;
use App\Notifications\Overstayed;
use App\Models\BloodTransferHistory;

class DashboardController extends Controller
{
    //admin home page
    public function sub_counties()
    {
        $subcounties = SubCounty::all();
        return $subcounties;
    }
    public function home()
    {
        $A_plus = BloodBank::sum('A_plus');
        $A_minus = BloodBank::sum('A_minus');
        $B_plus = BloodBank::sum('B_plus');
        $B_minus = BloodBank::sum('B_minus');
        $AB_plus = BloodBank::sum('AB_plus');
        $AB_minus = BloodBank::sum('A_plus');
        $A_plus = BloodBank::sum('AB_minus');
        $O_plus = BloodBank::sum('O_plus');
        $O_minus = BloodBank::sum('O_minus');

        $total_bb = $A_plus+ $A_minus+$B_plus+ $B_minus+$AB_plus+$AB_minus+$A_plus+ $O_plus +$O_minus;

        $blood_banks = User::where('is_blood_bank', 1)->latest()->get();
        $patients = User::where('is_patient', 1)->latest()->get();
        $donors = User::where('is_donor', 1)->latest()->get();
        $admins= User::where('is_admin', 1)->latest()->get();
        $patient_appeals= Appeal::all();
        $blood_appeals= BloodAppeal::all();

        $logedInUserAppeals = Appeal::where('user_id', auth()->id())->get();

        $data =[
            "A_plus"=>$A_plus,
            "A_minus"=>$A_minus,
            "B_plus"=>$B_plus,
            "B_minus"=>$B_minus ,
            "AB_plus"=>$AB_plus,
            "AB_minus"=>$AB_minus,
            "A_plus"=>$A_plus,
            "O_plus"=>$O_plus,
            "O_minus"=>$O_minus,
        ];


        $users = User::paginate(20);
        $blood_bank = BloodBank::where('user_id', auth()->id())->first();


    
        // return view
        // \View::share('data', $data);

        return view(
            'admin.pages.home',
            compact(
                'users',
                'blood_bank',
                'data',
                'total_bb',
                'blood_banks',
                'patients',
                'donors',
                'admins',
                'blood_appeals',
                'patient_appeals',
                'logedInUserAppeals'
            )
        );
    }


    public function users()
    {
        $users = User::paginate(20);
        return view('admin.pages.users')->withUsers($users);
    }
    public function addPatientForm()
    {
        $sub_counties = $this->sub_counties();
        return view('admin.pages.add_patient', \compact('sub_counties'));
    }

    public function addDonorForm()
    {
        $sub_counties = $this->sub_counties();
        return view('admin.pages.add_donor', \compact('sub_counties'));
    }

    public function addBankForm()
    {
        $sub_counties = $this->sub_counties();
        return view('admin.pages.add_bank', \compact('sub_counties'));
    }
    public function user($id)
    {
        $user = User::find($id);

        return view('admin.pages.user', \compact('user'));
    }

    public function notifications()
    {
        $appeals = auth()->user()->notifications->where('type', "App\Notifications\NewAppeal")->where('read_at', null)->all();
        $lb_notis = auth()->user()->notifications()->where('type', "App\Notifications\LowBlood")->where('read_at', null)->get();
        $blood_appeals =auth()->user()->notifications->where('type', "App\Notifications\BloodAppealNotification")->where('read_at', null)->all();
        $reminders = auth()->user()->notifications->where('type', "App\Notifications\Transfusion")->where('read_at', null)->all();
        $overstayed = auth()->user()->notifications->where('type', "App\Notifications\Overstayed")->where('read_at', null)->all();
        return view('admin.pages.notifications', \compact('appeals', 'blood_appeals', 'reminders', 'lb_notis', 'overstayed'));
    }

    public function notificationRead($id)
    {
        $notification = auth()->user()->notifications->where('id', $id)->first();
        $notification->markAsRead();
        return back();
    }

    public function appeals()
    {
        $appeals = Appeal::latest()->paginate(20);
        return view('admin.pages.appeals', \compact('appeals'));
    }
    public function appealAction($id)
    {
        $appeal = Appeal::find($id);
        dd($appeal);
    }

    public function usersReport()
    {
        $users = User::latest()->get();
        $pdf = PDF::loadView('admin.pages.users_pdf', \compact('users'));

        // // download PDF file with download method
        return $pdf->download('users.pdf');
    }

    public function bankAppealForm()
    {
        return view('admin.pages.blood_appeal');
    }

    public function bankAppeal(Request $request)
    {
        $subcounty = auth()->user()->subcounty;
        $admins = User::where('is_admin', 1)->get();
        $donors = User::where('is_donor', 1)->where('subcounty', $subcounty)->get();
        $banks = User::where('is_blood_bank', 1)->where('subcounty', $subcounty)->where('id', '!=', auth()->id())->get();
        $appeal = new BloodAppeal;
        $appeal->blood_type = $request->blood_type;
        $appeal->quantity = $request->quantity;
        $appeal->appeal_type = "bank_need_blood";
        $appeal->user_id = auth()->id();
        $appeal->save();

        $recentAppeal = BloodAppeal::where('user_id', auth()->id())->latest()->first();
        foreach ($admins as $admin) {
            $admin->notify(new BloodAppealNotification($recentAppeal));
        }

        foreach ($donors as $donor) {
            $donor->notify(new BloodAppealNotification($recentAppeal));
        }

        foreach ($banks as $bank) {
            $bank->notify(new BloodAppealNotification($recentAppeal));
        }

        Session::flash('message', 'Appeal sent Successfully! Admins and donors in your subcounty have been notified!');
        Session::flash('alert-class', 'alert-success');
        return back();
    }
    public function bloodTransferForm($id)
    {
        $appeal = BloodAppeal::where('user_id', $id)->where('status', 0)->latest()->first();

        if (!$appeal) {
            Session::flash('message', 'Looks like the Appeal has been solved!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
        $blood_bank = BloodBank::where('user_id', $id)->first();
        return view('admin.pages.blood_transfer', \compact('appeal', 'blood_bank'));
    }

    public function bloodTransfer(Request $request)
    {
        $blood_type = $request->blood_type;
        $bank_id = (int)$request->bank_id;
        $appeal = BloodAppeal::where('user_id', $bank_id)->where('status', 0)->first();
        if (!$appeal) {
            Session::flash('message', 'The blood bags have already been transfered from another bank, thank you!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
       
        $type ="";
        if ($blood_type =="A+") {
            $type ="A_plus";
        }
        if ($blood_type =="A-") {
            $type ="A_minus";
        }
        if ($blood_type =="B+") {
            $type ="B_plus";
        }
        if ($blood_type =="B-") {
            $type ="B_minus";
        }
        if ($blood_type =="AB+") {
            $type ="AB_plus";
        }
        if ($blood_type =="AB-") {
            $type ="AB_minus";
        }
        if ($blood_type =="O+") {
            $type ="O_plus";
        }
        if ($blood_type =="O-") {
            $type ="O_minus";
        }
        
  
        $quantity =$request->quantity;
        
        $from = BloodBank::where('user_id', auth()->id())->first();
        $to = BloodBank::where('user_id', $bank_id)->first();
        $fromquantity = $from->$type;

        if ($fromquantity < $quantity) {
            Session::flash('message', 'Not enough blood bags for the requested Blood group!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        } else {
            $to->$type += $quantity;
            $from->$type -=$quantity;

            $to->save();
            $from->save();

            $appeal->status = 1;

            $appeal->save();


            $history = new BloodTransferHistory;
            $history-> from_bank_id = $from->id;
            $history-> to_bank_id = $to->id;
            $history-> quantity = $quantity;
            $history-> blood_type = $type;

            $history->save();

            Session::flash('message', 'Blood transfer recorded successfully!');
            Session::flash('alert-class', 'alert-success');
            return back();
        }
    }

    public function banksForm()
    {
        $subcounties = $this->sub_counties();
        return view('admin.pages.banks_list_form', \compact('subcounties'));
    }

    public function banksList(Request $request)
    {
        $subcounty = $request->subcounty;
        $blood_banks = User::where('is_blood_bank', 1)->where('subcounty', $subcounty)->get();
        
        return view('admin.pages.banks_list', \compact('blood_banks', 'subcounty'));
    }

    public function banksListReport($county)
    {
        $subcounty = $county;
        $blood_banks = User::where('is_blood_bank', 1)->where('subcounty', $subcounty)->get();
        $pdf = PDF::loadView('admin.pages.banks_list_pdf', \compact('blood_banks', 'subcounty'));

        // // download PDF file with download method
        return $pdf->download('banks_list.pdf');
    }

    public function donorsForm()
    {
        $subcounties = $this->sub_counties();
        return view('admin.pages.donors_list_form', \compact('subcounties'));
    }
    public function donorsList(Request $request)
    {
        $subcounty = $request->subcounty;
        $donors = User::where('is_donor', 1)->where('subcounty', $subcounty)->get();
        
        return view('admin.pages.donors_list', \compact('donors', 'subcounty'));
    }

    public function donorsListReport($county)
    {
        $subcounty = $county;
        $donors = User::where('is_donor', 1)->where('subcounty', $subcounty)->get();
        $pdf = PDF::loadView('admin.pages.donors_list_pdf', \compact('donors', 'subcounty'));

        // // download PDF file with download method
        return $pdf->download('donors_list.pdf');
    }

    public function downloadqr($id)
    {
        $don = Donation::find($id);
        $filepath = public_path('storage/qrcodes/' .$don->qr_code);
        return \Response::download($filepath);
    }

    public function donorHistory($id)
    {
        $donations = Donation::where('donor_id', $id)->latest()->get();
        return view('admin.pages.donor_history', compact('donations'));
    }

    public function bbReportForm()
    {
        $subcounties = $this->sub_counties();
        return view('admin.pages.bb_report_form', compact('subcounties'));
    }

 
    public function bbReport(Request $request)
    {
        $subcounty = $request->subcounty;
        $blood_banks = User::where('is_blood_bank', 1)->where('subcounty', $subcounty)->get();
        
        return view('admin.pages.bb_report', \compact('blood_banks', 'subcounty'));
    }

    public function bbDReport($county)
    {
        $subcounty = $county;
        $blood_banks = User::where('is_blood_bank', 1)->where('subcounty', $subcounty)->get();
        $pdf = PDF::loadView('admin.pages.bb_report_pdf', \compact('blood_banks', 'subcounty'));

        // // download PDF file with download method
        return $pdf->download('bb_d_list.pdf');
    }
}
