<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Event\Runtime\PHP;

class AdminController extends Controller
{
    public function addAdmin(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $admin = new User();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return response()->json(['message' => 'Admin added successfully'], 201);
    }

    public function deleteAdmin($id)
    {
        $admin = User::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        $admin->delete();
        return response()->json(['message' => 'Admin deleted successfully'], 200);
    }


}
