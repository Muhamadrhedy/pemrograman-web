$(document).ready(function () {

  $('#formBiodata').on('submit', function (event) {
    // Mencegah reload halaman
    event.preventDefault();

    // Reset status error
    resetError();

    let isValid = true;

    // 1. Validasi Nama
    let nama = $('#nama').val().trim();
    if (nama === '') {
      showError('#nama', '#errNama', 'Nama wajib diisi!');
      isValid = false;
    }

    // 2. Validasi NIM
    let nim = $('#nim').val().trim();
    if (nim === '') {
      showError('#nim', '#errNim', 'NIM wajib diisi!');
      isValid = false;
    }

    // 3. Validasi Program Studi
    let prodi = $('#prodi').val();
    if (prodi === '') {
      showError('#prodi', '#errProdi', 'Pilih salah satu Program Studi!');
      isValid = false;
    }

    // 4. Validasi Jenis Kelamin
    let gender = $('input[name="gender"]:checked').val();
    if (!gender) {
      showError('#genderContainer', '#errGender', 'Pilih jenis kelamin!');
      isValid = false;
    }

    // Jika semua validasi berhasil
    if (isValid) {
      alert("Data Berhasil Disimpan!\n\n" +
            "Nama: " + nama + "\n" +
            "NIM: " + nim + "\n" +
            "Prodi: " + prodi + "\n" +
            "Jenis Kelamin: " + gender);

      // Reset form
      $('#formBiodata')[0].reset();
    }
  });

  // Fungsi pembantu untuk menampilkan indikator error
  function showError(elementSelector, errorSelector, message) {
    $(elementSelector).addClass('is-invalid');
    $(errorSelector).text(message).hide().fadeIn('fast');
  }

  // Fungsi pembantu untuk mereset seluruh indikator error
  function resetError() {
    $('.is-invalid').removeClass('is-invalid');
    $('.error-msg').text('');
  }

});