<?php
/** @package    agenda::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/AgendaSGP.php");

/**
 * AgendaSGPController is the controller class for the AgendaSGP object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package agenda::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class AgendaSGPController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of AgendaSGP objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for AgendaSGP records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new AgendaSGPCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Data,Horario,Publico,Evento,Equipe,Local'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$agendasgps = $this->Phreezer->Query('AgendaSGP',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $agendasgps->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $agendasgps->TotalResults;
				$output->totalPages = $agendasgps->TotalPages;
				$output->pageSize = $agendasgps->PageSize;
				$output->currentPage = $agendasgps->CurrentPage;
			}
			else
			{
				// return all results
				$agendasgps = $this->Phreezer->Query('AgendaSGP',$criteria);
				$output->rows = $agendasgps->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single AgendaSGP record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$agendasgp = $this->Phreezer->Get('AgendaSGP',$pk);
			$this->RenderJSON($agendasgp, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new AgendaSGP record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$agendasgp = new AgendaSGP($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $agendasgp->Id = $this->SafeGetVal($json, 'id');

			$agendasgp->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data')));
			$agendasgp->Horario = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'horario')));
			$agendasgp->Publico = $this->SafeGetVal($json, 'publico');
			$agendasgp->Evento = $this->SafeGetVal($json, 'evento');
			$agendasgp->Equipe = $this->SafeGetVal($json, 'equipe');
			$agendasgp->Local = $this->SafeGetVal($json, 'local');

			$agendasgp->Validate();
			$errors = $agendasgp->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$agendasgp->Save();
				$this->RenderJSON($agendasgp, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing AgendaSGP record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('id');
			$agendasgp = $this->Phreezer->Get('AgendaSGP',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $agendasgp->Id = $this->SafeGetVal($json, 'id', $agendasgp->Id);

			$agendasgp->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data', $agendasgp->Data)));
			$agendasgp->Horario = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'horario', $agendasgp->Horario)));
			$agendasgp->Publico = $this->SafeGetVal($json, 'publico', $agendasgp->Publico);
			$agendasgp->Evento = $this->SafeGetVal($json, 'evento', $agendasgp->Evento);
			$agendasgp->Equipe = $this->SafeGetVal($json, 'equipe', $agendasgp->Equipe);
			$agendasgp->Local = $this->SafeGetVal($json, 'local', $agendasgp->Local);

			$agendasgp->Validate();
			$errors = $agendasgp->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$agendasgp->Save();
				$this->RenderJSON($agendasgp, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing AgendaSGP record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$agendasgp = $this->Phreezer->Get('AgendaSGP',$pk);

			$agendasgp->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
