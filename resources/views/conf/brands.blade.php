@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
        <h3><i class="fa fa-tags" aria-hidden="true"></i> Brands</h3>
        <p><a href="javascript:create();" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> new</a></p>
        <div class="alert alert-info">
          @if(isset($records) && count($records))
            @foreach($records as $record)
              <h3><a href="javascript:edit({{$record->id}})" class="badge badge-info">{{ $record->key }}</a></h3>
            @endforeach
          @else
              null
          @endif
        </div>
    </div>
</section>

   
  <!-- create -->
  <div class="modal fade" id="new_type">
    <div class="modal-dialog">
      <div class="modal-content">
   
        <div class="modal-header">
          <h4 class="modal-title">Type manager</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   
        <div class="modal-body">
          <input type="text" id="conf_key" placeholder="input type name" onchange="javascript:set_url()">
          <input type="hidden" id="parent_id">
          <input type="hidden" id="edit_id">
        </div>
   
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary btn-sm" data-dismiss="modal">close</button>
          <a id="go" href="#" class="btn btn-primary btn-sm">Confirm</a>
        </div>
   
      </div>
    </div>
  </div>

<script>

  function reset() {
    $("#conf_key").val('');
    $("#edit_id").val('');
  }

  //url
  function set_url() {
    var conf_key = $("#conf_key").val();
    var edit_id = $("#edit_id").val();
    var url = '/conf/brands/create/' + conf_key;

    if(edit_id >= 1) url = '/conf/brands/edit/'+ conf_key +'/'+ edit_id;


    url = encodeURI(url);
    if($.trim(conf_key) != '') $("#go").attr('href', url);
  }

  function create() {
      reset();

      $("#new_type").modal();
  }

  function edit(id) {
      reset();

      $("#new_type").modal();
      $("#edit_id").val(id);
  }

</script>

@endsection














