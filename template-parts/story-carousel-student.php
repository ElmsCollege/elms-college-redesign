<?php
global $fake_id;
global $post;
if (isset($fake_id)) {
  $post = get_post($fake_id);
  setup_postdata($post);
}

get_template_part("template-parts/block/content-student-stories-carousel");