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


=========================Working Code ==============================
public function index(){
        $get_all = TrialBalance::select_category();
        dump($get_all);


        $get_all_payable_categories = array();
        // $get_all_receivable_categories = array();
        foreach($get_all as $category){
            if ($category->type == 'Payable') {
                $get_payable_categories = TrialBalance::select_payable_categories($category->report_category);

            }
            elseif ($category->type == 'Receivable') {
                $get_payable_categories = TrialBalance::select_receivable_categories($category->report_category);
            }

                $count_payable_array = (count($get_payable_categories));

                $payable_amount = 0;
                for ($i=0; $i < $count_payable_array; $i++) {
                    $payable_amount = $payable_amount + $get_payable_categories[$i]->amount;
                }
                dump($payable_amount);
                $payable_report_category = $category->report_category;
                $payable_transaction_type = $category->type;
                // $payable_report_category = $get_payable_categories[0]->report_category;
                // $payable_transaction_type = $get_payable_categories[0]->transaction_type;
                dump($payable_report_category);
                dump($payable_transaction_type);

                array_push( $get_all_payable_categories, ['payable_amount' => $payable_amount, 'report_category'=> $payable_report_category, 'transaction_type'=> $payable_transaction_type]);

        /*    if ($category->type == 'Receivable') {
                $get_receivable_categories = TrialBalance::select_receivable_categories($category->report_category);
                dump($get_receivable_categories);

                $count_receivable_array = (count($get_receivable_categories));

                $receivable_amount = 0;
                for ($i=0; $i < $count_receivable_array; $i++) {
                    $receivable_amount = $receivable_amount + $get_receivable_categories[$i]->amount;
                }
                dump($receivable_amount);
                $receivable_report_category = $get_receivable_categories[0]->report_category;
                $receivable_transaction_type = $get_receivable_categories[0]->transaction_type;
                dump($get_receivable_categories[0]->receivable_report_category);

                array_push( $get_all_payable_categories, ['payable_amount' => $payable_amount, 'report_category'=> $receivable_report_category, 'transaction_type'=> $receivable_transaction_type]);
            } */

        }
        dump( json_encode($get_all_payable_categories)) ;
        $all_data = json_encode($get_all_payable_categories);

        return view('pages.trial_balance', compact('all_data'));
    }




    =================================================other tried methods ====================================
    public function store(){
        $get_all = TrialBalance::get_payable_type();
        dump($get_all);

        $amount = 0;
        foreach($get_all as $cat){
            $amount = $amount + $cat->amount;
            dump($cat->payable_type);
            // dump($cat->amount);
        }
        dump($amount);
        foreach($get_all as $category){
            // dump($category->payable_type);
            $get_payable_type_from_setup = TrialBalance::get_from_setup($category->payable_type);
            // dump( $get_payable_type_from_setup);

        }
        //     $get_payable_type = TrialBalance::select_from_payable($category->name);
        //     // dump($category->report_category.' // '.$category->name );
        //     // foreach($category->report_category as $cat_details){
        //         // dump($get_payable_type );
        //     // }
        //     // dump($get_payable_type);

        //     $amount = 0;
        //     foreach($get_payable_type as $cat){
        //         $amount = $amount + $cat->amount;
        //         $category_name = $cat->payable_type;
        //         // dump($cat->payable_type. ' /// '.$cat->amount);
        //                 // dump($cat->payable_type.' // '.$cat->amount);

        //                 // $amount = $amount + $cat1->amount;
        //             }
        //         dump($category_name);
        //         dump($amount);
        //             // dump($amount);
        //             // return view('pages.trial_balance', compact('get_payable_type'));
        //         }
        // return view('pages.trial_balance');
    }



    public function index_working(){
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

            array_push( $get_all_payable_categories, ['payable_amount' => $payable_amount, 'report_category'=> $report_category, 'transaction_type'=> $transaction_type]);
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


    public function index22(){
        $get_all_report  = TrialBalance::get_payable_report();
        dump($get_all_report);
        foreach($get_all_report as $category){
            $get_report_category = TrialBalance::get_report_category($category->report_category);
            // dd($get_report_category);
            // foreach($get_payable_type as $cat){
            //     $amount = $amount + $cat->amount;
            //     $category_name = $cat->payable_type;
            //     // array_push( $total_amount, $amount);
            //  }
            // // dd($get_category_payable_name);
            // array_push( $details, ['amount' => $amount, 'report_cat' => $category_name]);
            // dump($details);

            }


    }
