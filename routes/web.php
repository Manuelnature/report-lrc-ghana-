<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SetPasswordController;
use App\Http\Controllers\UserSetupController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\PayableSetupController;
use App\Http\Controllers\ReceivableSetupController;
use App\Http\Controllers\ProjectSetupController;
use App\Http\Controllers\BankSetupController;
use App\Http\Controllers\PayableController;
use App\Http\Controllers\ReceivableController;
use App\Http\Controllers\ChequeDisbursementController;
use App\Http\Controllers\ReviewPayableController;
use App\Http\Controllers\ApprovePayableController;
use App\Http\Controllers\ReviewReceivableController;
use App\Http\Controllers\ApproveReceivableController;
use App\Http\Controllers\BankAccountSetupController;
use App\Http\Controllers\CashbookController;
use App\Http\Controllers\PrepaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => 'disable_back_button'], function () {

    Route::get('/', [LoginController::class, 'index'])->middleware('alreadyLoggedIn');

    Route::post('auth.login', [LoginController::class, 'login_user']);


    Route::get('auth.set_password', [SetPasswordController::class, 'index']);
    Route::post('auth.set_password', [SetPasswordController::class, 'set_password']);


    Route::group(['middleware' => 'isLoggedIn'], function () {

        // USER SETUPS ========================
        Route::get('pages.user_setup', [UserSetupController::class, 'index']);
        Route::post('pages.user_setup', [UserSetupController::class, 'store']);

        // USER GROUPS ========================
        Route::get('pages.user_group', [UserGroupController::class, 'index']);
        Route::post('pages.user_group', [UserGroupController::class, 'assign_group'])->name('assign_new_group');

        // PAYABLE SETUPS ========================
        Route::get('pages.payable_setup', [PayableSetupController::class, 'index']);
        Route::post('pages.payable_setup', [PayableSetupController::class, 'add_payable']);
        Route::get('pages.payable_setup_edit/{id}', [PayableSetupController::class, 'edit_payable'])->name('payable_setup_edit');
        Route::patch('update/{id}', [PayableSetupController::class, 'update_payable'])->name('payable_setup_update');
        Route::delete('delete/{id}', [PayableSetupController::class, 'delete_payable'])->name('payable_setup_delete');

        // RECEIVABLE SETUPS ======================
        Route::get('pages.receivable_setup', [ReceivableSetupController::class, 'index']);
        Route::post('pages.receivable_setup', [ReceivableSetupController::class, 'add_receivable']);

        Route::get('pages.receivable_setup_edit/{id}', [ReceivableSetupController::class, 'edit_receivable'])->name('receivable_setup_edit');
        Route::post('update_setup/{id}', [ReceivableSetupController::class, 'update_receivable'])->name('receivable_setup_update');
        Route::post('delete_setup/{id}', [ReceivableSetupController::class, 'delete_receivable'])->name('receivable_setup_delete');

        // PROJECT SETUPS ======================
        Route::get('pages.project_setup', [ProjectSetupController::class, 'index']);
        Route::post('pages.project_setup', [ProjectSetupController::class, 'add_project'])->name('add_project');
        Route::get('pages.project_setup_edit/{id}', [ProjectSetupController::class, 'edit_project'])->name('project_setup_edit');
        Route::post('update_project/{id}', [ProjectSetupController::class, 'update_project'])->name('project_setup_update');
        Route::post('delete_project/{id}', [ProjectSetupController::class, 'delete_project'])->name('project_setup_delete');

        // BANK SETUPS ======================
        Route::get('pages.bank_setup', [BankSetupController::class, 'index']);
        Route::post('send_bank', [BankSetupController::class, 'get_bank_name'])->name('bankSetup');

        // BANK ACCOUNT SETUPS ======================
          Route::post('set_bank', [BankAccountSetupController::class, 'add_bank_details'])->name('addBank');
          Route::get('pages.bank_account_setup_edit/{id}', [BankAccountSetupController::class, 'edit_bank_account_setup'])->name('bank_account_setup_edit');
          Route::post('update_bank_account_setup/{id}', [BankAccountSetupController::class, 'update_bank_account_setup'])->name('bank_account_setup_update');
          Route::post('delete_bank_account_setup/{id}', [BankAccountSetupController::class, 'delete_bank_account_setup'])->name('bank_account_setup_delete');

        // PAYABLES ======================
        Route::get('pages.payable', [PayableController::class, 'index']);
        Route::post('pages.payable', [PayableController::class, 'add_payable']);
        Route::get('pages.payable_edit/{id}', [PayableController::class, 'edit_payable'])->name('payable_edit');
        Route::post('update_main/{id}', [PayableController::class, 'update_payable'])->name('payable_update');
        Route::post('delete_main/{id}', [PayableController::class, 'delete_payable'])->name('payable_delete');

        // RECEIVABLES ======================
        Route::get('pages.receivable', [ReceivableController::class, 'index']);
        Route::post('pages.receivable', [ReceivableController::class, 'add_receivable']);
        Route::get('pages.receivable_edit/{id}', [ReceivableController::class, 'edit_receivable'])->name('receivable_edit');
        Route::post('update_main_receivable/{id}', [ReceivableController::class, 'update_receivable'])->name('receivable_update');
        Route::post('delete_main_receivable/{id}', [ReceivableController::class, 'delete_receivable'])->name('receivable_delete');

        // CHEQUE DISBURSEMENT ======================
        Route::get('pages.cheque_disbursement', [ChequeDisbursementController::class, 'index']);
        Route::post('pages.cheque_disbursement', [ChequeDisbursementController::class, 'add_cheque']);
        Route::get('pages.cheque_disbursement_edit/{id}', [ChequeDisbursementController::class, 'edit_cheque'])->name('cheque_disbursement_edit');
        Route::post('update_cheque/{id}', [ChequeDisbursementController::class, 'update_cheque'])->name('cheque_disbursement_update');
        Route::post('delete_cheque/{id}', [ChequeDisbursementController::class, 'delete_cheque'])->name('cheque_disbursement_delete');

        //  PREPAYMENT  ======================
        Route::get('pages.prepayment', [PrepaymentController::class, 'index']);
        Route::post('pages.prepayment', [PrepaymentController::class, 'add_prepaid'])->name('add_prepaid');
        Route::get('pages.prepayment_edit/{id}', [PrepaymentController::class, 'edit_prepaid'])->name('prepayment_edit');
        Route::post('update_prepaid', [PrepaymentController::class, 'update_prepaid'])->name('prepaid_update');

        // REVIEW PAYABLES ======================
        Route::get('pages.review_payable', [ReviewPayableController::class, 'index']);
        Route::post('update_created_status/{id}', [ReviewPayableController::class, 'approve_created_payable'])->name('created_payable_approve');
        Route::post('reject_created_status/{id}', [ReviewPayableController::class, 'reject_created_payable'])->name('created_payable_reject');

        // APPROVE PAYABLES ======================
        Route::get('pages.approve_payable', [ApprovePayableController::class, 'index']);
        Route::post('update_payable_reviewed_status/{id}', [ApprovePayableController::class, 'approve_reviewed_payable'])->name('reviewed_payable_approve');
        Route::post('reject_payable_reviewed_status/{id}', [ApprovePayableController::class, 'reject_reviewed_payable'])->name('reviewed_payable_reject');


        // REVIEW RECEIVABLES ======================
        Route::get('pages.review_receivable', [ReviewReceivableController::class, 'index']);
        Route::post('update_status/{id}', [ReviewReceivableController::class, 'approve_created_receivable'])->name('created_receivable_approve');
        Route::post('reject_status/{id}', [ReviewReceivableController::class, 'reject_created_receivable'])->name('created_receivable_reject');

        // APPROVE RECEIVABLES ======================
        Route::get('pages.approve_receivable', [ApproveReceivableController::class, 'index']);
        Route::post('update_reviewed_status/{id}', [ApproveReceivableController::class, 'approve_reviewed_receivable'])->name('reviewed_receivable_approve');
        Route::post('reject_reviwed_status/{id}', [ApproveReceivableController::class, 'reject_reviewed_receivable'])->name('reviewed_receivable_reject');

        // CASHBOOK REPORT ======================
        Route::get('pages.cashbook', [CashbookController::class, 'index']);
        // Route::get('pages.cashbook_report', [CashbookController::class, 'view_report']);
        Route::post('pages.cashbook', [CashbookController::class, 'get_dates'])->name('getDates');

        // DASHBOARD ======================
        Route::get('pages.dashboard', [DashboardController::class, 'index']);

        // LOGOUT ======================
        Route::get('/logout', [LoginController::class, 'logout_user'])->name('auth.logout');
    });

});