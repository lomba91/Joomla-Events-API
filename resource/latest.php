<?php

class EventsApiResourceLatest extends ApiResource {

	public function get() {

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select(array('events.id', 'events.title', 'events.alias', 'cat.title AS catname', 'shortdesc', 'startdate', 'cat.color'))
			->from($db->quoteName('#__icagenda_events', 'events'))
			->join('INNER', $db->quoteName('#__icagenda_category', 'cat') . ' ON (' . $db->quoteName('events.catid') . ' = ' . $db->quoteName('cat.id') . ')')
			->where('startdate > NOW()');

		$db->setQuery($query);
		$events = $db->loadAssocList();
		
		$this->plugin->setResponse($events);
	}
}