<?php
	$presenter = new FoundationPresenter($paginator);

	$trans = $environment->getTranslator();
?>

<?php if ($paginator->getLastPage() > 1): ?>
	<ul class="pagination" style="margin-bottom: 0;">
		<span class="left">{{ $presenter->getPrevious($trans->trans('pagination.previous')) }}</span>
		<span class="right">{{ $presenter->getNext($trans->trans('pagination.next')) }}</span>
	</ul>
<?php endif; ?>
