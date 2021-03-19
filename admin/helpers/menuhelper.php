<?php

abstract class MenuHelper extends JHelperContent
{
	/**
	 * Configure the Linkbar.
	 *
	 * @return Bool
	 */

	public static function addSubmenu($submenu) 
	{

		JHtmlSidebar::addEntry(
			JText::_('Serviços'),
			'index.php?option=com_sistemasans',
			$submenu == 'servicos'
		);

		JHtmlSidebar::addEntry(
			JText::_('Indisponibilidades'),
			'index.php?option=com_sistemasans&view=indisponibilidades',
			$submenu == 'indisponibilidades'
		);

		// Set some global property
		$document = JFactory::getDocument();

		if ($submenu == 'indisponibilidades') 
		{
			$document->setTitle(JText::_('Cadastro de indisponibilidades'));
		}
	}
}