<ul>
@foreach ($payments as $payment)
  <li>
    {{ Helper::write_currency($payment->value) }}
    <input type="checkbox" {{ $payment->paid ? "checked" : "" }} disabled />
    {{ $payment->invoice->client->name }}
  </li>
@endforeach
</ul>