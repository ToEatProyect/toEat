/* global require: false, module: false */
module.exports = function (grunt) {
  'use strict';

  var sh = require('shelljs');

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

  //Create database comment
  grunt.registerTask('create-database', function(){
    _exec('mysql -u root -e "DROP DATABASE IF EXISTS toeat_db"');
    _exec('mysql -u root < application/sql/structure.sql');
  });

  //Executes a command
  function _exec(command) {
    var _result = sh.exec(command);

    if(_result['code'] !== 0) {
      grunt.fatal(_result['stderr']);
      throw new Error(_result['stderr']);
    }
  }
};