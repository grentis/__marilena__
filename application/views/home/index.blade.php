<div class="expired">
	<table class="table alert-error">
		<thead>
			<tr>
				<th>Scadenza</th>
				<th>Cliente</th>
				<th>Fattura</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>links</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="expiring">
	<table class="table alert">
		<thead>
			<th>Scadenza</th>
			<th>Cliente</th>
			<th>Fattura</th>
			<th></th>
		</thead>
		<tbody>
			<td></td>
			<td></td>
			<td></td>
			<td>links</td>
		</tbody>
	</table>
</div>

<div class="timeline row" id="timeline">
	<div class="span9">
		<div class="row t-month" data-index="0">
      <div class="span2 offset1 date">
      	<span class="year">2012</span>
      	<span class="month">Dicembre</span>
      </div>
      <div class="span6 payments">
      	@render('partials.month.payments', array('payments' => Payment::get_by_index(0)))
      </div>
      <i></i>
    </div>
    <div class="row t-month" data-index="1">
      <div class="span2 offset1 date"><span class="year">2013</span><span class="month">Gennaio</span></div>
      <div class="span6 payments">
      	@render('partials.month.payments', array('payments' => Payment::get_by_index(1)))
      </div>
    </div>
	</div>
</div>