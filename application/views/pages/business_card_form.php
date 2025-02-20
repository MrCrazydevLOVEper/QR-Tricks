<div class="qr-page" id="businesscardsform">
  <section class="odd-section">
      <div class="container" id="form">
          <h2 class="mb-4 text-center">Digital Business Card<h2> 
          <form class="row" id="invitation-from">
              <div class="col-md-12 mb-3">
                  <div>
                    <label class="upload-title" for="file">UPLOAD LOGO</label>
                    <input type="file" class="form-control" id="file" name="file">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">OWNER NAME</span>
                    <input type="text" class="form-control" id="owner_name" name="owner_name" maxlength="50">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">BUSINESS NAME</span>
                    <input type="text" class="form-control" id="business_name" name="business_name" maxlength="50">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">START DATE</span> 
                    <input type="number" placeholder="dd" class="form-control" id="date" name="date" maxlength="2">
                    <input type="number" placeholder="mm" class="form-control" id="month" name="month" maxlength="2">
                    <input type="number" placeholder="yyyy" class="form-control" id="year" name="year" maxlength="4">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">BUSINESS TIME</span>
                    <input type="text" class="form-control" id="from" name="from">
                    <span class="input-group-text">TO</span>
                    <input type="text" class="form-control" id="to" name="to">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">BUSINESS ADDRESS</span>
                    <input type="text" class="form-control" id="address" name="address">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">WHATSAPP NO</span>
                    <input type="text" class="form-control" id="wano" name="wano">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">FACEBOOK LINK</span>
                    <input type="text" class="form-control" id="fb" name="fb">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">INSTAGRAM LINK</span>
                    <input type="text" class="form-control" id="insta" name="insta">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">YOUTUBE LINK</span>
                    <input type="text" class="form-control" id="yt" name="yt">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">TWITTER LINK</span>
                    <input type="text" class="form-control" id="twitter" name="twitter">
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">STORE LOCATION</span>
                    <textarea type="text" id="location" name="location" class="form-control" placeholder="paste map location link here"></textarea>
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <div class="input-group">
                    <span class="input-group-text">DESCRIPTION</span>
                    <textarea type="text" id="message" name="message" class="form-control" maxlength="100"></textarea>
                  </div>
              </div>
              <div class="col-md-12 mb-3 form-check">
                  <input class="form-check-input" type="checkbox" value="" id="tandc">
                  <label class="form-check-label fs-mid" for="tandc">
                    I confirm that the above data values are correct and I authorize the use of this information to proceed. 
                  </label>
                  </div>
              <div class="col-md-12 mb-3"> 
                <button id="submit" type="button" class="btn btn-secondary">CREATE QR</button>
              </div>
          </form>
      </div>
  </section>   
  <div id="invDemoInformation" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Confirm Your Information</h4>
          <button type="button" class="close btn btn-danger btn-sm cancelModal" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">  
          <div class="row">
            <p class="col-3 info_title">OWNER NAME</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_owner_name"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">BUSINESS NAME</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_business_name"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">DATE</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_date"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">TIME</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_time"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">ADDRESS</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_address"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">WHATSAPP NO</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_wano"></span></p>
          </div> 
          <div class="row">
            <p class="col-3 info_title">FACEBOOK</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_fb"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">INSTAGRAM</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_insta"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">YOUTUBE</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_yt"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">TWITTER</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_twitter"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">STORE LOCATION</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_location"></span></p>
          </div>
          <div class="row">
            <p class="col-3 info_title">DESCRIPTION</p>
            <p class="col-9 info_value">: <span class="preview" id="preview_message"></span></p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger cancelModal" id="cancel">Cancel</button>
          <button type="button" class="btn btn-primary" id="confirm">Confirm</button>
        </div>
      </div> 
    </div>
  </div> 
  <div id="invInformation" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Invitation Information</h4>
          <button type="button" class="close btn btn-danger btn-sm cancelModal" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- <img src="<?= base_url(); ?>assets/img/logo.png" id="copy-img"> -->
          <div id="copy-img"></div>
          <div class="input-group">
              <input type="text" class="form-control" id="copy-link">
              <span class="input-group-text" id="copy-btn">Copy Link</span>
          </div>
          <button id="business-download-image" class="btn btn-sm btn-info mt-3">Download Image</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger cancelModal" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>
  </div> 
</div>


