	<div class="span3">
		<ul class="nav nav-list well span2 affix">
			<li class="active">
				<a href="#content-list">
					Cписок контета
				</a>
			</li>
			<li>
				<a href="/admin/pages/create">
					Добавить страницу
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
									<?= Html::img("files/{$content->image}", array('class' => 'img-polaroid')); ?>
									<div class="caption">
										<h3><?= $content->name; ?></h3>
									</div>
									<p>
										<a class="btn btn-primary" href="/admin/content/edit/<?=$content->id; ?>">Релактировать</a>
										<a class="btn btn-danger" href="/admin/content/delete/<?=$content->id;?>">Удалить</a>
									</p>
								</div>
							</li>
						<? endforeach; ?>
					</ul>
				</div>
			<?php else: ?>
				<p>Контента здесь пока нет. Но ето дело поправимое</p>
			<?php endif; ?>
		</section>
	</div>

