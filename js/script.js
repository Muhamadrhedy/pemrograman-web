document.getElementById("formBiodata").addEventListener("submit", function (event) {
  // Menghentikan submit default agar halaman tidak reload
  event.preventDefault();

  // Reset tampilan error sebelum pengecekan
  resetError();

  let isValid = true;

  // 1. Validasi Nama
  let nama = document.getElementById("nama");
  if (nama.value.trim() === "") {
    showError(nama, "errNama", "Nama wajib diisi!");
    isValid = false;
  }

  // 2. Validasi NIM
  let nim = document.getElementById("nim");
  if (nim.value.trim() === "") {
    showError(nim, "errNim", "NIM wajib diisi!");
    isValid = false;
  }

  // 3. Validasi Program Studi
  let prodi = document.getElementById("prodi");
  if (prodi.value === "") {
    showError(prodi, "errProdi", "Pilih salah satu Program Studi!");
    isValid = false;
  }

  // 4. Validasi Jenis Kelamin (Radio Button)
  let gender = document.querySelector('input[name="gender"]:checked');
  let genderContainer = document.getElementById("genderContainer");
  if (!gender) {
    showError(genderContainer, "errGender", "Pilih jenis kelamin!");
    isValid = false;
  }

  // Jika semua input terisi dengan benar
  if (isValid) {
    alert("Data Berhasil Disimpan!\n\n" +
          "Nama: " + nama.value + "\n" +
          "NIM: " + nim.value + "\n" +
          "Prodi: " + prodi.value + "\n" +
          "Jenis Kelamin: " + gender.value);
    
    // Reset form setelah berhasil
    document.getElementById("formBiodata").reset();
  }
});

// Fungsi untuk menampilkan indikator error
function showError(element, errorId, message) {
  element.classList.add("is-invalid");
  document.getElementById(errorId).innerText = message;
}

// Fungsi untuk mereset semua tampilan error
function resetError() {
  let inputs = document.querySelectorAll(".is-invalid");
  inputs.forEach(function (el) {
    el.classList.remove("is-invalid");
  });

  let errorMessages = document.querySelectorAll(".error-msg");
  errorMessages.forEach(function (msg) {
    msg.innerText = "";
  });
}