<div class="container-fluid">
    <div class="col-md-12">
        <span style="color:#2c3e50;border-bottom:1px solid #2c3e50"><h2>Event Data</h2></span>
    </div>  
    <div class="row">
        <div class="col-md-6 border pt-2">
            <input type="text" class="form-control my-4" id="filer">
            <?php foreach($event as $row): ?>
                <p class="border p-2 store-table" data-table-name="<?php echo $row['store_table_name']; ?>">
                    <i class="fa-solid fa-calendar mx-2"></i> 
                    <spam><?php echo $row['store_table_name']; ?></spam>
                </p>
            <?php endforeach; ?>
        </div>
        <div class="col-md-6 border">
            <div class="text-center   appand_data">
                <h4 class=" mt-5">Select Any One Of the To Get the Data of the Event</h4>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.store-table', function () {
        var storeName = $(this).data('table-name');

        $.ajax({
            url: '<?php echo base_url(); ?>Attendance/Event/getTableNames',
            type: 'POST',
            data: { prefix: storeName },
            dataType: 'json',
            success: function (response) {
                 if (response.status === 'success') {
                    console.log('Matching Tables:', response.message);
                    // Append the matching tables to the .text-center element
                    $('.appand_data').html('');
                       $.each(response.message, function(index, tableName) {
                        $('.appand_data').append('<p  style="margin:20px"><spam style="padding:10px;border: 1px solid;cursor: pointer;" class="table_name"> ' + tableName + '</spam></p>');
                    });
                } else {
                    console.error('Error:', response.message);
                }
            },
            error: function (error) {
                console.error('AJAX Error:', error);
            }
        });
        
        
    });
    
//     $(document).on('click', '.table_name', function () {
//     var tableName = $(this).text();

//     $.ajax({
//         url: '<?php echo base_url(); ?>Attendance/Event/dowaloadoldtable',
//         type: 'POST',
//         data: { table_name: tableName },
//         dataType: 'json',
//         success: function (response) {
//             if (response.status === 'success') {
//                 // Initiate the file download using the returned data
//                 downloadFile(response.data, 'EventData.csv');
//             } else {
//                 console.error('Error:', response.message);
//             }
//         },
//         error: function (error) {
//             console.error('AJAX Error:', error);
//         }
//     });
// });
// function downloadFile(data, fileName) {
//     // Convert JSON data to CSV string
//     var csvContent = 'data:text/csv;charset=utf-8,' + Papa.unparse(data);

//     // Create a Blob object from the CSV string
//     var blob = new Blob([csvContent], { type: 'text/csv' });

//     // Create a link element
//     var link = document.createElement('a');

//     // Set the download attribute and href to the Blob
//     link.download = fileName;
//     link.href = window.URL.createObjectURL(blob);

//     // Append the link to the document and trigger the click event
//     document.body.appendChild(link);
//     link.click();

//     // Remove the link from the document
//     document.body.removeChild(link);
// }
</script>
