<div class="clearfix">
	<a href="#2">
		<div class="clearfix menu-tile left">
			<div class="image-wrapper left">
				<?= Html::img("assets/img/templates/kandibur/main-images/1.jpg") ?>
			</div>
			<div class="menu-description left">
				<h3>
					 Главная
				</h3>
				<div class="menu-text">
					Все о нашем проекте в интернете и производмых продуктах ...
				</div>
			</div>
		</div>
	</a> 
	<? foreach ($links as $link): ?>
		<a href="#<?= $link->page->alias; ?>">
			<div class="clearfix menu-tile left">
				<div class="image-wrapper left">
					<?= Html::img("files/{$link->image}") ?>
				</div>
				<div class="menu-description left">
					<h3>
						 <?= $link->name; ?>
					</h3>
					<div class="menu-text">
						<?= $link->description; ?>
					</div>
				</div>
			</div>
		</a>
	<? endforeach; ?>
	
</div>
