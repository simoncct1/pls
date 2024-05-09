<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'avatar' => 'image',
        ]);
  
        $input = $request->all();
          
        if ($request->hasFile('avatar')) {
            $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('image'), $avatarName);
  
            $input['avatar'] = $avatarName;
        
        } else {
            unset($input['avatar']);
        }
  
        $user->update($input);
    
        return back()->with('success', 'Profile updated successfully.');
    }

    public function badgesite(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->bdg1 = '/badges/site.png';
        $user->save();
        return back()->with('success', 'Profile updated successfully.');
    }

}
