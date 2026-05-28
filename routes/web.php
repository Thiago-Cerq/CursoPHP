<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', [ProdutoController::class, 'index'])->name('homePage');
Route:: resource('produtos', ProdutoController::class);


//Usando grupo para remover prefixos name e /adimin da URL, além de organizar melhor as rotas.
// Route :: group([
//     'prefix' => 'admin',
//     'as' => 'admin.'
// ], function () {

//     Route::get('/dashboard', function () {
//         return 'DASHBOARD';
//     }) -> name('dashboard');

//     Route::get('/users', function () {
//         return 'USUÁRIOS';
//     }) -> name('users');

//     Route::get('/clients', function () {
//         return 'CLIENTES';
//     }) -> name('clients');
// });



/////////////////////////////////////////////////////////////////////
// Route::get('/empresa', function () {
//     return view('site/empresa');
// });

// Route :: any ('any', function () {
//     return 'Permire qualquer verbo HTTP/acesso';
// });

// Route :: match (['get', 'post'], 'match', function () {
//     return 'Permite apenas os verbos GET e POST';
// });

// Route::get('/produto/{id}/{categoria?}', function ($id, $categoria = 'Sem Categoria') {
//     return "O id do produto é: " . $id. "<br>" . "A categoria é: " . $categoria;
// });

// Route:: redirect ('/sobre', '/empresa'); 

// Route:: view ('/empresa', 'site/empresa');

// Route:: get ('/timesnownews', function () {
//     return view('news');
// }) -> name('noticias');

// Route:: get ('/novidades', function () {
//     return redirect() -> route('noticias');
// });