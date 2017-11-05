<?php snippet('header') ?>
  
  <link rel="stylesheet" href="<?= $site->url() ?>/assets/plugins/calendar/css/calendar.css">
  
  <main class="main" role="main">

    <header class="wrap">
	    <div class="text">
	      <h1><?= $page->title()->html() ?></h1>
	      <?= $page->text()->kirbytext() ?>
	    </div>
	</header>
    
    <div class="text wrap">
	    <?php if ($page->webcal_text()->isNotEmpty()): ?>
	      <section class="webcal">
	        <p>
	          <a class="webcal-link" href="<?= $page->webcal_url() ?>"><img class="webcal-icon" src="<?= $site->url() ?>/assets/plugins/calendar/images/ics-file-format-symbol.svg" alt="ICS File" border="0"/><?= $page->webcal_text()->escape() ?></a>
	        </p>
	      </section>
	    <?php endif ?>
	    
	    <?php $events = $page->events($own = true, $allies = array('children' => true, 'siblings' => true)); ?>
	    <?php $debug = $events->count() ?>
	    <?php if ($events->count() > 0): ?>
	      <section class="events">
	        <?php foreach ($events as $key => $event): ?>
	          <?php snippet('event-teaser', array('event' => $event)); ?>
	        <?php endforeach ?>
	      </section>
	    <?php endif ?>
	</div>
    
  </main>

<?php snippet('footer') ?>