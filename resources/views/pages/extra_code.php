$request->validate([
                'txt_first_name' => 'required',
                'txt_last_name' => 'required',
                'txt_email' => 'required|email|unique:tbl_users,email',
                'txt_user_group' => 'required'
                ], [
                'txt_first_name.required' => 'Firstname is required',
                'txt_last_name.required' => 'Lastname is required',
                'txt_user_group.required' => 'Assign user to a group',
                'txt_email.required' => 'Email is required',
                'txt_email.email' => 'Email field must have a valid email address',
                'txt_email.unique' => 'Email already exist'
            ]);


            @foreach($get_payable_type as $cat)
                                            <td>
                                                @php
                                                    echo $cat->payable_type; 
                                                @endphp
                                               
                                            </td>
                                            <td> 
                                                @php
                                                    $amount = $amount + $cat->amount;
                                                    echo $amount;
                                                 @endphp
                                            </td>
                                            <td></td>
                                        @endforeach

    ===============Better So Far ==================

public function index(){
        $get_all = TrialBalance::select_category();
        dd($get_all);
        foreach($get_all as $category){
            $get_payable_type = TrialBalance::select_from_payable($category->name);

          $amount = 0;
              foreach($get_payable_type as $cat){
                $amount = $amount + $cat->amount;
                $category_name = $cat->payable_type;    
                // dump($category_name.' // '.$amount);    
            }
            dump($category_name.' // '.$amount); 
            //  return view('pages.trial_balance', compact('category_name', 'amount'));
                // dump($amount);
                    // dump($amount);
            // return view('pages.trial_balance', compact('get_payable_type', 'amount'));
            }
        // return view('pages.trial_balance', compact('category_name', 'amount'));
    }

    ============@php
                                            for ($i=0; $i < count($trial_balance); $i++) { 
                                        @endphp
                                                <td>
                                           {{$trial_balance[$i]->report_category}}
                                            
                                         </td>
                                         <td> 
                                            {{$trial_balance[$i]->amount}}
                                         </td>
                                        @php
                                            }



======================TRIAL REPORT CONTROLLER (working index function)==================================
public function index(){
        $get_all = TrialBalance::select_category();
        dump($get_all);


        $get_all_payable_categories = array();
        $get_all_receivable_categories = array();
        foreach($get_all as $category){
           $get_payable_categories = TrialBalance::select_payable_categories($category->report_category);
           $get_receivable_categories = TrialBalance::select_receivable_categories($category->report_category);
           dump($get_payable_categories);
           dump($get_receivable_categories);

            //dump($get_payable_type);
            $count_payable_array = (count($get_payable_categories));
            $count_receivable_array = (count($get_receivable_categories));

            $payable_amount = 0;
            $receivable_amount = 0;

            for ($i=0; $i < $count_payable_array; $i++) { 
                $payable_amount = $payable_amount + $get_payable_categories[$i]->amount;
            }

            for ($i=0; $i < $count_receivable_array; $i++) { 
                $receivable_amount = $receivable_amount + $get_receivable_categories[$i]->amount;
            }
            dump($payable_amount); 
            dump($receivable_amount);
            $report_category = $get_payable_categories[0]->report_category;
            $transaction_type = $get_payable_categories[0]->transaction_type;
            dump($get_payable_categories[0]->report_category); 
            // $get_all_payable_categories = $get_payable_type; 

            // $get_all_payable_categories = array(
            //     'amount' => $amount,
            //     'report_category'=> $report_category
            // );
            array_push( $get_all_payable_categories, ['payable_amount' => $payable_amount, 'report_category'=> $report_category]);
            // $get_all_payable_categories = ['amount' => $amount, 'report_category'=> $report_category];
        }
        dump( json_encode($get_all_payable_categories)) ; 
        $all_data = json_encode($get_all_payable_categories);
            
           /* $amount = 0;
            // $details = array('amount'=>'', 'report_cat'=>'');
            $details = array();

            foreach($get_payable_type as $cat){
                $amount = $amount + $cat->amount;
                $payable_name = $cat->payable_type; 
                $category_name = $cat->report_category; */
                // array_push( $total_amount, $amount);
            // }
            // dump($get_payable_type);

            // dd($get_category_payable_name);
            // array_push( $details, ['amount' => $amount, 'payable_name' => $payable_name, 'category_name'=> $category_name]);
            // dump($details);
            // dump($category_name.' // '.$amount); 
            //  return view('pages.trial_balance', compact('category_name', 'amount'));
                // dump($amount);
                    // dump($amount);
            // return view('pages.trial_balance', compact('details'));
            //}
            
        // return view('pages.trial_balance')->with('get_all_payable_categories', json_encode($get_all_payable_categories, true));
        return view('pages.trial_balance', compact('all_data'));
    }  

======================END OF TRIAL REPORT CONTROLLER (working index function)==================================