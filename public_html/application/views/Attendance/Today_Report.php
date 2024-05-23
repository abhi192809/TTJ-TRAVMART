<!-- Today_Report.php -->
<div class="container-fluid">
    <div class="row">
         <h4 class="mt-3"> Today Attendance</h4>
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered" style="width: 150%;">
            <thead>
                <tr class="text-center">
                    <th>So.NO</th>
                    <th>Date</th>
                    <th>User Mail</th>
                    <th>Time to in</th>
                    <th>Time to go</th>
                </tr>
            </thead>
            <tbody>
                <?php $i='1'; foreach ($today as $record): if('Admin' != $record['Name'] ){?>
                    <tr class="text-center">
                        <td><?= $i ?></td>
                        <td><?= $record['Date']; ?></td>
                        <td><?= $record['Name']; ?></td>
                        <td><?= $record['Time_to_in']; ?></td>
                        <td><?= $record['Time_to_go']; ?></td>
                    </tr>
                <?php $i++;} endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container">
    <h3 class="mb-4">Attendance Leaves</h3>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th data-field="Name" data-sortable="true">Name</th>
            <th data-field="Subject" data-sortable="true">Subject</th>
            <th data-field="Date" data-sortable="true">Date</th>
            <th data-field="Status" data-sortable="true">Status</th>
        </tr>
    </thead>
    <tbody>
       <?php foreach ($Leaves as $row): ?>
                <?php if ($row['Name'] == $this->session->userdata('user_data')['username']): ?>
                    <tr>
                        <td><?= $row['Name']; ?></td>
                        <td><?= $row['Subject']; ?></td>
                        <td><?= $row['Date']; ?></td>
                        <td>
                            <?php
                            switch ($row['Status']) {
                                case 1:
                                    echo "<p>Approved</p>";
                                    break;
                                case 0:
                                    echo "<p>Non Approved</p>";
                                    break;
                                case 2:
                                    echo "<p>Processing Your Request</p>";
                                    break;
                                default:
                                    echo "<p>Status Unknown</p>";
                            }
                            ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
    </tbody>
</table>

</div>