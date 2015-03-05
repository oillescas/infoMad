var gulp = require('gulp');
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */


elixir(function(mix) {
    mix.less('app.less');
});


elixir(function(mix) {
    mix.scripts(['maps.js', 'eventos.js'], 'public/js/index.js');
});

//elixir(function(mix) {
//    mix.copy('resources/js', 'public/js');
//});


elixir(function(mix) {
    mix.version("js/index.js");
});


