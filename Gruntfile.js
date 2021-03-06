//
// == Installation ==
//
// Install all the packages required to build this:
// (Packages will be installed in ./node_modules - don't accidentally commit this)
// % yarn install
//
// == Building ==
//
// $ grunt build
//
// Watch for changes:
// $ grunt watch
//
//

module.exports = function (grunt) {
	'use strict';

	const sass = require('sass')

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		clean: ['build'],

		sass: {
			options: {
				implementation: sass,
				outputStyle: 'compressed',
				sourceMap: true,
				includePaths: ['node_modules/'],
				quietDeps: true,
			},
			production: {
				files: {
					'build/main.min.css': 'assets/css/main.scss',
				}
			}
		},
		uglify: {
			dist: {
				options: {
					preserveComments: 'some',
					compress: false,
					sourceMap: 'build/main.min.js.map',
					sourceMappingURL: 'main.min.js.map',
					sourceMapRoot: '../',
				},
				files: {
					'build/main.min.js': [
						'node_modules/govuk-frontend/govuk/all.js',
						'assets/js/app.js',
					],
				},
			},
		},
		copy: {
			dist: {
				files: [
					{
						src: [
							'node_modules/govuk-frontend/govuk/assets/fonts/*',
							'node_modules/govuk-frontend/govuk/assets/images/*'
						],
						dest: 'build/',
					},
				],
			},
		},
		shell: {
			options: {
				stderr: false
			},
			multiple: {
				command: [
					'echo "## copy saltato govuk setting files to replace orginals"',
					'cd assets/css/govuk/settings/',
					'cp -vf _*.scss ../../../../node_modules/govuk-frontend/govuk/settings/',
					'echo "## output sass --version"',
					'sass --version',
					].join('&&')
			},
		},

		_watch: {
			css: {
				files: ['assets/css/**/*.scss'],
				tasks: ['shell:multiple', 'sass'],
			},
			js: {
				files: ['assets/js/**/*.js'],
				tasks: ['uglify'],
			},
		},
	})

	grunt.loadNpmTasks('grunt-sass')
	grunt.loadNpmTasks('grunt-contrib-uglify')
	grunt.loadNpmTasks('grunt-contrib-watch')
	grunt.loadNpmTasks('grunt-contrib-copy')
	grunt.loadNpmTasks('grunt-contrib-clean')
	grunt.loadNpmTasks('grunt-shell')

	grunt.renameTask('watch', '_watch')
	grunt.registerTask('watch', [
		'default',
		'_watch',
	])

	grunt.registerTask('build', [
		'clean',
		'shell:multiple',
		'copy',
		'sass',
		'uglify',
	])

	grunt.registerTask('default', [
		'clean',
		'shell:multiple',
		'copy',
		'sass',
		'uglify',
	])

}
