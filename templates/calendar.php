<?php

if (kirby()->request()->scheme() === 'webcal') {
  snippet('calendar-ics', array('page' => $page));
} else {
  snippet('calendar-html', array('page' => $page));
}
