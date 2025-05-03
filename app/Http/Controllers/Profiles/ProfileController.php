<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $profiles = Profile::query()->orderBy('id', 'desc')->paginate(5);
        return view('profile.profiles', compact('profiles'));
    }

    public function create()
    {
        return view('profile.create');
    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        profile::create([
            'phone' => $request->phone,
            'address' => $request->address,
            'user_id' => $user->id,
        ]);

        return redirect()->route('DataProject.profiles.index')->with('message', 'تم الاضافة');
    }

    public function edit($id)
    {
        $profile = Profile::query()->findOrFail($id);
        return view('profile.edit', compact('profile'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);
        //  dd($request);
        $profile = Profile::query()->findOrFail($request->id);
        $profile->update([
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        $user = User::query()->findOrFail($profile->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $profile->user->save();
        $profile->save();
        return redirect()->route('DataProject.profiles.index')->with('success', 'Profile updated successfully!');
    }


    public function delete($id)
    {
        $profile = Profile::findOrFail($id);
        $user = User::findOrFail($profile->user_id);
        $user->delete();
        $profile->delete();

        return redirect()->route('DataProject.profiles.index')->with('success', 'Profile deleted successfully!');
    }
}
