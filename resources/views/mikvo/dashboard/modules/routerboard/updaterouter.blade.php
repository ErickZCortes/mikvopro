<form method="POST" action="{{ route('dashboard/routerboard/update',$router->id) }}" role="form" enctype="multipart/form-data">
 
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
    @include('mikvo.dashboard.modules.routerboard.frm.formrouter')
                                                            
</form>