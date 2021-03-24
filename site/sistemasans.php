<?php // No direct access to this file
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tabstate');

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('SistemasAns');

// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task'));

// Redirect if set by the controller
$controller->redirect();    