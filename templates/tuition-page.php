<?php
/**
 * Template Name: Tuition Page
 * This template has been customized to display the master tuition table.
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

get_header(); ?>
<style>
#primary{
	max-width:1500px;
}
#main{
	width:100%;
}
#tuitionTable{
	table-layout:fixed;
}
#tuitionTable thead{
	border-bottom:2px solid #115438;
}
#tuitionTable th{
	background-color:#fff;
}
#tuitionTable th,#tuitionTable td{
	padding:0 5px;
}
#tuitionTable span{
	line-height:1.5em;
	padding-bottom: 2px;
}
#tuitionTable .borderRL{
	border-right:2px solid #115438;
	border-left:2px solid #115438;
width:100px;
}
.featured_image_cropped,.sidebar_image_new{
	display:none; /* hiding fields that shouldn't be here but Ryan can't track down */
}
</style>

<?php
	get_template_part("template-parts/page-heading");
?>
<div id="primary" class="content-area pure-g">

		<main id="main" class="site-main pure-u-1 standalone" role="main">

<div class="field-content" style="display:none;">

<table class="centerText">
<thead>
	<tr class="greyRow">
		<th colspan="5">Undergraduate Summary Table</th>
	</tr>
	<tr class="greyRow">
		<th><?php the_field("this_fiscal_year_title"); ?></th>
		<th>Tuition</th>
		<th>Room and Board</th>
		<th>Comprehensive Fee</th>
		<th>Total</th>
	</tr>
</thead>
<tbody>
	<tr>
		<th>Resident</th>
		<td>
			<?php
				$tuition = get_field("full_time_undergraduate_tuition");
				$first_row = $tuition[0];
				$tuitionCost = $first_row["this_fiscal_year"];
				echo '$' .number_format($tuitionCost);
			?>
		</td>
		<td>
			<?php
				$roomBoard = get_field("full_time_undergraduate_room_board");
				$first_row = $roomBoard[0];
				$roomBoardCost = $first_row["this_fiscal_year"];
				echo '$' .number_format($roomBoardCost);
			?>
		</td>
		<td>
			<?php
				$residentCompFee = get_field("undergraduate_resident_comprehensive_fee");
				$first_row = $residentCompFee[0];
				$residentCompFeeCost = $first_row["this_fiscal_year"];
				echo '$' .number_format($residentCompFeeCost);
			?>
		</td>
		<td>
			<?php
				echo '$' .number_format($tuitionCost + $roomBoardCost + $residentCompFeeCost);
			?>
		</td>
	</tr>
	<tr>
		<th>Commuter</th>
		<td>
			<?php
				$tuition = get_field("full_time_undergraduate_tuition");
				$first_row = $tuition[0];
				$tuitionCost = $first_row["this_fiscal_year"];
				echo '$' .number_format($tuitionCost);
			?>
		</td>
		<td>
			N/A
		</td>
		<td>
			<?php
				$commuterCompFee = get_field("undergraduate_commuter_comprehensive_fee");
				$first_row = $commuterCompFee[0];
				$commuterCompFeeCost = $first_row["this_fiscal_year"];
				echo '$' .number_format($commuterCompFeeCost);
			?>
		</td>
		<td>
			<?php
				echo '$' .number_format($tuitionCost + $commuterCompFeeCost);
			?>
		</td>
	</tr>
	<tr class="greyRow">
		<th><?php the_field("next_fiscal_year_title"); ?></th>
		<th>Tuition</th>
		<th>Room and Board</th>
		<th>Comprehensive Fee</th>
		<th>Total</th>
	</tr>
	<tr>
		<th>Resident</th>
		<td>
			<?php
				$tuitionFuture = get_field("full_time_undergraduate_tuition");
				$first_row = $tuitionFuture[0];
				$tuitionCostFuture = $first_row["next_fiscal_year"];
				echo '$' .number_format($tuitionCostFuture);
			?>
		</td>
		<td>
			<?php
				$roomBoardFuture = get_field("full_time_undergraduate_room_board");
				$first_row = $roomBoardFuture[0];
				$roomBoardCostFuture = $first_row["next_fiscal_year"];
				echo '$' .number_format($roomBoardCostFuture);
			?>
		</td>
		<td>
			<?php
				$residentCompFeeFuture = get_field("undergraduate_resident_comprehensive_fee");
				$first_row = $residentCompFeeFuture[0];
				$residentCompFeeCostFuture = $first_row["next_fiscal_year"];
				echo '$' .number_format($residentCompFeeCostFuture);
			?>
		</td>
		<td>
			<?php
				echo '$' .number_format($tuitionCostFuture + $roomBoardCostFuture + $residentCompFeeCostFuture);
			?>
		</td>
	</tr>
	<tr>
		<th>Commuter</th>
		<td>
			<?php
				$tuitionFuture = get_field("full_time_undergraduate_tuition");
				$first_row = $tuitionFuture[0];
				$tuitionCostFuture = $first_row["next_fiscal_year"];
				echo '$' .number_format($tuitionCostFuture);
			?>
		</td>
		<td>
			N/A
		</td>
		<td>
			<?php
				$commuterCompFeeFuture = get_field("undergraduate_commuter_comprehensive_fee");
				$first_row = $commuterCompFeeFuture[0];
				$commuterCompFeeCostFuture = $first_row["next_fiscal_year"];
				echo '$' .number_format($commuterCompFeeCostFuture);
			?>
		</td>
		<td>
			<?php
				echo '$' .number_format($tuitionCostFuture + $commuterCompFeeCostFuture);
			?>
		</td>
	</tr>
