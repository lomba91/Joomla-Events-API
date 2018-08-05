<?php

class EventsApiResourceCategory extends ApiResource {

	public function get() {

		$app = JFactory::getApplication();
		$category = $app->input->get('id', "null", 'STRING');

        if($category == "null")
            ApiError::raiseError(10001, "Invalid Category", 'APIValidationException');
        
        else {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);

            $query->select(array('events.id', 'events.title', 'events.alias', 'cat.title AS catname', 'shortdesc', 'startdate', 'cat.color'))
                ->from($db->quoteName('#__icagenda_events', 'events'))
                ->join('INNER', $db->quoteName('#__icagenda_category', 'cat') . ' ON (' . $db->quoteName('events.catid') . ' = ' . $db->quoteName('cat.id') . ')')
                ->where('cat.title =\'' . $category . '\'');

            $db->setQuery($query);
            $events = $db->loadAssocList();
            
            $this->plugin->setResponse($events);
        }
	}
}