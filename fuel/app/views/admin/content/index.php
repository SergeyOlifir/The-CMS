	<div class="span3">
		<ul class="nav nav-list well span2 affix">
			<li class="active">
				<a href="#content-list">
					Cписок контета
				</a>
			</li>
			<li>
				<a href="/<?= $uri; ?>">
					Добавить контент
				</a>
			</li>
		</ul>
	</div>
	<div class="span9">
		<section id="content-list">
			<h2>Список контента страницы <?= $page->name; ?></h2>
			<? $contents = $page->contents; ?>
			<?php if ($contents): ?>
				<div class="main-metro-wrapper clearfix">
					<ul class="thumbnails">
						<? foreach ($contents as $content): ?>
							<li class="span3">
								<div  class="thumbnail">
									<div class="thumbnail-wrapper img-polaroid">
										<?= Html::img("files/{$content->image}"); ?>
										<div class="caption">
											<h3><?= $content->name; ?></h3>
										</div>
									</div>
									<div class="overlay"></div>
									<div class="buttons-area clearfix">
										<a href="/admin/content/edit/<?=$content->id; ?>/1" class="edit-button" title="Редактировать">Edit</a>
										<a href="/admin/content/delete/<?=$content->id; ?>" class="delite-button" title="Удалить">Delete</a>
									</div>
								</div>
							</li>
						<? endforeach; ?>
					</ul>
				</div>
			<?php else: ?>
				<p>Контента здесь пока нет. Но это дело поправимое</p>
			<?php endif; ?>
		</section>
	</div>
