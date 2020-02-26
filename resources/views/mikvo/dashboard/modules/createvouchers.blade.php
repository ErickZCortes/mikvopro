<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Vouchers</h1>
<div class="card shadow mb-4">
  <div class="card-body">
    <h5 id="title">Create New Vouchers</h5>
    <form action="">
      <div class="row">
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="dns">DNS name:</label>
            <input type="text" class="form-control" id="dns" placeholder="Enter DNS name" name="dns"
             >
          </div>
        </div>
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="numusers">Number of users:</label>
            <input type="number" class="form-control" id="numusers" placeholder="Enter Number of users" name="numusers"
              >
          </div>
        </div>
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="server">Server:</label>
            <input type="text" class="form-control" id="server" placeholder="Enter Serve's name " name="server"
             >
          </div>
        </div>
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="prefix">Prefix:</label>
            <input type="text" class="form-control" id="prefix" placeholder="Enter Prefix" name="prefix"
            >
          </div>
        </div>
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="profile">Profile vouchers:</label>
            <select class="form-control" id="profile" name="profile" >
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select>
          </div>
        </div>
        <div id="btnform" class="col-sm-10 col-md-4 col-lg-4">
          <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Generar</button>
        </div>

      </div>
    </form>
  </div>

</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Vouchers' table</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <div class="dataTables_length" id="dataTable_length">
              <label>Show entries
                <select name="dataTable_length" aria-controls="dataTable"
                  class="custom-select custom-select-sm form-control form-control-sm">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select></label>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div id="dataTable_filter" class="dataTables_filter">
              <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
              </label>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div>
              <button class="btn btn-info btn-sm">
                <i class="fas fa-file-csv"></i> CSV
              </button>
              <button class="btn btn-info btn-sm">
                <i class="fas fa-file-excel"></i> Excel
              </button>
              <button class="btn btn-info btn-sm">
                <i class="fas fa-print"></i> Imprimir
              </button>
              
            </div>
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
                    Name</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Position: activate to sort column ascending" style="width: 246px;">Position</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Office: activate to sort column ascending" style="width: 116px;">Office</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Age: activate to sort column ascending" style="width: 51px;">Age</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Start date: activate to sort column ascending" style="width: 107px;">Start date</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Salary: activate to sort column ascending" style="width: 97px;">Salary</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th rowspan="1" colspan="1">Name</th>
                  <th rowspan="1" colspan="1">Position</th>
                  <th rowspan="1" colspan="1">Office</th>
                  <th rowspan="1" colspan="1">Age</th>
                  <th rowspan="1" colspan="1">Start date</th>
                  <th rowspan="1" colspan="1">Salary</th>
                </tr>
              </tfoot>
              <tbody>
                <tr role="row" class="odd">
                  <td class="sorting_1">Airi Satou</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>33</td>
                  <td>2008/11/28</td>
                  <td>$162,700</td>
                </tr>
                <tr role="row" class="even">
                  <td class="sorting_1">Angelica Ramos</td>
                  <td>Chief Executive Officer (CEO)</td>
                  <td>London</td>
                  <td>47</td>
                  <td>2009/10/09</td>
                  <td>$1,200,000</td>
                </tr>
                <tr role="row" class="odd">
                  <td class="sorting_1">Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                  <td>66</td>
                  <td>2009/01/12</td>
                  <td>$86,000</td>
                </tr>
                <tr role="row" class="even">
                  <td class="sorting_1">Bradley Greer</td>
                  <td>Software Engineer</td>
                  <td>London</td>
                  <td>41</td>
                  <td>2012/10/13</td>
                  <td>$132,000</td>
                </tr>
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
                <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#"
                    aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1"
                    tabindex="0" class="page-link">1</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2"
                    tabindex="0" class="page-link">2</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3"
                    tabindex="0" class="page-link">3</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4"
                    tabindex="0" class="page-link">4</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5"
                    tabindex="0" class="page-link">5</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6"
                    tabindex="0" class="page-link">6</a></li>
                <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable"
                    data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>