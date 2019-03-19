<?php
	use Dplus\Base\DplusDateTime;
?>
<table class="table table-striped table-bordered table-condensed order-listing-table">
	<thead>
		<?php include $config->paths->content.'dashboard/sales-history/thead-rows.php'; ?>
	</thead>
	<tbody>
		<?php if ($count == 0 && $input->get->text('ordn') == '') : ?>
			<tr>
				<td colspan="12" class="text-center">No Orders found!</td>
			</tr>
		<?php endif; ?>
		<?php foreach($orders as $order) : ?>
			<tr class="<?= $order->ordernumber == $input->get->text('ordn') ? 'selected' : ''; ?>" id="<?= $order->ordernumber; ?>">
				<td><?= $order->ordernumber; ?></td>
				<td><a href="<?php // $orderpanel->generate_customerURL($order); ?>"><?= $order->custid; ?></a> <span class="glyphicon glyphicon-share" aria-hidden="true"></span><br><?php // Customer::get_customernamefromid($order->custid); ?></td>
				<td><?= $order->custpo; ?></td>
				<td>
					<a href="<?php // $orderpanel->generate_customershiptoURL($order); ?>"><?= $order->shiptoid; ?></a>
				</td>
				<td class="text-right">$ <?= $page->stringerbell->format_money($order->total_order); ?></td>
				<td class="text-right"><?= DplusDateTime::format_date($order->order_date); ?></td>
				<td class="text-right"><?= DplusDateTime::format_date($order->invoice_date); ?></td>
				<td colspan="3">
					<!--  Documents Link -->
					<span class="col-xs-3">
						<?php if ($order->has_documents()) : ?>
							<a href="<?php // $orderpanel->generate_request_documentsURL($order); ?>" class="h3 generate-load-link" title="View Documents" data-loadinto="#sales-history-panel" data-focus="#sales-history-panel">
								<i class="fa fa-file-text" aria-hidden="true"></i>
							</a>
						<?php else : ?>
							<a href="#" class="h3 text-muted" title="No Documents Found">
								<i class="fa fa-file-text" aria-hidden="true"></i>
							</a>
						<?php endif; ?>
					</span>
					<!--  Notes Link -->
					<span class="col-xs-3">
						<?php if ($order->has_notes()) : ?>
							<a href="<?php // $orderpanel->generate_request_dplusnotesURL($order, 0); ?>" class="load-notes" title="View Order Notes" data-modal="<?php // $orderpanel->modal; ?>">
								<i class="material-icons md-36" aria-hidden="true">&#xE0B9;</i>
							</a>
						<?php else : ?>
							<a href="<?php // $orderpanel->generate_request_dplusnotesURL($order, 0); ?>" class="load-notes text-muted" title="View Order Notes" data-modal="<?php // $orderpanel->modal; ?>">
								<i class="material-icons md-36" aria-hidden="true">&#xE0B9;</i>
							</a>
						<?php endif; ?>
					</span>
					<!--  Order Tracking Link -->
					<span class="col-xs-3">
						<?php if ($order->has_tracking()) : ?>
							<a href="<?php // $orderpanel->generate_request_trackingURL($order); ?>" class="h3 generate-load-link" title="View Tracking" data-loadinto="#sales-history-panel" data-focus="#sales-history-panel">
								<i class="fa fa-plane hover" aria-hidden="true"></i>
							</a>
						<?php else : ?>
							<a href="#" class="h3 text-muted" title="No Tracking info Available">
								<i class="fa fa-plane hover" aria-hidden="true"></i>
							</a>
						<?php endif; ?>
					</span>
				</td>
			</tr>
		<?php endforeach; ?>
	 </tbody>
</table>
