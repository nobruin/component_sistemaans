<?php

class SistemasAnsViewIndisponibilidade extends JViewLegacy
{
	/**
	 * View form
	 *
	 * @var         form
	 */
	protected $form = null;

	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		// Get the Data
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->script = $this->get('Script');


		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}


		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

			// Set the document
		$this->setDocument();
	}

	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;

		$input->set('hidemainmenu', true);

		$isNew = (!isset($this->item->id));

		if ($isNew)
		{
			$title = "Cadastrar Indisponibilidade";
		}
		else
		{
			$title = "Editar Indisponibilidade";
		}

		JToolbarHelper::title($title, 'indisponibilidade');
		JToolbarHelper::save('indisponibilidade.save');
		JToolbarHelper::cancel(
			'indisponibilidade.cancel',
			$isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE'
		);
	}	

	protected function setDocument() 
	{

		JHtml::_('behavior.framework');
		JHtml::_('behavior.formvalidator');

		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('CRIAR Indisponibilidade:') :
                JText::_('EDITAR Indisponibilidade:'));

		$document->addScript(JURI::root() . "/administrator/components/com_sistemasans"
		                                  . "/views/indisponibilidade/submitbutton.js");
		JText::script('COM_HELLOWORLD_HELLOWORLD_ERROR_UNACCEPTABLE');
	}
}