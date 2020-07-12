<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$modelId}}">
    Add Confirmation
</button>
<div class="modal fade" id="{{$modelId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('admin.updateRenewalDate',$rDate->id)}}">
           {!! csrf_field() !!}
            <div class="modal-body">
                    <lable>Confirmation text</lable>
                    <input style="width: 300px" name="confirmation" value="{{$rDate->confirmation}}" type="text" class="form-control" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
