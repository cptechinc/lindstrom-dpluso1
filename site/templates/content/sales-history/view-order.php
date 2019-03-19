<div class="form-group hidden-print">
	<a href="<?php //$orderdisplay->generate_printURL($order); ?>" target="_blank">
		<span class="h3"><i class="fa fa-print" aria-hidden="true"></i></span> View Printable Order
	</a>
</div>
<div class="row">
	<div class="col-sm-6">
		<img src="<?= $appconfig->companylogo->url; ?>" class="img-responsive" alt="<?= $appconfig->companydisplayname.' logo'; ?>">
	</div>
	<div class="col-sm-6 text-right">
		<h1>Order # <?= $order->ordernumber; ?></h1>
	</div>
</div>
<div class="row">
	<div class="col-sm-6"></div>

	<div class="col-sm-6">
		<table class="table table-bordered table-striped table-condensed">
			<tr> <td>Order Date</td> <td><?= $order->order_date; ?></td> </tr>
			<tr> <td>Invoice Date</td> <td><?= $order->invoice_date; ?></td> </tr>
			<tr> <td>Status</td> <td>Invoiced</td> </tr>
			<tr> <td>CustID</td> <td><?= $order->custid; ?></td> </tr>
			<tr> <td>Customer PO</td> <td><?= $order->custpo; ?></td> </tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-xs-4">
		<div class="address-header"><h3>Bill-to</h3></div>
		<address>
			<?php if (100 == 1) : ?>
				<?= $order->custname; ?><br>
				<?= $order->billaddress; ?><br>
				<?php if (strlen($order->billaddress2) > 0) : ?>
					<?= $order->billaddress2; ?><br>
				<?php endif; ?>
				<?= $order->billcity.", ".$order->billstate." ".$order->billzip; ?>
			<?php endif; ?>
		</address>
	</div>
	<div class="col-xs-4">
		<div class="address-header"><h3>Ship-to</h3></div>
		<address>
			<?php if (100 == 1) : ?>
				<?= $order->shipto_name; ?><br>
				<?= $order->shipto_address1; ?><br>
				<?php if (strlen($order->shipto_address2) > 0) : ?>
					<?= $order->shipto_address2; ?><br>
				<?php endif; ?>
				<?= $order->shipto_city.", ".$order->shipto_state." ".$order->shipto_zip; ?>
			<?php endif; ?>
		</address>
	</div>
	<div class="col-xs-4">
		<div class="address-header"><h3>Contact</h3></div>
		<address>
			<?= $order->contact; ?><br>
			<?= $page->stringerbell->format_phone($order->phone); ?><br>
			<?= $order->contact_email; ?>
		</address>
	</div>
</div>
<table class="table table-bordered table-striped">
	 <tr class="detail item-header">
		<th class="text-center">Item ID/Cust Item ID</th>
		<th class="text-right">Qty</th>
		<th class="text-right" width="100">Price</th>
		<th class="text-right">Line Total</th>
	</tr>
	<?php if (100 == 1) : ?>
	<?php $details = $orderdisplay->get_orderdetails($order); ?>
	<?php foreach ($details as $detail) : ?>
		<tr class="detail">
			<td>
				<?= $detail->itemid; ?>
				<?php if (strlen($detail->vendoritemid)) { echo ' '.$detail->vendoritemid;} ?>
				<br>
				<small><?= $detail->desc1. ' ' . $detail->desc2 ; ?></small>
			</td>
			<td class="text-right"> <?= intval($detail->qty) ; ?> </td>
			<td class="text-right">$ <?= $page->stringerbell->format_money($detail->price); ?></td>
			<td class="text-right">$ <?= $page->stringerbell->format_money($detail->price * intval($detail->qty)) ?> </td>
		</tr>
	<?php endforeach; ?>
	<?php endif; ?>
	<tr>
		<td></td> <td><b>Subtotal</b></td> <td colspan="2" class="text-right">$ <?= $page->stringerbell->format_money($order->subtotal_nontax); ?></td>
	</tr>
	<tr>
		<td></td><td><b>Tax</b></td> <td colspan="2" class="text-right">$ <?= $page->stringerbell->format_money($order->total_tax); ?></td>
	</tr>
	<tr>
		<td></td><td><b>Freight</b></td> <td colspan="2" class="text-right">$ <?= $page->stringerbell->format_money($order->total_freight); ?></td>
	</tr>
	<tr>
		<td></td><td><b>Misc.</b></td> <td colspan="2" class="text-right">$ <?= $page->stringerbell->format_money($order->total_misc); ?></td>
	</tr>
	<tr>
		<td></td><td><b>Total</b></td> <td colspan="2" class="text-right">$ <?= $page->stringerbell->format_money($order->total_order); ?></td>
	</tr>
</table>
<hr>
