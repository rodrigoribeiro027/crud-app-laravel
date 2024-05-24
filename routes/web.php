<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Candidato;
use Illuminate\Support\Facades\Validator;

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
    $candidatos = Candidato::all();
    return view('listar_candidatos', ['candidatos' => $candidatos]);
});

Route::post('/cadastrar-candidato', function (Request $informacoes) {
    $validator = Validator::make($informacoes->all(), [
        'nome_candidato' => 'required|string|max:255',
        'telefone_candidato' => 'required|string|max:20',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    Candidato::create([
        'nome'=> $informacoes->input('nome_candidato'),
        'telefone' => $informacoes->input('telefone_candidato'),
    ]);

    return redirect('/')->with('success', 'Candidato criado com sucesso');
});

Route::get('/mostrar-candidato/{id_do_candidato}', function ($id_do_candidato) {
    $candidato = Candidato::findOrFail($id_do_candidato); 
    return view('mostrar_candidato', ['candidato' => $candidato]);
});

Route::get('/editar-candidato/{id_do_candidato}', function ($id_do_candidato) {
    $candidato = Candidato::findOrFail($id_do_candidato); 
    return view('editar_candidato', ['candidato'=> $candidato]);
});

Route::put('/editar-candidato/{id_do_candidato}', function (Request $informacoes, $id_do_candidato) {
    $validator = Validator::make($informacoes->all(), [
        'nome' => 'required|string|max:255',
        'telefone' => 'required|string|max:20',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $candidato = Candidato::findOrFail($id_do_candidato);
    $candidato->update([
        'nome' => $informacoes->input('nome'),
        'telefone' => $informacoes->input('telefone'),
    ]);

    return redirect('/')->with('success', 'Candidato atualizado com sucesso');
});

Route::delete('/excluir-candidato/{id_do_candidato}', function ($id_do_candidato) {
    $candidato = Candidato::findOrFail($id_do_candidato);
    $candidato->delete();

    return redirect('/')->with('success', 'Candidato excluído com sucesso');
});

Route::get('/listar-candidatos', function () {
    $candidatos = Candidato::all();
    return view('listar_candidatos', ['candidatos' => $candidatos]);
});

Route::get('/cadastrar-candidato', function () {
    return view('cadastrar_candidato');
});

Route::get('/buscar-candidatos', function (Request $request) {
    $query = $request->input('nome');
    $candidatos = Candidato::where('nome', 'like', '%' . $query . '%')->get();
    return view('listar_candidatos', ['candidatos' => $candidatos]);
});