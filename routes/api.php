<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// todo 리스트 전체 호출
Route::get('todos', [TodoController::class, 'index'])->name('todos.index');
// todo 항목 하나만 호출
// Route::get('todos/{id}', [TodoController::class, 'show'])->name('todos.show');
Route::get('todos/{todo}', [TodoController::class, 'show'])->name('todos.show');  // {id} 파라미터 {todo}로 변경
// todo 항목 추가
Route::post('todos', [TodoController::class, 'store'])->name('todos.store');
// todo 항목 수정
Route::put('todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
// todo 항목 삭제
Route::delete('todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');