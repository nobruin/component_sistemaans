<?php 

defined('_JEXEC') or die('Restricted access');

class SistemasAnsModelServico extends JModelAdmin
{
   public function getTable($type = 'Servico', $prefix = 'ServicoTable', $config = array())
   {
       return JTable::getInstance($type, $prefix, $config);
   }

   public function getForm($data = array(), $loadData = true){
       $form = $this->loadForm(
           'com_sistemasans.sistemasAns',
           'servico',
           array(
               'control' => 'jform',
               'load_data' => $loadData
           )
       );

       return !empty($form) ? $form : false;
   }

   protected function getListQuery(){
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the base select statement.
		$query->select('*')
                ->from($db->quoteName('#__servicos'));

		return $query;
	}

    protected function loadFormData(){
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
			'com_sistemasans.edit.servico.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

}
