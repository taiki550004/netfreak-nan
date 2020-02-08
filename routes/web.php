<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/test-video', function () {
    return view('partials.vimeo-video-player');
});

Route::get('/series',function(){
    $series = \App\Serie::all();
    return view('serie.index')->with(['series' => $series]);
})->name('series');

Route::get('/series/create',function(){
    return view('serie.create');
});
Route::get('/series/{serieId}/episodes/create',function($serieId){
    return view('episode.create')->with(['serieId'=>$serieId]);
});
Route::post('/series/{id}/episodes',function($id){
    $data=\Request::all();

    $episode=\App\Episode::create($data);

    $episode->serie_id= $id;

    $episode->save();

    return redirect('/series/'.$id);
});


// Route::get('/series/{id}',function($id){
//     $serie= \App\Serie::find($id);
//     return view('serie.show')->with([
//         'serie'=>$serie
//     ]);
// });

Route::get('/series/{serie}',function(\App\Serie $serie){
    return view('serie.show')->with([
        'serie'=>$serie
    ]);
});