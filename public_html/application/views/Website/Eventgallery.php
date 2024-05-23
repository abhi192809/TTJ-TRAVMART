<div class="container-fluid" style="padding-top: 94px">
    <div class="text-center" style="padding-top">
        <h1 class="mb-4" style="color: red">
            <?php echo $name; ?>
        </h1>
    </div>

    <?php
    $dirname = "assets/{$filename}/";
    $images = scandir($dirname);
    $ignore = array(".", "..");
    $base_url = base_url();

    echo '<div class="row">'; // Start a new row

    foreach ($images as $curimg) {
        if (!in_array($curimg, $ignore)) {
            echo '<div class="col-md-3 col-sm-3 col-6">';
            echo "<div class='m-3'><img src='{$base_url}{$dirname}{$curimg}' alt='{$dirname}{$curimg}' class='img-fluid' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-img='{$dirname}{$curimg}' data-bs-alt='Image'/></div>\n";
            echo '</div>';
        }
    }

    echo '</div>'; // Close the row
    ?>

</div>

<!-- Bootstrap Modal -->
<div class="modal fade" style="z-index:99999" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <img class="modal-img" src="" alt="">
        </div>
    </div>
</div>

<script>
    // Attach an event listener for Bootstrap modal
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('imageModal'));

        // Add click event to each image
        var images = document.querySelectorAll('[data-bs-toggle="modal"]');
        images.forEach(function (img) {
            img.addEventListener('click', function () {
                var modalImg = document.querySelector('.modal-img');
                var imgSrc = this.getAttribute('data-bs-img');
                var imgAlt = this.getAttribute('data-bs-alt');

                modalImg.src = imgSrc;
                modalImg.alt = imgAlt;

                myModal.show();
            });
        });
    });
</script>

