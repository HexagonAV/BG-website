<?php

namespace App\Http\Controllers;

use Illuminate\Auth\GenericUser;
use App\Models\User;
use Auth;
use DB;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function main() {
        return view('main');
    }

    public function profile() {
        if (Auth::check()) {
            return view('profile');
        } else {
            return Redirect::to('/');
        }
    }

    public function reg() {
        return view('reg');
    }

    public function auth() {
        return view('auth');
    }

    public function register(request $request) {
        $data = $request->validate([
            "name" => ["required", "min:4"],
            "email" => ["required", "email", "string", "unique:users,email"],
            "password" => ["required", "confirmed", "min:8"],
        ]);


        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"]),
        ]);

        Auth::login($user, true);
        return Redirect::to('/profile');
    }

    public function authentication(request $request) {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required", "min:8"],
        ]);

        $user = User::where('email', "=", $data["email"])->first();

        if (!is_null($user) && Hash::check($data["password"], $user->password)) {
            Auth::login($user, true);
            return Redirect::to('/profile');
        }

        return Redirect::to('/auth')->withErrors(["email" => "Пользователь не найден"]);
    }

    public function get_reviews(request $request) {
        return preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, DB::table('users')->join('reviews', 'users.id', '=', 'reviews.user_id')
        ->select('users.name', 'users.avatar', 'users.profileURL', 'users.buys', 'reviews.stars', 'reviews.text', 'reviews.created_at')
        ->orderBy('reviews.created_at', 'desc')
        ->offset($request->offset)
        ->limit(50)
        ->get());
    }
}
