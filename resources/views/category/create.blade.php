@extends('layouts.admin', ['menu_name' => 'category', 'sub_menu_name' => 'add-category'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Add Category</h4>
                </div>
                </div>
                <div class="iq-card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.category.store') }}" method="POST" onsubmit="return onSubmit(event)">
                            @csrf
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                            </div>
                            <div class="form-group">
                            <textarea id="description" rows="5" class="form-control"
                            placeholder="Description" name="description"></textarea>
                            </div>
                            <div class="form-group radio-box">
                            <label>Status</label>
                            <div class="radio-btn">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="status-enable" name="status" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="status-enable">enable</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="status-disable" name="status" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="status-disable">disable </label>
                                </div>
                            </div>
                            </div>
                            <div class="form-group ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a type="reset" class="btn btn-danger" href="{{ route('admin.category.index') }}">cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#status-enable').prop('checked', true)
    function onSubmit(e) {
        let categoryName = $('#name').val();
        let categoryDspt = $('#description').val();
        
        if (!categoryName) {
            alert("Please enter category name");
            return false;
        }
        if (!categoryDspt) {
            alert("Please enter category description");
            return false;
        }
        if (!$("#status-enable").is(":checked") && !$('#status-disable').is(":checked")) {
            alert("Please select category status");
            return false;
        }    
    }
</script>
@endsection