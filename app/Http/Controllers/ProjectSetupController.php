<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ProjectSetup;

class ProjectSetupController extends Controller
{
    public function index(){
        $all_project_setups = ProjectSetup::select_project();
        return view('pages.project_setup', compact('all_project_setups'));
    }

    public function add_project(Request $request){
        // dd($request->all());
        $code = $request->get('txt_project_code');
        $name = $request->get('txt_project_name');
        $description = $request->get('txt_project_description');
        $type = "Project";
        

        $project_details = ProjectSetup::add_project($code, $name, $description, $type);

        Alert::toast($name.' Added Successfully','success');
        // $all_payable_setups = ProjectSetup::select_project();
        return redirect('pages.project_setup');
    }

    public function edit_project($id){
        $project_to_edit = ProjectSetup::find($id);
            return view('pages.project_setup_edit', compact('project_to_edit'));
    }

    public function update_project(Request $request, $id){
        $update_project = ProjectSetup::find($id);
        $update_project->name = $request->get('txt_edit_project_name');
        $update_project->description = $request->get('txt_edit_project_description');
        $update_project->save();

        Alert::toast('Records Successfully Updated','success');
        return redirect('pages.project_setup');
    }

     public function delete_project($id){

        $delete_project_id = ProjectSetup::delete_project($id);

        Alert::toast('Record Deleted','warning');
        return redirect('pages.project_setup');
     }

}
