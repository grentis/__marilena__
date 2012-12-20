<div class="well" id="expired">
	@render('partials.month.payments', array('payments' => $all_expired, 'source' => 'expired'))
</div>

<div class="row" id="timeline">
	<div class="span9">
		@foreach (array(-1,0,1,2,3,4) as $index)
			<div class="row t-month" data-index="{{ $index }}">
				<a href="#" class="new_payment">Aggiungi rata</a>
	      <div class="span2 offset1 date">
	      	<?php 
	      		$date = Helper::get_date_by_index($index);
	      	?>
	      	<span class="year">{{ date('Y', $date) }}</span>
	      	<span class="month">{{ Helper::month_as_string(date('m', $date)) }}</span>
	      </div>
	      <div class="span6 payments">
	      	@render('partials.month.payments', array('payments' => Payment::get_by_index($index), 'source' => 'timeline'))
	      </div>
	      <i></i>
	    </div>	
		@endforeach
	</div>
</div>