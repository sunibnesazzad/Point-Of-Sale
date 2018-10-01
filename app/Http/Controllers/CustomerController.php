<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use DataTables;
use App\Product;
use App\OrderProduct;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function show(){
        $user = Auth::user();
        $num2 = User::count();
        $num1 = Product::count();
        $details = DB::table('order_products')->where('user_id', $user->id)->get();
        return view('dashbord.admin_dash',compact('user','num1','num2','details'))->with('title','Dashboard');

    }

    //Showing Customer page
    public function index(){
        $user = Auth::user();
        $customers= User::all();
        $number= User::count();
        return view('customers.index',compact('user','customers','number'))->with('title','All Customers');

    }

    //showing add customer view
    public function create(){
        $user = Auth::user();
        $customers= User::all();
        return view('customers.addcustomers',compact('user','customers'))->with('title','Add Customer');

    }

    //Storing customer in database
    public function store(Request $request){

        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            /*'image' => 'required'*/
        ]);
        //crete and save the user

        // $user= User::create(request(['name','email','password']));

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->position = request('position');
        $user->save();
        //sign them in

        //creating profile part
        $profile = new Profile;
        $profile->user_id = $user->id;
        /*$profile->position = request('position');*/

        //for image
        /*if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('upload/default/' .$filename);
            Image::make($image)->resize(200,200)->save($location);

            $profile->image=$filename;
        }*/

        $profile->save();

        $notification = [
            'message' => 'Customer is added successfully.!',
            'alert-type' => 'success'
        ];
        return redirect('/customers')->with($notification);

    }
    //Data for ajax datatable
    public function getCustomers()
    {
        return Datatables::of(User::query())->make(true);

    }

}
