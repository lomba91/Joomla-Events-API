<?php

class EventsApiResourceCategorylist extends ApiResource {

	public function get() {

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select(array('*'))
            ->from($db->quoteName('#__icagenda_category', 'cat'));

        $db->setQuery($query);
        $events = $db->loadAssocList();
        
        $this->plugin->setResponse($events);
	}
}