const hapus = async (el) => {
  const id = [...$(el).html().split('||')];
  console.log(id[1]);
  const response = await fetch('/Api/TiketApi/deleteApi.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: id[1],
  }).then((res) => res);
  const data = await response.json();
  if (data.status == 'ok') {
    tata.success('SUKSES', 'Berhasil menghapus data');
    console.log(data);
    window.location.reload();
  } else {
    return tata.success('GAGAL', 'Gagal menghapus data');
  }
};
