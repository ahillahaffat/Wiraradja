// Menangkap semua elemen dengan kelas portfolio-item
const portfolioItems = document.querySelectorAll(".portfolio-item");

// Membuat fungsi event handler untuk setiap elemen portfolio-item
function portfolioItemClickHandler(event) {
  event.preventDefault(); // Mencegah perilaku default dari tautan

  // Mendapatkan tautan halaman yang dituju dari atribut href
  const pageLink = this.getAttribute("href");

  // Mengarahkan pengguna ke halaman yang dituju
  window.location.href = pageLink;
}

// Menambahkan event listener ke setiap elemen portfolio-item
portfolioItems.forEach((item) => {
  item.addEventListener("click", portfolioItemClickHandler);
});
