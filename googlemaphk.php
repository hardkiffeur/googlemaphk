<?php
/**
 * @version		2.2
 * @package		K2 Map
 * @author		Hardkiffeur www.promogerim.fr
 * @copyright	Copyright (c) 2014 Promokom. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die ;

/**
 * K2 map Plugin to render a googlemap from informations entered in backend K2 forms.
 */

// Load the K2 Plugin API
JLoader::register('K2Plugin', JPATH_ADMINISTRATOR.'/components/com_k2/lib/k2plugin.php');

// Initiate class to hold plugin events
class plgK2Googlemaphk extends K2Plugin
{

	// Some params
	var $pluginName = 'googlemaphk';
	var $pluginNameHumanReadable = 'K2 Map Plugin';

	function plgK2Googlemaphk(&$subject, $params)
	{
		parent::__construct($subject, $params);
	}

	/**
	 * Below we list all available FRONTEND events, to trigger K2 plugins.
	 * Watch the different prefix "onK2" instead of just "on" as used in Joomla! already.
	 * Most functions are empty to showcase what is available to trigger and output. A few are used to actually output some code for example reasons.
	 */

	function onK2PrepareContent(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();
		// $item->text = 'It works! '.$item->text;
	}

	function onK2AfterDisplay(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();
		return '';
	}

	function onK2BeforeDisplay(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();
		return '';
	}

	function onK2AfterDisplayTitle(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();
		return '';
	}

	function onK2BeforeDisplayContent(&$item, &$params, $limitstart)
	{
		$mainframe = JFactory::getApplication();
		return '';
	}

	// Event to display (in the frontend) the Map as entered in the item form
	function onK2AfterDisplayContent( &$item, &$params, $limitstart) {
		$mainframe = JFactory::getApplication();

		// Get the output of the K2 plugin fields (the data entered by your site maintainers)
		$plugins = new K2Parameter($item->plugins, '', $this->pluginName);
		
		$mapURL = $plugins->get('mapURL_item');
		$mapSLLA = $plugins->get('mapSLLA_item');
		$mapSLLB = $plugins->get('mapSLLB_item');


		// Check if we have a value entered
		if ( empty($mapURL)) return;

		// Output BE SURE TO ADD YOUR FIXE MAP URL INTO THE FIRST src ATTRIBUTS

		$output = '
		<h3 id="map">'.JText::_('Localisation').'</h3>
		<div class="responsive-iframe-container">
			<iframe width="'.$this->params->get('width').'" height="'.$this->params->get('height').'"frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/d/viewer?mid=z4m_PlZYCU3c.kI0OzaEVXsAM&msa=0&ll='.$mapSLLA.','.$mapSLLB.'&amp;z=16&amp;spn=0.013179,0.0396&amp;t=m&amp;iwloc=0004e1b4fda19440ee899&amp;output=embed"></iframe>
		</div>
		';

		return $output;
	}

} // END CLASS
