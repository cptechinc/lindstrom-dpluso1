<tr>
	<th>
		<a href="<?php // $orderpanel->generate_sortbyURL("ordernumber") ; ?>" class="load-link" <?php // $orderpanel->ajaxdata; ?>>
			Order # <?php // $orderpanel->tablesorter->generate_sortsymbol('ordernumber'); ?>
		</a>
	</th>
	<th> Customer </th>
	<th>
		<a href="<?php // $orderpanel->generate_sortbyURL("custpo") ; ?>" class="load-link" <?php // $orderpanel->ajaxdata; ?>>
			Customer PO: <?php // $orderpanel->tablesorter->generate_sortsymbol('custpo'); ?>
		</a>
	</th>
	<th>Ship-To</th>
	<th>
		<a href="<?php // $orderpanel->generate_sortbyURL("total_order") ; ?>" class="load-link" <?php // $orderpanel->ajaxdata; ?>>
			Order Totals <?php // $orderpanel->tablesorter->generate_sortsymbol('total_order'); ?>
		</a>
	</th>
	<th>
		<a href="<?php // $orderpanel->generate_sortbyURL("order_date") ; ?>" class="load-link" <?php // $orderpanel->ajaxdata; ?>>
			Order Date: <?php // $orderpanel->tablesorter->generate_sortsymbol('order_date'); ?>
		</a>
	</th>
	<th>
		<a href="<?php // $orderpanel->generate_sortbyURL("invoice_date") ; ?>" class="load-link" <?php // $orderpanel->ajaxdata; ?>>
			Invoice Date: <?php // $orderpanel->tablesorter->generate_sortsymbol('invoice_date'); ?>
		</a>
	</th>
	<th colspan="3">
		<?php // $orderpanel->generate_iconlegend(); ?>
		<?php if (isset($input->get->orderby)) : ?>
			<a href="<?php // $orderpanel->generate_clearsortURL(); ?>" class="btn btn-warning btn-sm load-link" data-loadinto="<?php // $orderpanel->loadinto; ?>" data-focus="<?php // $orderpanel->focus; ?>">
				Clear Sorting
			</a>
		<?php endif; ?>
	</th>
</tr>
