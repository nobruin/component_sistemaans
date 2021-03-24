<?php
defined('_JEXEC') or die('Restricted access');

class IndisponibilidadeTableIndisponibilidade extends JTable
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  A database connector object
	 */
	function __construct(&$db)
	{
		parent::__construct('#__indisponibilidades', 'id', $db);
	}
}