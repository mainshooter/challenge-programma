<?php

  function eventToAgendaItems($aEvents) {
    $aResult = [];
    foreach ($aEvents as $oEvent) {
      $aResult[] = [
        'title' => $oEvent->name,
        'start' => str_replace(' ', 'T', $oEvent->event_start_date_time),
        'end' => str_replace(' ', 'T', $oEvent->event_end_date_time),
      ];
    }
    return $aResult;
  }

?>
