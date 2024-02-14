<?php

use App\Events\UserLoggedIn;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
})->name('home');

Route::get('/login', function () {
  return view('login');
})->name('login.index');

Route::post('/login', function () {

  $user = User::where('email', request('email'))->first();

  if ($user && Hash::check(request('password'), $user->password)) {
    auth()->login($user);
    broadcast(new UserLoggedIn($user));
    return redirect('/');
  }

  return back();
})->name('login.store');

Route::post('/check-user', function (Request $request) {
  $userReceived = $request->data['user'];
  $userLoggedIn = auth()->user();

  if ($userReceived['id'] === $userLoggedIn->id) {
    auth()->logout();
    return response()->json(['message' => 'Você foi deslogado']);
  }
});


Route::delete('logout', function () {
  auth()->logout();
  return redirect('/');
})->name('login.destroy');
