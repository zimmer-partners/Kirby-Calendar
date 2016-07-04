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
    $my_events = $this->content()->get($field_name);
    $all_events = ($own && $my_events->isNotEmpty()) ? $my_events->yaml() : array();
    // Unite data with allied pages in config
    foreach ($allies as $ally_name => $integrate) {
      if ($integrate) {
        foreach ($this->$ally_name() as $key => $page) {
          $page_events = $page->content()->get($field_name);
          if ($page_events->isNotEmpty()) {
            $debug = $page_events->yaml();
            $all_events = array_merge($all_events, $page_events->yaml());
          }
        }
      }
    }
    // Summarize date and time data
    array_walk($all_events, array($this, 'summarizeDates'));
    return structure($all_events, $this, 'events');
  }
  
  protected function summarizeDates(&$event, $key) {
    $event['begin_timestamp'] = $this::getTimestamp($event['begin_date'], $event['begin_time']);
    $event['end_timestamp'] = $this::getTimestamp($event['end_date'], $event['end_time']);
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
  
}
