<?php

namespace App\Http\Controllers;

use App\Accounting;
use App\Http\Resources\TrilResource;
use Illuminate\Http\Request;
use App\FinancialTransactions;
use Illuminate\Support\Facades\DB;

class TriController extends Controller
{
    public function getTriList(){
       
        // $transaction = FinancialTransactions::select('financial_transactions.*','accountings.*')
        //                                       ->leftJoin('accountings')
        //                                       ->get();
        //                dd($transaction->toArray());
        // $transaction = FinancialTransactions::all();
      
// dd($transaction->toArray());
        //    $accountLists = Accounting::get();
            // dd($accountLists->toArray());
        // $accountLists = Accounting::select('accountings.*','currencies.name as currency_name')
        //                               ->leftJoin('financial_transactions','accountings.id','financial_transactions.account_id','financial_transactions.amount') 
        //                               ->leftJoin('currencies','currencies.id','financial_transactions.currency_id','currencies.name')                 
        //                               ->get();;

        //        $dataAccs = TrilResource::collection($accountLists);
        //        return $dataAccs;                      
                    // dd($accountLists->toArray());

        // dd($transaction->toArray());
    //     $debitTotal = FinancialTransactions::where('type','1')->sum('amount');
    //    return $debitTotal;
    //     $creditTotal = FinancialTransactions::where('type','2')->sum('amount');
    //     return $creditTotal;

        // $netDebitTotal = $debitTotal > $creditTotal ? ($debitTotal - $creditTotal) : 0;
        // $netCreditTotal = $creditTotal  > $debitTotal? ( $creditTotal- $debitTotal ) : 0;

        // $data = Accounting::leftJoin('financial_transactions', 'accountings.id', '=', 'financial_transactions.account_id')
        // // ->select('accountings.*', DB::raw('SUM(CASE WHEN financial_transactions.type = "1" THEN financial_transactions.amount ELSE 0 END) AS debit_sum'), DB::raw('SUM(CASE WHEN financial_transactions.type = "2" THEN financial_transactions.amount ELSE 0 END) AS credit_sum'))
        // ->groupBy('account_id')
        // ->where('type', 1)
        // ->selectRaw('account_id, SUM(CASE WHEN financial_transactions.type = "1" THEN financial_transactions.amount ELSE 0 END ) as debit_total')
        // ->get();
        // dd($data->toArray());

    //     $summations = FinancialTransactions::groupBy('account_id')
    //               ->where('type', 1)
    //               ->selectRaw('account_id, SUM( amount) as debit_total')
    //               ->get();
    // // dd($summations->toArray());
    // $creditTotals = FinancialTransactions::where('type', 2)
    //                   ->groupBy('account_id')
    //                   ->selectRaw('account_id, SUM(amount) as credit_total')
    //                   ->get();
              
    // return response()->json([
    //     "debitTotal"=>$summations,
    //     "creditTotal"=>$creditTotals
    // ]);


        // $accountId = Accounting::find('id');
        //   return $this->sumofAmount();

        $accountLists = Accounting::with(['transactions' => function ($query) {
                $query->select('account_id', DB::raw('SUM(CASE WHEN type = "1" THEN amount ELSE 0 END) as debit_sum'), DB::raw('SUM(CASE WHEN type = "2" THEN amount ELSE 0 END) as credit_sum'),
               
             )
                    ->groupBy('account_id');
            }])
            // ->where('id', $accountId)
            ->get();
                //        $dataAccs = TrilResource::collection($accountLists);
        //        return $dataAccs;  
            // ->sum('financial_transactions.amount');
            // dd($accountLists->toArray());
        // SELECT account_id, SUM(amount) AS total_amount
        // FROM financial_transactions
        // WHERE type = 1
        // GROUP BY account_id;
        return view('Admin.Report.tri',compact('accountLists'));

        // return view('Admin.Report.tri',compact('debitTotal','creditTotal','netDebitTotal','netCreditTotal','accountLists'));

    }//End method
    // public function sumofAmount(){
    //     $accountId = Accounting::find('id');
    //     // dd($accountId->toArray());
    //     $result=0;
    //     // $amount=$this->transactions()->get();
    //     $amounts=FinancialTransactions::where('type',"1")->get();
    //     // dd($amounts->toArray());

    
    //     foreach($amounts as $paiment){
    //         $result+=$paiment->amount;
    //     }
    //     return $result;
    
