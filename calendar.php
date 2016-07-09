<?php 

// =======================
// = Component Registery =
// =======================

$kirby->set('template', 'calendar', __DIR__ . '/templates/calendar.php');
$kirby->set('template', 'event', __DIR__ . '/templates/event.php');
$kirby->set('blueprint', 'calendar', __DIR__ . '/blueprints/calendar.php');
$kirby->set('blueprint', 'event', __DIR__ . '/blueprints/event.php');
$kirby->set('snippet', 'calendar-html', __DIR__ . '/snippets/calendar-html.php');
$kirby->set('snippet', 'calendar-ics', __DIR__ . '/snippets/calendar-ics.php');
$kirby->set('snippet', 'events', __DIR__ . '/snippets/events.php');
$kirby->set('snippet', 'event-teaser', __DIR__ . '/snippets/event-teaser.php');
$kirby->set('snippet', 'timezones', __DIR__ . '/snippets/timezones.php');
$kirby->set('route', array(
    'pattern' => 'calendar/timezones',
    'action' => function () {
      return new Response(snippet('timezones', array(), true));
    }
));

// ==========================
// = Load Library Compoents =
// ==========================

require_once(__DIR__ . '/lib/iCalcreator/iCalcreator.php');

// ===================
// = Model Registery =
// ===================

require_once(__DIR__ . '/models/CalendarPage.php');
$kirby->set('page::model', 'calendar', 'CalendarPage');
require_once(__DIR__ . '/models/EventPage.php');
$kirby->set('page::model', 'event', 'EventPage');
