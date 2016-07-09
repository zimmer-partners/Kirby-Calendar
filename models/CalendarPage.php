<?php 
  
/**
* Basic Calendar page model
*/

class CalendarPage extends Page {
  
  public function events($own = true, $allies = array(), $field_name = 'events') {
    // Defaults
    $default_allies= array(
      'children' => false,
      'siblings' => false,
    );
    $allies = array_merge($default_allies, $allies);
    // Map standard Kirby field of this page
    $all_events = array();
    if ($own) {
      $my_events = $this->content()->get($field_name);
      if ($my_events->isNotEmpty()) {
        $my_events = $my_events->yaml();
        array_walk($my_events, array($this, 'summarizeDates'), $this);
        $all_events = array_merge($all_events, $my_events);
      }
    }
    // Unite data with allied pages in config
    foreach ($allies as $ally_name => $integrate) {
      if ($integrate) {
        foreach ($this->$ally_name()->visible() as $key => $page) {
          $page_events = $page->content()->get($field_name);
          if ($page_events->isNotEmpty()) {
            $page_events = $page_events->yaml();
            array_walk($page_events, array($this, 'summarizeDates'), $page);
            $all_events = array_merge($all_events, $page_events);
          }
        }
      }
    }
    // Summarize date and time data
    return structure($all_events, $this, 'events');
  }
  
  protected function summarizeDates(&$event, $key, $page) {
    $event['begin_timestamp'] = $this::getTimestamp($event['begin_date'], $event['begin_time']);
    $event['end_timestamp'] = $this::getTimestamp($event['end_date'], $event['end_time']);
    $event['begin_date_time'] = '<time datetime="' . strftime('%Y-%m-%dT%H:%M:%S', $event['begin_timestamp']) .'">' . strftime('%d.%m.%y', $event['begin_timestamp']) . '</time>';
    $event['end_date_time'] = '<time datetime="' . strftime('%Y-%m-%dT%H:%M:%S', $event['end_timestamp']) .'">' . strftime('%d.%m.%y', $event['end_timestamp']) . '</time>';
    $event['url'] = $page->url();
    $event['uid'] = $page->hash() . '-' . base_convert(sprintf('%u', crc32($key)), 10, 36);
  }
  
  /**
   * @param string $date the date, e.g. '01.01.1970'
   * @param string $time optional time, e.g. '10:00:00'
   * @return The date as a UNIX timestamp or <code>false</code> if there
   * was no $date given.
   */
  private static function getTimestamp($date, $time = '') {
    return ($date) ? strtotime($date . ' ' . $time) : false;
  }
  
  public function webcal_url() {
    return url::build(array('scheme' => 'webcal'), $this->url());
  }
  
}
