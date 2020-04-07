<?php
/**
 * Quick Info block
 *
 * created by Ryan Millner
**/
?>
<div id="courses">
    <?php
          while ( have_rows('curriculum') ) : the_row();
              $courseID=preg_replace("/\W+/", "_", get_sub_field('curriculum_program_name'));
              echo "<div id='" .$courseID . "' class='collapseomatic noarrow'><h4>Click to view course requirements for the " .get_sub_field('curriculum_program_name') .((get_sub_field('curriculum_major_or_minor')=='minor')?' minor':"");
              echo ".</h4></div><div id='swap-" .$courseID . "' class='collapseomatic noarrow' style='display: none;'><h4>Click to collapse the course requirements for the " .get_sub_field('curriculum_program_name') .((get_sub_field('curriculum_major_or_minor')=='minor')?' minor':"");
              echo ".</h4></div><div class='collapseomatic_content' id='target-" .$courseID . "'>";
              the_sub_field("curriculum_text");
              if( have_rows('course_requirements_table_name') ):
                  while ( have_rows('course_requirements_table_name') ) : the_row();
                      echo "<h4 class='noMarginBottom noMarginTop'>" .get_sub_field('course_list_table_label') ."</h4><table><thead><tr><th>Course #</th><th>Formerly</th><th>Course Name</th><th># of Credit Hours</th></tr></thead><tbody>";
                      if( have_rows('course-list-repeater') ):
                          while ( have_rows('course-list-repeater') ) : the_row();
                              echo "<tr><td>" .get_sub_field('course_number') ."</td><td>" .get_sub_field('old_course_number') ."</td><td>" .get_sub_field('course_name') ."</td><td>" .get_sub_field('number_of_credits') ."</td></tr>";
                          endwhile;
                      endif;
                      echo "</tbody></table>";
                  endwhile;
              endif;
              echo "</div>";
          endwhile;
    ?>
</div>