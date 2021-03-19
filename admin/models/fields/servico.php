<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 *
 * @since  0.0.1
 */
class JFormFieldServico extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'Servico';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*')->from($db->quoteName('#__servicos'));		
		$query->where('published = 1');
		$db->setQuery((string) $query);
		$servicos = $db->loadObjectList();
		$options  = array();

		if ($servicos)
		{
			foreach ($servicos as $item)
			{
				$options[] = JHtml::_('select.option', $item->id, $item->nome);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}