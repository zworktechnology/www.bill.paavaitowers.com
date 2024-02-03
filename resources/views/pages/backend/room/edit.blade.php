@extends('layouts.auth')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Update room</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form autocomplete="off" method="POST" action="{{ route('room.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Floor <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="room_floor" placeholder="Enter floor " value="{{ $data->room_floor }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Room Number <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="room_number" placeholder="Enter room number " value="{{ $data->room_number }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">
                                                Category <span style="color: red;">*</span> </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="room_category" required>
                                                    <option value="" disabled selected hidden class="text-muted">Select Category</option>
                                                    <option value="Standard A/C"{{ $data->room_category == 'Standard A/C' ? 'selected' : '' }} class="text-muted">Standard A/C</option>
                                                    <option value="Deluxe A/C"{{ $data->room_category == 'Deluxe A/C' ? 'selected' : '' }} class="text-muted">Deluxe A/C</option>
                                                    <option value="Standard Non A/C"{{ $data->room_category == 'Standard Non A/C' ? 'selected' : '' }} class="text-muted">Standard Non A/C</option>
                                                    <option value="King Size A/C"{{ $data->room_category == 'King Size A/C' ? 'selected' : '' }} class="text-muted">King Size A/C</option>
                                                    <option value="Group Room"{{ $data->room_category == 'Group Room' ? 'selected' : '' }} class="text-muted">Group Room</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
