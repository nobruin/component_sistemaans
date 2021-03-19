<?php 

defined('_JEXEC') or die('Restricted access');

class SistemasAnsModelIndisponibilidades extends JModelList
{
    /**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
	 * @see     JController
	 * @since   1.6
	 */
	public function __construct($config = array()){
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'i.id',
				'i.titulo',
				'i.published'
			);
		}

		parent::__construct($config);
    }

   protected function getListQuery(){
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the base select statement.
		$query->select('i.*, s.nome')
                ->from($db->quoteName('#__indisponibilidades', 'i'))
				->join('INNER', $db->quoteName('#__servicos','s'). " ON  ".$db->quoteName('i.id_servico'). " = ".$db->quoteName('s.id'));

                	// Filter: like / search
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			$like = $db->quote('%' . $search . '%');
			$query->where('titulo LIKE ' . $like);
		}

		// Filter by published state
		$published = $this->getState('filter.published');

		if (is_numeric($published))
		{
			$query->where('i.published = ' . (int) $published);
		}
		elseif ($published === '')
		{
			$query->where('(i.published IN (0, 1))');
		}

		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'id');
		$orderDirn 	= $this->state->get('list.direction', 'asc');

		$query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));

		return $query;
	}
}
