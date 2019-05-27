// Definimos o diretório dos arquivos para evitar repetição futuramente

// Todos os arquivos CSS que serão compactados
// Explicação: /* busca todos os arquivos de uma pasta, /**/*.* busca todos os arquivos de uma pasta e sub pasta.
var dest = 'assets/css/usuario'
var destjs = 'assets/js/jquery/'
var destjsindex = 'assets/js/'
var css = [
    'assets/css/usuario/*.css'
];


var js = [
    'assets/js/jquery/jquery.min.js', 'assets/js/bootstrap/popper.min.js', 'assets/js/bootstrap/bootstrap.min.js', 'assets/js/plugins/plugins.js', 'assets/js/active.js']

var jsindex = ['assets/js/jquery.min.js','assets/js/jquery.scrollex.min.js','assets/js/skel.min.js','assets/js/util.js','assets/js/main.js','assets/vendor/tilt/tilt.jquery.min.js']



// Núcleo do Gulp
var gulp = require('gulp');

// Minifica o CSS
var cssmin = require("gulp-cssmin");

// Agrupa todos arquivos em UM
var concat = require("gulp-concat");

// Transforma o javascript em formato ilegível para humanos
var uglify = require("gulp-uglify");

// Remove comentários CSS
var stripCssComments = require('gulp-strip-css-comments');

// Processo que agrupará todos os arquivos CSS, removerá comentários CSS e minificará.
gulp.task('minify-css', function () {
    gulp.src(css)
        .pipe(concat('style.min.css'))
        .pipe(stripCssComments({ all: true }))
        .pipe(cssmin())
        .pipe(gulp.dest(dest));
});






// Tarefa de minificação do Javascript
gulp.task('minify-js', function () {
    gulp.src(js)                        // Arquivos que serão carregados, veja variável 'js' no início
        .pipe(concat('script.min.js'))      // Arquivo único de saída
        // Transforma para formato ilegível
        .pipe(gulp.dest(destjs));          // pasta de destino do arquivo(s)
});


// Tarefa de minificação do Javascript
gulp.task('minify-js-index', function () {
    gulp.src(jsindex)                        // Arquivos que serão carregados, veja variável 'js' no início
        .pipe(concat('script.min.js'))      // Arquivo único de saída
        // Transforma para formato ilegível
        .pipe(gulp.dest(destjsindex));          // pasta de destino do arquivo(s)
});


