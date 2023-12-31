<!-- Modal -->
<div class="modal fade" id="TambahDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method='POST'>
                @csrf
				        <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" name='name' id="name" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-3">
                          <label for="nomor_induk" class="form-label">Nomor Induk</label>
                          <input type="text" name="nomor_induk" id="nomor_induk" placeholder="Masukkan Nomor Induk" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Masukkan Email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label for="phone" class="form-label">No. HP</label>
                          <input type="text" name="phone" id="phone" placeholder="Masukkan No. HP" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label for="address" class="form-label">Alamat</label>
                          <input type="text" name="address" id="address" placeholder="Masukkan Alamat" class="form-control" required>
                        </div>
                    </div>
                    

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                </div>
            </form>
          
        </div>
      </div>
    </div>
  </div>
