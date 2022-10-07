<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ReceivableSetUp;

class ReceivableSetupController extends Controller
{
    public function index(){
        $all_receivable_setups = ReceivableSetup::select_receivable();
        return view('pages.receivable_setup', compact('all_receivable_setups'));
    }

    public function add_receivable(Request $request){
        $request->validate([
            'txt_receivable_code' => 'required',
            'txt_receivable_name' => 'required',
            'txt_receivable_description' => 'required',
            'txt_report_category' => 'required'
            ], [
            'txt_receivable_code.required' => 'Receivable Code is required',
            'txt_receivable_name.required' => 'Receivable Name is required',
            'txt_receivable_description.required' => 'Receivable description is required',
            'txt_report_category.required' => 'Report Category is required',
        ]);

        $code = $request->get('txt_receivable_code');
        $name = $request->get('txt_receivable_name');
        $description = $request->get('txt_receivable_description');
        $report_catgory = $request->get('txt_report_category');
        $type = "Receivable";
        

        $receivable_details = ReceivableSetup::add_receivable($code, $name, $description, $type, $report_catgory);

        Alert::toast($name.' Added Successfully','success');
        $all_receivable_setups = ReceivableSetup::select_receivable();
        return redirect('pages.receivable_setup');
    }

    public function edit_receivable($id){
        $receivable_to_edit = ReceivableSetup::find($id);
            return view('pages.receivable_setup_edit', compact('receivable_to_edit'));
    }

    public function update_receivable(Request $request, $id){
        $update_receivable = ReceivableSetup::find($id);
        $update_receivable->name = $request->get('txt_edit_receivable_name');
        $update_receivable->description = $request->get('txt_edit_receivable_description');
        $update_receivable->report_category = $request->get('txt_edit_report_category');
        $update_receivable->save();

        Alert::toast('Records Successfully Updated','success');
        return redirect('pages.receivable_setup');
    }

     public function delete_receivable($id){
        // Alert::question('Are you sure?','You won\'t be able to revert this!')
        // ->showConfirmButton('Yes! Delete it', ' #008000')
        // ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        $delete_receivable_id = ReceivableSetup::delete_receivable($id);
        // $delete_receivable_id->delete();
        
        Alert::toast('Record Deleted','warning');
        return redirect('pages.receivable_setup');
     }
}
