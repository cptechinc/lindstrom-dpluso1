<?php
	use Dplus\Base\DplusDateTime;
	$orders = SalesHistoryQuery::create()->limit(10)->find();
?>

<div class="list-group">
	<div class="list-group-item">
		<div class="row">
			<div class="col-sm-2">Order #</div>
			<div class="col-sm-2">Customer</div>
			<div class="col-sm-2">Po #</div>
			<div class="col-sm-2">Order Total</div>
			<div class="col-sm-2">Order Date</div>
			<div class="col-sm-2">Invoice Date</div>
		</div>
	</div>
	<?php if ($count) : ?>
		<?php foreach ($orders as $order) : ?>
			<a href="#" class="list-group-item">
				<div class="row">
					<div class="col-sm-2">
						<?= $order->ordernumber; ?>
					</div>
					<div class="col-sm-2">
						<?= $order->custid; ?> <br>
						<?= $order->shiptoid; ?>
					</div>
					<div class="col-sm-2">
						<?= $order->custpo; ?>
					</div>
					<div class="col-sm-2">
						<?= $page->stringerbell->format_money($order->total_order);  ?>
					</div>
					<div class="col-sm-2">
						<?= DplusDateTime::format_date($order->order_date); ?>
					</div>
					<div class="col-sm-2">
						<?= DplusDateTime::format_date($order->invoice_date); ?>
					</div>
				</div>
			</a>
		<?php endforeach; ?>
	<?php else : ?>
		<div class="list-group-item">
			<p>No Sales History Available</p>
		</div>
	<?php endif; ?>
</div>
