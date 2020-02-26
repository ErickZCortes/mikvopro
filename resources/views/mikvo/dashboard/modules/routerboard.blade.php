<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Routerboar</h1>
<div class="card shadow mb-4">
  <div class="card-body">
    <h5 id="title">Add Routers</h5>
    <form #routerform="ngForm" (ngSubmit)="insertRouter(); routerform.reset()">
      <div class="row">
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="id">Model:</label>
            <input type="number" class="form-control" id="id" [(ngModel)]="routerboard.iduser_router"
              placeholder="Enter the router's model" name="id">
          </div>
        </div>
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" class="form-control" id="model" [(ngModel)]="routerboard.model_router"
              placeholder="Enter the router's model" name="model">
          </div>
        </div>
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" [(ngModel)]="routerboard.router_description"
              placeholder="Enter the router's description" name="description">
          </div>
        </div>
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="ip">IP:</label>
            <input type="text" class="form-control" id="ip" [(ngModel)]="routerboard.ip_router"
              placeholder="Enter the router's IP" name="ip">
          </div>
        </div>
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="user">User:</label>
            <input type="text" class="form-control" id="user" [(ngModel)]="routerboard.user_router"
              placeholder="Enter the router's user" name="user">
          </div>
        </div>
        <div class="col-sm-10 col-md-4 col-lg-4">
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" [(ngModel)]="routerboard.password_router"
              placeholder="Enter the router's password" name="password">
          </div>
        </div>
        <div id="btnform" class="col-sm-10 col-md-4 col-lg-4">
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </form>
  </div>

</div>

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
                </select> entries</label></div>
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
                    aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">Modelo</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Position: activate to sort column ascending" style="width: 246px;">Descripción</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Office: activate to sort column ascending" style="width: 116px;">IP Router</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Age: activate to sort column ascending" style="width: 51px;">Usuario</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Start date: activate to sort column ascending" style="width: 107px;">Contraseña</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    aria-label="Actions: activate to sort column ascending" style="width: 51px;">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr *ngFor="let router of routerboardRepoService.routerboard" role="row" class="odd">
                  <td class="sorting_1">{{router.model_router}}</td>
                  <td>{{router.router_description}}</td>
                  <td>{{router.ip_router}}</td>
                  <td>{{router.user_router}}</td>
                  <td>{{router.password_router}}</td>
                  <td id="btntable">
                    <button class="btn btn-danger btn-sm" (click)="deletRouter(router.id_router)">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
              Showing 1 to 10 of 57 entries
            </div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
              <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                  <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">
                    Previous
                  </a>
                </li>
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
                <li class="paginate_button page-item next" id="dataTable_next">
                  <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>