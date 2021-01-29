<?php
	#controls the ACF curriculum block
?>
<div id="courses" class="information-block">
  <h2 class="greenBGwhiteText noMargins">Curriculum</h2>
  <div class="inner-padding">
  <?php
    $rows = get_field('curriculum');
    if($rows){
      foreach($rows as $row){
        $courseID = preg_replace('/[^a-zA-Z0-9]+/', '', $row['curriculum_program_name']);
        //echo $courseID;
        echo "<div id='" . $courseID . "' class='collapseomatic noarrow'><h4 class='noMarginTop'>Click to view course requirements for the " . $row['curriculum_program_name'] . (($row['curriculum_major_or_minor']=='minor')?' minor':"");
        echo ".</h4></div><div id='swap-" . $courseID . "' class='collapseomatic noarrow' style='display: none;'><h4 class='noMarginTop'>Click to collapse the course requirements for the " . $row['curriculum_program_name'] .(($row['curriculum_major_or_minor']=='minor')?' minor':"");
        echo ".</h4></div><div class='collapseomatic_content' id='target-" . $courseID . "'>";
        echo $row['curriculum_text'];
        
        $tables = $row['course_requirements_table_name'];
        if($tables){
          foreach($tables as $table){
            echo "<h4 class='noMarginBottom noMarginTop'>" . $table['course_list_table_label'] ."</h4><table><thead><tr><th>Course #</th><th>Course Name</th><th>Credits</th></tr></thead><tbody>";
            $courses = $table['course-list-repeater'];
            if($courses){
              foreach($courses as $course){
                echo "<tr><td class='has-text-align-left' data-align='left'>" . $course['course_number'] . "</td><td class='has-text-align-left' data-align='left'>" . $course['course_name'] . "</td><td class='has-text-align-center' data-align='center'>" . $course['number_of_credits'] ."</td></tr>";
              }
            echo "</tbody></table>";
            }
          }
        }
        echo "</div>";
      }
    }
  ?>
  </div>
</div>