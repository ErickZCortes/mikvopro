<h1 class="h3 mb-2 text-gray-800">Perfiles</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="text-center card shadow mb-4">
                <div class="card-body">
                    <h5 id="title">Selecciona un perfil</h5>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td colspan="2">Larry the Bird</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td colspan="2">Larry the Bird</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td colspan="2">Larry the Bird</td>
                            </tr>
                        </tbody>
                    </table>
                    <nav aria-label="...">
                        <ul class="pagination pagination justify-content-center">
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">1<span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="col">
                        <form>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Name">Nombre</label>
                                    <input type="text" id="Name" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="direccion">Dirección Pool</label>
                                    <select class="form-control"  >
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="UpSpeed">Velocidad de Subida</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="number"   class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" id="upspeed">
                                        <option>Kb</option>
                                        <option>Mb</option>
                                        <option>Gb</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <label for="DownSpeed">Velocidad de Descarga</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="number" id="DownSpeed" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" >
                                        <option>Kb</option>
                                        <option>Mb</option>
                                        <option>Gb</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Cost">Costo</label>
                                    <input type="number" id="Cost" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="typetime">Tipo de tiempo</label>
                                    <select class="form-control" id="typetime">
                                        <option>1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Limit">Límite de tiempo</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="number" id="Limit" class="form-control">
                                </div>
                                <div class="form-group col-md-1">
                                    <small>Dias</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="time"  class="form-control">
                                </div>
                                <div class="form-group col-md-2">
                                    <small>Horas</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Duration">Voucher expiración</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="number" id="Duration" class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <small>dias</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="time" id="" class="form-control">

                                </div>
                                <div class="col-md-2">
                                    <small>horas</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="disconnect">Desconectar en:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="time" id="disconnect" class="form-control">
                                </div>
                                <div class="form-group col-md-8">
                                    <button type="button" style="margin-right: 5px;" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Nuevo</button>
                                    <button type="button" style="margin-right: 5px;" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Guardar</button>
                                    <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>