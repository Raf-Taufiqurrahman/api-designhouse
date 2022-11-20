<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\UpdatePasswordRequest;

class SettingController extends Controller
{
    public function updateProfile(UpdateProfileRequest $request)
    {
        // get user
        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'tagline' => $request->tagline,
            'location' => $request->location,
            'about' => $request->about,
            'available_to_hire' => $request->available_to_hire ? true : false ,
        ]);

        return new UserResource($user);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        return response()->json(['message' => 'Password Updated'], 200);
    }
}
