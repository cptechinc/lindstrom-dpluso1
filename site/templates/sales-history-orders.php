<?php
	$count = SalesHistoryQuery::create()->count();
	$orders = SalesHistoryQuery::create()->limit(10)->find();
	$page->body = $config->paths->content."sales-history/table.php";
	include $config->paths->content."common/include-page.php";
