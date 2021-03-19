<?php 

defined('_JEXEC') or die('Restricted access');

class SistemasAnsModelIndisponibilidade extends JModelAdmin
{

    public function getTable($type = 'Indisponibilidade', $prefix = 'IndisponibilidadeTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true){
        $form = $this->loadForm(
            'com_sistemasans.sistemasAns.indisponibilidade',
            'indisponibilidade',
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
                 ->from($db->quoteName('#__indisponibilidades'));
 
         return $query;
     }
 
     protected function loadFormData(){
         // Check the session for previously entered form data.
         $data = JFactory::getApplication()->getUserState(
             'com_sistemasans.edit.indisponibilidade.data',
             array()
         );
 
         if (empty($data))
         {
             $data = $this->getItem();
         }
 
         return $data;
     }
 
     public function save($data){

        try {
            $data['inicio'] = $this->tratarData($data['inicio']);
            $data['fim'] = $this->tratarData($data['fim']);
        } catch (Exception $ex) {
            throw $ex;
        }

        return parent::save($data);
     }


     public function tratarData($date)
     {
        if($date != "0000-00-00 00:00:00"){
            $date = DateTime::createFromFormat('d/m/Y H:i:s', $date); 
            return $date->format('Y-m-d H:i:s');
        }

        return $date;
     }
    
}
