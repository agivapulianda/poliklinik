<div class="content-wrapper">
    <section class="content">
        <?php foreach($jadwal_poli as $jdw_pl)  ?>

        <form action="<?php echo base_url().'poliklinik/update_jadwal'?>" method="POST">
            <div class="from-group">
                <label>Nama Poliklinik</label>
                <input type="hidden" name="id_jadwal" class="form-control"
                    value="<?php echo $jdw_pl->id_jadwal ?> ">
                <input type="text" name="id_poli" class="form-control"
                    value="<?php echo $jdw_pl->id_poli ?>" required >
            </div>
            <div class="from-group">
                <label>Nomor Dokter</label>
                <input type="text" name="id_dokter" class="form-control"
                    value="<?php echo $jdw_pl->id_dokter ?>" required>
            </div>
            <div class="from-group">
                <label>Perawat</label>
                <input type="text" name="id_perawat" class="form-control"
                    value="<?php echo $jdw_pl->id_perawat ?>"required>
            </div>
            <div class="from-group">
                <label>Hari</label>
                <input type="text" name="hari" class="form-control"
                    value="<?php echo $jdw_pl->hari ?>"required>
            </div>
            <div class="from-group">
                <label>Jam</label>
                <input type="time" name="hari" class="form-control"
                    value="<?php echo $jdw_pl->hari ?>"required>
            </div>
            
                <button type="reset" class="btn btn-danger mt-3">Reset</button>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>          
    
        </form>
        

    </section>
</div>