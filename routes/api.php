<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProfileController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ***************** Referentes ao usuário *****************
// Rotas de autenticação e registro
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Rotas para editar o perfil
Route::post('/perfil/change-password', [ProfileController::class, 'change_password'])->middleware('auth:sanctum');
Route::post('/perfil/update-profile', [ProfileController::class, 'update_profile'])->middleware('auth:sanctum');


// ***************** Rotas referentes as publicações *****************

// Listar todas as publicações
Route::get('/publicacoes', [BlogController::class, 'list']);

// Criar uma publicação
Route::post('/publicacoes/create', [BlogController::class, 'create'])->middleware('auth:sanctum');

// Detalhes de uma publicação
Route::get('/publicacoes/{id}', [BlogController::class, 'details']);

// Atualizar uma publicação
Route::put('/publicacoes/{id}/update', [BlogController::class, 'update'])->middleware('auth:sanctum');

// Apagar uma publicação
Route::delete('/publicacoes/{id}/delete', [BlogController::class, 'delete'])->middleware('auth:sanctum');

// Curtir uma publicação
Route::post('/publicacoes/{id}/toggle-like', [BlogController::class, 'toggle_like'])->middleware('auth:sanctum');

// Criar um comentário
Route::post('/publicacoes/{blog_id}/comentarios/create', [CommentController::class, 'create'])->middleware('auth:sanctum');

// Listar todos os comentários de uma publicação
Route::get('/publicacoes/{blog_id}/comentarios', [CommentController::class, 'list']);

// Atualizar um comentário
Route::put('/comentarios/{comment_id}/update', [CommentController::class, 'update'])->middleware('auth:sanctum');

// Apagar um comentário
Route::delete('/comentarios/{comment_id}/delete', [CommentController::class, 'delete'])->middleware('auth:sanctum');
