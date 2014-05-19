<?php
/**
 * @package    Diafan.CMS (MainSMS)
 *
 * @author     Evgeny Popov
 * @version    1.0
 
 */
 
 // Подключение класса
require_once 'mainsms.class.inc' ;

if (! defined('DIAFAN'))
{
	include dirname(dirname(dirname(__FILE__))).'/includes/404.php';
}

/**
 * SMS
 * Набор функций для отправки SMS
 */
class SMS
{
	/**
	 * Отправляет SMS
	 * @param string $text текст SMS
	 * @param string $to номер получателя
	 * @return void
	 */
	public static function send($text, $to)
	{
		if(! SMS)
		{
			return;
		}
		
		/*
			Допущения: 
				SMS_KEY				$project - название проекта, берется со страницы http://mainsms.ru/office/api_account
				SMS_ID				$key - ключ проекта, берется со страницы http://mainsms.ru/office/api_accountProject
				SMS_Signature			$sender - имя отправителя, должно быть предварительно зарегистрированым на сайте mainsms
		*/
		$project = urlencode(SMS_KEY);
		$key = urlencode(SMS_ID);
		
		$api = new MainSMS($project, $key, false, false);
		$api->sendSMS($to, $text, urlencode(SMS_SIGNATURE));
		return $api->getResponse();
	}

}