$('.form_pesan').submit(function (e) {
  return false;
});

const pesan = async () => {
  let id_bus = $('select.bus').val();
  let nama_pemesan = $('input.nama').val();
  let jml_bangku = $('select.jml_bangku').val();
  let kelas = $('select.kelas').val();
  let biaya = $('.biaya').html();
  let waktu_brngkt = $('.waktu_brngkt').html();
  const databody = [
    id_bus,
    nama_pemesan,
    jml_bangku,
    kelas,
    biaya,
    waktu_brngkt,
  ];

  const response = await fetch('/Api/PesanApi/insertApi.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: [databody],
  }).then((res) => res);
  const data = await response.json();
  if (data.data.sukses == 'ok') {
    alert('Berhasil memesan tiket');
  }
};

const getWaktuBerangkat = async (el) => {
  $('.waktu_brngkt').html('');
  const response = await fetch('/Api/PesanApi/waktuBerangkatApi.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: [el.value],
  }).then((res) => res);
  const data = await response.json();
  if (data.status == 'ok') {
    $('.waktu_brngkt').html(data.data.data.waktu_brngkt);
    $('.biaya').html(data.data.data.ongkos);
  }
};

const handleKelas = async (el) => {
  const response = await fetch('/Api/PesanApi/waktuBerangkatApi.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: [$('select.bus').val()],
  }).then((res) => res);
  const data = await response.json();
  if (data.status == 'ok') {
    let biaya = [...data.data.data.ongkos.split('Rp ')];
    if ($('select.kelas').val() == 'Premium') {
      let total = parseInt(biaya[1]) + 10;
      return $('.biaya').html('Rp ' + total.toFixed(3));
    }
    return $('.biaya').html(data.data.data.ongkos);
  }
};
