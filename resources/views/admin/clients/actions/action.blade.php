
<div class="divAction">
@if(auth()->user()->hasPermission('update-clients') )
    <a style="padding: 6px 11px" href="{{url('/admin/clients/'.$client->id.'/edit')}}" class="btn1 btn first edit "><i class="fa fa-edit"></i> </a>
@endif
@if(auth()->user()->hasPermission('delete-clients'))
    <form style="display:inline" action="{{route('admin.clients.destroy',$client->id)}}" method="post">
        {{method_field('delete')}}
        {{csrf_field()}}
        <input class="btnsup" type="submit" class="btn1 btn  delete " >

        <button  type="button" class="btn1 btn  delete " onclick=" return suprimer();" > <i class='fa fa-trash'></i> </button>

    </form>



@endif
</div>


