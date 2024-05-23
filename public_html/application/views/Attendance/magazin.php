<style>
   .lightbox-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      display: flex;
      justify-content: center;
      align-items: center;
   }

   .lightbox-content {
      max-width: 90%;
      max-height: 90%;
   }
</style>

    <!-- Add these lines to include Lightbox CSS and JavaScript -->
<div class="row data px-2">
        <div class="col-12">
            <div class="table-responsive overflow-x-auto">
                <table class="table table-bordered mt-2" style="width: 300%;">
                <tr>
                    <th>So.No</th>
                    <th>Edit</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Association</th>
                    <th>Designation</th>
                    <th>Company Address</th>
                    <th>City</th>
                    <th>Address 1</th>
                    <th>Address 2</th>
                    <th>Place</th>
                    <th>Payment Screenshot</th>
                </tr>
                <?php
                $i = '1';
                foreach ($Magazinpaymentprof as $row) {
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td><i class="mt-3 fa-solid fa-ticket text-danger transfer-data" data-meta=\'' . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . '\'></i></td>';
                    echo '<td>' . $row->name . '</td>';
                    echo '<td>' . $row->email. '</td>';
                    echo '<td>' . $row->number. '</td>';
                    echo '<td>' . $row->association. '</td>';
                    echo '<td>' . $row->designation . '</td>';
                    echo '<td>' . $row->company_name . '</td>';
                    echo '<td>' . $row->city . '</td>';
                    echo '<td>' . $row->address1 . '</td>';
                    echo '<td>' . $row->address2 . '</td>';
                    echo '<td>' . $row->place . '</td>';
                   echo '<td><img src="' . base_url('assets/Paymentonline/' . basename($row->payment_screenshot)) . '" class="lightbox-image" width="20px"></td>';
                    echo '</tr>';
                    $i++;
                }
                ?>
            </table>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        // Add click event handler for icons with class 'lightbox-image'
        $('.lightbox-image').on('click', function() {
            var imageUrl = $(this).attr('src');
            var lightboxContent = '<div class="lightbox-container"><img src="' + imageUrl + '" class="lightbox-content"></div>';

            // Append lightbox content to the body
            $('body').append(lightboxContent);

            // Close lightbox when clicked outside the image
            $('.lightbox-container').on('click', function() {
                $(this).remove();
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        // When the form is submitted
        $(".transfer-data").on('click', function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get the meta data from the clicked element
            var metaData = $(this).data('meta');

            // Log metaData to console for debugging
            console.log('metaData:', metaData);

            // Make an AJAX request to your CodeIgniter controller
            $.post("<?php echo base_url()?>Attendance/Magazine/transferData", { data: metaData })
                .done(function (response) {
                    // Handle the response from the server
                    console.log(response);

                    // Show a success popup using SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Magazine Approval',
                    });
                     window.location.reload();
                })
                .fail(function (error) {
                    // Handle any errors that occurred during the request
                    console.error("Error:", error);

                    // Show an error popup using SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Not approved',
                    });
                });
        });
    });
</script>
