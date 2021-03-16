<?php 

defined('_JEXEC') or die('Restricted access');

class SistemasAnsModelIndisponibilidade extends JModelAdmin
{
    public function getTable($type = 'Indisponibilidade', $prefix = 'IndisponibilidadeTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }
    
}
