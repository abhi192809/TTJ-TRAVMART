<style>
        /* Style for image gallery thumbnails */
        .gallery-thumb {
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
    <div class="container">
        <div id="image-gallery" class="row py-5">
            <div class="col-md-12 text-center">
                <h1 style="color: red">Gallery</h1>
            </div>
        </div>

        <?php
krsort($distinct_years);
foreach ($distinct_years as $currentYear => $events) {
    echo "<h2 style='color:red'>Event $currentYear</h2>";
    echo '<div class="row text-center">';
    
    foreach ($events as $row) {
        $gallery_id = $row['gallery_file_id'];
        
        $gallery_id_file = $this->db->get_where('gallery_file', ['id' => $gallery_id])->row_array();
        
        echo '<div class="col-md-2">
                <a href="'.base_url().'eventgallery/' . $row["file_name"] . '/' . $row["name"] .'" style="color:black;text-decoration: none;">
                    <div><img src="' . base_url() . $row["image_path"] . '" width="100%"></div>
                    <p class="mt-2 p-0 m-0">' . $row["entry_date"] . '</p>
                    <p>' . $row["name"] . '</p>
                </a>
              </div>';
    }
    
    echo '</div>';
}
?>


    </div>

    <!-- Include Magnific Popup JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Magnific Popup
            $('#image-gallery').magnificPopup({
                delegate: 'a', // Gallery items are links
                type: 'image',
                gallery: {
                    enabled: true
                },
                // Add a button to open the gallery
                callbacks: {
                    open: function() {
                        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-fig-caption');
                        this.st.mainClass = this.st.el.attr('data-effect');
                    }
                }
            });
        });
    </script>

