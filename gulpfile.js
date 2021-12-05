var 
gulp = require("gulp"),
concat = require("gulp-concat");

gulp.task("js", function() {
    gulp.src([
        "development/node_modules/jquery/dist/jquery.min.js",
        "development/node_modules/bootstrap/dist/js/bootstrap.min.js",
        "development/js/pace.js",
    ])

    .pipe(concat("app.js"))
    .pipe(gulp.dest("assets/js"))
})

gulp.task("css", function() {
    gulp.src([        
        "development/node_modules/bootstrap/dist/css/bootstrap.min.css",
        "development/css/style.css",
        "development/css/pace.css"
    ])

    .pipe(concat("app.css"))
    .pipe(gulp.dest("assets/css"))
})