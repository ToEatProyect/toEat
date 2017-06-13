/* global require: false, module: false */
module.exports = function (grunt) {
  'use strict';

  var sh = require('shelljs');

  require('load-grunt-tasks')(grunt);
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  
  // DOC: https://github.com/sindresorhus/grunt-sass
  grunt.initConfig({
    'watch': {
      'options': {
        'debounceDelay': 250,
      },
      'app': {
        'files': ['assets/scss/**/**.scss'],
        'tasks': [
          'sass',
          'cssmin'
        ]
      }
    },
    'sass': {
      'options': {'sourceMap': false, 'precision': 8},
      'main': {
        'files': {
          'assets/css/main.css': 'assets/scss/main.scss',
          'assets/css/bootstrap.css': 'assets/scss/bootstrap.scss'
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
          'assets/css/main.min.css': ['assets/css/main.css'],
          'assets/css/bootstrap.min.css': ['assets/css/bootstrap.css']
        }
      }
    }
  });

  grunt.registerTask('default', ['sass', 'cssmin'])

  //Create database comment
  grunt.registerTask('create-database', function(){

    //Create structure
    grunt.log.writeln('>> Creating database structure');
    _exec('mysql -u root < application/sql/structure.sql');

    //Create admin user
    grunt.log.writeln('>> Creating admin user');
    _exec('php index.php cmd/create_admin_user');
    grunt.log.writeln('>> Admin user created correctly');

    //Load initial data
    grunt.log.writeln('>> Loading initial data');
    _exec('mysql -u root < application/sql/initialData.sql');

    grunt.log.writeln('All its OK');
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