<? 
	$page = $p->page ? $p->page : 1;
	$next_page = $page == $p->totalCount ? 1 : $page + 1;
	$prev_page = $page == 1 ? $p->totalCount : $page - 1;
	echo $p->page;
?>
<!-- pagination -->
<div class="container">
	<nav aria-label="Page navigation example" class="mt-4">
	  <ul class="pagination justify-content-center">
		<li class="page-item">
		  <a class="page-link" href="/main/index?page=<?php echo $prev_page; ?>">Previous</a>
		</li>
		<? for ($i = 1; $i <= $p->totalCount; $i++): ?>
			<li class="page-item <?php if ($i == $page) echo 'active'; ?>">
				<a class="page-link" href="/main/index?page=<?php echo $i ?>"><?php echo $i ?></a>
			</li>
		<? endfor; ?>
		<li class="page-item">
		  <a class="page-link" href="/main/index?page=<?php echo $next_page; ?>">Next</a>
		</li>
	  </ul>
	</nav>
</div>
<!-- end pagination -->