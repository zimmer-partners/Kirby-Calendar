<?php

header('Content-type: text/calendar; charset=utf-8');
header("Content-Disposition: inline; filename={$page->slug()}.ics");

$calendar_config = array(
  'unique_id' => url::host($site->url()), 
  'TZID' => 'Europe/Zurich'
);

$calendar = new vcalendar($calendar_config);
$calendar->setProperty("method", "PUBLISH");
$calendar->setProperty("x-wr-calname", $page->title()->value);
$calendar->setProperty("X-WR-CALDESC", $page->text()->kirbytext());
$calendar->setProperty("X-WR-RELCALID", $page->hash());
$calendar->setProperty("X-WR-TIMEZONE", $calendar_config['TZID']);


$events = $page->events($own = true, $allies = array('children' => true, 'siblings' => true));
if ($events->count() > 0):
  foreach ($events as $key => $ally_event):
    $begin = $ally_event->begin_timestamp()->value;
    $end = $ally_event->end_timestamp()->value;
    $event = new vevent($calendar->getConfig());
    $event->setProperty('summary', $ally_event->summary()->value);
    $event->setProperty('description', $ally_event->description()->kirbytext());
    $event->setProperty('url', $event->page()->url());
    $event->setProperty('dtstart', 
      array(
        'year'  => strftime('%Y', $begin), 
        'month' => strftime('%m', $begin), 
        'day'   => strftime('%d', $begin),
        'hour'  => strftime('%H', $begin),
        'min'   => strftime('%M', $begin),
        'sec'   => strftime('%S', $begin),
      )
    );
    $event->setProperty('dtend', 
      array(
        'year'  => strftime('%Y', $end), 
        'month' => strftime('%m', $end), 
        'day'   => strftime('%d', $end),
        'hour'  => strftime('%H', $end),
        'min'   => strftime('%M', $end),
        'sec'   => strftime('%S', $end),
      )
    );
    $calendar->setComponent($event);
    iCalUtilityFunctions::createTimezone($calendar, $calendar_config['TZID']);
  endforeach;
endif;

echo $calendar->createCalendar();