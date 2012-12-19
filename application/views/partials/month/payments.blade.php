<ul>
@foreach ($payments as $payment)
  <li class="media" style="{{ ($payment->paid) ? "opacity:0.3;" : ""}}">
    @if ($payment->paid)
      <span class="label label-success pull-left">Pagato</span>
    @elseif ($payment->expired())
      <span class="label label-important pull-left">Scaduto</span>
    @else
      <span class="label pull-left">Da pagare</span>
    @endif
    <div class="media-body">
      <h4 class="media-heading">Media heading</h4>
      {{ Helper::write_currency($payment->value) }}
      info
    </div>
  </li>
@endforeach
</ul>