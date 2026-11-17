CREATE DATABASE IF NOT EXISTS jelajah_alam CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE jelajah_alam;

CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nama VARCHAR(100) NOT NULL,
 username VARCHAR(50) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE wisata (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nama VARCHAR(150) NOT NULL,
 lokasi VARCHAR(180) NOT NULL,
 kategori VARCHAR(60) NOT NULL,
 harga_tiket INT NOT NULL DEFAULT 0,
 deskripsi TEXT NOT NULL,
 gambar VARCHAR(500) DEFAULT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE edukasi (
 id INT AUTO_INCREMENT PRIMARY KEY,
 judul VARCHAR(180) NOT NULL,
 ringkasan TEXT NOT NULL,
 isi LONGTEXT NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Password awal admin: password
-- Ganti password setelah login pertama.
INSERT INTO users (nama, username, password) VALUES
('Administrator', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.pe1Jt3/8e');

INSERT INTO wisata (nama,lokasi,kategori,harga_tiket,deskripsi,gambar) VALUES
('Curug Cilember','Bogor, Jawa Barat','Air Terjun',25000,'Kawasan air terjun dengan suasana hutan yang sejuk. Pengunjung dapat menikmati jalur alam dan mengenal ekosistem hutan pegunungan.','https://images.unsplash.com/photo-1433086966358-54859d0ed716?w=900'),
('Kawah Putih','Ciwidey, Bandung','Pegunungan',30000,'Danau kawah vulkanik dengan warna air yang khas. Ikuti petunjuk keselamatan dan jaga kebersihan kawasan.','https://images.unsplash.com/photo-1511497584788-876760111969?w=900'),
('Pantai Tanjung Tinggi','Belitung','Pantai',20000,'Pantai dengan batu granit besar dan ekosistem pesisir yang perlu dijaga bersama.','https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=900');

INSERT INTO edukasi (judul,ringkasan,isi) VALUES
('Mengapa Hutan Penting bagi Kehidupan?','Hutan berperan menjaga keseimbangan iklim, air, tanah, dan keanekaragaman hayati.','Hutan bukan hanya kumpulan pepohonan. Hutan merupakan ekosistem yang menjadi tempat hidup berbagai organisme.\\n\\nPohon menyerap karbon dioksida, membantu menghasilkan oksigen, menjaga tanah agar tidak mudah terkikis, dan membantu mengatur siklus air.\\n\\nKita dapat ikut menjaga hutan dengan tidak membuang sampah sembarangan, mengurangi penggunaan produk sekali pakai, dan mendukung kegiatan konservasi.'),
('Mengenal Ekosistem Mangrove','Mangrove melindungi wilayah pesisir dan menjadi habitat berbagai jenis hewan.','Ekosistem mangrove tumbuh di wilayah pesisir yang dipengaruhi pasang surut air laut. Akar mangrove membantu menahan sedimen dan mengurangi energi gelombang.\\n\\nMangrove juga menjadi tempat berlindung dan mencari makan bagi ikan, kepiting, burung, serta organisme lainnya. Menjaga mangrove berarti ikut menjaga ketahanan pesisir.'),
('Etika Berwisata di Alam','Kebiasaan sederhana wisatawan dapat membantu menjaga kelestarian destinasi.','Saat berwisata di alam, bawa kembali sampah sendiri, tetap berada di jalur yang diizinkan, jangan memberi makan satwa liar, dan hindari mengambil tumbuhan atau batu sebagai oleh-oleh.\\n\\nHormati masyarakat lokal serta ikuti arahan petugas. Wisata yang bertanggung jawab membuat alam tetap lestari dan pengalaman pengunjung lebih aman.');
