<?php
/**
 * @author      Fabian Manzano
 * @author      Adrian Fürschuß
 * @copyright	Copyright (C) 2013 - 2014. All rights reserved.
 * @license	GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';
JHTML::script('modules/mod_BootstrapGallery/extra/jquery.js');
JHTML::script('modules/mod_bootstrap_carousel/extra/bootstrap-carousel.js');
JHTML::script('modules/mod_bootstrap_carousel/extra/bootstrap-transition.js');
JHTML::stylesheet('modules/mod_bootstrap_carousel/extra/custom.css');

$check_folder = modbootstrap_carouselHelper::validation($params); //I need to do this if I want to bring the value that i get from my
$layout = $params->get('layout', 'default');//I dont understand 'layout for'
require JModuleHelper::getLayoutPath('mod_bootstrap_carousel', $layout);