module.exports = function(grunt) {

    grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		
		/**
		 * Sass
		 */
		sass: {
		  dev: {
		    options: {
		      style: 'expanded',
		      sourcemap: 'auto',
		    },
		    files: {
		      'style.css': 'sass/style.scss'
		    }
		  }
		  // Concatenate CSS when done with development	
		 //  dist: {
			// options: {
			//   style: 'compressed',
			//   sourcemap: 'none',
			// },
			// files: {
			//   'style-min.css': 'sass/main.scss'
			// }
		 //  }
		},

		/**
		 * Autoprefixer
		 */
		autoprefixer: {
			options: {
				browsers: ['last 2 versions']
			},
			// prefix all files
			multiple_files: {
				expand: true,
				flatten: true,
				src: '*.css',
				dest: ''
			}
		},
		
	  	/**
	  	 * Watch
	  	 */
		watch: {
			options: { livereload: true},
			css: {
				files: 'sass/**/*.{scss,sass}',
				tasks: ['sass'] // add ,'autoprefixer' here to switch it on, its off cos it disables source-mapping
			},
			phtml: {
				files: '**/*.php',
			},
			scripts: {
				files: 'js/**/*.js',
			}
		} // watch

	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-notify');
	grunt.registerTask('default',['watch']);
}