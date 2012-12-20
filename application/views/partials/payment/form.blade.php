<form class="form-horizontal" action="payment/create" method="post" data-remote="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Nuova rata</h3>
  </div>
  <div class="modal-body">
    @if ($payment->errors)
      @foreach ($payment->errors->all() as $error)
        {{ $error }}
      @endforeach
    @endif
    <div class="control-group">
      <label class="control-label" for="invoice[client_id]">Cliente</label>
      <div class="controls">
        <select name="invoice[client_id]" id="invoice[client_id]">
          <option></option>
          <option value="1">Stefano</option>
          <option value="-1">Nuovo cliente</option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="payment[invoice_id]">Fattura</label>
      <div class="controls">
        <select name="payment[invoice_id]" id="payment[invoice_id]">
          <option></option>
          <option value="1">1</option>
          <option value="-1">Nuova fattura</option>
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="payment[value]">Rata</label>
      <div class="controls form-inline">
        <select name="payment[month]" id="payment[month]">
          <option value="1" {{ $payment->month == 1 ? "selected" : "" }}>Gennaio</option>
          <option value="2" {{ $payment->month == 2 ? "selected" : "" }}>Febbraio</option>
          <option value="3" {{ $payment->month == 3 ? "selected" : "" }}>Marzo</option>
          <option value="4" {{ $payment->month == 4 ? "selected" : "" }}>Aprile</option>
          <option value="5" {{ $payment->month == 5 ? "selected" : "" }}>Maggio</option>
          <option value="6" {{ $payment->month == 6 ? "selected" : "" }}>Giugno</option>
          <option value="7" {{ $payment->month == 7 ? "selected" : "" }}>Luglio</option>
          <option value="8" {{ $payment->month == 8 ? "selected" : "" }}>Agosto</option>
          <option value="9" {{ $payment->month == 9 ? "selected" : "" }}>Settembre</option>
          <option value="10" {{ $payment->month == 10 ? "selected" : "" }}>Ottobre</option>
          <option value="11" {{ $payment->month == 11 ? "selected" : "" }}>Novembre</option>
          <option value="12" {{ $payment->month == 12 ? "selected" : "" }}>Dicembre</option>
        </select>
        <input type="text" id="payment[year]" name="payment[year]" value="{{ $payment->year }}" style="width:50px">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="payment[value]">Importo</label>
      <div class="controls">
        <div class="input-append">
          <input type="text" id="payment[value]" name="payment[value]" placeholder="Importo">
          <span class="add-on">&euro;</span>
        </div>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="payment[paid]">Pagato</label>
      <div class="controls">
        <input type="checkbox" id="payment[paid]" name="payment[paid]" value="1">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="payment[note]">Note</label>
      <div class="controls">
        <textarea id="payment[note]" name="payment[note]"></textarea>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save changes</button>
    <button class="btn" data-dismiss="modal">Close</button>
  </div>
</form>