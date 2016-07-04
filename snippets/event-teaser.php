<article class="event">
  <h1><?= $event->summary()->escape() ?></h1>
  <?= $event->description()->kirbytext() ?>
  <div class="calendar-entry">
    <?php $debug = $event->begin_timestamp()->value ?>
    <ul>
      <li class="begin">
        <time datetime="<?= strftime('%Y-%m-%dT%H:%M:%S', $event->begin_timestamp()->value) ?>"><?= strftime('%d.%m.%y %H:%M:%S', $event->begin_timestamp()->value) ?></time>
      </li>
      <li class="end">
        <time datetime="<?= strftime('%Y-%m-%dT%H:%M:%S', $event->end_timestamp()->value) ?>"><?= strftime('%d.%m.%y %H:%M:%S', $event->end_timestamp()->value) ?></time>
      </li>
    </ul>
    
  </div>
</article>