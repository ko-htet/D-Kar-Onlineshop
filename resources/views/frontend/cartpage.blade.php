@extends('frontendtemplate')
@section('title', 'Cart_Page')
@section('content')
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody id="atctable">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <form action="" method="POST" class="checkoutform">
                            <div class="cart-summary">
                                <h5>Cart Total</h5>
                                <ul class="summary-table">
                                    <li><span>subtotal:</span> <span class="totalamount"></span></li>
                                    <li><textarea class="form-control notes" placeholder="Any Request..." required></textarea></li>
                                </ul>
                                <div class="cart-btn mt-5">
                                @role('customer')
                                    <button class="btn amado-btn w-100" type="submit">Check Out</button>
                                @else
                                    <button class="btn amado-btn w-100">Sign in to Check Out</button>
                                @endrole
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    
    <script>
        $.ajaxSetup({
            headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            $('.checkoutform').submit(function(e){
                let notes = $('.notes').val();
                if(notes === ""){
                    return true;
                }else{
                    let order = localStorage.getItem('atcItems');
                    $.post("{{route('order.store')}}", {order:order, notes:notes}, function(response){
                        swal("Successfully Order!", "You clicked the button!", "success");
                        localStorage.clear();
                        location.href="/";
                    })
                }
                e.preventDefault();
            })
        });
    </script>
@endsection