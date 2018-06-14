<!-- Modal Login  -->
<div id="myLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <p>Sebagai Kandidat <a  href="<?= base_url("login/candidate") ?>">disini</a>.</p>
        <p>Sebagai Perusahaan <a  href="<?= base_url("login/company") ?>">disini</a>.</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--- End Modal Login  -->

<!-- Modal Register  -->
<div id="myRegister" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
        <p>Sebagai Kandidat <a  href="<?= base_url("register/candidate") ?>">disini</a>.</p>
        <p>Sebagai Perusahaan <a  href="<?= base_url("register/company") ?>">disini</a>.</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--- End Modal Register  -->
<!--- MOdal -->
  <div id="modal-msg" class="modal" tabindex="-5">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="blue bigger" id="title-message"></h4>
                </div>
                <div class="modal-body" id="content-message">
                </div>
                    <div class="modal-footer wizard-actions">
                        <button type="submit" data-dismiss="modal" class="btn btn-sm btn-primary btn-round">
                                Close
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                    </div>
            </div>
        </div>
    </div>
<!-- End Modal --> 