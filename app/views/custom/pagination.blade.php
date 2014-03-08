<ul class="pagination">
	  <li class="arrow unavailable"><a href="">&laquo;</a></li>
	  <li class="current"><a href="">1</a></li>
	  <li><a href="">2</a></li>
	  <li><a href="">3</a></li>
	  <li><a href="">4</a></li>
	  <li class="unavailable"><a href="">&hellip;</a></li>
	  <li><a href="">12</a></li>
	  <li><a href="">13</a></li>
	  <li class="arrow"><a href="">&raquo;</a></li>

</ul>
<?php
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);

	$trans = $environment->getTranslator();
?>

<?php if ($paginator->getLastPage() > 1): ?>
	<ul class="pagination">
		<?php
			echo $presenter->getPrevious($trans->trans('pagination.previous'));

			echo $presenter->getNext($trans->trans('pagination.next'));
		?>
	</ul>
<?php endif; ?>
