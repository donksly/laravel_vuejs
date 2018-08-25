<?php

namespace App\Http\Controllers;

use App\UserAddress;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    public function  index()
    {
        return (UserAddress::all()->sortByDesc('id'));
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:user_address',
            'company' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);

        UserAddress::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'city' => $request->city,
            'address' => $request->address,
            'created_at' => null
        ]);
    }

    public function read($id)
    {
        return UserAddress::where('id','=',$id)->first();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'email' => 'required|unique:user_address'
        ]);

        $update = UserAddress::where('id','=',$id)->first();
        $update->name = $request->name;
        $update->email = $request->email;
        $update->company = $request->company;
        $update->city = $request->city;
        $update->address = $request->address;
        $update->updated_at = null;
        $update->save();
    }

    public function delete($id)
    {
        UserAddress::destroy($id);
    }
}
