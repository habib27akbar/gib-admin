<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitKerjaController;
use App\Models\User;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::get('/check-username', function (Request $request) {
//     $exists = User::where('username', $request->query('username'))->exists();
//     return response()->json(['exists' => $exists]);
// });

Route::get('/check-username', function (Request $request) {
    $query = User::where('username', $request->query('username'));

    // Abaikan pengecekan jika sedang edit dan ID dikirim
    if ($request->has('id')) {
        $query->where('id', '!=', $request->query('id'));
    }

    $exists = $query->exists();
    return response()->json(['exists' => $exists]);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/login', [AuthController::class, 'login'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('auth', AuthController::class);
Route::resource('unit_kerja', UnitKerjaController::class);
Route::resource('customer', CustomerController::class);
