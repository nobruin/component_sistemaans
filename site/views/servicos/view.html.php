<?php


class SistemasAnsViewServicos extends JViewLegacy
{

	public $servicos;
	public $indisponibilidades;


	function display($tpl = null)
	{		
		$servicosModel = $this->getModel('servicos');
		$this->servicos = $servicosModel->getList();
		$this->indisponibilidades = $servicosModel->getListIndisponibilidade();

        
        foreach ($this->indisponibilidades as $key => $value) {
            $dataInicio = new Datetime($value->inicio);
            $dataFim = new Datetime($value->fim);
            $diff = $dataInicio->diff($dataFim);
            $this->indisponibilidades[$key]->totalMinutos = ($diff->h + ($diff->days * 24) * 60);
        }
        
        
		parent::display($tpl);

	}
}