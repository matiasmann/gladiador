/* jshint esnext: true */
'use strict';

const gulp = require( 'gulp' );
const wpPot = require( 'gulp-wp-pot' );

export default function translate() {

	return gulp.src( '**/*.php' )
		.pipe(
			wpPot(
				{
					domain: 'gladiador',
					package: 'Gladiador'
				}
			)
		)
		.pipe( gulp.dest( './languages/gladiador.pot' ) );

}
