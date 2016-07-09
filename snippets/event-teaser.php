<article class="event">
  <h1><?= $event->summary()->escape() ?></h1>
  <?= $event->description()->kirbytext() ?>
  <div class="calendar-entry">
    <?php $debug = $event->begin_timestamp()->value ?>
    <ul>
      <li class="begin">
        <?= $event->begin_date_time() ?>
      </li>
      <li class="end">
         <?= $event->end_date_time() ?>
      </li>
    </ul>
    
  </div>
</article>