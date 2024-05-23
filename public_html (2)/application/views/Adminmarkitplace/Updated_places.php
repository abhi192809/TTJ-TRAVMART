<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="my-3"><span style="border-bottom:1px solid black">Update Places</span></h4>
        </div>
        <div class="col-md-11 mt-3 mb-3">
            <select id="select_value" class="form-select">
                <option>Select an option</option>
                <?php foreach ($City as $value): ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-1 mt-3 mb-3">
            <button class="btn text-white" style="background:dimgrey" id="Go">GO</button>
        </div>
        <div class="col-md-3 mt-3 mb-3">
            <button class="btn text-white" style="background:dimgrey" id="save_data">Update Places</button>
        </div>
        <div class="col-md-12">
            <div class="row appandvalue">
                <?php foreach ($place as $row): ?>
                    <div class="col-md-4">
                        <a href="<?php echo base_url();?>Admin/Updateplaces/place/<?php echo  $row['City_filter']?>" style="color:#696969;">
                            <div class="row m-2 box_show">
                            <p class="m-0 p-0 hover_link_show" style="color:#696969;">
                                <i class="fa fa-external-link link" data-meta="<?= base_url() . 'place/' . ($row['Country_id'] == '1' ? 'india' : 'International') . '/' . $row['City_filter'] ?>"></i>
                            </p>
                            <div class="col-md-4">
                                <picture>
                                    <img src="<?= base_url() . 'assets/marketplace/' . $row['Main_image'] ?>" width="100%" height="80px">
                                </picture>
                            </div>
                            <div class="col-md-8">
                                    <h4 class="mt-4"><?= ucfirst($row['City_filter']) ?></h4>
                            </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $(".link").on("click", function (event) {
            event.preventDefault();
            var data = $(this).data("meta");
            window.open(data, '_blank');
        });
    });
</script>
