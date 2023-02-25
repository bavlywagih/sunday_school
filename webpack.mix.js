let laravelMix = require("laravel-mix");

laravelMix.minify('resources/css/app.css', 'public/css/app.css');
laravelMix.minify('resources/css/all.min.css', 'public/css/all.min.css');
laravelMix.minify('resources/css/media.css', 'public/css/media.css');
laravelMix.minify('resources/css/darkmode.css', 'public/css/darkmode.css');
laravelMix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
laravelMix.js("./resources/js/app.js" , "./public/js/app.js");
laravelMix.js("./resources/js/darkmode.js" , "./public/js/darkmode.js");
laravelMix.js("./resources/js/jquery-3.6.3.min.js", "./public/js/jquery-3.6.3.min.js");
