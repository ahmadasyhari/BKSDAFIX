-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2024 at 01:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bksda`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `konten`, `kategori_id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'MENGUNGKAP MISTERI KUSKUS TOTOL WAIGEO: SPILOCUSCUS PAPUENSIS', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', 1, '1725532995.png', '2024-09-05 03:43:15', '2024-09-05 03:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pengelolaan', '2024-09-04 19:57:07', '2024-09-04 19:57:07'),
(2, 'TSL', '2024-09-04 19:57:11', '2024-09-04 19:57:11'),
(3, 'Penyuluhan', '2024-09-04 19:57:17', '2024-09-04 19:57:17'),
(4, 'Patroli', '2024-09-04 19:57:25', '2024-09-04 19:57:25'),
(5, 'Kepegawaian', '2024-09-04 19:57:32', '2024-09-04 19:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `title`, `url`, `content`, `created_at`, `updated_at`) VALUES
(7, NULL, 'Profil', 'http://127.0.0.1:8000/profil', NULL, '2024-09-04 20:13:36', '2024-09-04 20:57:55'),
(8, NULL, 'Data & Informasi', 'http://127.0.0.1:8000/Informasi', NULL, '2024-09-04 20:15:05', '2024-09-04 21:29:34'),
(9, NULL, 'Layanan', 'https://127.0.0.1:8000/layanan', NULL, '2024-09-04 20:15:38', '2024-09-04 20:15:38'),
(10, NULL, 'Mitra Kerja', 'http://127.0.0.1:8000//mitra', NULL, '2024-09-04 20:18:01', '2024-09-04 20:57:46'),
(11, 7, 'Logo', 'http://127.0.0.1:8000/logo', NULL, '2024-09-04 20:18:35', '2024-09-04 20:57:40'),
(12, 7, 'Struktur Organisasi', NULL, '<p>Struktur organisasi</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', '2024-09-04 20:56:13', '2024-09-04 20:56:13'),
(13, 7, 'Visi & Misi', NULL, '<p dir=\"ltr\">VISI</p>\r\n<p dir=\"ltr\">Visi Presiden-Wakil Presiden adalah &ldquo;TERWUJUDNYA INDONESIA MAJU YANG BERDAULAT, MANDIRI, DAN BERKEPRIBADIAN BERLANDASKAN GOTONG ROYONG&rdquo;. Langkah yang yang ditempuh untuk mencapai visi tersebut dijabarkan dalam 9 (sembilan) Misi Pembangunan Nasional yaitu :</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Peningkatan kualitas manusia Indonesia;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Struktur ekonomi yang produktif, mandiri dan berdaya saing;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Pembangunan yang merata dan berkeadilan;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Mencapai lingkungan hidup yang berkelanjutan;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Kemajuan budaya yang mencerminkan kepribadian bangsa;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Penegakan sistem hukum yang bebas korupsi, bermartabat dan terpercaya;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Perlindungan bagi segenap bangsa dan memberikan rasa aman pada seluruh warga;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Pengelolaan pembangunan yang bersih, efektif dan terpercaya; dan</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Sinergi pemerintah daerah dalam kerangka negara kesatuan.</p>\r\n</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">MISI</p>\r\n<p dir=\"ltr\">Salah satu rumusan Misi Presiden yang terkait langsung dengan KLHK adalah Misi ke-4 yaitu: &ldquo;Mencapai Lingkungan Hidup yang Berkelanjutan&rdquo;. Terdapat 2 (dua) pilar KLHK sebagai penopang untuk mewujudkan Visi dan Misi Presiden tersebut, yaitu:</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Keberlanjutan Sumber Daya Hutan dan Lingkungan Hidup adalah upaya pembangunan lingkungan hidup dan kehutanan yang menjamin terpenuhinya kebutuhan generasi sekarang tanpa mengorbankan kemampuan generasi mendatang untuk memenuhi kebutuhan mereka pada saatnya nanti.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Kesejahteraan adalah tercapainya perbaikan kualitas dan taraf hidup masyarakat.</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Kedua pilar ini harus didukung oleh tata kelola pembangunan lingkungan hidup dan kehutanan yang baik pada seluruh lingkup tugas, fungsi dan kewenangan KLHK, dari tingkat pusat hingga tingkat tapak/lapangan</p>', '2024-09-04 21:07:46', '2024-09-04 21:07:46'),
(14, 7, 'Tugas Pokok dan Fungsi', NULL, '<p dir=\"ltr\">Berdasarkan Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor : 17 Tahun 2022 tanggal 26 Juli 2022 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis Direktorat Jenderal Konservasi Sumber Daya Alam dan Ekosistem, Balai Besar Konservasi Sumber Daya Alam Sumatera Utara mempunyai tugas penyelenggaraan konservasi sumber daya alam dan ekosistemnya di cagar alam, suaka margasatwa, taman wisata alam dan taman buru serta koordinasi teknis pengelolaan taman hutan raya dan kawasan ekosistem esensial berdasarkan ketentuan peraturan perundang-undangan. Dalam melaksanakan tugas sebagaimana dimaksud, menyelenggarakan fungsi di wilayah kerjanya sebagai berikut :</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Inventarisasi potensi, penataan kawasan dan penyusunan rencana pengelolaan cagar alam, suaka margasatwa, taman wisata alam dan taman buru;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pelaksanaan perlindungan dan pengamanan cagar alam, suaka margasatwa, taman wisata alam, taman buru;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pengendalian dampak kerusakan sumber daya alam hayati;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pengendalian kebakaran hutan di cagar alam, suaka margasatwa, taman wisata alam dan taman buru;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pengelolaan jenis tumbuhan dan satwa liar beserta habitatnya serta sumberdaya genetik dan pengetahuan tradisional;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pengembangan dan pemanfaatan jasa lingkungan;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Evaluasi kesesuaian fungsi, pemulihan ekosistem dan penutupan kawasan;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Penyiapan pembentukan dan operasionalisasi kesatuan pengelolaan hutan konservasi (kphk);</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Penyediaan data dan informasi, promosi dan pemasaran konservasi sumber daya alam dan ekosistemnya;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pengembangan kerjasama dan kemitraan bidang konservasi sumberdaya alam dan ekosistemnya;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pengawasan dan pengendalian peredaran tumbuhan dan satwa liar;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Koordinasi teknis penetapan koridor hidupan liar;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Koordinasi teknis pengelolaan taman hutan raya dan kawasan ekosistem esensial;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pengembangan bina cinta alam serta penyuluhan konservasi sumberdaya alam dan ekosistemnya;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pemberdayaan masyarakat di dalam dan sekitar kawasan konservasi;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pelaksanaan urusan tata usaha dan rumah tangga serta kehumasan.</p>\r\n</li>\r\n</ol>\r\n<p>&nbsp;</p>', '2024-09-04 21:08:38', '2024-09-04 21:40:52'),
(15, 8, 'Perizinan', 'http://127.0.0.1:8000/perizinan', NULL, '2024-09-04 21:09:42', '2024-09-04 21:09:42'),
(16, 8, 'Kawasan Hutan', NULL, '<p>Kawasan Hutan&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', '2024-09-04 21:10:33', '2024-09-04 21:10:33'),
(17, 8, 'Laporan', NULL, '<p>Laporan&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', '2024-09-04 21:11:18', '2024-09-04 21:11:18'),
(18, 8, 'Gallery Foto dan Video', 'http://127.0.0.1:8000/gallery', NULL, '2024-09-04 21:12:12', '2024-09-04 21:15:43'),
(19, 9, 'Izin Baru / Perpanjangan', NULL, '<p>Izin baru&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', '2024-09-04 21:12:49', '2024-09-04 21:12:49'),
(20, 9, 'Simaksi', 'http://127.0.0.1:8000//simaksi', NULL, '2024-09-04 21:13:10', '2024-09-04 21:15:58'),
(21, 9, 'Lembaga Konservasi', 'http://127.0.0.1:8000/lembaga-konservasi', NULL, '2024-09-04 21:13:45', '2024-09-04 21:15:36'),
(22, 9, 'Penangkaran TSL', NULL, '<p>Penangkaran TSL&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', '2024-09-04 21:14:09', '2024-09-04 21:16:54'),
(23, 9, 'Peredaran TSL', NULL, '<p>Peredaran TSL&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', '2024-09-04 21:14:46', '2024-09-04 21:16:41'),
(24, 10, 'Lembaga Konservasi', 'http://127.0.0.1:8000/lembaga-konservasi', NULL, '2024-09-04 22:11:37', '2024-09-04 22:11:37'),
(25, 10, 'Penangkaran Tumbuhan dan Satwa Liar', NULL, '<p>Penangkaran Tumbuhan dan Satwa Liar&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', '2024-09-04 22:20:19', '2024-09-04 22:20:19'),
(26, 10, 'Pengedar Tumbuhan dan Satwa Liar', NULL, '<p>Pengedar Tumbuhan dan Satwa Liar&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', '2024-09-04 22:20:34', '2024-09-04 22:21:16'),
(27, 10, 'Penguatan Fungsi KSA & KPA', NULL, '<p>Penguatan Fungsi KSA &amp; KPA&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', '2024-09-04 22:20:54', '2024-09-04 22:20:54'),
(28, 10, 'Pembangunan Strategis yang tidak dapat dielakan', NULL, '<p>Pembangunan Strategis yang tidak dapat dielakan&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu tempor nibh, tempus consectetur nunc. Vestibulum at lectus libero. Mauris ultrices lacinia diam vel aliquam. Etiam posuere, metus a rutrum blandit, libero libero ultrices arcu, ut rutrum erat velit id mauris. Donec sodales erat est, ut dictum tellus varius sed. Proin placerat mollis ex sit amet auctor. Sed ultricies, nibh a mattis accumsan, est turpis placerat enim, consequat blandit diam ipsum sit amet felis. In eleifend, orci a hendrerit sollicitudin, dui urna fermentum lorem, sit amet congue quam lectus sit amet justo. Cras auctor nibh enim, vitae sodales erat cursus condimentum. Phasellus commodo lobortis arcu id interdum. Curabitur rhoncus non tortor vel fermentum. Pellentesque lobortis posuere sem.</p>\r\n<p>Morbi facilisis risus non venenatis lobortis. Integer ac est sit amet leo semper iaculis a et tellus. Morbi quis ullamcorper nunc. Morbi est lorem, dignissim at tempus nec, varius at metus. Nunc venenatis erat eget tellus rhoncus, laoreet iaculis libero ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ultricies urna et massa pulvinar, quis venenatis justo bibendum. Praesent sodales, erat sed suscipit iaculis, sem sem maximus arcu, sed finibus turpis enim vitae arcu. Nullam lobortis urna eget lacus euismod, vitae molestie felis vulputate. Sed a efficitur nisi. Mauris iaculis eros vitae mauris tincidunt, quis vulputate arcu pretium. Aliquam laoreet nibh ac volutpat vulputate.</p>\r\n<p>Nullam ultricies pharetra nibh a convallis. Nam pellentesque, quam at facilisis auctor, massa erat commodo tellus, sit amet mollis ex leo at dui. Cras venenatis ex velit. Mauris elementum elit id erat luctus, sed sollicitudin libero malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur hendrerit est vel luctus sollicitudin. Donec imperdiet ligula vitae urna tincidunt finibus. Phasellus vel dui iaculis, porttitor tellus varius, sollicitudin libero. Ut hendrerit ipsum nec tortor convallis venenatis. Fusce eu ipsum at justo mattis efficitur in quis diam.</p>\r\n<p>Mauris et nulla at elit tincidunt elementum. Nam metus nisi, dictum eu risus quis, ullamcorper dignissim sem. Curabitur maximus diam quis dolor hendrerit interdum. Nunc porttitor, dui sit amet blandit molestie, ante augue dignissim sapien, vitae gravida risus sapien a orci. Suspendisse potenti. Sed vitae porta elit. Ut mollis imperdiet est id pretium. Ut fringilla iaculis luctus. Nam ut vestibulum felis, eget pellentesque lectus. Nullam imperdiet maximus nulla nec placerat. Proin eleifend dui quis imperdiet malesuada. Donec vestibulum enim non sem mollis ultrices. In elementum orci eu maximus vestibulum.</p>', '2024-09-04 22:21:37', '2024-09-04 22:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_13_073741_create_menus_table', 1),
(6, '2024_08_13_075409_add_parent_id_to_menus_table', 1),
(7, '2024_08_13_085541_add_content_to_menus_table', 1),
(8, '2024_08_13_091939_modify_url_column_in_menus_table', 1),
(9, '2024_08_29_164417_create_kategoris_table', 1),
(10, '2024_08_30_041012_create_artikels_table', 1),
(11, '2024_08_30_054628_create_pengumumans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumumans`
--

CREATE TABLE `pengumumans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumumans`
--

INSERT INTO `pengumumans` (`id`, `judul`, `konten`, `kategori_id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Hewan Langka yang Terancam Punah', '<p>Hewan langka di Indonesia terancam punah karena habitat yang berkurang hingga perburuan.</p>\r\n<p>Sejumlah kementerian di Indonesia hingga berbagai lembaga internasional mencoba melindungi hewan-hewan endemik Indonesia ini dari kepunahan.<br>World Wild Fund (WWF) merunut daftar sejumlah hewan langka Indonesia yang dilindungi oleh dunia internasional dengan status critically endangered, yaitu hewan-hewan yang makin rentan dengan kepunahan.</p>', 1, '1725532947.jpg', '2024-09-05 03:42:27', '2024-09-05 03:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Abrar', 'abrar.abe01@gmail.com', '2024-09-04 12:42:12', '$2y$10$PhM/H2mIbudG6vW.PMAwv.Dpei6rYPmFSA/zjrB1FEn.OgGIYZwR6', NULL, '2024-09-04 12:42:12', '2024-09-04 12:42:12'),
(5, 'Aldo', 'aldo@gmail.com', NULL, '$2y$10$ab8tR4YectYNnGHVBDO74u7e7hgF3UEzMUjjBwqXgNGmkZZE2DkVi', NULL, '2024-09-04 06:17:07', '2024-09-04 06:19:05'),
(6, 'Ahmad', 'ahmadasyhari@gmail.com', NULL, '$2y$10$AI/mOtwygWOoRMwW/d9yW.J5eUQxR55//u0TuJrPGujNflqSIeDxW', NULL, '2024-09-04 23:28:24', '2024-09-04 23:28:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikels_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengumumans`
--
ALTER TABLE `pengumumans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumumans_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengumumans`
--
ALTER TABLE `pengumumans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengumumans`
--
ALTER TABLE `pengumumans`
  ADD CONSTRAINT `pengumumans_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
