
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Time_to_in</th>
            <th>Time_to_go</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($attendance_data as $data):
            if (md5(strtolower($data['Name'])) == $get):

                        ?>
                        <tr>
                            <td><?php echo   strtolower( $data['Name']); ?></td>
                            <td><?php echo    $data['Time_to_in']; ?></td>
                            <td><?php echo   $data['Time_to_go']; ?></td>
                            <td><?php echo $data['Date'] ?></td>
                        </tr>
                    <?php
            endif;
        endforeach;
        ?>

    </tbody>
</table>

