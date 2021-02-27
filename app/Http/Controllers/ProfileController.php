<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function ChangePassword(Request $request){
        $user = User::find($request->id);

        $validated = $request->validate([
            'oldPassword'=>'required',
            'newPassword'=>'required|min:8',
            'repeatPassword'=>'required|min:8'
        ]);

        if((Hash::check($request->oldPassword, auth()->user()->password)))
        {
            if($request->newPassword === $request->repeatPassword)
            {
                $user->update([
              //      'name'=>$request->name,
                //    'email'=>$request->email,
                    'password'=>Hash::make($request->newPassword),
                    //'role'=> $request->role


                ]);
                return redirect()->route('profile', compact('user'))->with('message', 'Your password has been changed successfully');
            }
            else{
                return redirect()->route('profile', compact('user'))->with('error', 'Passwords do not match');
            }

        }
        else{
            return redirect()->route('profile', compact('user'))->with('error', 'Wrong current password');

        }

    }

    public function update(Request $request)
    {

        $user = User::findorfail($request->id);


        if((Hash::check($request->password, auth()->user()->password))){
            if(User::where("email", $request->email)->exists())
            {
                return redirect()->route('profile', compact('user'))->with('error', 'This email already exists');
            }
            else {


                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role


                ]);
                return redirect()->route('profile', compact('user'))->with('message', 'Your email has been changed successfully');
            }

        }
        else{
            return redirect()->route('profile', compact('user'))->with('error', 'Wrong password');

        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
