/* global require: false, module: false */
module.exports = function (grunt) {
  'use strict';

  require('load-grunt-tasks')(grunt);
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  grunt.initConfig({
    'sass': {
      'options': {'sourceMap': false, 'precision': 8},
      'main': {
        'files': {
          'assets/css/main.css': 'assets/scss/main.scss'
        }
      },
    },
    'cssmin': {
      'options': {
        'mergeIntoShorthands': false,
        'roundingPrecision': -1
      },
      'main': {
        'files': {
          'assets/css/main.min.css': ['assets/css/main.css']
        }
      }
    }
  });
  
  grunt.registerTask('default', ['sass', 'cssmin']);

  grunt.registerTask('hola', function () {
    grunt.log.writeln('adios');
  });

  grunt.registerTask('hola2', ['default', 'hola']);
};