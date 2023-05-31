let laravelMix = require("laravel-mix");

laravelMix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
laravelMix.js("./resources/js/app.js" , "./public/js/app.js");
laravelMix.js("./resources/js/darkmode.js" , "./public/js/darkmode.js");
laravelMix.js("./resources/js/jquery-3.6.3.min.js", "./public/js/jquery-3.6.3.min.js");


laravelMix.minify([
  "./resources/css/all.min.css",
  "./resources/css/app.css",
  "./resources/css/media.css",
  "./resources/css/darkmode.css",
  "./resources/css/fonts.css",
], "./public/css/style.css");
