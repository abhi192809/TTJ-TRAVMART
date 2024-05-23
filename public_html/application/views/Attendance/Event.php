
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-2 mx-2"><spam style="color:#2c3e50;border-bottom:1px solid #2c3e50">Event Creat</spam> </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label class="p-2"> Image Where Event Going On</label>
            <input class="form-control" type="file" id="Eventimag">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label class="p-2">Event name</label>
            <input class="form-control" type="text" id="Event_Name">
        </div>
        <div class="col-md-6">
            <label class="p-2">Date</label>
            <input class="form-control" type="Date" id="Date">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label class="p-2">Place</label>
            <input class="form-control" type="text" id="Place">
        </div>
        <div class="col-md-6">
            <label class="p-2">Venue</label>
            <input class="form-control" type="text" id="Venue">
        </div>
        <div class="col-md-12">
            <input class="form-control btn btn-success mt-2" type="submit" value="Submit" id="Form_submit">
        </div>
        <div class="col-md-6">
            <h3 class="mt-3 mx-2"><spam style="color:#2c3e50;border-bottom:1px solid #2c3e50">All Event </spam> </h3>
        </div>
        <div class="col-md-6">
            <h3 class="mt-3 mx-2"><input type="text" class="form-control" id="filter"></h3>
        </div>
    </div>
</div>

<div class="container-fluid mt-2 text-center" style="overflow: auto; height: 290px;">
    <div class="row px-3 event-row">
        <div class="col-md-1 border">
            <p class="mt-3"><b>So.No</b></p>
        </div>
        <div class="col-md-2 border">
            <p class="mt-3"><b>Date</b></p>
        </div>
        <div class="col-md-2 border">
            <p class="mt-3"><b>Place</b></p>
        </div>
        <div class="col-md-3 border">
            <p class="mt-3"><b>Venue</b></p>
        </div>
        <div class="col-md-2 border">
            <p class="mt-3"><b>Event Image</b></p>
        </div>
        <div class="col-md-2 border">
            <p class="mt-3"><b>Status</b></p>
        </div>
    </div>

    <?php $i='1'; foreach($event as $row) :?>
    <div class="row px-3 event-row">
        <div class="col-md-1 border">
            <p class="mt-3"><?php echo $i; ?></p>
        </div>
        <div class="col-md-2 border">
            <p class="mt-3"><?php echo $row['store_table_name'];?></p>
        </div>
        <div class="col-md-2 border">
            <p class="mt-3"><?php echo $row['Date']?></p>
        </div>
        <div class="col-md-3 border">
            <p class="mt-3"><?php echo $row['Venue']?></p>
        </div>
        <div class="col-md-2 border">
            <p class="mt-3">
                <?php if ($row['images'] != NULL) { ?>
                    <img width="40px" src="<?php echo base_url();?>assets/TTJ_Travmart_Event/<?php echo $row['images']; ?>" />
                <?php } ?>
            </p>
        </div>
        <div class="col-md-2  border">
            <p class="mt-3">
                <i class="fa-sharp fa-solid fa-circle <?php echo ($row['Active'] == '1') ? 'Active' : 'Unactive'; ?>"
                   <?php echo ($row['Active'] == '1') ? "style='color:green'" : "style='color:red'"; ?>
                   data-meta="<?php  echo $row['id'] ?>">
                </i>
                <i class="far fa-edit"></i>
            </p>
        </div>
    </div>
    <?php $i++; endforeach;?>
</div>

<script>
    $(document).ready(function () {
        // Custom jQuery contains case-insensitive selector
        $.expr[':'].contains = function (a, i, m) {
            return $(a).text().toLowerCase().indexOf(m[3].toLowerCase()) >= 0;
        };

        // Function to filter and show events
        function filterEvents(filterText) {
            // Hide all events initially
            $('.event-row').hide();

            // Show only the events that match the search criteria
            $('.event-row:contains(' + filterText + ')').show();
        }

        // Submit the form via AJAX
        $('#Form_submit').click(function () {
            // Get form data
            var formData = new FormData();
            formData.append('Eventimag', $('#Eventimag')[0].files[0]);
            formData.append('Event_Name', $('#Event_Name').val());
            formData.append('Date', $('#Date').val());
            formData.append('Place', $('#Place').val());
            formData.append('Venue', $('#Venue').val());

            // AJAX request
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Attendance/Event/submitEvent"); ?>',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Event submitted successfully!',
                    });
                },
                error: function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error submitting the event.',
                    });
                }
            });
        });

        $(".Unactive").dblclick(function () {
            var demo = $(this).data('meta');
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Attendance/Event/Unactive"); ?>',
                data: { id: demo },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Event submitted successfully!',
                        onClose: function () {
                            location.reload();
                        }
                    });
                },
                error: function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error submitting the event.',
                    });
                }
            });
        });

        // Event handler for the filter input
        $('#filter').on('input', function () {
            var filterText = $(this).val().toLowerCase();
            filterEvents(filterText);
        });
    });
</script>

