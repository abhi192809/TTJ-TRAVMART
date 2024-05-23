 <style>
    .modal-dialog {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .modal-lg {
      max-width: 96%;
    }
    .modal-content {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .2);
    border-radius: .3rem;
    outline: 0;
    
}
.custom-switch1 {
    padding-left: 3.25rem;
    margin: 20px;
    padding-top: 1rem;
    padding-bottom: 1rem;
    border: 1px solid black;
    
}
.ok{
   position: absolute;
    cursor: pointer;
    right: -5px;
    color: cornflowerblue;
    padding: 0px 6px;
    font-size: 8px;
    border: 1px solid;
    border-radius: 30px;
    padding-top: 2px;
    top: -4px;
}
    
}
  </style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="row" style="align-items:center">
            <div class="col-md-8">
            
            <h4 >Add Destination That Your do </h4>
            
            </div>
            <div class="col-md-4 text-end">
            <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Add Places</button>
                
            </div>
            <hr>
             
            </div>
            <div class="row mt-4">
                <?php
                foreach($success as $row){?>
                    <div class="col-md-6 col-sm-4 col-6 p-2 border" style="position: relative;">
                        <div class="custom-control custom-switch  pt-2">
                            <span class="ok"  data-id="<?= $row->ID ?>">X</span>
                            <input type="checkbox" class="custom-control-input chackbox_entry" checked>
                            <label class="custom-control-label" for="customSwitch"> <?= $row->city_name ?></label>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-6 p-3" style="background:white">
            <h4>Filter Lead For the place your got </h4>
            <div class="row mt-4">
                <div class="col-md-6">
                    <span style="font-size:20px">Delhi</span><span>- 20</span>
                </div>
                 <div class="col-md-6">
                    <span style="font-size:20px">Noida</span><span>- 20</span>
                </div>
                 <div class="col-md-6">
                    <span style="font-size:20px">Agra</span><span>- 20</span>
                </div>
                 <div class="col-md-6">
                    <span style="font-size:20px">Allahabad</span><span>- 20</span>
                </div>
                 <div class="col-md-6">
                    <span style="font-size:20px">ANKARA</span><span>- 20</span>
                </div>
                 <div class="col-md-6">
                    <span style="font-size:20px">Anshan</span><span>- 20</span>
                </div>
                 <div class="col-md-6">
                    <span style="font-size:20px">Baku</span><span>- 20</span>
                </div>
                 <div class="col-md-6">
                    <span style="font-size:20px">BANGKOK</span><span>- 20</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade  slide-down" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Places</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <!-- Add your content for the popup here -->
        <!-- For example: -->
        
              <div class="row">
                  <div class="col-md-12">
                      <lable>Select  The Country <span>*</span></lable>
                      <select id="countrySelect" class="form-control">
                          <option>Select The Country</option>
                          <?php foreach($Lead_country_name as $row):?>
                          <option class="<?=  $row->country_name ?>"><?=  $row->country_name ?></option>
                          <?php endforeach;?>
                      </select>
                  </div>
                  <div class="col-md-12">
                      <div style="height:500px;overflow: scroll;">
                          
                      
                      <div class="row" id="city_add">
                         
                      </div>
                      
                      </div>
                  </div>
              </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- You can add additional buttons or actions here -->
        <!-- For example: -->
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">Save Changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function(){
    $('#countrySelect').on('change', function() {
        var country_name = $(this).val();
        $.ajax({
            url: '<?= base_url();?>Meeting/Selleruser/Lead/Get_city_name', 
            type: 'POST',
            dataType: 'json',
            data: {
                'country_name': country_name,
            },
            success: function(data) {
                $('#city_add').empty(); // Clear existing options
                $.each(data.city_name, function(index, value) {
                    var checkboxHtml = '<div class="col-md-2 col-sm-4 col-6">' +
                                          '<div class="custom-control custom-switch">' +
                                              '<input type="checkbox" class="custom-control-input chackbox_entry" data-id="'+ value.id +'" id="customSwitch' + index + '" value="' + value.city_name + '" >' +
                                              '<label class="custom-control-label" for="customSwitch' + index + '">' + value.city_name + '</label>' +
                                          '</div>' +
                                       '</div>';
                    $('#city_add').append(checkboxHtml);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    
        $(document).on('click', '.chackbox_entry', function(){
            var checkbox = $(this);
            if (checkbox.prop('checked')) { // Check if checkbox is checked
                var id = checkbox.data('id');
                console.log(id);
                $.ajax({
                    url: '<?= base_url();?>Meeting/Selleruser/Lead/Add_Seller_chackbox', 
                    type: 'POST',
                    data: {
                        'id': id,
                    },
                    success: function(data) {
                        // Handle success response
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

 $('.btn-primary').on('click', function() {
        // Show the success pop-up using SweetAlert2 plugin
        Swal.fire({
            icon: 'success',
            title: 'Changes Saved Successfully',
            showConfirmButton: false,
            timer: 1500
        });
        
              setTimeout(function() {
                    location.reload();
                }, 1500);
    });
    
     $('.ok').on('click', function() {
    var remove =  $(this);
    var get_id = remove.data("id");
    $.ajax({
        url: '<?= base_url();?>Meeting/Selleruser/Lead/Remove_Seller_chackbox', 
        type: 'POST',
        data: {
            'id': get_id ,
        },
        success: function(data) {
             Swal.fire({
                    icon: 'success',
                    title: 'Checkbox Removed Successfully',
                    showConfirmButton: false,
                    timer: 1500
                });
                // Reload the page after 1.5 seconds
                setTimeout(function() {
                    location.reload();
                }, 1500);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });      
});   

    
   
    
});
</script>

