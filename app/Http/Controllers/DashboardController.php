<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;   
use App\Expense;
use App\Business;
class DashboardController extends Controller
{
    public function index() {
        return view('dashboard');
        
    }
    
    public function display(Request $request) {
        //validate the form input
        $this->validate($request, [
            'from' => 'required|date',
            'to' => 'required|date',
        ]);
        
        //get the from and to dates
        $from = $request->input('from');
        $to = $request->input('to');
        
        //create a collection of data for the month chart
        $sumByMonth= Expense::select(
                DB::raw('sum(amount) as sum'),
                DB::raw("DATE_FORMAT(date,'%M %Y') as month"),
                DB::raw("date")
            )
            ->where('date','>=',$from)
            ->where('date','<=',$to)
            ->orderBy('date', 'ASC')
            ->groupBy('month')
            ->get();
        
        //create a collection of data for the category chart
        $expenses = Expense::with('business')->where('date','>=',$from)->where('date','<=',$to)->get();
        $sumByCategory = $expenses->groupBy('business.category');
        //create a collection of data for the top expense charts
        $topExpenses = $expenses->sortByDESC('amount')->take(10);
        
        
        return view('dashboard')->with('sumByMonth', $sumByMonth)->with('sumByCategory', $sumByCategory)->with('topExpenses', $topExpenses);
    }
}
?>