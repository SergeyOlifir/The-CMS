<section id="related" class="well">
    <header>
	 <h1><legend>Связанный контент</legend></h1>
    </header>
    <div class="clearfix">
	<div class="main-metro-wrapper clearfix">
	    <? $related_contents = $content->related_content; ?>
	    <? foreach ($related_contents as $related): ?>
		<div class="tile left smoll content">
		    <a href="/admin/content/edit/<?=$related->id; ?>/1">
			<?= Html::img("files/{$related->image}"); ?>
			<h3><?= $related->name; ?></h3>
		    </a>
		    <div class="buttons-area clearfix">
			<a href="/admin/content/unset/<?=$content->id; ?>/<?=$related->id; ?>" class="delite-button right">Delete</a>
		    </div>
		</div>
	    <? endforeach; ?>
	</div>
	<?= Html::anchor("#add_poup", 'Добавить связанный контент', array('class' => 'btn btn-primary btn-large', 'data-reveal-id' => "add_poup")); ?>
    </div>
</section>

<div id="add_poup" class="reveal-modal">
	<div class="popup-content scroll-news-index">
		<?= Form::open("admin/content/set/{$content->id}"); ?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th></th>
						<th>Название</th>
						<th>Страница</th>
					</tr>
				</thead>
				<tbody>
					<? $contents = Model_Content::find('all'); ?>
					<? foreach ($contents as $cont): ?>
						<? if(!in_array($cont, $related_contents) && $content->id != $cont->id) : ?>
							<tr>
								<td><?= Form::checkbox('relations[]', $cont->id, false);  ?></td>
								<td><?= $cont->name; ?></td>
								<td><?= $cont->page['name']; ?></td>
							</tr>
						<? endif; ?>
					<? endforeach; ?>	
				</tbody>
			</table>
			<div class="actions">
				<?= Form::submit('submit', 'Сохранить', array('class' => 'btn btn-primary btn-large')); ?>
			</div>
		<?= Form::close(); ?>
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>