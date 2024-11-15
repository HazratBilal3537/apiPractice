<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function getMe(Request $request)
    {
        $user = Auth::user();
        return $user;
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::create($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }
    public function login(Request $request)
    {

        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'remember' =>  ['boolean'],
        ]);

        // Find the user by email
        $user = User::where('email', $data['email'])->first();


        // Check if user exists and the password matches
        if (!$user || !Hash::check($data['password'], $user->password)) {
            // If the credentials are incorrect, throw a validation error
            return response()->json([
                'success' => false,
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }
        // Determine if "remember me" was checked
        $remember = isset($data['remember']) && $data['remember'];

        // Create a new token for the user, with an expiration time based on "remember me"
        $token = $user->createToken('auth_token', ['*'], $remember ? now()->addWeeks(1) : null)->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Attempt to send the password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check the status and return the appropriate response
        if ($status == Password::RESET_LINK_SENT) {
            return response()->json(['message' => __($status)], 200);
        }

        // If failed, throw a validation exception with the error message
        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }
    public function resetpassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        return response()->json(
            [
                'message' => __($status)
            ],
            200
        );
    }
    public function updatePassword(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed', // You can adjust the password strength requirements as needed
        ]);
        // Get the authenticated user
        $user = $request->user();
        // Check if the current password matches the one stored in the database
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'The current password is incorrect.',
            ], 400); // Bad request
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password updated successfully.',
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        // Revoke the user's token
        $user->tokens->each(function ($token) {
            $token->delete();
        });
        return response()->json([
            'success' => true,
            'message' => 'logout successfully.',
        ]);
    }

    public function deleteUser(Request $request){
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);
        $user=Auth::user();
        $user->delete();


    }
}
