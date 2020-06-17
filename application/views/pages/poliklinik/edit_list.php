<div class="content-wrapper">
    <section class="content">
        <?php foreach($list_poli as $ls_pl)  ?>

        <form action="<?php echo base_url().'poliklinik/update_list'?>" method="POST">
            <div class="from-group">
                <label>Nama Poliklinik</label>
                <input type="hidden" name="id_poli" class="form-control"
                    value="<?php echo $ls_pl->id_poli ?> ">
                <input type="text" name="nama_voli" class="form-control"
                    value="<?php echo $ls_pl->nama_voli ?>" required >
            </div>
            <div class="from-group">
                <label>Ruangan</label>
                <input type="text" name="ruangan" class="form-control"
                    value="<?php echo $ls_pl->ruangan ?>" required>
            </div>
            <div class="from-group">
                <label>Type</label>
                <input type="text" name="type" class="form-control"
                    value="<?php echo $ls_pl->type ?>"required>
            </div>
            
                <button type="reset" class="btn btn-danger mt-3">Reset</button>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>          
    
        </form>
        

    </section>
</div>