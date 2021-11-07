<div wire:ignore.self class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Student </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
              <div clsss="form-group">
                  <label for="firstname">First Name </label>
                  <input type="text" name="firstname" class="form-control" wire:model="firstname"/>
              </div>
              <div clsss="form-group">
                <label for="lastname">Last Name </label>
                <input type="text" name="lastname" class="form-control" wire:model="lastname"/>
            </div>
            <div clsss="form-group">
                <label for="email">Email </label>
                <input type="text" name="email" class="form-control"wire:model="email"/>
            </div>
            <div clsss="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" wire:model="phone"/>
            </div>
            <div clsss="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" wire:model="location"/>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" wire:click.prevent="store()">Add student</button>
        </div>
      </div>
    </div>
  </div>
