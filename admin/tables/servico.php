<?php
defined('_JEXEC') or die('Restricted access');

class ServicoTableServico extends JTable
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  A database connector object
	 */
	function __construct(&$db)
	{
		parent::__construct('#__servicos', 'id', $db);
	}
}