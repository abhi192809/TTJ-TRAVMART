<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        #dataTable th {
            border: 0.1px solid white;
        }
        #dataTable td {
            border: 0.1px solid #00000078;
        }
    </style>
<div class="container-fluid">
    <h4>Add Destination</h4>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-12">
            <select id="destinationType" class="form-control select2">
                <option value="1">India</option>
                <option value="2">International</option>
            </select>
        </div>
        <div class="col-md-6 col-sm-6 col-12">
            <input type="text" id="name" class="form-control" placeholder="Name" >
        </div>
        <div class="col-md-6 col-sm-6 col-12">
            <input type="text" id="titleLine" class="form-control mt-2" placeholder="Title Line" >
        </div>
        <div class="col-md-6 col-sm-6 col-12 pt-2 pb-2 ">
               <select name="countries[]" id="countries" multiple >
                <option value="" selected>Select Airline</option>
                <?php 
                foreach($Get_AirLine as $row){
                    echo "<option value='" . $row->id . "'>" . $row->Air_Lines . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-12 col-sm-12 col-12">
            <textarea id="description" class="mt-2 form-control" placeholder="Description"></textarea>
        </div>
        <div class="col-md-12 col-sm-12 col-12">
            <button id="submitBtn" class="btn btn-danger mt-2">Go</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4">
            <table class="table border" id="dataTable">
                <thead class="text-white bg-danger">
                <tr>
                    <th>No.</th>
                    <th>Place</th>
                    <th>Title Line</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($Destination as $row) {
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row->Place ?></td>
                    <td><?php echo $row->Tagline ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm updateBtn" data-entry="<?php echo base64_encode(json_encode($row)); ?>">Update</button>
                        <button class="btn btn-danger deleteBtn btn-sm" data-id="<?php echo $row->id ?>">Delete</button>
                    </td>
                </tr>
                <?php
                $i++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
<script>

    new MultiSelectTag('countries', {
    rounded: true,    
    shadow: true,     
    placeholder: 'Search',  
    tagColor: {
        textColor: '#327b2c',
        borderColor: '#92e681',
        bgColor: '#eaffe6',
    },
    onChange: function(values) {
        console.log(values)
    }
})
</script>
<script>
    $(document).ready(function () {
        // Initialize CKEditor
        CKEDITOR.replace('description');

        $('#submitBtn').click(function (e) {
            e.preventDefault();
            const destinationType = $('#destinationType').val();
            const name = $('#name').val();
            const titleLine = $('#titleLine').val();
            const description = CKEDITOR.instances.description.getData();
            const multiSelect = $('#countries').val(); 
           
            $.ajax({
                url: '<?= base_url('Meeting/Admin/Destionation/add_destination')?>',
                type: 'POST',
                data: {
                    destinationType: destinationType,
                    name: name,
                    titleLine: titleLine,
                    description: description,
                    multiSelect: multiSelect // Send selected options
                },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        const entry = response.entry;
                        const newRow = `
                            <tr>
                                <td>0</td>
                                <td>${entry.Place}</td>
                                <td>${entry.Tagline}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Update</button>
                                    <button class="btn btn-danger btn-sm deleteBtn" data-id="${entry.id}">Delete</button>
                                </td>
                            </tr>
                        `;
                        $('#dataTable tbody').prepend(newRow);
                        $('#destinationType').val('').trigger('change');
                        $('#name').val('');
                        $('#titleLine').val('');
                        CKEDITOR.instances.description.setData('');
                        $('#multiSelect').val(null).trigger('change');
                    } else {
                        alert(response.message || 'Failed to add destination. Please try again.');
                    }
                },
                error: function () {
                    alert('Error occurred while adding the destination');
                }
            });
        });

            $('#dataTable').on('click', '.deleteBtn', function () {
                const id = $(this).data('id');
                if (confirm('Are you sure you want to delete this destination?')) {
                    $.ajax({
                        url: '<?= base_url('Meeting/Admin/Destionation/delete_destination')?>',
                        
                        type: 'POST',
                        data: { id: id },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                $(this).closest('tr').remove();
                            } else {
                                alert(response.message || 'Failed to delete destination. Please try again.');
                            }
                        }.bind(this),
                        error: function () {
                            alert('Error occurred while deleting the destination');
                        }
                    });
                }
            });
            
            
            
    });
    
    
</script>

