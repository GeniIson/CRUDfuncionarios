<?php

// Importa o controlador ProfileController, que será usado para manipular as rotas relacionadas ao perfil do usuário.
use App\Http\Controllers\ProfileController;

// Importa a classe Route do Laravel, responsável por gerenciar as rotas do sistema.
use Illuminate\Support\Facades\Route;

// Define uma rota para a URL raiz ('/'). Quando acessada, ela retorna a view 'welcome'.
Route::get('/', function () {
    return view('auth/login'); // Carrega o arquivo de view 'resources/views/welcome.blade.php'.
});


Route::get('/Funcionarios', function () {
    return view('Funcionarios/funcionarios'); 
})->middleware(['auth', 'verified'])->name('Funcionarios');
// Define uma rota para a URL '/dashboard'. Apenas usuários autenticados e verificados podem acessá-la.
// Middleware 'auth': verifica se o usuário está autenticado.
// Middleware 'verified': verifica se o e-mail do usuário foi verificado.
// name('dashboard'): dá um nome à rota para facilitar sua referência em links ou redirecionamentos.
Route::get('/dashboard', function () {
    return view('dashboard'); // Carrega o arquivo de view 'resources/views/dashboard.blade.php'.
})->middleware(['auth', 'verified'])->name('dashboard');

// Cria um grupo de rotas que compartilham o middleware 'auth'.
// Todas as rotas dentro deste grupo só podem ser acessadas por usuários autenticados.
Route::middleware('auth')->group(function () {

    // Rota para a página de edição de perfil ('/profile').
    // Acessa o método 'edit' do controlador ProfileController.
    // Nome da rota: 'profile.edit'.
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // Rota para atualizar os dados do perfil via método HTTP PATCH.
    // Acessa o método 'update' do controlador ProfileController.
    // Nome da rota: 'profile.update'.
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Rota para deletar o perfil via método HTTP DELETE.
    // Acessa o método 'destroy' do controlador ProfileController.
    // Nome da rota: 'profile.destroy'.
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Requer o arquivo de rotas de autenticação localizado em 'routes/auth.php'.
// Esse arquivo geralmente contém as rotas padrão para login, registro, e recuperação de senha.
require __DIR__.'/auth.php';
