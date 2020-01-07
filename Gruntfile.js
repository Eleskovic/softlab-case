module.exports = function(grunt) {
    grunt.initConfig({
        uglify : {
            options : {
                banner : "/*! app.min.js file */\n"
            },
            build : {
                src : ["resources/js/app.browserified.js"],
                dest : "public/js/app.min.js"
            }

        },
        watch: {
            files: ['resources/js/*.js'],
            tasks: ['browserify','uglify']
        },
        browserify: {
            dist: {
                src: 'resources/js/app.js',
                dest: 'resources/js/app.browserified.js'
        },
            options: {
                transform: [['browserify-css', { global: true }]]
            }
    },

    });


    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-browserify');
    //grunt.loadNpmTasks('browserify-css');

    // Default task(s).
    grunt.registerTask('default', [
        'browserify',
        'uglify'
    ]);

};
