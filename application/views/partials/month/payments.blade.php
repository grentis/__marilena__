<ul>
  @foreach ($payments as $payment)
    <li class="media {{ ($payment->paid) ? "paid" : ($payment->expired() ? "expired" : "to-be-paid" ) }}">
      @if ($payment->paid)
        <span class="label label-success pull-left">Pagato</span>
      @elseif ($payment->expired())
        <span class="label label-important pull-left">
          @if ($source == 'expired')
            {{ Helper::month_as_string($payment->month) }} {{ $payment->year }}
          @else
            Scaduto
          @endif
        </span>
      @else
        <span class="label pull-left">Da pagare</span>
      @endif
      <div class="media-body">
        <h4 class="media-heading">
          <span class="value">{{ Helper::write_currency($payment->value) }}</span>
          <span class="client"> - {{ $payment->invoice->client->name }}</span>
        </h4>
        <span class="info">
          <span class="invoice">
            rata {{ $payment->get_number()->num }} di {{ $payment->get_number()->tot }} per la fattura {{ $payment->invoice->number }} del {{ strftime('%d/%b/%Y', strtotime($payment->invoice->date)) }}
          </span>
          <span class="note">{{ $payment->note }}</span>
        </span>
      </div>
    </li>
  @endforeach
  </ul>