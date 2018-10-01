<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
use Illuminate\Support\Facades\Storage;
use Image;

class ProfileController extends Controller
{
    public function show($id){
        $user=  Auth::user();
        return view('dashbord.dash_profile',compact('user'))->with('title',"Profile");
        /*return $user;*/
    }

    public function update(){

        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $user = Auth::user();
        return view('dashbord.edit_profile',compact('profile','user'))->with('title','Edit Profile');
    }

    public function edit(Request $request,$id){
        //validation
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'about' => 'required'
        ]);
        $data =array(
            'name' => $request->input('name'),
        );

        $data1 = array(
            /*'name' => $request->input('name'),*/
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'about_me' => $request->input('about'),

        );

        //for image
        $profile = Profile::find($id);
        //add new photo
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('upload/default/' .$filename);
            Image::make($image)->resize(200,200)->save($location);
            $oldImage = $profile->image;

            //update database
            $profile->image=$filename;
            //delete old image
            Storage::delete($oldImage);
        }

        //updating in database
        $profile->save();
        Profile::where('id',$id)->update($data1);
        User::where('id',$id)->update($data);
        $notification = [
            'message' => 'Profile Update Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->action('ProfileController@show', ['id' => $id])->with($notification)->with('title','Profile');
    }
}