</tbody>
</table>
</div><!-- end .field-content -->

<h4>
	<?php
		echo 'Next years ( ' . get_field("next_academic_year_title") . ', ' . get_field("next_fiscal_year_title") . ') is being ';
			if(get_field("show_next_fiscal_year") == "show" ){
				echo "shown";
			}else{
				echo "hidden";
			};
	?>
</h4>
<table id="tuitionTable">
<thead>
	<tr>
		<th class="acfFieldName" style="text-align:right;padding-right:10px;">&nbsp;</th>
		<th style="text-align:right;padding-right:10px;">&nbsp;</th>
		<th class="borderRL centerText"><?php the_field('this_fiscal_year_title'); ?></th>
		<th class="centerText" style="width:100px;"><?php the_field('next_fiscal_year_title'); ?></th>
	</tr>
	<tr>
		<th class="acfFieldName" style="text-align:right;padding-right:10px;">Field Name</th>
		<th style="text-align:right;padding-right:10px;">Fee</th>
		<th class="borderRL centerText"><?php the_field('this_academic_year_title'); ?></th>
		<th class="centerText" style="width:100px;"><?php the_field('next_academic_year_title'); ?></th>
	</tr>
</thead>
<tbody>
<?php 
$fields = get_fields();
if( $fields ): ?>
        <?php foreach( $fields as $name => $value ): ?>

		<?php

			// check if the repeater field has rows of data
			if( have_rows($name) ):
			  if( ($name != 'this_fiscal_year_title') && ($name != 'next_fiscal_year_title')):
			    // loop through the rows of data
			    while ( have_rows($name) ) : the_row();
			        // display the name of the field
				echo '<tr class='. $name .'><td class="acfFieldName" style="text-align:right;padding-right:10px;">'. $name .'</td>';
			        // display a sub field value
				echo '<td style="text-align:right;padding-right:10px;">';
			        the_sub_field('tuition_explanation');
				echo '</td><td class="borderRL centerText">';
			        $thisFiscalYear = get_sub_field('this_fiscal_year');
				echo '$' .number_format($thisFiscalYear, 2, '.', ',');
				echo '</td><td class="centerText" style="width:100px;">';
			        $nextFiscalYear = get_sub_field('next_fiscal_year');
				echo '$' .number_format($nextFiscalYear, 2, '.', ',');
				
				echo '</td></tr>';
			    endwhile;
			  endif;
//			else :
//				echo '<tr class='. $name .'><td colspan="3">nothing found</td></tr>';
			endif;
		?>
		
        <?php endforeach; ?>
<?php endif; ?>
</tbody>
</table>


		</main><!-- #main -->    
	</div><!-- #primary -->

<?php
get_footer();
