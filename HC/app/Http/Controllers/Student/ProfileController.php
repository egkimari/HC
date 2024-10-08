<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller; // Corrected import statement
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(Request $request): View
    {
        return view('frontend.profile.show', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('frontend.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        try {
            $user = $request->user();
            $user->fill($request->validated());

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->save();

            return Redirect::route('student.profile.show')->with('status', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return Redirect::route('student.profile.edit')->with('error', 'Failed to update profile. Please try again.');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        try {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/')->with('status', 'Your account has been deleted.');
        } catch (\Exception $e) {
            return Redirect::route('student.profile.edit')->with('error', 'Failed to delete account. Please try again.');
        }
    }
}
