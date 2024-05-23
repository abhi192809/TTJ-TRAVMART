<div class="container-fluid">
    <div class="row">
        <div class="col-md-11">
            <select id="options" class="form-control">
                <option value=" "> Select Places </option>
                <?php
                foreach($Get_Places as $row){
                echo "<option value=".$row->id.">".$row->Place."</option>";    
                }
                ?>
            </select>
        </div>
        <div class="col-md-1">
            <button id="addRow" class="btn btn-danger">+</button>
        </div>
    </div>
    <div id="formEntries">
    
    </div>
    <div class="row mt-4 text-right">
        <button id="submitForm" class="btn btn-danger mx-3">Submit</button>
    </div>
</div>
<hr>
<div class="container-fluid border">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>So.No</th>
                <th>Visitor Attractions</th>
                <th>Image</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i="1";
            foreach($VisitorAttraction as  $row){
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $this->Destination_from->Get_The_Place_Name($row->Market_Place_Destination_id); ?></td>
                <td><img width="120px" src="<?php echo base_url();?><?php echo $row->Images ?>" class="img-fluid"></td>
                <td>
                    <button type="button" class="btn btn-danger delete-btn" data-id="<?php echo $row->id ?>">Delete</button>
                    <button type="button" class="btn btn-dark update-btn" data-id="<?php echo $row->id ?>" data-entry="<?php echo base64_encode(json_encode($row)) ?>">Update</button>
                </td>
            </tr>
            <?php
            $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<!--<form id="updateForm">-->
<!--    <input type="hidden" name="id" id="updateId"> <!-- Hidden input field to store the ID of the record to be updated -->
<!--    <div class="form-group">-->
<!--        <label for="visitor_attraction">Visitor Attraction</label>-->
<!--        <input type="text" class="form-control" id="visitor_attraction" name="visitor_attraction" placeholder="Visitor Attraction">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="image_path">Image Path</label>-->
<!--        <input type="text" class="form-control" id="image_path" name="image_path" placeholder="Image Path">-->
<!--    </div>-->
<!--    <button type="submit" class="btn btn-primary">Update</button>-->
<!--</form>-->
<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        const formEntries = $("#formEntries");
        const submitFormBtn = $("#submitForm");
        $("#addRow").click(function () {
            const optionValue = $("#options").val();

            // Create row elements
            const row = $("<div>").addClass("row mt-4 align-items-center");
            const imageCol = $("<div>").addClass("col-md-5");
            const imageInput = $("<input>").attr({
                type: "file",
                class: "form-control",
                placeholder: "Food Images"
            });
            imageCol.append(imageInput);

            const textCol = $("<div>").addClass("col-md-5");
            const textInput = $("<input>").attr({
                type: "text",
                class: "form-control",
                placeholder: "Visitor Attraction"
            });
            textCol.append(textInput);

            const deleteCol = $("<div>").addClass("col-md-2");
            const deleteBtn = $("<button>").text("X").addClass("btn btn-danger");
            deleteBtn.click(function () {
                $(this).closest(".row").remove();
                toggleSubmitButton();
            });
            deleteCol.append(deleteBtn);

            row.append(imageCol);
            row.append(textCol);
            row.append(deleteCol);

            formEntries.append(row);

            toggleSubmitButton();
        });
        function toggleSubmitButton() {
            const rows = formEntries.find(".row");
            if (rows.length > 0) {
                submitFormBtn.show();
            } else {
                submitFormBtn.hide();
            }
        }
        
        submitFormBtn.click(function () {
            const formData = new FormData();
            formEntries.find(".row").each(function () {
                const imageInput = $(this).find("input[type='file']")[0];
                const textInput = $(this).find("input[type='text']").val();
                const selectValue = $(this).closest(".container-fluid").find("#options").val(); // Get the select value for each row

                formData.append("images[]", imageInput.files[0]);
                formData.append("texts[]", textInput); 
                  formData.append('select_value', selectValue); 
            });
            $.ajax({
                url: "<?= base_url()?>/Meeting/Admin/Destionation/add_Visitor_Attractions",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log("Data sent successfully:", response);
                    formEntries.empty();
                    toggleSubmitButton();
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        });
        
        $(".delete-btn").click(function () {
            const rowId = $(this).data("id");
            const row = $(this).closest("tr");
            $.ajax({
                url: "<?= base_url()?>/Meeting/Admin/Destionation/delete_Visitor_Attraction", 
                type: "POST",
                data: { id: rowId },
                success: function (response) {
                    console.log("Row deleted successfully:", response);
                    row.remove();
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
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
                    <input type="text" class="form-control" id="visitor_attraction" name="visitor_attraction" value="${row.Visitor_Attractions}">
                </div>
                <div class="form-group">
                    <label for="image_path">Image</label>
                    <br>
                    <img src="<?= base_url();?>${row.Images}" width="60px" height="60px" id="image_preview_${row.id}">
                    <input type="file" class="form-control" id="image_path" name="image_path">
                </div>
            </form>
        `,
        showCancelButton: true,
        confirmButtonText: 'Update',
        preConfirm: () => {
            const formData = new FormData();
            formData.append('id', $('#updateId').val());
            formData.append('visitor_attraction', $('#visitor_attraction').val());
            const fileInput = document.getElementById('image_path');
            if (fileInput.files.length > 0) {
                formData.append('image_path', fileInput.files[0]);
            }
            return formData;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url()?>/Meeting/Admin/Destionation/update_Visitor_Attraction",
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

        $('#image_path').change(function () {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#image_preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });
        
    });
</script>
