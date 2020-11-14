@extends('backendtemplate')
@section('title', 'Item')
@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col">
        <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Order Detail</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Order Date: {{ $order->orderdate}}</h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-6">
                  <p>Customer Name: <strong>{{ $order->user->name }}</strong></p>
                </div>
                <div class="col-6 text-right">Order no: <strong>{{ $order->orderno }}</strong></div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1; $total=0; @endphp
                      @foreach($order->items as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price) }} MMK</td>
                        <td>{{ $item->pivot->quantity }}</td>
                        <td>{{ number_format($item->price * $item->pivot->quantity) }} MMK</td>
                      </tr>
                      @php $total += $item->price * $item->pivot->quantity; @endphp
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="3"></td>
                        <td><h5>Total:</h5></td>
                        <td><h5>{{ number_format($total) }} MMK</h5></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>

              
              <div class="d-flex flex-row-reverse mt-2">
                <div class="m-1">
                  <a href="{{ route('order.index') }}" class="btn btn-secondary">Back</a>
                </div>
                <div class="m-1">
                @if($order->status == 0)
                  <form action="{{ route('order.cancel', $order->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Cancel</button>
                  </form>
                </div>
                <div class="m-1">
                  <form action="{{ route('order.confirm', $order->id) }}" method="POST">
                  @csrf
                    <button class="btn btn-success" type="submit">Confirm</button>    
                  </form>
                </div>
              </div>
                @elseif($order->status == 1)
                <div class="row mt-2">
                  <div class="col-12 text-right">
                    <div class="text-center"><span class="text-success"><b>[--- Successful Order! ---]</b></span></div><a href="{{ route('order.index') }}" class="btn btn-secondary">Back</a>
                  </div>
                </div>
              @elseif($order->status == 2)
                <div class="row mt-2">
                  <div class="col-12 text-right">
                    <div class="text-center"><span class="text-danger"><b>[--- Cancel Order! ---]</b></span></div><a href="{{ route('order.index') }}" class="btn btn-secondary">Back</a>
                  </div>
                </div>
              @endif
            </section>
        </div>
      </div>
    </div>
  </main>
@endsectionspan