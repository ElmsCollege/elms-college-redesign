<?php
/**
 * Template Name: All Programs Page
 * This template has been customized to display a list of all the programs offered by the campus.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

get_header();
?>
<style>
	#degreesOffered p{margin-bottom: 0;}
</style>
<script>
	jQuery( document ).ready( function () {
		jQuery( "#locations" ).change( function () {
			var locValue = jQuery( "#locations" ).val();
			jQuery( "#degreesOffered p" ).hide();
			if ( locValue == "loc-all" ) {
				jQuery( "#degreesOffered p" ).show();
			} else {
				jQuery( "#degreesOffered p." + locValue ).show();
			}
		} );
	} );
</script>

<div class="section-heading">
	<h1 class="field-title">
		<?php the_title() ;?>
	</h1>
</div>

<div id="primary" class="content-area pure-g">

	<main id="main" class="site-main pure-u-1 standalone" role="main">

		<div id="filters">
			<div>
				<label for="degreeLevels" style="display:inline;">Degree Level:</label>
				<select id="degreeLevels">
					<option value="certificate">All certificates</option>
					<option value="associates">All associates degrees</option>
					<option value="bachelors">All bachelors degrees</option>
					<option value="masters">All masters degrees</option>
					<option value="doctorates">All doctorates</option>
				</select>
			</div>
			<div>
				<label for="locations" style="display:inline;">Class location:</label>
				<select id="locations">
					<option value="loc-all">All locations</option>
					<option value="loc-elms">Elms campus</option>
					<option value="loc-communitycollege">Community College</option>
					<option value="loc-online">Online</option>
				</select>
			</div>
		</div>

		<div id="degreesOffered">
			<p class="loc-elms loc-communitycollege">Accounting Major (B.A.)</p>
			<p class="loc-elms">Accounting (MBA)</p>
			<p class="loc-elms">Accounting Combined Degree (BA/MBA)</p>
			<p class="loc-elms">Healthcare Leadership (MBA)</p>
			<p class="loc-elms">Music Minor</p>
			<p class="loc-online">Nursing &amp; Health Services Management (MSN)</p>
			<p class="loc-online">Nursing Education (MSN)</p>
			<p class="loc-online">Speech-Language Pathology Assistant (A.A.)</p>
			<p class="loc-online"><a href="/undergraduate-admission/speech-language-pathology-assistant/">Speech-Language Pathology Assistant Major (B.A.)</a></p>
			<p class="loc-online">Speech-Language Pathology Assistant (certificate)</p>
		</div>

	</main>
	<!-- #main -->
</div> <!-- #primary -->

<?php
get_footer();