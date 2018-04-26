<?php
/** @package    SemedDb::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * AgendaSGPMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the AgendaSGPDAO to the agenda_sgp datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package SemedDb::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class AgendaSGPMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Id"] = new FieldMap("Id","agenda_sgp","agenda_id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Data"] = new FieldMap("Data","agenda_sgp","agenda_data",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Horario"] = new FieldMap("Horario","agenda_sgp","agenda_horario",false,FM_TYPE_TIME,null,null,false);
			self::$FM["Publico"] = new FieldMap("Publico","agenda_sgp","agenda_publico",false,FM_TYPE_VARCHAR,200,null,false);
			self::$FM["Evento"] = new FieldMap("Evento","agenda_sgp","agenda_evento",false,FM_TYPE_VARCHAR,200,null,false);
			self::$FM["Equipe"] = new FieldMap("Equipe","agenda_sgp","agenda_equipe",false,FM_TYPE_VARCHAR,99,null,false);
			self::$FM["Local"] = new FieldMap("Local","agenda_sgp","agenda_local",false,FM_TYPE_VARCHAR,200,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>