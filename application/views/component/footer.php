<!-- <div class="mobview"> -->
    <ul class="bottom-menu mobileView ">
        <li class="home-page qr-link" data-page="home">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </li>
        <li class="profile-page qr-link" data-page="profile"> 
          <i class="fa fa-user"></i>
          <span>Profile</span>
        </li>
        <li class="sic-page qr-link" data-page="savedinvitationcards"> 
          <i class="fa fa-heart"></i>
          <span>Wishlist</span>
        </li>
        <li class="mbc-page qr-link" data-page="mybusinesscards"> 
          <i class="fa fa-bookmark"></i>
          <span>Cards</span>
        </li>
    </ul>
<!-- <div> -->

<!-- Copyright Footer -->
<footer class="bg-dark text-center text-white"> 
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    QRTRICKS © 2024 All Rights Reserved.
  </div> 
</footer>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-left",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-maxlength@1.10.0/dist/bootstrap-maxlength.min.js" integrity="sha256-3ZRODUzkt15hSZ9r++hfZQtVTmHkQJfyXxKhRz6FktQ=" crossorigin></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="<?= base_url() ?>assets/custom/import-invitation.js"></script>  
<script src="<?= base_url() ?>assets/custom/profile.js"></script>  
<script src="<?= base_url() ?>assets/custom/qr-link.js"></script>  
<script src="<?= base_url() ?>assets/custom/login-register.js"></script>  
<script src="<?= base_url() ?>assets/custom/business-form.js"></script> 
<script src="<?= base_url() ?>assets/custom/invitation-form.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Session Handler Start -->

<script>
    $('#payNowBtn').on('click', function () {
        $.ajax({
            url: "<?php echo base_url('Invitation/paytmRequest'); ?>", // The URL to the CI controller function
            type: 'POST',
            success: function (response) {
                let txnData = JSON.parse(response);

                let form = $('<form>', {
                    action: 'https://securegw-stage.paytm.in/order/process', // For production, use the live URL
                    method: 'POST'
                });

                $.each(txnData, function (key, value) {
                    form.append($('<input>', {
                        type: 'hidden',
                        name: key,
                        value: value
                    }));
                });

                // Append the form and submit it
                $('body').append(form);
                form.submit();
            }
        });
    });
</script>

<!-- Session Handler End -->