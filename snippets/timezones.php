<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>Calendar Timezones</title>

  <?= css('assets/css/main.css') ?>

</head>
<body>

  <main class="main" role="main">

    <div class="text">
      <h1>Calendar Timezones</h1>
    </div>
    <ul>
      <?php $timezone_abbreviations = DateTimeZone::listAbbreviations(); ?>
      <?php foreach ($timezone_abbreviations as $key => $timezones): ?>
        <?php foreach ($timezones as $key => $timezone): ?>
          <?php if (strlen($timezone['timezone_id']) > 0): ?>
          <li>
            <?= $timezone['timezone_id'] ?>
          </li>
          <?php endif ?>
        <?php endforeach ?>
      <?php endforeach ?>
    </ul>
  </main>

</body>
</html>