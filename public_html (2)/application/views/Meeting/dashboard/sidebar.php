<?php
// PHP logic to determine the last segment of the URI
$last_segment = $this->uri->segment($this->uri->total_segments());
?>

<style>
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-toggle {
      padding: 10px;
      cursor: pointer;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-menu a {
      padding: 12px;
      display: block;
      text-decoration: none;
      color: #333;
    }
    .topbar {
    height: 4rem;
    }
    
    .sidebar .sidebar-brand {
    height: 4rem;
    text-decoration: none;
    font-size: 1rem;
    font-weight: 800;
    padding: 1.5rem 1rem;
    text-align: center;
    letter-spacing: 0.05rem;
    z-index: 1;
}
/*     .active {*/
/*    font-weight: 700;*/
/*    color:red;*/
/*    background:white;*/
/*}*/

/*.nav-link .nav-link span{*/
/*    color:red;*/
/*}*/
  </style>

<!-- Sidebar -->
<ul class="omp-sidebar-icon navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <picture>
                <source>
                    <img class="d-inline-block mx-2 logo-1" src="<?= base_url('assets/Meeting/Company_Master/Logo_2.png')?>" alt="TTJ Logo" aria-label="Logo">
                </source>                    
            </picture>       
        </div>
    </a>
    <hr class="sidebar-divider my-0">
     <li class="nav-item <?php echo ($last_segment == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('Meeting/Admin/dashboard'); ?>">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    
    
    <li class="nav-item">
    <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseForm03" aria-expanded="true" aria-controls="collapseForm">
        <i class="fab fa-wpforms"></i> 
        <span>Live Event</span>
    </a>
    <div id="collapseForm03" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Buyer/Live_Buyer_data'); ?>">
                <i class="fab fa-sellcast"></i> 
                 Buyers
            </a> 
           
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Seller/Live_Seller_data'); ?>">
                <i class="fab fa-sellcast"></i>
                Sellers
            </a>
            
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Event/Report'); ?>">
                <i class="fab fa-sellcast"></i> 
                Report
            </a>
        </div>
     </div>
   </li>
  
    
    <li class="nav-item">
    <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseForm3" aria-expanded="true" aria-controls="collapseForm">
        <i class="fab fa-wpforms"></i> <!-- Icon for the collapsed menu item -->
        <span>Events Setup</span>
    </a>
    <div id="collapseForm3" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Event/EventCreat'); ?>">
                <i class="fab fa-sellcast"></i> <!-- Icon for Seller Form -->
                Next Events
            </a> 
           
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Event/OldEvent'); ?>">
                <i class="fab fa-sellcast"></i> <!-- Icon for Seller Form -->
                 Previous Event
            </a>    
        </div>
     </div>
   </li>
  
    
    
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm4" aria-expanded="true" aria-controls="collapseForm">
        <i class="fab fa-wpforms"></i> <!-- Icon for the collapsed menu item -->
        <span>Book event</span>
    </a>
    <div id="collapseForm4" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Event_Book/event_permission '); ?>">
                <i class="fab fa-sellcast"></i> <!-- Icon for Seller Form -->
               Event permission 
            </a> 
        
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Seller/seller_register_data'); ?>">
               <i class="fab fa-wpforms"></i>
               <span>Future Event Seller</span>
            </a>
        </div>
     </div>
   </li>
     <li class="nav-item">
    <a class="nav-link collapsed active" href="<?= base_url('Meeting/Admin/seller/seller_data_view'); ?>" data-toggle="collapse" data-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
        <i class="fab fa-wpforms"></i>
        <span> Seller</span>
    </a>
    
    <div id="collapseForm" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/seller/seller_data_view'); ?>">
                <i class="fab fa-sellcast"></i>
                Seller List
            </a>
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Seller/Seller_request'); ?>">
                <i class="fab fa-sellcast"></i>
                Seller Request
            </a>
        </div>
     </div>
 </li>
 


    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm1" aria-expanded="true" aria-controls="collapseForm">
        <i class="fab fa-wpforms"></i> <!-- Icon for the collapsed menu item -->
        <span>Buyer</span>
    </a>
    <div id="collapseForm1" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!--<a class="collapse-item" href="<?= base_url('Meeting/Admin/buyer'); ?>">-->
            <!--    <i class="fab fa-sellcast"></i> <!-- Icon for Seller Form -->
            <!--</a>-->
             <a class="collapse-item" href="<?= base_url('Meeting/Admin/buyer/buyer_ragistation_appreal_request'); ?>">
                <i class="fab fa-sellcast"></i> <!-- Icon for Seller Data -->
                Buyer Request 
            </a>
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/buyer/buyer_data_view'); ?>">
                <i class="fab fa-sellcast"></i> <!-- Icon for Seller Data -->
                Buyer Pre-Registration
            </a>
            
          
             <a class="collapse-item" href="<?= base_url('Meeting/Admin/buyer/buyer_data_old_Event'); ?>">
                <i class="fab fa-sellcast"></i> <!-- Icon for Seller Data -->
                  Active Buyer List
            </a>
        </div>
     </div>
   </li>
   

    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm10" aria-expanded="true" aria-controls="collapseForm">
        <i class="fab fa-wpforms"></i> <!-- Icon for the collapsed menu item -->
        <span>Lead</span>
    </a>
    <div id="collapseForm10" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Lead/lead_seller_data'); ?>">
                <i class="fab fa-sellcast"></i> <!-- Icon for Seller Data -->
                  lead Data
            </a>
           
        </div>
     </div>
   </li>  
   
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Meeting/Admin/Enquiry'); ?>">
            <i class="fas fa-sign-in-alt"></i>
            <span>Enquiry</span>
        </a>
    </li>
    
    
     <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Meeting/Admin/Club_TTJ'); ?>">
            <i class="fas fa-sign-in-alt"></i>
            <span>Club TTJ</span>
        </a>
    </li>
    

    

   
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm5" aria-expanded="true" aria-controls="collapseForm">
        <i class="fab fa-wpforms"></i> <!-- Icon for the collapsed menu item -->
        <span>Meeting</span>
    </a>
    <div id="collapseForm5" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Meeting_Data/Seller_Active_event_meeting'); ?>">
                <i class="fab fa-sellcast"></i> <!-- Icon for Seller Form -->
                Active Event Meeting
            </a>
        </div>
     </div>
   </li>
   
   
   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm7" aria-expanded="true" aria-controls="collapseForm">
        <i class="fab fa-wpforms"></i> <!-- Icon for the collapsed menu item -->
        <span>Market Place Destination</span>
    </a>
    <div id="collapseForm7" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url()?>Meeting/Admin/Destionation">
                <i class="fab fa-sellcast"></i>
                Destionation
            </a>
            <a class="collapse-item" href="<?php echo base_url()?>Meeting/Admin/Destionation/VisitorAttraction">
                <i class="fab fa-sellcast"></i>
                Visitor Attraction
            </a>
            <a class="collapse-item" href="<?php echo base_url()?>Meeting/Admin/Destionation/Air_Connectivity">
                <i class="fab fa-sellcast"></i>
                Air Connectivity
            </a>
            
            <a class="collapse-item" href="<?php echo base_url()?>Meeting/Admin/Destionation/Food">
                <i class="fab fa-sellcast"></i>
                Food
            </a>
        </div>
     </div>
   </li>
   
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm8" aria-expanded="true" aria-controls="collapseForm">
        <i class="fab fa-wpforms"></i> <!-- Icon for the collapsed menu item -->
        <span>Master</span>
    </a>
    <div id="collapseForm8" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Settings/City_Master'); ?>">
                <i class="fab fa-sellcast"></i> 
                City Master
            </a>
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Settings/Nature_of_Business'); ?>">
                <i class="fab fa-sellcast"></i> 
                Nature of Business
            </a>
            
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Settings/Business_Category'); ?>">
                <i class="fab fa-sellcast"></i> 
                Business Category
            </a>
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Settings/Company_Master'); ?>">
                <i class="fab fa-sellcast"></i> 
                Company Master
            </a>
        </div>
     </div>
   </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm9" aria-expanded="true" aria-controls="collapseForm">
            <i class="fab fa-wpforms"></i> <!-- Icon for the collapsed menu item -->
            <span>Payment</span>
        </a>
        <div id="collapseForm9" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('Meeting/Admin/Receipt/Seller_Receipt'); ?>">
                    <i class="fab fa-sellcast"></i> 
                     Seller Payment
                </a>
            
            </div>
         </div>
       </li>
  
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm10" aria-expanded="true" aria-controls="collapseForm">
        <i class="fab fa-wpforms"></i> <!-- Icon for the collapsed menu item -->
        <span>Setting</span>
    </a>
    <div id="collapseForm10" class="dropdown-icon collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('Meeting/Admin/Settings/User'); ?>">
                <i class="fab fa-sellcast"></i> <!-- Icon for Seller Form -->
                User
            </a>
           <a class="collapse-item" href="<?= base_url('Meeting/Admin/Settings/Subscription'); ?>">
                <i class="fab fa-sellcast"></i> <!-- Icon for Seller Form -->
                Subscription
            </a>
        </div>
     </div>
   </li>


 
    
</ul>
<!-- Sidebar ----end---->



