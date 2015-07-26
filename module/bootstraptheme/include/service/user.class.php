<?php
class Bootstraptheme_Service_User extends Phpfox_Service 
{
	public function __construct()
	{
		$this->_sTable = Phpfox::getT('user_status');
	}
	public function getStatuses()
	{
		return $this->database()
					->select('us.content,u.full_name')
					->from($this->_sTable,'us')
					->innerJoin(Phpfox::getT('user'), 'u', 'us.user_id = u.user_id')
					->order('us.status_id DESC')
					->limit(3)
					->execute('getRows');
	}
}