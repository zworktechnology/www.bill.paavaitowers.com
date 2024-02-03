<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header" hidden>
            <h5 class="modal-title" id="staticBackdropLabel">New Room</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <form method="POST" action="{{ route('room.store') }}" autocomplete="off">
            @csrf
            <div class="modal-body">
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Floor </label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="room_floor" placeholder="Enter floor " required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Number </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="room_number" placeholder="Enter room number " required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" hidden>
                        Category </label>
                    <div class="col-sm-12">
                        <select class="form-control" name="room_category" required>
                            <option value="" disabled selected hidden class="text-muted">Select Category</option>
                            <option value="Standard A/C" class="text-muted">Standard A/C</option>
                            <option value="Deluxe A/C" class="text-muted">Deluxe A/C</option>
                            <option value="Standard Non A/C" class="text-muted">Standard Non A/C</option>
                            <option value="King Size A/C" class="text-muted">King Size A/C</option>
                            <option value="Group Room" class="text-muted">Group Room</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" hidden>Close</button>
                <button type="submit" class="btn btn-primary">Save now</button>
            </div>
        </form>
    </div>
</div>
