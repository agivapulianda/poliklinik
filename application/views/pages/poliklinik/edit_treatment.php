<div class="content-wrapper">
    <section class="content">
        <?php foreach($treatment as $trmnt)  ?>

        <form action="<?php echo base_url().'poliklinik/update_treatment'?>" method="POST">
            <div class="from-group">
                <label>Nama Treatment</label>
                <input type="hidden" name="id_treatment" class="form-control"
                    value="<?php echo $trmnt->id_treatment ?> ">
                <input type="text" name="treatment" class="form-control"
                    value="<?php echo $trmnt->treatment ?>" required >
            </div>
            
                <button type="reset" class="btn btn-danger mt-3">Reset</button>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>          
    
        </form>
        

    </section>
</div>