<?php if(!defined('KIRBY')) exit ?>

title: Calendar
pages: 
  template: 
    - event
files: true
icon: calendar
fields:
  title:
    label: Title
    type:  text
  date:
    label: Date
    type: date
    help: Publication date of the calendar stream.
  text:
    label: Text
    type: textarea
    help: Description of the calendar stream.
  timezone:
    label: Timezone
    type: text
    required: true
    help: >
      Enter a valid <a href="/calendar/timezones" title="Calendar Timezones" target="timezones">DateTimeZone ID</a>.
