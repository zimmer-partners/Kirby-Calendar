<?php

if (kirby()->request()->scheme() === 'webcal' || kirby()->request()->query()->ics()) {
  snippet('calendar-ics', array('page' => $page));
} else {
  snippet('calendar-html', array('page' => $page));
}
