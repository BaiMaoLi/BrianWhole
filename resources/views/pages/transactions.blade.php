@extends('layouts.app')

@section('headerpart')
   <title>Remitty | Transactions</title>
@endsection

@section('content')
    <div class="right_col container" role="main">
        <div class="spacer_20 "></div>
        <div class="clearfix"></div>
        <div class="row nav nav-tabs jgjtransaction" >
                <div class=" col-md-2"></div>
                <div class="col-md-12 col-xs-12 jgjcoldiv ">
                    <table class="table jgjtranstable">
                        <thead class="thead-dark">
                            <tr>
                                <th class="jgjth"> Sender</th>
                                <th class="jgjth"> Receiver </th>
                                <th class="jgjth"> Currency </th>
                                <th class="jgjth"> Amount</th>
                                <th class="jgjth"> Date </th>
                                <th class="jgjth"> Status </th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($transactions as $transaction)
                              <tr class="table-tr" data-url="{{ url('transactions/'.$transaction->id) }}">
                                  <td> {{$transaction->ulastname}} </td>
                                  <td> {{$transaction->rlastname}} </td>
                                  <td> {{$transaction->currency}} </td>
                                  <td> {{$transaction->amount}} </td>
                                  <td> {{$transaction->time}} </td>
                                  <td> {{$transaction->status}} </td>
                              </tr>
                             @endforeach
                       </tbody>
                    </table>
                </div>
                <div class=" col-md-2"></div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
         $('table.table').on("click", "tr.table-tr", function() {
           window.location = $(this).data("url");
           //alert($(this).data("url"));
         });
       });
    </script>
@endsection
