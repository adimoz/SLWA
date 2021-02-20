

class studentApplicationController extends Controller
{
    function pendingApplications(Request $req){
    
        function pending()
        {
        $uid = Auth::id();
        //fetch the data from users table
        $allUsers = DB::table('users')->where('id', '!=', $uid)->get();
        return view('application', compact('allUsers'));
        }
        
        $AppController = new ApplicationFacade;

        $AppController->create($req);

       
        
    }

    function evaluate(){
        return view('evaluation');
    }



}
