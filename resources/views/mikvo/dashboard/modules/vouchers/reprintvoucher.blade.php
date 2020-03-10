@extends('mikvo.dashboard.layouts.default')
    @section('header')
        @include('mikvo.dashboard.shared.components.header')
        
    @endsection
    
    @section('sidebar')
        @include('mikvo.dashboard.shared.components.sidebar')
    @endsection
    
    @section('footer')
        @include('mikvo.dashboard.shared.components.footer')
    @endsection
    
    @section('css')
      <header>
        <link rel="stylesheet"type="text/css" href="{{URL::asset('css/reprintvoucher.css')}}">
        <link rel="stylesheet"type="text/css" href="{{URL::asset('css/app.css')}}">
      </header>
    @endsection
    
    @section('content')
        
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Reprint</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive table-hover">
      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length"
                  aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select> entries</label>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                  class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
              aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">
                    DNS</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Position: activate to sort column ascending" style="width: 115px;">Número de usuarios</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Office: activate to sort column ascending" style="width: 115px;">Servidor</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Age: activate to sort column ascending" style="width: 115px;">Prefijo</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Start date: activate to sort column ascending" style="width: 115px;">Perfil</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Salary: activate to sort column ascending" style="width: 115px;">Fecha</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Actions: activate to sort column ascending" style="width: 115px;">Accones</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($vouchers as $voucher)
                <tr role="row" class="even">
                  <td class="sorting_1">{{$voucher->dnsname_voucher}}</td>
                  <td>{{$voucher->nusers_voucher}}</td>
                  <td>{{$voucher->server_voucher}}</td>
                  <td>{{$voucher->prefix_voucher}}</td>
                  <td>{{$voucher->nprofile_voucher}}</td>
                  <td>{{$voucher->created_at}}</td>
                  <td id="btntable">
                        <form action="{{route('/dashboard/vouchers/delete',$voucher->id)}}" method="POST" role="form" onsubmit="return confirmdelete()">
                          <input type="hidden" name="_method" value="PUT">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="{{ route('/dashboard/vouchers/reprintvoucher',$voucher->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-repeat"></i>
                          </a>
                          <button class="btn btn-danger btn-sm" name="deletevoucher" type="submit">
                          <i class="fa fa-trash-o"></i>
                          </button>
                        </form>
                      </td>
                </tr>
                <div id="confirm" class="modal hide fade">
                  <div class="modal-body">
                    Are you sure?
                  </div>
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                  </div>
                </div>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57
              entries</div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
              <ul class="pagination">
                {{$vouchers->links()}}
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
   $('button[name="deletevoucher"]').on('click', function(e) {
  var $form = $(this).closest('form');
  e.preventDefault();
  $('#confirm').modal({
      backdrop: 'static',
      keyboard: false
  })
  .on('click', '#delete', function(e) {
      $form.trigger('submit');
    });
});
    </script>
  @endsection