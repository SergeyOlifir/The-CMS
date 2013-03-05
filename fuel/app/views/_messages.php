<div class="alert-message alert <?= Session::get('notice_type'); ?>" data-alert="alert">
	<a class="close" href="#">×</a>
	<p><?= implode('</p><p>', (array) $messages); ?></p>
</div>

