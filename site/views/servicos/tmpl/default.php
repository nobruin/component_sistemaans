<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>

<link rel="stylesheet" href="/components/com_sistemasans/assets/css/style.css" type="text/css"></link>
<script type="text/javascript" src="/components/com_sistemasans/assets/js/sistemasans.js"></script>

<script type="text/javascript">
		/* ativador do tooltip */
		$(function () { $('[data-toggle="tooltip"]').tooltip() })
			//window.setTimeout(function () {
			window.location.reload();
		}, 1000);
</script>

<div class="container-fluid">
			<div class="col-sm-12 col-md-12 cl-lg-12">

				<!-- MENU DE NAVEGAÇÃO -->

				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#sistemas" data-toggle="tab" class="nav-link">Status</a>
					</li>
					<li>
						<a href="#historico" data-toggle="tab" class="nav-link">Histórico</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class=" tab-pane active" id="sistemas">
						<div class="row" id="listaEmpresas">
						<?php foreach ($this->servicos as $item): ?>
							<div class="col-sm-3 col-md-3 cl-lg-3">
									<div class="conteudo">
										<p class="sistema-nome"><?php echo $item->nome ?></p>
										<p class="sistema-status <?php echo $item->ativado ? "disponivel" : "indisponivel"; ?> "><?php echo $item->ativado ? "Disponível" : "Indisponível"; ?></p>
									</div>
							</div>
						<?php endforeach; ?>
						</div>
					</div>

					<!-- HISTÓRICO -->

					<div class="tab-pane" id="historico">
						<div class="row">
							<div class="col-sm-12 col-md-12 cl-lg-12">

								<div class="table-responsive tabela">
									<h2>Períodos de indisponibilidade</h2>

									<table class="table table-bordered table-hover">	

										<thead class="thead-ans">
											<th style="width:25%">Serviço</th>
											<th style="width:25%">&#9660; Data de início</th>
											<th style="width:25%">Data de término</th>
											<th style="width:25%">Total em minutos</th>
											
										</thead>
										<?php foreach($this->indisponibilidades as $item) :?>
										
											<tr>
												<td><?php echo $item->nome; ?></td>
												<td><?php echo $item->inicio; ?></td>
												<td><?php echo $item->fim; ?></td>
												<td><?php echo $item->totalMinutos; ?></td>
											</tr>

										<? endforeach; ?>
									</table>
								</div>

								<div class="paginacao">

									<nav aria-label="Page navigation">
										<ul class="pagination">
											<li>
												<a href="#" aria-label="Previous">
													<span aria-hidden="true">&laquo;</span>
												</a>
											</li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li>
												<a href="#" aria-label="Next">
													<span aria-hidden="true">&raquo;</span>
												</a>
											</li>
										</ul>
									</nav>
									<p>Exibindo 1 de 5 página(s) - 55 resultados</p>
								</div>
								
							</div>
						</div>

					</div>  <!-- fim do histórico -->
				</div> <!-- fim do tab-content -->

			</div>
		</div>