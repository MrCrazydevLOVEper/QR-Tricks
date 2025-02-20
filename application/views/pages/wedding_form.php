<div class="qr-page" id="weddingform">
  <section class="odd-section">
      <div class="container" id="wed-form">
          <h2 class="mb-4 text-center">Digital Invitation<h2> 
          <form class="row" id="wed-invitation-from">
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">GROOM</span>
                    <input type="text" class="form-control" id="wed-groom" name="groom" maxlength="50">
                  </div>
                  <p class="form-label">Male Name</p>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">BRIDE</span>
                    <input type="text" class="form-control" id="wed-bride" name="bride" maxlength="250">
                  </div>
                  <p  class="form-label">Female Name</p>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">DATE</span> 
                    <input type="number" class="form-control" id="wed-date" name="date" maxlength="2">
                    <span class="input-group-text">MONTH</span> 
                    <input type="number" class="form-control" id="wed-month" name="month" maxlength="2">
                    <span class="input-group-text">YEAR</span> 
                    <input type="number" class="form-control" id="wed-year" name="year" maxlength="4">
                  </div>
                  <p  class="form-label">Marriage Date</p>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">TIME FROM</span>
                    <input type="text" class="form-control" id="wed-from" name="from">
                    <span class="input-group-text">TO</span>
                    <input type="text" class="form-control" id="wed-to" name="to">
                  </div>
                  <p  class="form-label">Marriage Timing</p>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">VENUE</span>
                    <input type="text" class="form-control" id="wed-venue" name="venue" maxlength="100">
                  </div>
                  <p  class="form-label">Full Address</p>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">CONTACT</span>
                    <input type="text" class="form-control" id="wed-contact" name="contact" maxlength="13">
                  </div>
                  <p  class="form-label">Contact Number</p>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">LOCATION</span>
                    <textarea type="text" id="wed-location" name="location" class="form-control" placeholder="paste map location link here"></textarea>
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">MESSAGE</span>
                    <textarea type="text" id="wed-message" name="message" class="form-control" maxlength="250"></textarea>
                  </div>
              </div>
              <div class="col-md-12 mb-3 form-check">
                  <input class="form-check-input" type="checkbox" value="" id="wed-tandc">
                  <label class="form-check-label fs-mid" for="tandc">
                    I confirm that the above data values are correct and I authorize the use of this information to proceed. 
                  </label>
                  </div>
              <div class="col-md-12 mb-3"> 
                <button id="wed-submit" type="button" class="btn btn-secondary">CREATE QR</button>
              </div>
          </form>
      </div>
  </section> 
  <div id="wed-invDemoInformation" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Confirm Your Information</h4>
          <button type="button" class="close btn btn-danger btn-sm cancelModal" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">  
          <div class="row">
            <p class="col-3 info_title">GROOM</p>
            <p class="col-9 info_value">: <span class="preview" id="wed-preview_groom"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">BRIDE</p>
            <p class="col-9 info_value">: <span class="preview" id="wed-preview_bride"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">DATE</p>
            <p class="col-9 info_value">: <span class="preview" id="wed-preview_date"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">TIME</p>
            <p class="col-9 info_value">: <span class="preview" id="wed-preview_time"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">VENUE</p>
            <p class="col-9 info_value">: <span class="preview" id="wed-preview_venue"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">CONTACT</p>
            <p class="col-9 info_value">: <span class="preview" id="wed-preview_contact"></span></p>
          </div> 
          <div class="row">
            <p class="col-3 info_title">LOCATION</p>
            <p class="col-9 info_value">: <span class="preview" id="wed-preview_location"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">MESSAGE</p>
            <p class="col-9 info_value">: <span class="preview" id="wed-preview_message"></span></p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger cancelModal" id="wed-cancel">Cancel</button>
          <button type="button" class="btn btn-primary" id="wed-confirm">Confirm</button>
        </div>
      </div> 
    </div>
  </div> 
  <div id="wed-invInformation" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Invitation Information</h4>
          <button type="button" class="close btn btn-danger btn-sm cancelModal" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- <img src="<?= base_url(); ?>assets/img/logo.png" id="wed-copy-img"> -->
          <div id="wed-copy-img"></div>
          <div class="input-group">
              <input type="text" class="form-control" id="wed-copy-link">
              <span class="input-group-text" id="wed-copy-btn">Copy Link</span>
          </div>
          <button id="wed-download-image" class="btn btn-sm btn-info mt-3">Download Image</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger cancelModal">Close</button>
        </div>
      </div> 
    </div>
  </div> 
</div>