<?php

use App\Models\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     $jobs = job::all();
//     return view('jobs',compact('jobs'));
// });

// Route::get('/', function () {
//     return view('jobs',['abc'=>job::all()]);
// });
// Route::get('/job/{var}', function (job $var) {
//     // $job = Job::find($id);
//     // if(!$job)
//     // {
//     //     abort(404);
//     // }
//     return view('job', ['opd' => $var]);
// });
//Route::get('/Folder',[JobsController::class,'store']);


// Show all
Route::get('/',[JobsController::class,'index']);
//Show one using id
Route::get('/job/{var}',[JobsController::class,'show']);


// Manage owen job
Route::get('/Folder/manage', [JobsController::class, 'manage'])->middleware('auth');

// Create form for
Route::get('/Folder/create',[JobsController::class,'create'])->middleware('auth');
// Store data 
Route::match(['get', 'post'], '/Folder', [JobsController::class,'store'])->middleware('auth');


//Show Edit Form
Route::get('/Folder/{job}/edit',[JobsController::class,'edit'])->middleware('auth');
// // Update Data
// Route::match(['post','put'],'/Folder/{job}', [JobsController::class,'update'])->middleware('auth')->name('Folder.update');
Route::get('/Folder/{job}',[JobsController::class,'update'])->middleware('auth');

//Delete job 
Route::match(['get','delete'],'/Folder/{para}',[JobsController::class,'destroy'])->middleware('auth');


// Show Registre Form/Create
Route::get('/Registre',[UserController::class ,'create'])->middleware('guest');
// Create a new user(Store Data)
Route::match(['get','post'],'/Users', [UserController::class, 'store']);

// Logout
Route::match(['get','post'],'/logout', [UserController::class,'logout']);

// Show Login form
Route::get('/Login',[UserController::class ,'login'])->name('login')->middleware('guest');
// Route::match(['get','post'],'/users/test',[UserController::class ,'Open']);
Route::post('/users/test',[UserController::class ,'Open']);







// Nassim@gmail.com nass2002

// Route::get('/hello/{id}',function($id)
// {
//     return ('hello world '. $id);
// })->where('id','[0-9]+');


// Route::get('/serach',function(Request $request)
// {
//     return $request->name .'  '. $request->Age;
// });
// Route::post('/Folder',[JobsController::class,'store']);
// Route::put('/Folder/{Job}',[JobsController::class,'update']);