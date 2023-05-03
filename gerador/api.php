<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// COLEÇÃO PROJETO DE IMPORTAÇÃO - POMPTUR
Route::get('packages/import/{tipo}', 'App\Http\Controllers\PackagesController@import'); 
Route::post('packages/send_capt', 'App\Http\Controllers\PackagesController@send_capt'); 
Route::get('packages/import_manual', 'App\Http\Controllers\PackagesController@import_manual'); 
Route::get('packages/import_auto', 'App\Http\Controllers\PackagesController@import_auto'); 
Route::get('packages/dados/{id}/{qtd}', 'App\Http\Controllers\PackagesController@get_dados_chipweb');  
Route::get('packages/select_dados', 'App\Http\Controllers\PackagesController@select_dados');  
Route::get('packages/select_dados2', 'App\Http\Controllers\PackagesController@select_dados2'); 
Route::get('packages/select_dados3', 'App\Http\Controllers\PackagesController@select_dados3'); 
Route::get('packages/select_dados4', 'App\Http\Controllers\PackagesController@select_dados4'); 
Route::get('packages/select_dados5', 'App\Http\Controllers\PackagesController@select_dados5'); 
Route::get('packages/select_dados6', 'App\Http\Controllers\PackagesController@select_dados6'); 
Route::get('packages/select_dados7', 'App\Http\Controllers\PackagesController@select_dados7'); 
Route::get('packages/select_dados8', 'App\Http\Controllers\PackagesController@select_dados8'); 
Route::get('packages/select_dados9', 'App\Http\Controllers\PackagesController@select_dados9'); 
Route::get('packages/select_dados10', 'App\Http\Controllers\PackagesController@select_dados10'); 

Route::get('packages/get_dados', 'App\Http\Controllers\PackagesController@get_dados');  
Route::get('packages/get_dados_pos/{id}', 'App\Http\Controllers\PackagesController@get_dados_pos');  


Route::get('quotation/lalamove/{cep}', 'App\Http\Controllers\LalamoveController@index');  

/*
*
* COLEÇÃO DE MARKETING 
*
*/
Route::post('marketing/publish/resources/upload', 'MarketingController@resources_upload'); 

Route::post('marketing/insert_dados', 'MarketingController@inserir_dados');  
Route::post('marketing/editar_dados', 'MarketingController@editar_dados');  
Route::post('marketing/excluir_dados', 'MarketingController@excluir_dados');  
Route::post('marketing/listar_dados', 'MarketingController@listar_dados'); 
Route::post('marketing/envio_emkt', 'MarketingController@envio_emkt'); 

Route::post('marketing/cadastro_revenda', 'App\Http\Controllers\MarketingController@cadastro_revenda'); 
Route::post('marketing/atualiza_cadastro', 'App\Http\Controllers\MarketingController@atualiza_cadastro');

/* 
*
* COLEÇÃO GOOGLE SEARCH
*
*/ 

Route::get('google/{name}/{start}', 'App\Http\Controllers\GoogleController@search'); 
Route::get('points/{id}', 'App\Http\Controllers\GoogleController@points'); 
Route::get('images/{reference}', 'App\Http\Controllers\GoogleController@points_images'); 
Route::get('points_details/{place_id}', 'App\Http\Controllers\GoogleController@points_details'); 

/* 
*
* COLEÇÃO JSON CIDADES
*
*/ 

Route::get('cities/{param}', 'App\Http\Controllers\CitiesController@getCities');

/* 
*
* COLEÇÃO WORDPRESS 4TRAVEL
*
*/ 
Route::get('w4travel/data/{author}', 'App\Http\Controllers\W4TravelController@importData');

/* 
*
* COLEÇÃO IUGU
*
*/ 
Route::post('licenciador', 'App\Http\Controllers\LicenciadorController@getLicense');