<?php
/**
 * @author      Fabian Manzano
 * @author      Adrian Fürschuß
 * @copyright   Copyright (C) 2013 -2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$folder = $params->get('folder');

if ($check_folder == null) {
    ?>
    <pre class="alert alert-error">
        <?php echo JText::sprintf('MOD_BOOTSTRAP_CAROUSEL_FOLDER_NOT_FOUND_ERROR_MESSAGE', $folder); ?>
    </pre>
    <?php
} else {
    // get parameters
    $carouselId = $params->get('id');
    $alt_text = $params->get('Image_Name');
    $displayControls = $params->get('display_controls');
    $displayIndicators = $params->get('display_indicators');
    //$speed   = $params->get('speed');
    //define variables
    $divId = $carouselId . "_outer";
    $files = glob("images/" . $folder . "/*.*");
    $num_files = count($files);
    $check = true;  //to check the first foto and make it active
    ?>
    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $(document).ready(function() {
            $('#<?php echo $divId; ?>').carousel({interval: 1000, cycle: true});
        });
    </script>

    <div id="<?= $divId ?>" class="carousel slide">
        <?php
        if ($displayIndicators) {
            echo '<ol class="carousel-indicators">';
            for ($i = 0; $i < $num_files; $i++) {
                echo "<li data-slide-to=\"$i\" data-target=\"#" . $divId . "\"";
                if ($check) {
                    echo "class=\"active\"";
                }
                echo "></li>";
                $check = false;
            }
            echo "</ol>";
        }
        // reset check for next usage
        $check = true;
        ?> 
        <div id="<?php echo $carouselId . "_inner" ?>" class="carousel-inner">
            <?php
            for ($i = 0; $i < $num_files; $i++) {
                $this_file = $files[$i];
                $base_name = basename($this_file); //get the name of photo
                list($width, $height) = getimagesize($this_file);
                if (is_numeric($width)) {
                    ?>
                    <div class="item <?php
                    if ($check) {
                        echo "active";
                        $check = false;
                    }
                    ?>">
                        <img id="<?php echo $carouselId . "_img" . $i ?>" src="<?php echo $this_file ?>" alt="<?php echo $alt_text ?>">
                        <?php if ($alt_text == 1): ?>
                            <div class="carousel-caption"><h4><?php echo $base_name ?></h4></div>
                        <?php endif; ?>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
        <?php if ($displayControls) { ?>
            <a href="#<?= $divId ?>" class="left carousel-control" data-slide="prev">&lsaquo;</a> 
            <a href="#<?= $divId ?>" class="right carousel-control" data-slide="next">&rsaquo;</a> 
        <?php } ?>
    </div>
    <?php
}?>