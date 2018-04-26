<?php
/** @package    SemedDb::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the AgendaSGP object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package SemedDb::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class AgendaSGPReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `agenda_sgp` table
	public $CustomFieldExample;

	public $Id;
	public $Data;
	public $Horario;
	public $Publico;
	public $Evento;
	public $Equipe;
	public $Local;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`agenda_sgp`.`agenda_id` as Id
			,`agenda_sgp`.`agenda_data` as Data
			,`agenda_sgp`.`agenda_horario` as Horario
			,`agenda_sgp`.`agenda_publico` as Publico
			,`agenda_sgp`.`agenda_evento` as Evento
			,`agenda_sgp`.`agenda_equipe` as Equipe
			,`agenda_sgp`.`agenda_local` as Local
		from `agenda_sgp`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `agenda_sgp`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>