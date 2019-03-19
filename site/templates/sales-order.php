<?php
	if ($input->get->ordn) {
		$ordn = $input->get->text('ordn');

		$order = SalesHistoryQuery::create()->findOneByOrdernumber($ordn);
		$page->body = $config->paths->content."sales-history/view-order.php";

		include $config->paths->content."common/include-page.php";
	} else {
		throw new Wire404Exception();
	}
