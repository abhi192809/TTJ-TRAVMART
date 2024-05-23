<div class="container-fluid">
    <div class="row">
        <?php foreach ($UploadExel as $row): ?>
            <div class="col-md-4">
                <span>Name: <?php echo $row['Exel_Name']; ?></span><br>
                <span>Date: <?php echo $row['Event_Date']; ?></span><br>
                <?php if ($row['Upload_Exel_File'] != NULL): ?>
                    <?php
                        $excelFileUrl = base_url('assets/EventExelFile/' . $row['Upload_Exel_File']);
                        $iframeSrc = 'https://view.officeapps.live.com/op/embed.aspx?src=' . urlencode($excelFileUrl);
                    ?>
                    <iframe src="<?php echo $iframeSrc; ?>" width="100%" height="500px" frameborder="0"></iframe>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
