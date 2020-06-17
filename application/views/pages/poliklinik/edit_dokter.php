<div class="content-wrapper">
    <section class="content">
        <?php foreach($dokter_poli as $dr_pl)  ?>

        <form action="<?php echo base_url().'poliklinik/update_dokter'?>" method="POST">
            <div class="from-group">
                <label>Nama Dokter</label>
                <input type="hidden" name="id_dokter" class="form-control"
                    value="<?php echo $dr_pl->id_dokter ?> ">
                <input type="text" name="nama_dok" class="form-control"
                    value="<?php echo $dr_pl->nama_dok ?>" required >
            </div>
            <div class="from-group">
                <label>Nomor Telepon</label>
                <input type="text" name="no_telp" class="form-control"
                    value="<?php echo $dr_pl->no_telp ?>" required>
            </div>
            <div class="from-group">
                <label>Spesialis</label>
                <input type="text" name="spesialis" class="form-control"
                    value="<?php echo $dr_pl->spesialis ?>"required>
            </div>
            <div class="from-group">
                <label>Status</label>
                <input type="text" name="status" class="form-control"
                    value="<?php echo $dr_pl->status ?>"required>
            </div>
            
                <button type="reset" class="btn btn-danger mt-3">Reset</button>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>          
    
        </form>
        

    </section>
</div>