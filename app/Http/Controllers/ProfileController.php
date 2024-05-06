<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
  
class ProfileController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image',
        ]);
  
        $input = $request->all();
          
        if ($request->hasFile('image')) {
            $avatarName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('image'), $avatarName);
  
            $input['image'] = $avatarName;
        
        } else {
            unset($input['image']);
        }
  
        auth()->user()->update($input);
    
        return back()->with('success', 'Profile updated successfully.');
    }
}