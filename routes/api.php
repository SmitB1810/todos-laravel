<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ComponentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("task",[TaskController::class,'getData']);
Route::get("taskid/{id?}",[TaskController::class,'getDataParams']);
Route::post("addTask",[TaskController::class,'addData']);
Route::put("updTask/{id?}",[TaskController::class,'updateData']);
Route::delete("delTask/{id?}",[TaskController::class,'deleteData']);
Route::put("startTime/{id?}",[TaskController::class,'startTime']);
Route::put("endTime/{id?}",[TaskController::class,'endTime']);


Route::get("getPage",[PageController::class,'getPage']);
Route::post("addPage",[PageController::class,'addPage']);
Route::put("updPage/{id?}",[PageController::class,'updatePage']);
Route::delete("delPage/{id?}",[PageController::class,'deletePage']);

Route::get("getComp",[ComponentController::class,'getComp']);
Route::post("addComp",[ComponentController::class,'addComp']);
Route::put("updComp/{id?}",[ComponentController::class,'updateComp']);
Route::delete("delComp/{id?}",[ComponentController::class,'deleteComp']);

Route::get("getContent",[ContentController::class,'getContent']);
Route::post("addContent",[ContentController::class,'addContent']);
Route::put("updContent/{id?}",[ContentController::class,'updateContent']);
Route::delete("delContent/{id?}",[ContentController::class,'deleteContent']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
