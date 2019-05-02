  
@extends('admin.Layout.pagetemplate')
@section('head')
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/editor/select2.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/editor/datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/editor/bootstrap-editable.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/editor/x-editor-style.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/data-table/bootstrap-editable.css')}}">
    <style>

    </style>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="{{asset('admin/img/logo/logo.png')}}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.Layout.header')
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Projects <span class="table-project-n">Data</span> Table</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                    <tr>  
                                        <th data-field="id">No</th>
                                        <th data-field="Ph_id" data-editable="">User</th>
                                        <th data-field="User_id" data-editable="">Balance</th>
                                        <th data-field="Amount" data-editable="">Amount</th>
                                        <th data-field="Date" data-editable="">Date</th>
                                        <th data-field="Getway" data-editable="">Getway</th>
                                        <th data-field="Action" data-editable="" style="width: 150px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                          
                                    @for($i=0;$i<count($data);$i++)
                                        @if($data[$i]->remark=='non process')
                                        <tr> 
                                            <td>{{$i+1}}</td>
                                            <td>{{$data[$i]->email}}</td>
                                            <td> {{$data[$i]->before}} </td>
                                            <td>{{$data[$i]->amount}}</td>
                                            <td>{{$data[$i]->date}} </td>
                                            <td>{{$data[$i]->getway}} </td>
                                            <td ><div style="display:flex; justify-content : space-around;">
                                            <a classs="btn btn-primary" style = "cursor: pointer;
                                                    color: #ffffff;
                                                    background-color: #93c54b;
                                                    font-size: 12px;
                                                    padding: 4px 12px;
                                                    width: 70px;
                                                    text-align : center;
                                                    border-radius: 3px;" data-toggle="modal" data-target="#cModal" onclick="select_accept_offer({{$data[$i]->id}},{{$data[$i]->user_id}},{{$data[$i]->before}})">Approve</a>

                                            <a classs="btn btn-danger" style = "cursor: pointer;
                                                    color: #ffffff;
                                                    background-color: #a94442;
                                                    font-size: 12px;
                                                    padding: 4px 12px;
                                                    width: 70px;
                                                    text-align : center;
                                                    border-radius: 3px; float:right;"
                                                     data-toggle="modal" data-target="#rModal" onclick="select_refuse_offer({{$data[$i]->id}},{{$data[$i]->user_id}},{{$data[$i]->amount}})">Reject</a>
                                                    </div>
                                                    </td>
                                        </tr>
                                            @endif
                                         @endfor
                                    </tbody>
                                </table>

                                @if(isset($error))
                                <div class="alert alert-danger">
                                 <strong>Sorry!</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$error}}
                                </div>
                                @endif
                                <div class="modal fade" id="cModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Confrim !</h4>
                                        </div>
                                        <div class="modal-body">
                                        <p>Really? Do you want to accept this offer?</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" style="width: 70px;" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" style = "width : 70px;" onclick="accept_offer()">OK</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="rModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Confrim !</h4>
                                        </div>
                                        <div class="modal-body">
                                        <p>Really? Do you want to Refuse this offer?</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" style="width: 70px;" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-warning" style="width: 70px;" onclick="accept_offer()">OK</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <form class="fade" action="/invoices/accept_offer" id="accept_submit_form" method="post">
                                    @csrf
                                    <input type="hidden" value="" id="offer_id" name="offer">
                                    <input type="hidden" value="" id="offer_type" name="type">
                                    <input type="hidden" value="" id="offer_user" name="user_id">
                                    <input type="hidden" value="" id="offer_amount" name="amount">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->
    @include('admin.Layout.footer')
@stop
@section('script')
    <!-- data table JS
		============================================ -->
    <script src="{{asset('admin/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{asset('admin/js/data-table/tableExport.js')}}"></script>
    <script src="{{asset('admin/js/data-table/data-table-active.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{asset('admin/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-table-export.js')}}"></script>
    <!--  editable JS
		============================================ -->
    <script src="{{asset('admin/js/editable/jquery.mockjax.js')}}"></script>
    <script src="{{asset('admin/js/editable/mock-active.js')}}"></script>
    <script src="{{asset('admin/js/editable/select2.js')}}"></script>
    <script src="{{asset('admin/js/editable/moment.min.js')}}"></script>
    <script src="{{asset('admin/js/editable/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('admin/js/editable/bootstrap-editable.js')}}"></script>
    <script src="{{asset('admin/js/editable/xediable-active.js')}}"></script>
    <!-- Chart JS
		============================================ -->
    <script src="{{asset('admin/js/chart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('admin/js/peity/peity-active.js')}}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{asset('admin/js/tab.js')}}"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            console.log('ready');
            $('#all_player').addClass('active1');
            $('#player').addClass('active');
            $('#player .has-arrow').attr('aria-expanded','true');
            $('#player ul').addClass('show');
            $('.breadcome-menu').html('');
            $('.breadcome-menu').append('' +
                '<li>' +
                '<a href="">Home</a>' +
                '<span class="bread-slash">/</span>' +
                '</li>' +
                '<li>' +
                '<span class="bread-blod">All Play</span>\n' +
                '</li>');
        });
        function accept_offer(){
            console.log('accept offer!'+$('#offer_id').val());
            var amount = $('#offer_amount').val();
            var type = "USD";

            $.post('/payout' , {"amount" : amount , "type" : type} , function (response) {
                alert(response);
            } );
            //$('#accept_submit_form').submit();
        }

        function select_accept_offer(_id, user_id, amount){
            $('#offer_id').val(_id);
            $("#offer_user").val(user_id);
            $('#offer_amount').val(amount);
            $('#offer_type').val('approve');
        }
        
        function select_refuse_offer(_id){
            $('#offer_id').val(_id);
            $('#offer_type').val('reject');
        }

    </script>
@stop

 
 