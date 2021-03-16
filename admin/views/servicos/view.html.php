<?php

class SistemasAnsViewServicos extends JViewLegacy
{
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$context = "sistemasans.list.admin.servicos";

		//die('ok');

		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state 		= $this->get('State');	
		$this->state			= $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'nome', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		$this->filterForm    	= $this->get('FilterForm');	
		$this->activeFilters 	= $this->get('ActiveFilters');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		$errors = $this->get('Errors');
		$this->addToolBar();

		parent::display($tpl);
		// Set the document
		$this->setDocument();
	}

	protected function addToolBar()
	{

		$title = JText::_('CADASTRO DE SERVIÇOS:');

		if ($this->pagination->total)
		{
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}


		JToolBarHelper::title($title, 'servico');

		JToolbarHelper::addNew('servico.add');
		JToolbarHelper::editList('servico.edit');
		JToolbarHelper::deleteList('', 'servico.delete');

	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle("Listagem de serviços");
	}
}