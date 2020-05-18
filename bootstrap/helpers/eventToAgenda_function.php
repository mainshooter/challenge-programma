<?php

  function eventToAgendaItems($aEvents) {
    $aResult = [];
    foreach ($aEvents as $oEvent) {
      $aResult[] = [
        'id' => $oEvent->id,
        'title' => $oEvent->name,
        'start' => str_replace(' ', 'T', date('Y-m-d H:i:s', strtotime($oEvent->event_start_date_time))),
        'end' => str_replace(' ', 'T', date('Y-m-d H:i:s', strtotime($oEvent->event_end_date_time))),
      ];
    }
    return $aResult;
  }

  function eventToAgendaItem($oEvent) {
    $oReturningEvent = [
      'id' => $oEvent->id,
      'title' => $oEvent->name,
      'start' => str_replace(' ', 'T', date('Y-m-d H:i:s', strtotime($oEvent->event_start_date_time))),
      'end' => str_replace(' ', 'T', date('Y-m-d H:i:s', strtotime($oEvent->event_end_date_time))),
    ];
    return $oReturningEvent;
  }

?>
