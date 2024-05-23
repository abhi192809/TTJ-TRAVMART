<style>
        .set_desion {
        border: 1px solid;
        padding: 20px;
        height: 141px;
        margin: 20px;
        border-radius: 20px;
    }

    .colour_change1{
        
        background: #fd7e14;
        color: white;
        font-size: 29px;
    }

    .colour_change2{
        
        background: var(--bs-purple);
        color: white;
        font-size: 29px;
    }

    .colour_change3{
        
        background: #20c997;
        color: white;
        font-size: 29px;
    }

    .colour_change4{
        
        background: #6c757d;
        color: white;
        font-size: 29px;
        
    }

h1, h2, h3, h4, h5, h6 {
    font-family: "Segoe UI", Arial, sans-serif;
    font-weight: 400;
    margin: 0px 0;
}

}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="set_desion colour_change1">
                <h2>Name</h2>
          <p><?php 
    $adminSession = $this->session->userdata('user_data'); 
    $username = $adminSession['username']; 
    $username = ucfirst(strtolower(preg_replace('/@.*/', '', $username))); // Convert first letter to uppercase and remove data after '@'
    echo $username; 
?></p>

            </div>
        </div>
        <div class="col-md-3">
            <div class="set_desion colour_change2">
                <h4>Total Leaves</h4>
                <small style="font-size: 9px;">Starting to know All Leaves</small>
                <?php
                $totalLeaves = 0;
                foreach ($leaves as $leave) {
                    if ($leave['Name'] == $username) {
                        $totalLeaves++;
                    }
                }
                ?>
                <p><?= $totalLeaves ?></p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="set_desion colour_change3">
                <h4>This Month Leaves</h4>
                <small style="font-size: 9px;">(this) Month Leaves</small>
                <?php
                $currentMonthLeaves = 0;
                $currentMonth = date('m');
                foreach ($leaves as $leave) {
                    $leaveMonth = date('m', strtotime($leave['Date'])); 
                    if ($leave['Name'] == $username && $leaveMonth == $currentMonth) {
                        $currentMonthLeaves++;
                    }
                }
                ?>
                <p><?= $currentMonthLeaves ?></p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="set_desion colour_change4">
                <h4>Working Days </h4>
                <small style="font-size: 9px;"> It depand Work Report That you Submit </small>
                <p><?php echo count($Comeing_data); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h4 class="mx-2 mb-2">Active Leaves</h4>
    <div class="row mx-2">
        <table class="table-bordered text-center">
            <tr class="bg-dark text-white">
                <td>No.</td>
                <td>Name</td>
                <td>Subject</td>
                <td>Leaves Status</td>
            </tr>
            <?php foreach ($leaves as $index => $leave): ?>
                <?php
                    $adminSession = $this->session->userdata('user_data');
                    $username = $adminSession['username'];
                    $statusClass = ($leave['Status'] == 1) ? 'btn-danger' : 'btn-success';
                ?>
                <?php if ($leave['Name'] == $username): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $leave['Name'] ?></td>
                        <td><?= $leave['Subject'] ?></td>
                        <td><p class="btn <?= $statusClass ?> mt-3"><?= ($leave['Status'] == 1) ? 'Processing' : 'Approved' ?></p></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="container-fluid">
    <h4 class="mx-2 my-4">Latest Leave</h4>
    <div class="row mx-2">
        <table class="table-bordered text-center">
            <tr class="bg-dark text-white">
                <td>No.</td>
                <td>Name</td>
                <td>Subject</td>
                <td>Leaves Status</td>
            </tr>
            <?php if (!empty($leaves)): ?>
                <?php $latestLeave = reset($leaves); ?>
                <?php $adminSession = $this->session->userdata('user_data'); ?>
                <?php $username = $adminSession['username']; ?>
                <?php $statusClass = ($latestLeave['Status'] == 1) ? 'btn-danger' : 'btn-success'; ?>
                <?php if ($latestLeave['Name'] == $username): ?>
                    <tr>
                        <td>1</td>
                        <td><?= $latestLeave['Name'] ?></td>
                        <td><?= $latestLeave['Subject'] ?></td>
                        <td><p class="btn <?= $statusClass ?> mt-3"><?= ($latestLeave['Status'] == 1) ? 'Processing' : 'Approved' ?></p></td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

