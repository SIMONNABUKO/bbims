<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use QRCode;
use PDF;
use App\Models\Donation;
use App\Models\User;
use App\Models\BloodBank;

class DonationsController extends Controller
{
    //create donation form
    public function donations()
    {
        $donations = Donation::latest()->paginate(20);
        return view('admin.pages.donations', \compact('donations'));
    }
    public function form()
    {
        $donors = User::where('is_donor', 1)->where('admin_id', auth()->id())->latest()->get();
        return view('admin.pages.add_donation', compact('donors'));
    }

    public function create(Request $request)
    {
        $bb = BloodBank::where('user_id', auth()->id())->first();
        $donor = User::where('id', $request->donor_id)->first();
        $dir = "storage/qrcodes/";
        $bbname = str_replace(' ', '', $bb->name);
        $file = $bbname ."_".\str_replace(' ', '', $donor->name)."_".auth()->id() ."_".$request->donor_id."_".time().".png";
        $path =$dir.$file;

        $date = date("Y-m-d H:i:s");

        if (!auth()->user()->is_blood_bank) {
            Session::flash('message', 'Only blood banks are authorized to register blood donations!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
        $donation = new Donation;
        $donation->user_id = auth()->id();
        $donation->donor_id = $request->donor_id;
        $donation->blood_type =$request->blood_type;
        $donation->qr_code = $file;
        $donation->save();

        if ($request->blood_type =="A+") {
            $bb->A_plus +=1;
        }
        if ($request->blood_type =="A-") {
            $bb->A_minus +=1;
        }
        if ($request->blood_type =="B+") {
            $bb->B_plus +=1;
        }
        if ($request->blood_type =="B-") {
            $bb->B_minus +=1;
        }
        if ($request->blood_type =="AB+") {
            $bb->AB_plus +=1;
        }
        if ($request->blood_type =="AB-") {
            $bb->AB_minus +=1;
        }
        if ($request->blood_type =="O+") {
            $bb->O_plus +=1;
        }
        if ($request->blood_type =="O-") {
            $bb->O_minus +=1;
        }

        if ($donor->blood_type != $request->blood_type) {
            Session::flash('message', 'The blood group and the selected donor\'s blood group must match!');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }

        $bb->save();
        $donation = [
           "blood_bank" =>auth()->user()->name,
           "donor" => $donor->name,
           "blood_group" =>$request->blood_type,
           "donor_id" => $request->donor_id,
           "bank_id" => auth()->id(),
           "date_donated" => $date
        ];
        $json = json_encode($donation);
        QRCode::text($json)
            ->setSize(4)
            ->setMargin(2)
            ->setOutFile($path)
            ->png();

       
        Session::flash('message', 'Donation registered Successfully!');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    public function pdf()
    {
        $donations = Donation::latest()->get();

        $pdf = PDF::loadView('admin.pages.donations_pdf', \compact('donations'));

        // // download PDF file with download method
        return $pdf->download('donations.pdf');
    }
}
