    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" media="screen">

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- jquery datatable js -->
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <h1>Data Karyawan</h1>

    <button data-bs-toggle="modal" data-bs-target="#modal-karyawan" class="btn btn-flat btn-sm btn-primary">Tambah Karyawan</button>

    <table id="table-karyawan" class="table table-responsive display">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Opsi</th>
            </tr>
        </tfoot>
    </table>
    <div id="modal-karyawan" class="modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Form Karyawan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="form-karyawan" method="post">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Karyawan</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="budi" required="1">
              </div>
              <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required="1">
              </div>
              <div class="mb-3">
                  <label for="jk" class="form-label">Jenis Kelamin</label>
                  <select id="jk" name="jk" required="1" class="form-control">
                      <option value="" disabled="1" selected="1">Pilih Jenis Kelamin</option>
                      <option value="1">Laki-laki</option>
                      <option value="0">Perempuan</option>
                  </select>
              </div>
              <button type="submit" id="sbtkaryawan" hidden="1"></button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="$('#sbtkaryawan').click()">Save changes</button>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        let table;
        table = $("#table-karyawan").DataTable({
            responsive: true,
            ajax: {
                url: "<?= site_url('karyawan/datatable');?>"
            }
        });

        $("#form-karyawan").submit(function(event) {
            event.preventDefault();
            if (confirm("Apakah data yang diinput sudah benar ?")) {
                $.post('<?= base_url('karyawan/save');?>', $(this).serialize()).done((res,status,xhr) => {
                if (xhr.status == 200 && res.status) {
                    console.log("Berhasil")
                }
            }).fail((xhr,status,err) => {
                if (xhr.status == 400) {
                    alert("Bad request")
                } else if (xhr.status == 404) {
                    alert("Not found");
                }
            })
            }
        });

        table = $("#table-karyawan").on('click', '#edit', function(event) {
            event.preventDefault();
            let id = $(this).data('id');
        });

        table = $("#table-karyawan").on('click', '#delete', function(event) {
            event.preventDefault();
            let id = $(this).data('id');
        });
    });
</script>