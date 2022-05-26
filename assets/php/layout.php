<link rel='stylesheet' href='<?php echo plugin_dir_url(__FILE__) . '../css/style.css' ?>' type='text/css' media='all' />

<div class="outer-container">
	<div class="line">
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div class="inner-container">
		<div class="title">
			<a href="https://www.adtrak.co.uk"><?php echo $this->sprite('logo') ?></a>
			<h1>WordPress Dashboard</h1>
			<span><?php echo $this->version ?></span>
		</div>
		<section>
			<h2>Quick Links</h2>
			<div class="quick-links">
				<a href="<?php echo $this->quick_links()['gitlab'] ?>" target="_blank">
					<?php echo $this->sprite('gitlab') ?>
					<span>Open on GitLab</span>
				</a>
				<a href="<?php echo $this->quick_links()['deployhq'] ?>" target="_blank">
					<?php echo $this->sprite('deployhq') ?>
					<span>Open on DeployHQ</span>
				</a>
				<a href="<?php echo $this->quick_links()['salesforce'] ?>" target="_blank">
					<?php echo $this->sprite('salesforce') ?>
					<span>Find on Salesforce</span>
				</a>
			</div>
		</section>
		<section>
			<h2>Content</h2>
			<div class="card-row">
				<a class="card" href="<?php echo $this->pages() ?>">
					<?php echo $this->sprite('page') ?>
					<span>Pages</span>
				</a>
				<a class="card" href="<?php echo home_url(); ?>/wp-admin/edit.php">
					<?php echo $this->sprite('blog') ?>
					<span>Posts</span>
				</a>
				<a class="card" href="<?php echo home_url(); ?>/wp-admin/nav-menus.php">
					<?php echo $this->sprite('menu') ?>
					<span>Menus</span>
				</a>
			</div>
		</section>
		<section>
			<h2>Tools & Settings</h2>
			<div class="card-row">
				<?php if (is_plugin_active('wp-migrate-db-pro/wp-migrate-db-pro.php')) : ?>
					<a class="card" href="<?php echo home_url(); ?>/wp-admin/tools.php?page=wp-migrate-db-pro">
						<?php echo $this->sprite('migrate') ?>
						<span>Migrate DB</span>
					</a>
				<?php endif; ?>
				<?php if (is_plugin_active('advanced-custom-fields-pro/acf.php')) : ?>
					<a class="card" href="<?php echo home_url(); ?>/wp-admin/edit.php?post_type=acf-field-group">
						<?php echo $this->sprite('text-window') ?>
						<span>ACF</span>
					</a>
				<?php endif; ?>
				<a class="card" href="<?php echo home_url(); ?>/wp-admin/options-permalink.php">
					<?php echo $this->sprite('signpost') ?>
					<span>Permalinks</span>
				</a>
				<a class="card" href="<?php echo $this->site_options() ?>">
					<?php echo $this->sprite('settings') ?>
					<span>Site Options</span>
				</a>
			</div>
		</section>
		<section>
			<h2>Marketing</h2>
			<div class="card-row">
				<a class="card" href="<?php echo home_url(); ?>/wp-admin/admin.php?page=marketing">
					<?php echo $this->sprite('marketing') ?>
					<span>Marketing</span>
				</a>
				<?php if (is_plugin_active('wordpress-seo/wp-seo.php')) : ?>
					<a class="card" href="<?php echo home_url(); ?>/wp-admin/admin.php?page=wpseo_dashboard">
						<?php echo $this->sprite('search') ?>
						<span>Yoast</span>
					</a>
				<?php endif; ?>
			</div>
		</section>
	</div>
</div>