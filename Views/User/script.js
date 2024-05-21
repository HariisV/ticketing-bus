const simpan = async (el) => {
  const baris = $(el).closest('tr')[0].innerText.split('\t');
  const id = baris[0];
  const nama = baris[1];
  const email = baris[2];
  const password = baris[3];
  const role = baris[4];
  const dataBody = [id, nama, email, password, role];
  const response = await fetch('/Api/UserApi/insertApi.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: dataBody,
  }).then((res) => res);
  const data = await response.json();
  if (data.status == 'ok') {
    tata.success('SUKSES', 'Berhasil menyimpan data');
    console.log(data.data);
    if (data.data.type == 'insert') {
      const id = $(el).closest('tr').find('td:first-child');
      id.html(data.data.id);
    }
  } else {
    return tata.success('GAGAL', 'Gagal menghapus data');
  }
};

const hapus = async (el) => {
  const baris = $(el).closest('tr')[0].innerText.split('\t');
  const rowRemove = el.closest('tr');
  const id = baris[0];
  const dataBody = [id];
  const response = await fetch('/Api/UserApi/deleteApi.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: dataBody,
  }).then((res) => res);
  const data = await response.json();
  if (data.status == 'ok') {
    tata.success('SUKSES', 'Berhasil menghapus data');
    rowRemove.remove();
    return console.log(data);
  } else {
    return tata.success('GAGAL', 'Gagal menghapus data');
  }
};

const tambah = () => {
  const tr = `
    <tr>
                <td> <?php echo $item['id_user'] ?></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="btn-group">
                    <button onclick="simpan(this)" class="btn btn-info">simpan</button>
                    <button onclick="hapus(this)" class="btn btn-danger">hapus</button>
                </td>
            </tr>
    `;
  const tabel = document.querySelector('#tabel-user');
  tabel.insertAdjacentHTML('beforeend', tr);
};
