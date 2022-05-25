<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\PayableSetup;

class PayableSetupController extends Controller
{
    public function index(){
        $all_payable_setups = PayableSetup::select_payable();
        return view('pages.payable_setup', compact('all_payable_setups'));
    }

    public function add_payable(Request $request){

        $code = $request->get('txt_payable_code');
        $name = $request->get('txt_payable_name');
        $description = $request->get('txt_payable_description');
        $type = "Payable";
        

        $payable_details = PayableSetup::add_payable($code, $name, $description, $type);

        Alert::toast($name.' Added Successfully','success');
        $all_payable_setups = PayableSetup::select_payable();
        return redirect('pages.payable_setup');
    }

    public function edit_payable($id){
        $payable_to_edit = PayableSetup::find($id);
            return view('pages.payable_setup_edit', compact('payable_to_edit'));
    }

    public function update_payable(Request $request, $id){
        $update_payable = PayableSetup::find($id);
        $update_payable->name = $request->get('txt_edit_payable_name');
        $update_payable->description = $request->get('txt_edit_payable_description');
        $update_payable->save();

        Alert::toast('Records Successfully Updated','success');
        return redirect('pages.payable_setup');
    }

     public function delete_payable($id){
        // Alert::question('Are you sure?','You won\'t be able to revert this!')
        // ->showConfirmButton('Yes! Delete it', ' #008000')
        // ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        $delete_payable_id = PayableSetup::find($id);
        $delete_payable_id->delete();

        Alert::toast('Record Deleted','warning');
        return redirect('pages.payable_setup');
     }

}
