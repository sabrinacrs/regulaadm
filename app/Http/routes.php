<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('administradores/', 'AdministradoresController@index');
Route::get('administradores/registrar', 'AdministradoresController@novo');
Route::get('administradores/novo', 'AdministradoresController@novo');
Route::get('administradores/{administrador}/editar', 'AdministradoresController@editar');
Route::post('administradores/{administrador}/excluir', 'AdministradoresController@excluir');
Route::post('administradores/salvar', 'AdministradoresController@salvar');
Route::patch('administradores/{administrador}', 'AdministradoresController@atualizar');
Route::delete('administradores/{administrador}', 'AdministradoresController@deletar');
Route::any('administradores/lista/buscar/', 'AdministradoresController@buscar');

Route::any('doencas/', 'DoencasController@index');
Route::any('doencas/salvar', 'DoencasController@salvar');
Route::any('doencas/lista', 'DoencasController@lista');
Route::any('doencas/lista/salvar', 'DoencasController@salvar');
Route::patch('doencas/lista/{doenca}', 'DoencasController@atualizar');
Route::any('doencas/{doenca}/editar', 'DoencasController@editar');
Route::any('doencas/lista/{doenca}/editar', 'DoencasController@editar');
Route::post('doencas/{doenca}/excluir', 'DoencasController@excluir');
Route::any('doencas/lista/nova', 'DoencasController@nova');
Route::any('doencas/lista/buscar/', 'DoencasController@buscar');

Route::any('ciclos/', 'CiclosController@index');
Route::any('ciclos/salvar', 'CiclosController@salvar');
Route::any('ciclos/lista', 'CiclosController@lista');
Route::any('ciclos/lista/salvar', 'CiclosController@salvar');
Route::patch('ciclos/lista/{ciclo}', 'CiclosController@atualizar');
Route::any('ciclos/{ciclo}/editar', 'CiclosController@editar');
Route::any('ciclos/lista/{ciclo}/editar', 'CiclosController@editar');
Route::post('ciclos/{ciclo}/excluir', 'CiclosController@excluir');
Route::any('ciclos/lista/novo', 'CiclosController@novo');
Route::any('ciclos/lista/buscar/', 'CiclosController@buscar');

Route::any('tolerancias/', 'ToleranciasController@index');
Route::any('tolerancias/salvar', 'ToleranciasController@salvar');
Route::any('tolerancias/lista', 'ToleranciasController@lista');
Route::any('tolerancias/lista/salvar', 'ToleranciasController@salvar');
Route::patch('tolerancias/lista/{tolerancia}', 'ToleranciasController@atualizar');
Route::any('tolerancias/{tolerancia}/editar', 'ToleranciasController@editar');
Route::any('tolerancias/lista/{tolerancia}/editar', 'ToleranciasController@editar');
Route::post('tolerancias/{tolerancia}/excluir', 'ToleranciasController@excluir');
Route::any('tolerancias/lista/nova', 'ToleranciasController@nova');
Route::any('tolerancias/lista/buscar/', 'ToleranciasController@buscar');

Route::any('epocas_semeadura/', 'EpocasSemeaduraController@index');
Route::any('epocas_semeadura/salvar', 'EpocasSemeaduraController@salvar');
Route::any('epocas_semeadura/lista', 'EpocasSemeaduraController@lista');
Route::any('epocas_semeadura/lista/salvar', 'EpocasSemeaduraController@salvar');
Route::patch('epocas_semeadura/lista/{epoca_semeadura}', 'EpocasSemeaduraController@atualizar');
Route::any('epocas_semeadura/{epoca_semeadura}/editar', 'EpocasSemeaduraController@editar');
Route::any('epocas_semeadura/lista/{epoca_semeadura}/editar', 'EpocasSemeaduraController@editar');
Route::post('epocas_semeadura/{epoca_semeadura}/excluir', 'EpocasSemeaduraController@excluir');
Route::any('epocas_semeadura/lista/nova', 'EpocasSemeaduraController@nova');
Route::any('epocas_semeadura/lista/buscar/', 'EpocasSemeaduraController@buscar');

Route::any('cultivares/', 'CultivaresController@index');
Route::any('cultivares/nova', 'CultivaresController@nova');
Route::any('cultivares/salvar', 'CultivaresController@salvar');
Route::any('cultivares/doencas/{cultivarId}', 'CultivaresController@alterarVinculoCultivarDoencaTolerancia');
Route::any('cultivares/doencas', 'CultivaresController@vincularCultivarDoencaTolerancia');
Route::any('cultivares/salvarVinculoCultivarDoencaTolerancia', 'CultivaresController@salvarVinculoCultivarDoencaTolerancia');
Route::any('cultivares/salvarTodoVinculoCultivarDoencaTolerancia', 'CultivaresController@salvarTodoVinculoCultivarDoencaTolerancia');
Route::any('cultivares/lista', 'CultivaresController@lista');
Route::any('cultivares/{cultivar}', 'CultivaresController@atualizar');
Route::any('cultivares/{cultivar}/editar', 'CultivaresController@editar');
Route::any('cultivares/lista/{cultivar}/editar', 'CultivaresController@editar');
Route::post('cultivares/{cultivar}/excluir', 'CultivaresController@excluir');
Route::any('cultivares/lista/buscar/', 'CultivaresController@buscar');

Route::any('parametrizacao/', 'EmpresaController@index');
Route::any('parametrizacao/salvar', 'EmpresaController@salvar');
Route::any('parametrizacao/{empresa}', 'EmpresaController@index');
Route::any('parametrizacao/{empresa}/salvar', 'EmpresaController@salvar');
Route::any('parametrizacao/{empresa}/atualizar', 'EmpresaController@atualizar');
