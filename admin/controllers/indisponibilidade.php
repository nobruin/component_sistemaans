<?php 

defined('_JEXEC') or die('Restricted access');

class SistemasAnsControllerIndisponibilidade extends JControllerAdmin
{
    public function getModel($name = 'Indisponibilidade', $prefix = 'IndisponibilidadeModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
    }
    
}
