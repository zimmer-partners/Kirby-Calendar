<article class="event">
  <h1><?= $event->summary()->escape() ?></h1>
  <div class="description">
    <?= $event->description()->kirbytext() ?>
  </div>
  <div class="calendar-entry">
    <?php $debug = $event->begin_timestamp()->value ?>
    <p class="date">
      <span class="begin"><?= $event->begin_date_time() ?></span> – <span class="end"><?= $event->end_date_time() ?></span>
    </p>
  </div>
</article>