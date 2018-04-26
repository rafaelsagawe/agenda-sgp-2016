<?php
	$this->assign('title','agenda | AgendaSGPs');
	$this->assign('nav','agendasgps');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/agendasgps.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> AgendaSGPs
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="agendaSGPCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<!-- <th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th> -->
				<th id="header_Data">Data<% if (page.orderBy == 'Data') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Horario">Horario<% if (page.orderBy == 'Horario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Publico">Publico<% if (page.orderBy == 'Publico') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Evento">Evento<% if (page.orderBy == 'Evento') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Equipe">Equipe<% if (page.orderBy == 'Equipe') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Local">Local<% if (page.orderBy == 'Local') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%if (item.get('data')) { %><%= _date(app.parseDate(item.get('data'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%if (item.get('horario')) { %><%= _date(app.parseDate(item.get('horario'))).format('h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('publico') || '') %></td>
				<td><%= _.escape(item.get('evento') || '') %></td>
				<td><%= _.escape(item.get('equipe') || '') %></td>
				<td><%= _.escape(item.get('local') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="agendaSGPModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dataInputContainer" class="control-group">
					<label class="control-label" for="data">Data</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="data" type="text" value="<%= _date(app.parseDate(item.get('data'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="horarioInputContainer" class="control-group">
					<label class="control-label" for="horario">Horario</label>
					<div class="controls inline-inputs">
						<div class="input-append bootstrap-timepicker-component">
							<input id="horario" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('horario'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="publicoInputContainer" class="control-group">
					<label class="control-label" for="publico">Publico</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="publico" placeholder="Publico" value="<%= _.escape(item.get('publico') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="eventoInputContainer" class="control-group">
					<label class="control-label" for="evento">Evento</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="evento" placeholder="Evento" value="<%= _.escape(item.get('evento') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="equipeInputContainer" class="control-group">
					<label class="control-label" for="equipe">Equipe</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="equipe" placeholder="Equipe" value="<%= _.escape(item.get('equipe') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="localInputContainer" class="control-group">
					<label class="control-label" for="local">Local</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="local" placeholder="Local" value="<%= _.escape(item.get('local') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteAgendaSGPButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteAgendaSGPButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete AgendaSGP</button>
						<span id="confirmDeleteAgendaSGPContainer" class="hide">
							<button id="cancelDeleteAgendaSGPButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteAgendaSGPButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="agendaSGPDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit AgendaSGP
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="agendaSGPModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveAgendaSGPButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="agendaSGPCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newAgendaSGPButton" class="btn btn-primary">Add AgendaSGP</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
