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
    mix.scripts(['centro.js', 'eventos.js'], 'public/js/infocentro.js')
       .scripts(['centro.js', 'index.js'], 'public/js/listaitpo.js');
});

elixir(function(mix) {
    mix.copy('resources/js', 'public/js');
});


elixir(function(mix) {
    mix.version("js/infocentro.js");
});