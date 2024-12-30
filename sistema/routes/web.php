<?php

// Importa o controlador ProfileController, que será usado para manipular as rotas relacionadas ao perfil do usuário.
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Fucionarios\FucionarioController;

// Importa a classe Route do Laravel, responsável por gerenciar as rotas do sistema.
use Illuminate\Support\Facades\Route;

// Define uma rota para a URL raiz ('/'). Quando acessada, ela retorna a view 'welcome'.
Route::get('/', function () {
    return view('auth/login'); // Carrega o arquivo de view 'resources/views/welcome.blade.php'.
});

Route::get('/Funcionarios', [FucionarioController::class, 'lista'])->middleware(['auth', 'verified'])->name('Funcionarios');


Route::get('funcionarios/create', [FucionarioController::class, 'create'])->middleware(['auth', 'verified'])->name('funcionarios.create');

Route::post('/funcionario/store', [FucionarioController::class, 'store'])->middleware(['auth', 'verified'])->name('funcionarios.store');


Route::get('/funcionarios/edit/{id}', [FucionarioController::class, 'edit','funcionario'])->middleware(['auth', 'verified'])->name('funcionarios.edit');


Route::put('/funcionarios/{id}', [FucionarioController::class, 'update','funcionario'])->middleware(['auth', 'verified'])->name('funcionarios.update');




Route::delete('/admin/funcionario/delete/{id}',[FucionarioController::class, 'destroy'])->middleware(['auth', 'verified'])->name('admin.delete');



Route::get('/dashboard', function () {
    return view('dashboard'); // Carrega o arquivo de view 'resources/views/dashboard.blade.php'.
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

   
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
