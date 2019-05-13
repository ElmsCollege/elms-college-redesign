<?php 
$show_alert_bar = get_field("show_alert_bar", "option");
$alert_bar = get_field("alert_bar", "option");
$style = get_field("alert_bar_style", "option");
if ($show_alert_bar) : ?>
  <div class="alert-bar <?php if ($style == "alert") { print "emergency";}?>">
    <?php echo $alert_bar; ?>
  </div>
<?php endif;?>