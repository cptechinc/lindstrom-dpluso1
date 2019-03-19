<?php
	$count = SalesHistoryQuery::create()->count();
	$orders = SalesHistoryQuery::create()->limit(10)->find();
?>
<div class="panel panel-primary not-round" id="sales-history-panel">
	 <div class="panel-heading not-round" id="sales-history-panel-heading">
		<a href="#sales-history-div" data-parent="#sales-history-panel" data-toggle="collapse">
			Shipped Orders <span class="caret"></span>
		</a>
		<span class="badge pull-right"> <?= $count; ?></span>
		<span class="pull-right"><?php // $orderpanel->generate_pagenumberdescription(); ?> &nbsp; </span>
	 </div>
	 <div id="sales-history-div" class="<?php // $orderpanel->collapse; ?>">
		<div class="table-responsive">
			<?php
				if ($modules->isInstalled('CaseQtyBottle')) {
					include $config->paths->siteModules.'CaseQtyBottle/content/dashboard/sales-history/table.php';
				} else {
					include $config->paths->content.'sales-history/table.php';
				}
			?>
		</div>
	 </div>
</div>