    // }

    //Filter
    public function getAccountListFilter(Request $request){
      
        $from = $request->from;
        $to = $request->to;
        
        // $date_filter = FinancialTransactions::whereBetween('date',[$from,$to])->with('accounting','currency')->get();
        // return $date_filter;
    //     $date_filter = Accounting::select('accountings.*','financial_transactions.*','currencies.name as currency_name')                            
    //     ->leftJoin('financial_transactions','accountings.id','financial_transactions.account_id','financial_transactions.amount') 
    //    ->leftJoin('currencies','currencies.id','financial_transactions.currency_id','currencies.name')                 
    //    -> whereBetween('date',[$from,$to])
    //    ->get();
    
    // $date_filter = Accounting::with(['transactions' => function ($query) {
    //     $query->select('account_id', DB::raw('SUM(CASE WHEN type = "1" THEN amount ELSE 0 END) as debit_sum'), DB::raw('SUM(CASE WHEN type = "2" THEN amount ELSE 0 END) as credit_sum'),
       
    //  )
    //         ->groupBy('account_id');
    // }])
    // // ->where('id', $accountId)
    // ->get();

    $date_filter = Accounting::with(['transactions' => function ($query) use ($from, $to) {
        $query->select('account_id','date', DB::raw('SUM(CASE WHEN type = "1" THEN amount ELSE 0 END) as debit_sum'), DB::raw('SUM(CASE WHEN type = "2" THEN amount ELSE 0 END) as credit_sum'))
            ->groupBy('account_id','date')
            ->whereBetween('date',[$from, $to]); // Replace 'date_column_name' with the actual column name for the date field in your transactions table.
    }])
    // ->where('id', $accountId)
    ->get();
    
// dd($date_filter->toArray());
        // $date_filter = Accounting::whereBetween('created_at',[$from,$to])->with('subheading','currency')->get();
        // return $date_filter;

        return response()->json([
            'date_filter' => $date_filter
       ]);
    }//End method
}

// exports.trialBalance = async (req, res) => {
//     let finalResult = []
//     let { start, end } = req.query
//     try {
//         const allAccounts = await AccountingList.find({}).populate('relatedType')
//         for (let i = 0; i < allAccounts.length; i++) {
//             const id = allAccounts[i]._id
//             let netType = '';
//             let netAmount = 0;
//             const debit = await Transaction.find({ relatedAccounting: id, type: 'Debit', date: { $gte: start, $lte: end } })
//             // if (debit.length === 0) return res.status(500).send({error:true, message:'Debit Data Not Found!'})
//             const totalDebit = debit.reduce((acc, curr) => acc + Number.parseInt(curr.amount), 0);

//             const credit = await Transaction.find({ relatedAccounting: id, type: 'Credit', date: { $gte: start, $lte: end } })
//             // if (credit.length === 0) return res.status(500).send({error:true, message:'Credit Data Not Found!'})
//             const totalCredit = credit.reduce((acc, curr) => acc + Number.parseInt(curr.amount), 0);

//             if (totalDebit === totalDebit) {
//                 netType = null
//                 netAmount = 0
//             }
//             netAmount = totalDebit - totalCredit
//             if (netAmount > 0) netType = 'Debit'
//             if (netAmount < 0) netType = 'Credit'
//             finalResult.push({ totalCredit: totalCredit, totalDebit: totalDebit, netType: netType, netAmount: netAmount, accName: allAccounts[i].name, type: allAccounts[i].relatedType })
//         }
//         if (allAccounts.length === finalResult.length) return res.status(200).send({ success: true, data: finalResult })
//     } catch (err) {
//         return res.status(500).send({ error: true, message: err.message })
//     }
// }