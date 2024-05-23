<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
        </div>
        <div class="col-md-2">
                 <button id="addRow" class="btn btn-danger">+ Add Air Lines</button>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid border">
    <table class="table table-bordered text-center" id="airlinesForm">
        <thead>
            <tr>
                <th>So.No</th>
                <th>Air Lines</th>
                <th>Url</th>
                <th>image</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($Air_Connectivity as $row){
            ?>
            <tr>
                <td> <?= $i?></td>
                <td> <?= $row->Air_Lines ?></td>
                <td> <?= $row->Url ?></td>
                <td> <img src="<?=  base_url();?>assets/Meeting/Destination/<?= $row->image ?>" width="40px"></td>
                <td> 
                    <button type="button" class="btn btn-danger delete-btn" data-id="<?= $row->id ?>">Delete</button>
                    <button type="button" class="btn btn-dark update-btn" data-id="<?= $row->id ?>" data-entry="<?= base64_encode(json_encode($row)) ?>">Update</button>
                </td>
            </tr>
            <?php
            $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
$(document).ready(function() {
    // Function to add a new row
    $('#addRow').click(function() {
        let html = `
            <tr>
                <td>New</td>
                <td><input class="form-control" type="text" name="airline"></td>
                <td><input class="form-control" type="text" name="url"></td>
                <td><input class="form-control" type="file" name="image"></td>
                <td><button class="goButton btn btn-primary" type="button">GO</button></td> 
            </tr>
        `;
        $('#airlinesForm tbody').prepend(html);
    });

    // Function to handle the 'GO' button click event
    $(document).on('click', '.goButton', function() {
        let row = $(this).closest('tr');
        let airline = row.find('input[name="airline"]').val();
        let url = row.find('input[name="url"]').val();
        let image = row.find('input[name="image"]')[0].files[0];
        let formData = new FormData();
        formData.append('airline', airline);
        formData.append('url', url);
        formData.append('image', image);

        $.ajax({
            url: '<?php echo base_url(); ?>Meeting/Admin/Destionation/Air_lines',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Airline entry added successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while adding the airline entry.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                console.error('Error:', error);
            }
        });
    });

    // Function to handle the delete button click event
    $(document).on('click', '.delete-btn', function() {
        const rowId = $(this).data('id');
        const row = $(this).closest('tr');

        $.ajax({
            url: '<?php echo base_url(); ?>Meeting/Admin/Destionation/delete_Air_lines',
            type: 'POST',
            data: { id: rowId },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.status === 'success') {
                    Swal.fire({
                        title: 'Success!',
                        text: result.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        row.remove();
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: result.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while deleting the row.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                console.error('Error:', error);
            }
        });
    });
    
    
    
      $(".update-btn").click(function () {
    const rowData = $(this).data("entry");
    const decodedRowData = atob(rowData);
    const row = JSON.parse(decodedRowData);

    Swal.fire({
        title: 'Update Visitor Attraction',
        html: `
            <form id="updateForm" enctype="multipart/form-data">
                <input type="hidden" name="id" id="updateId" value="${row.id}">
                <div class="form-group">
                    <label for="visitor_attraction">Visitor Attraction</label>
                    <input type="text" class="form-control" id="Air_Lines" name="Air_Lines" value="${row.Air_Lines}">
                </div>
                <div class="form-group">
                    <label for="visitor_attraction">Visitor Attraction</label>
                    <input type="text" class="form-control" id="Url" name="Url" value="${row.Url}">
                </div>
                <div class="form-group">
                    <label for="image_path">Image</label>
                    <br>
                    <img src="<?= base_url();?>assets/Meeting/Destination/${row.image}" width="60px" height="60px" id="image_preview_${row.id}">
                    <input type="file" class="form-control" id="image_path" name="image_path">
                </div>
            </form>
        `,
        showCancelButton: true,
        confirmButtonText: 'Update',
        preConfirm: () => {
            const formData = new FormData();
            formData.append('id', $('#updateId').val());
            formData.append('Url', $('#Url').val());
            formData.append('Air_Lines', $('#Air_Lines').val());
            const fileInput = document.getElementById('image_path');
            if (fileInput.files.length > 0) {
                formData.append('image', fileInput.files[0]);
            }
            return formData;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url()?>/Meeting/Admin/Destionation/Update_Air_Lines",
                type: "POST",
                data: result.value,
                processData: false,
                contentType: false,
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.success) {
                        Swal.fire('Updated!', 'The visitor attraction has been updated.', 'success')
                            .then(() => {
                                // Update the image preview
                                const newImagePath = "<?= base_url(); ?>" + response.new_image_path;
                                $(`#image_preview_${response.id}`).attr('src', newImagePath);
                                location.reload();
                            });
                    } else {
                        Swal.fire('Error!', response.message, 'error');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                    Swal.fire('Error!', 'An error occurred. Please try again.', 'error');
                }
            });
        }
    });
});

});

</script>
