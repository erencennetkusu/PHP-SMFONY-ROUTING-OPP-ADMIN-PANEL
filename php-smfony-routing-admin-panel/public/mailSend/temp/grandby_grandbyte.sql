-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 17 Tem 2023, 22:30:29
-- Sunucu sürümü: 10.3.34-MariaDB-cll-lve
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `grandby_grandbyte`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `aboutUsTitle` varchar(255) NOT NULL,
  `aboutUsDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `aboutus`
--

INSERT INTO `aboutus` (`id`, `aboutUsTitle`, `aboutUsDescription`) VALUES
(2, 'Bizimle Beraber Güçlenin', 'Müşterilerimizin ihtiyaçlarına özel web siteleri tasarlıyor ve geliştiriyoruz. Ayrıca, müşterilerimizin işlerini otomatikleştirmelerine yardımcı olacak otomasyon sistemleri de geliştiriyoruz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminmenuler`
--

CREATE TABLE `adminmenuler` (
  `id` int(11) NOT NULL,
  `menuAdi` varchar(255) NOT NULL,
  `menuUrl` varchar(500) NOT NULL,
  `menuIcon` varchar(500) NOT NULL,
  `menuSira` int(11) NOT NULL,
  `menuStatu` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `adminmenuler`
--

INSERT INTO `adminmenuler` (`id`, `menuAdi`, `menuUrl`, `menuIcon`, `menuSira`, `menuStatu`) VALUES
(1, 'Anasayfa', '/', '<i class=\"fa-solid fa-house\"></i>', 1, 1),
(2, 'Yetki Yönetim', '/authority', '<i class=\"fa-solid fa-lock\"></i>', 9, 1),
(3, 'Menu Yönetim', '/menu', '<i class=\"fa-solid fa-lock\"></i>', 9, 1),
(4, 'Personel Yönetim', '/personel', '<i class=\"fa-solid fa-user\"></i>', 2, 1),
(10, 'Hakkımızda', '/hakkimizda', '<i class=\"fa-regular fa-address-card\"></i>', 3, 1),
(11, 'Blog', '/blog', '<i class=\"fa-solid fa-blog\"></i>', 4, 1),
(12, 'Slider Yönetimi', '/slider', '<i class=\"fa-solid fa-sliders\"></i>', 5, 1),
(13, 'Referanslar', '/referanslar', '<i class=\"fa-solid fa-users-rays\"></i>', 6, 4),
(14, 'Ayarlar', '/ayarlar', '<i class=\"fa-solid fa-gear\"></i>', 10, 1),
(15, 'Projelerimiz', '/projelerimiz', '<i class=\"fa-solid fa-list-check\"></i>', 7, 1),
(16, 'Ekibimiz', '/ekibimiz', '<i class=\"fa-solid fa-cubes-stacked\"></i>', 8, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminpermission`
--

CREATE TABLE `adminpermission` (
  `id` int(11) NOT NULL,
  `authority` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `userAccess` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `statu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `adminpermission`
--

INSERT INTO `adminpermission` (`id`, `authority`, `userAccess`, `statu`) VALUES
(1, 'admin', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', 1),
(2, 'Yonetici', '[\"1\",\"2\",\"4\",\"5\"]', 1),
(3, 'Çağrı Merkezi Elemanı', '[\"4\",\"5\"]', 1),
(17, 'Arıza ekibi', '[\"1\",\"2\",\"3\",\"5\"]', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blogTitle` varchar(255) NOT NULL,
  `blogDescription` longtext CHARACTER SET utf8 NOT NULL,
  `blogImg` varchar(500) NOT NULL,
  `blogUrl` varchar(500) NOT NULL,
  `blogTagger` varchar(1000) NOT NULL,
  `blogDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`id`, `blogTitle`, `blogDescription`, `blogImg`, `blogUrl`, `blogTagger`, `blogDate`) VALUES
(14, 'Web Yazılım: İnternetin Kodlarıyla Tanışın', '<p>Web Yazılım: İnternetin Kodlarıyla Tanışın</p><p><br></p><p>Günümüzün dijital çağında, web yazılımı, hemen her işletmenin ve hatta bireylerin başarısı için önemli bir rol oynamaktadır. Web yazılımı, kullanıcıların internet üzerindeki deneyimini iyileştirmek ve çeşitli işlevleri gerçekleştirmek için kullanılan araçlar ve teknolojiler bütünüdür. Bu blog yazısında, web yazılımının ne olduğunu, nasıl çalıştığını ve neden bu kadar önemli olduğunu daha yakından inceleyeceğiz.</p><p><br></p><p>Web yazılımı nedir?</p><p>Web yazılımı, web tarayıcıları üzerinden çalışan ve web sitesi veya uygulamaların oluşturulması, güncellenmesi ve yönetilmesi için kullanılan yazılım programlarıdır. Web yazılımı, kullanıcıların interaktif olarak etkileşime geçebilecekleri, veri girişi yapabilecekleri veya çeşitli işlevleri gerçekleştirebilecekleri web tabanlı araçlar sunar.</p><p><br></p><p>Web yazılımı nasıl çalışır?</p><p>Web yazılımı, genellikle istemci-sunucu modeli üzerine kuruludur. İstemci tarafı, kullanıcının web tarayıcısıdır ve sunucu tarafı, web yazılımının barındırıldığı sunucudur. İstemci, kullanıcının web sitesine veya uygulamaya erişmek için kullandığı tarayıcıyı temsil ederken, sunucu, kullanıcının taleplerini işleyen ve yanıtlarını gönderen bir bilgisayarı ifade eder.</p><p><br></p><p>Web yazılımı geliştirme aşamaları</p><p>Web yazılımı geliştirme genellikle aşağıdaki adımlardan oluşur:</p><p><br></p><p>Gereksinim Analizi: İhtiyaçları belirlemek için müşteri veya iş sahibiyle birlikte çalışılır.</p><p>Tasarım: Kullanıcı deneyimi, arayüz tasarımı ve veritabanı yapısı gibi unsurlar planlanır.</p><p>Geliştirme: Yazılımın kodlanması ve web üzerinde çalışması için gerekli işlevlerin eklenmesi gerçekleştirilir.</p><p>Test ve Hata Düzeltme: Yazılım, farklı tarayıcılarda ve cihazlarda test edilir ve hatalar düzeltilir.</p><p>Yayınlama ve Dağıtım: Web yazılımı, canlı sunuculara yüklenir ve kullanıcılara erişime açılır.</p><p>Bakım ve Güncelleme: Yazılımın güncel tutulması, hataların düzeltilmesi ve yeni özelliklerin eklenmesi sürekli olarak sağlanır.</p><p>Web yazılımının önemi</p><p>Web yazılımı, işletmeler ve kullanıcılar için birçok avantaj sunar:</p><p><br></p><p>Kullanıcı Deneyimi: Web yazılımı, kullanıcıların web üzerinde daha iyi bir deneyim yaşamasını sağlar. İnteraktif öğeler, hızlı yanıt süreleri ve kullanıcı dostu arayüzler sayesinde kullanıcılar, istedikleri bilgilere kolayca erişebilir ve çeşitli işlemleri gerçekleştirebilir.</p><p><br></p><p>Verimlilik ve Otomasyon: Web yazılımı, iş süreçlerini otomatikleştirebilir ve verimliliği artırabilir. Örneğin, bir e-ticaret sitesi, alışveriş işlemlerini otomatikleştirerek müşterilere daha hızlı hizmet sağlayabilir.</p><p><br></p><p>Küresel Erişim: Web yazılımı, işletmelerin sınırlarını aşmasına ve küresel bir kitleye erişmesine olanak tanır. İnternetin yaygın kullanımı, web üzerindeki bir işletmenin dünyanın herhangi bir yerinden erişilebilir olmasını sağlar.</p><p><br></p><p>Veri Analizi ve Raporlama: Web yazılımı, kullanıcı etkileşimleri ve diğer verileri toplayabilir ve analiz edebilir. Bu veriler, işletmelere müşteri davranışlarını anlamak, pazarlama stratejilerini optimize etmek ve karar alma süreçlerini desteklemek için değerli bilgiler sağlar.</p><p><br></p><p>Güvenlik: Web yazılımı, güvenlik önlemleriyle birlikte geliştirilerek kullanıcı verilerini korur ve siber saldırılara karşı önlem alır. Güvenli bir web yazılımı, kullanıcıların gizliliklerini ve güvenliklerini sağlamaya yardımcı olur.</p><p><br></p><p>Sonuç olarak, web yazılımı, internetin temelini oluşturan ve günümüzde vazgeçilmez bir role sahip olan bir alandır. İşletmelerin dijital varlıklarını güçlendirmesi, kullanıcı deneyimini iyileştirmesi ve iş süreçlerini optimize etmesi için web yazılımına yatırım yapması gerekmektedir. Web yazılımıyla ilgili teknolojiler ve trendler sürekli olarak geliştiğinden, bu alanda güncel kalmak ve yeni fırsatları keşfetmek önemlidir.</p>', 'pexels-jorge-jesus-614117.jpg', 'web-yazilim-internetin-kodlariyla-tanisin', 'web tasarım, web yazılım', '2023-07-17 17:49:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `commentsName` varchar(255) NOT NULL,
  `commentsSurname` varchar(255) NOT NULL,
  `commentsCategory` varchar(255) NOT NULL,
  `commentsImg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `communication`
--

CREATE TABLE `communication` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` varchar(500) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `facebook` varchar(500) NOT NULL,
  `instagram` varchar(500) NOT NULL,
  `twitter` varchar(500) NOT NULL,
  `linkdedin` varchar(500) NOT NULL,
  `youtube` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `communication`
--

INSERT INTO `communication` (`id`, `phone`, `adress`, `mail`, `facebook`, `instagram`, `twitter`, `linkdedin`, `youtube`) VALUES
(1, '+90 543 553 11 36', 'Kızıltoprak mah. Şehit Ercan cadMuratpaşa/Antalya', 'info@grandbytedigital.com', '', '', '', '', 'https://www.youtube.com/channel/UCmUaz20UbEZeWBWJpgEeP8A');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerCompanyName` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerSurname` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerTitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerAdress` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerPhone` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerMailAdress` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerType` int(11) DEFAULT NULL,
  `customerTaxNumber` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerFaxPhone` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerProvince` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerDistrict` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `custormerCountry` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `custormerPostCode` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customerStatu` int(11) DEFAULT NULL,
  `customerDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`id`, `customerName`, `customerCompanyName`, `customerSurname`, `customerTitle`, `customerAdress`, `customerPhone`, `customerMailAdress`, `customerType`, `customerTaxNumber`, `customerFaxPhone`, `customerProvince`, `customerDistrict`, `custormerCountry`, `custormerPostCode`, `customerStatu`, `customerDate`) VALUES
(1, 'Eren', NULL, 'Cennetkuşu', 'Yönetim', 'Şanlıurfa/karşıyaka mah', '05458667028', 'programcieren@hotmail.com', 1, '4564564646', '4143132222', '63', '442', 'TR', '63000', 1, '2023-05-01 17:07:34'),
(5, 'serhat', NULL, 'gunes', 'seo', 'istanbul/bakırkoy/ahmet yesevi caddesi', '0555 333 22 10', 'serhatgunes@gmail.com', 1, '000000', '4444444', '34', '116', 'TR', '34000', 1, '2023-04-30 20:58:32'),
(7, 'Efe', 'Efe', 'Esen', 'Müdür', 'İzmir/bornova/ahmet yesevi caddesi', '0555 333 22 10', 'efeesen@gmail.com', 2, '000000', '4444444', '3', '761', 'TR', '05000', 1, '2023-05-16 20:53:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `cityCode` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `district`
--

INSERT INTO `district` (`id`, `cityCode`, `name`) VALUES
(1, '37', 'Abana'),
(2, '50', 'Acıgöl'),
(3, '20', 'Acıpayam'),
(4, '12', 'Adaklı'),
(5, '34', 'Adalar'),
(6, '54', 'Adapazarı'),
(7, '2', 'Adıyaman'),
(8, '13', 'Adilcevaz'),
(9, '46', 'Afşin'),
(10, '3', 'Afyonkarahisar'),
(11, '68', 'Ağaçören'),
(12, '23', 'Ağın'),
(13, '15', 'Ağlasun'),
(14, '37', 'Ağlı'),
(15, '4', 'Ağrı'),
(16, '42', 'Ahırlı'),
(17, '13', 'Ahlat'),
(18, '45', 'Ahmetli'),
(19, '61', 'Akçaabat'),
(20, '44', 'Akçadağ'),
(21, '63', 'Akçakale'),
(22, '40', 'Akçakent'),
(23, '81', 'Akçakoca'),
(24, '66', 'Akdağmadeni'),
(25, '33', 'Akdeniz'),
(26, '45', 'Akhisar'),
(27, '58', 'Akıncılar'),
(28, '38', 'Akkışla'),
(29, '52', 'Akkuş'),
(30, '42', 'Akören'),
(31, '40', 'Akpınar'),
(32, '68', 'Aksaray'),
(33, '7', 'Akseki'),
(34, '7', 'Aksu'),
(35, '32', 'Aksu'),
(36, '42', 'Akşehir'),
(37, '36', 'Akyaka'),
(38, '54', 'Akyazı'),
(39, '6', 'Akyurt'),
(40, '19', 'Alaca'),
(41, '23', 'Alacakaya'),
(42, '55', 'Alaçam'),
(43, '1', 'Aladağ'),
(44, '7', 'Alanya'),
(45, '67', 'Alaplı'),
(46, '45', 'Alaşehir'),
(47, '35', 'Aliağa'),
(48, '60', 'Almus'),
(49, '26', 'Alpu'),
(50, '10', 'Altıeylül'),
(51, '6', 'Altındağ'),
(52, '42', 'Altınekin'),
(53, '52', 'Altınordu'),
(54, '77', 'Altınova'),
(55, '31', 'Altınözü'),
(56, '43', 'Altıntaş'),
(57, '15', 'Altınyayla'),
(58, '58', 'Altınyayla'),
(59, '51', 'Altunhisar'),
(60, '28', 'Alucra'),
(61, '74', 'Amasra'),
(62, '5', 'Amasya'),
(63, '33', 'Anamur'),
(64, '46', 'Andırın'),
(65, '31', 'Antakya'),
(66, '27', 'Araban'),
(67, '37', 'Araç'),
(68, '61', 'Araklı'),
(69, '76', 'Aralık'),
(70, '44', 'Arapgir'),
(71, '75', 'Ardahan'),
(72, '8', 'Ardanuç'),
(73, '53', 'Ardeşen'),
(74, '44', 'Arguvan'),
(75, '8', 'Arhavi'),
(76, '23', 'Arıcak'),
(77, '54', 'Arifiye'),
(78, '77', 'Armutlu'),
(79, '34', 'Arnavutköy'),
(80, '36', 'Arpaçay'),
(81, '61', 'Arsin'),
(82, '31', 'Arsuz'),
(83, '60', 'Artova'),
(84, '47', 'Artuklu'),
(85, '8', 'Artvin'),
(86, '55', 'Asarcık'),
(87, '43', 'Aslanapa'),
(88, '25', 'Aşkale'),
(89, '32', 'Atabey'),
(90, '55', 'Atakum'),
(91, '34', 'Ataşehir'),
(92, '18', 'Atkaracalar'),
(93, '50', 'Avanos'),
(94, '34', 'Avcılar'),
(95, '57', 'Ayancık'),
(96, '6', 'Ayaş'),
(97, '52', 'Aybastı'),
(98, '33', 'Aydıncık'),
(99, '66', 'Aydıncık'),
(100, '69', 'Aydıntepe'),
(101, '70', 'Ayrancı'),
(102, '17', 'Ayvacık'),
(103, '55', 'Ayvacık'),
(104, '10', 'Ayvalık'),
(105, '37', 'Azdavay'),
(106, '25', 'Aziziye'),
(107, '20', 'Babadağ'),
(108, '39', 'Babaeski'),
(109, '55', 'Bafra'),
(110, '34', 'Bağcılar'),
(111, '21', 'Bağlar'),
(112, '80', 'Bahçe'),
(113, '34', 'Bahçelievler'),
(114, '65', 'Bahçesaray'),
(115, '71', 'Bahşili'),
(116, '34', 'Bakırköy'),
(117, '20', 'Baklan'),
(118, '6', 'Bala'),
(119, '35', 'Balçova'),
(120, '71', 'Balışeyh'),
(121, '10', 'Balya'),
(122, '64', 'Banaz'),
(123, '10', 'Bandırma'),
(124, '74', 'Bartın'),
(125, '23', 'Baskil'),
(126, '34', 'Başakşehir'),
(127, '60', 'Başçiftlik'),
(128, '41', 'Başiskele'),
(129, '65', 'Başkale'),
(130, '3', 'Başmakçı'),
(131, '70', 'Başyayla'),
(132, '72', 'Batman'),
(133, '44', 'Battalgazi'),
(134, '3', 'Bayat'),
(135, '19', 'Bayat'),
(136, '69', 'Bayburt'),
(137, '35', 'Bayındır'),
(138, '56', 'Baykan'),
(139, '35', 'Bayraklı'),
(140, '17', 'Bayramiç'),
(141, '18', 'Bayramören'),
(142, '34', 'Bayrampaşa'),
(143, '20', 'Bekilli'),
(144, '31', 'Belen'),
(145, '35', 'Bergama'),
(146, '2', 'Besni'),
(147, '61', 'Beşikdüzü'),
(148, '34', 'Beşiktaş'),
(149, '72', 'Beşiri'),
(150, '20', 'Beyağaç'),
(151, '35', 'Beydağ'),
(152, '34', 'Beykoz'),
(153, '34', 'Beylikdüzü'),
(154, '26', 'Beylikova'),
(155, '34', 'Beyoğlu'),
(156, '6', 'Beypazarı'),
(157, '42', 'Beyşehir'),
(158, '73', 'Beytüşşebap'),
(159, '17', 'Biga'),
(160, '10', 'Bigadiç'),
(161, '11', 'Bilecik'),
(162, '12', 'Bingöl'),
(163, '63', 'Birecik'),
(164, '21', 'Bismil'),
(165, '13', 'Bitlis'),
(166, '48', 'Bodrum'),
(167, '19', 'Boğazkale'),
(168, '66', 'Boğazlıyan'),
(169, '14', 'Bolu'),
(170, '3', 'Bolvadin'),
(171, '51', 'Bor'),
(172, '8', 'Borçka'),
(173, '35', 'Bornova'),
(174, '57', 'Boyabat'),
(175, '17', 'Bozcaada'),
(176, '9', 'Bozdoğan'),
(177, '42', 'Bozkır'),
(178, '20', 'Bozkurt'),
(179, '37', 'Bozkurt'),
(180, '63', 'Bozova'),
(181, '40', 'Boztepe'),
(182, '11', 'Bozüyük'),
(183, '33', 'Bozyazı'),
(184, '35', 'Buca'),
(185, '15', 'Bucak'),
(186, '9', 'Buharkent'),
(187, '28', 'Bulancak'),
(188, '49', 'Bulanık'),
(189, '20', 'Buldan'),
(190, '15', 'Burdur'),
(191, '10', 'Burhaniye'),
(192, '38', 'Bünyan'),
(193, '34', 'Büyükçekmece'),
(194, '16', 'Büyükorhan'),
(195, '55', 'Canik'),
(196, '1', 'Ceyhan'),
(197, '63', 'Ceylanpınar'),
(198, '37', 'Cide'),
(199, '42', 'Cihanbeyli'),
(200, '73', 'Cizre'),
(201, '81', 'Cumayeri'),
(202, '46', 'Çağlayancerit'),
(203, '20', 'Çal'),
(204, '65', 'Çaldıran'),
(205, '51', 'Çamardı'),
(206, '52', 'Çamaş'),
(207, '20', 'Çameli'),
(208, '6', 'Çamlıdere'),
(209, '53', 'Çamlıhemşin'),
(210, '33', 'Çamlıyayla'),
(211, '28', 'Çamoluk'),
(212, '17', 'Çan'),
(213, '28', 'Çanakçı'),
(214, '17', 'Çanakkale'),
(215, '66', 'Çandır'),
(216, '6', 'Çankaya'),
(217, '18', 'Çankırı'),
(218, '20', 'Çardak'),
(219, '55', 'Çarşamba'),
(220, '61', 'Çarşıbaşı'),
(221, '25', 'Çat'),
(222, '65', 'Çatak'),
(223, '34', 'Çatalca'),
(224, '52', 'Çatalpınar'),
(225, '37', 'Çatalzeytin'),
(226, '43', 'Çavdarhisar'),
(227, '15', 'Çavdır'),
(228, '3', 'Çay'),
(229, '52', 'Çaybaşı'),
(230, '67', 'Çaycuma'),
(231, '53', 'Çayeli'),
(232, '66', 'Çayıralan'),
(233, '24', 'Çayırlı'),
(234, '41', 'Çayırova'),
(235, '61', 'Çaykara'),
(236, '66', 'Çekerek'),
(237, '34', 'Çekmeköy'),
(238, '71', 'Çelebi'),
(239, '2', 'Çelikhan'),
(240, '42', 'Çeltik'),
(241, '15', 'Çeltikçi'),
(242, '62', 'Çemişgezek'),
(243, '18', 'Çerkeş'),
(244, '59', 'Çerkezköy'),
(245, '21', 'Çermik'),
(246, '35', 'Çeşme'),
(247, '75', 'Çıldır'),
(248, '21', 'Çınar'),
(249, '77', 'Çınarcık'),
(250, '40', 'Çiçekdağı'),
(251, '26', 'Çifteler'),
(252, '51', 'Çiftlik'),
(253, '77', 'Çiftlikköy'),
(254, '35', 'Çiğli'),
(255, '81', 'Çilimli'),
(256, '9', 'Çine'),
(257, '20', 'Çivril'),
(258, '3', 'Çobanlar'),
(259, '59', 'Çorlu'),
(260, '19', 'Çorum'),
(261, '6', 'Çubuk'),
(262, '30', 'Çukurca'),
(263, '1', 'Çukurova'),
(264, '42', 'Çumra'),
(265, '21', 'Çüngüş'),
(266, '37', 'Daday'),
(267, '48', 'Dalaman'),
(268, '75', 'Damal'),
(269, '44', 'Darende'),
(270, '47', 'Dargeçit'),
(271, '41', 'Darıca'),
(272, '48', 'Datça'),
(273, '3', 'Dazkırı'),
(274, '31', 'Defne'),
(275, '71', 'Delice'),
(276, '45', 'Demirci'),
(277, '39', 'Demirköy'),
(278, '69', 'Demirözü'),
(279, '7', 'Demre'),
(280, '42', 'Derbent'),
(281, '42', 'Derebucak'),
(282, '28', 'Dereli'),
(283, '53', 'Derepazarı'),
(284, '47', 'Derik'),
(285, '41', 'Derince'),
(286, '50', 'Derinkuyu'),
(287, '61', 'Dernekpazarı'),
(288, '38', 'Develi'),
(289, '67', 'Devrek'),
(290, '37', 'Devrekani'),
(291, '21', 'Dicle'),
(292, '9', 'Didim'),
(293, '36', 'Digor'),
(294, '35', 'Dikili'),
(295, '57', 'Dikmen'),
(296, '41', 'Dilovası'),
(297, '3', 'Dinar'),
(298, '58', 'Divriği'),
(299, '4', 'Diyadin'),
(300, '19', 'Dodurga'),
(301, '42', 'Doğanhisar'),
(302, '28', 'Doğankent'),
(303, '58', 'Doğanşar'),
(304, '44', 'Doğanşehir'),
(305, '44', 'Doğanyol'),
(306, '37', 'Doğanyurt'),
(307, '4', 'Doğubayazıt'),
(308, '43', 'Domaniç'),
(309, '14', 'Dörtdivan'),
(310, '31', 'Dörtyol'),
(311, '7', 'Döşemealtı'),
(312, '46', 'Dulkadiroğlu'),
(313, '43', 'Dumlupınar'),
(314, '57', 'Durağan'),
(315, '10', 'Dursunbey'),
(316, '81', 'Düzce'),
(317, '80', 'Düziçi'),
(318, '61', 'Düzköy'),
(319, '17', 'Eceabat'),
(320, '22', 'Edirne'),
(321, '10', 'Edremit'),
(322, '65', 'Edremit'),
(323, '9', 'Efeler'),
(324, '78', 'Eflani'),
(325, '21', 'Eğil'),
(326, '32', 'Eğirdir'),
(327, '46', 'Ekinözü'),
(328, '23', 'Elazığ'),
(329, '79', 'Elbeyli'),
(330, '46', 'Elbistan'),
(331, '18', 'Eldivan'),
(332, '4', 'Eleşkirt'),
(333, '6', 'Elmadağ'),
(334, '7', 'Elmalı'),
(335, '43', 'Emet'),
(336, '3', 'Emirdağ'),
(337, '42', 'Emirgazi'),
(338, '22', 'Enez'),
(339, '60', 'Erbaa'),
(340, '65', 'Erciş'),
(341, '10', 'Erdek'),
(342, '33', 'Erdemli'),
(343, '42', 'Ereğli'),
(344, '67', 'Ereğli'),
(345, '54', 'Erenler'),
(346, '57', 'Erfelek'),
(347, '21', 'Ergani'),
(348, '59', 'Ergene'),
(349, '70', 'Ermenek'),
(350, '56', 'Eruh'),
(351, '31', 'Erzin'),
(352, '24', 'Erzincan'),
(353, '34', 'Esenler'),
(354, '34', 'Esenyurt'),
(355, '68', 'Eskil'),
(356, '78', 'Eskipazar'),
(357, '28', 'Espiye'),
(358, '64', 'Eşme'),
(359, '6', 'Etimesgut'),
(360, '3', 'Evciler'),
(361, '6', 'Evren'),
(362, '28', 'Eynesil'),
(363, '34', 'Eyüp'),
(364, '63', 'Eyyübiye'),
(365, '17', 'Ezine'),
(366, '34', 'Fatih'),
(367, '52', 'Fatsa'),
(368, '1', 'Feke'),
(369, '38', 'Felahiye'),
(370, '54', 'Ferizli'),
(371, '48', 'Fethiye'),
(372, '53', 'Fındıklı'),
(373, '7', 'Finike'),
(374, '35', 'Foça'),
(375, '35', 'Gaziemir'),
(376, '34', 'Gaziosmanpaşa'),
(377, '7', 'Gazipaşa'),
(378, '41', 'Gebze'),
(379, '43', 'Gediz'),
(380, '32', 'Gelendost'),
(381, '17', 'Gelibolu'),
(382, '58', 'Gemerek'),
(383, '16', 'Gemlik'),
(384, '12', 'Genç'),
(385, '72', 'Gercüş'),
(386, '14', 'Gerede'),
(387, '2', 'Gerger'),
(388, '9', 'Germencik'),
(389, '57', 'Gerze'),
(390, '65', 'Gevaş'),
(391, '54', 'Geyve'),
(392, '28', 'Giresun'),
(393, '17', 'Gökçeada'),
(394, '67', 'Gökçebey'),
(395, '46', 'Göksun'),
(396, '2', 'Gölbaşı'),
(397, '6', 'Gölbaşı'),
(398, '41', 'Gölcük'),
(399, '75', 'Göle'),
(400, '15', 'Gölhisar'),
(401, '52', 'Gölköy'),
(402, '45', 'Gölmarmara'),
(403, '58', 'Gölova'),
(404, '11', 'Gölpazarı'),
(405, '81', 'Gölyaka'),
(406, '10', 'Gömeç'),
(407, '10', 'Gönen'),
(408, '32', 'Gönen'),
(409, '45', 'Gördes'),
(410, '28', 'Görele'),
(411, '5', 'Göynücek'),
(412, '14', 'Göynük'),
(413, '28', 'Güce'),
(414, '73', 'Güçlükonak'),
(415, '6', 'Güdül'),
(416, '68', 'Gülağaç'),
(417, '33', 'Gülnar'),
(418, '50', 'Gülşehir'),
(419, '52', 'Gülyalı'),
(420, '5', 'Gümüşhacıköy'),
(421, '29', 'Gümüşhane'),
(422, '81', 'Gümüşova'),
(423, '7', 'Gündoğmuş'),
(424, '20', 'Güney'),
(425, '42', 'Güneysınır'),
(426, '53', 'Güneysu'),
(427, '34', 'Güngören'),
(428, '26', 'Günyüzü'),
(429, '52', 'Gürgentepe'),
(430, '13', 'Güroymak'),
(431, '65', 'Gürpınar'),
(432, '16', 'Gürsu'),
(433, '58', 'Gürün'),
(434, '35', 'Güzelbahçe'),
(435, '68', 'Güzelyurt'),
(436, '50', 'Hacıbektaş'),
(437, '38', 'Hacılar'),
(438, '42', 'Hadim'),
(439, '58', 'Hafik'),
(440, '30', 'Hakkâri'),
(441, '63', 'Halfeti'),
(442, '63', 'Haliliye'),
(443, '42', 'Halkapınar'),
(444, '5', 'Hamamözü'),
(445, '4', 'Hamur'),
(446, '26', 'Han'),
(447, '75', 'Hanak'),
(448, '21', 'Hani'),
(449, '37', 'Hanönü'),
(450, '16', 'Harmancık'),
(451, '63', 'Harran'),
(452, '80', 'Hasanbeyli'),
(453, '72', 'Hasankeyf'),
(454, '49', 'Hasköy'),
(455, '31', 'Hassa'),
(456, '10', 'Havran'),
(457, '22', 'Havsa'),
(458, '55', 'Havza'),
(459, '6', 'Haymana'),
(460, '59', 'Hayrabolu'),
(461, '61', 'Hayrat'),
(462, '21', 'Hazro'),
(463, '44', 'Hekimhan'),
(464, '53', 'Hemşin'),
(465, '54', 'Hendek'),
(466, '25', 'Hınıs'),
(467, '63', 'Hilvan'),
(468, '43', 'Hisarcık'),
(469, '13', 'Hizan'),
(470, '3', 'Hocalar'),
(471, '20', 'Honaz'),
(472, '8', 'Hopa'),
(473, '25', 'Horasan'),
(474, '62', 'Hozat'),
(475, '42', 'Hüyük'),
(476, '76', 'Iğdır'),
(477, '18', 'Ilgaz'),
(478, '42', 'Ilgın'),
(479, '32', 'Isparta'),
(480, '7', 'İbradı'),
(481, '73', 'İdil'),
(482, '37', 'İhsangazi'),
(483, '3', 'İhsaniye'),
(484, '52', 'İkizce'),
(485, '53', 'İkizdere'),
(486, '24', 'İliç'),
(487, '55', 'İlkadım'),
(488, '1', 'İmamoğlu'),
(489, '58', 'İmranlı'),
(490, '38', 'İncesu'),
(491, '9', 'İncirliova'),
(492, '37', 'İnebolu'),
(493, '16', 'İnegöl'),
(494, '11', 'İnhisar'),
(495, '26', 'İnönü'),
(496, '65', 'İpekyolu'),
(497, '22', 'İpsala'),
(498, '3', 'İscehisar'),
(499, '31', 'İskenderun'),
(500, '19', 'İskilip'),
(501, '27', 'İslahiye'),
(502, '25', 'İspir'),
(503, '10', 'İvrindi'),
(504, '53', 'İyidere'),
(505, '41', 'İzmit'),
(506, '16', 'İznik'),
(507, '52', 'Kabadüz'),
(508, '52', 'Kabataş'),
(509, '34', 'Kadıköy'),
(510, '42', 'Kadınhanı'),
(511, '66', 'Kadışehri'),
(512, '80', 'Kadirli'),
(513, '34', 'Kağıthane'),
(514, '36', 'Kağızman'),
(515, '2', 'Kahta'),
(516, '20', 'Kale'),
(517, '44', 'Kale'),
(518, '6', 'Kalecik'),
(519, '53', 'Kalkandere'),
(520, '40', 'Kaman'),
(521, '41', 'Kandıra'),
(522, '58', 'Kangal'),
(523, '59', 'Kapaklı'),
(524, '35', 'Karabağlar'),
(525, '35', 'Karaburun'),
(526, '78', 'Karabük'),
(527, '16', 'Karacabey'),
(528, '9', 'Karacasu'),
(529, '25', 'Karaçoban'),
(530, '64', 'Karahallı'),
(531, '1', 'Karaisalı'),
(532, '71', 'Karakeçili'),
(533, '23', 'Karakoçan'),
(534, '76', 'Karakoyunlu'),
(535, '63', 'Karaköprü'),
(536, '70', 'Karaman'),
(537, '15', 'Karamanlı'),
(538, '41', 'Karamürsel'),
(539, '42', 'Karapınar'),
(540, '54', 'Karapürçek'),
(541, '54', 'Karasu'),
(542, '1', 'Karataş'),
(543, '42', 'Karatay'),
(544, '25', 'Karayazı'),
(545, '10', 'Karesi'),
(546, '19', 'Kargı'),
(547, '27', 'Karkamış'),
(548, '12', 'Karlıova'),
(549, '9', 'Karpuzlu'),
(550, '36', 'Kars'),
(551, '35', 'Karşıyaka'),
(552, '34', 'Kartal'),
(553, '41', 'Kartepe'),
(554, '37', 'Kastamonu'),
(555, '7', 'Kaş'),
(556, '55', 'Kavak'),
(557, '48', 'Kavaklıdere'),
(558, '21', 'Kayapınar'),
(559, '54', 'Kaynarca'),
(560, '81', 'Kaynaşlı'),
(561, '6', 'Kazan'),
(562, '70', 'Kazımkarabekir'),
(563, '23', 'Keban'),
(564, '32', 'Keçiborlu'),
(565, '6', 'Keçiören'),
(566, '16', 'Keles'),
(567, '29', 'Kelkit'),
(568, '24', 'Kemah'),
(569, '24', 'Kemaliye'),
(570, '35', 'Kemalpaşa'),
(571, '7', 'Kemer'),
(572, '15', 'Kemer'),
(573, '7', 'Kepez'),
(574, '10', 'Kepsut'),
(575, '71', 'Keskin'),
(576, '16', 'Kestel'),
(577, '22', 'Keşan'),
(578, '28', 'Keşap'),
(579, '14', 'Kıbrıscık'),
(580, '35', 'Kınık'),
(581, '31', 'Kırıkhan'),
(582, '71', 'Kırıkkale'),
(583, '45', 'Kırkağaç'),
(584, '39', 'Kırklareli'),
(585, '40', 'Kırşehir'),
(586, '6', 'Kızılcahamam'),
(587, '18', 'Kızılırmak'),
(588, '3', 'Kızılören'),
(589, '47', 'Kızıltepe'),
(590, '12', 'Kiğı'),
(591, '67', 'Kilimli'),
(592, '79', 'Kilis'),
(593, '35', 'Kiraz'),
(594, '54', 'Kocaali'),
(595, '21', 'Kocaköy'),
(596, '38', 'Kocasinan'),
(597, '9', 'Koçarlı'),
(598, '39', 'Kofçaz'),
(599, '35', 'Konak'),
(600, '7', 'Konyaaltı'),
(601, '52', 'Korgan'),
(602, '18', 'Korgun'),
(603, '49', 'Korkut'),
(604, '7', 'Korkuteli'),
(605, '23', 'Kovancılar'),
(606, '58', 'Koyulhisar'),
(607, '50', 'Kozaklı'),
(608, '1', 'Kozan'),
(609, '67', 'Kozlu'),
(610, '72', 'Kozluk'),
(611, '45', 'Köprübaşı'),
(612, '61', 'Köprübaşı'),
(613, '25', 'Köprüköy'),
(614, '41', 'Körfez'),
(615, '29', 'Köse'),
(616, '9', 'Köşk'),
(617, '48', 'Köyceğiz'),
(618, '45', 'Kula'),
(619, '21', 'Kulp'),
(620, '42', 'Kulu'),
(621, '44', 'Kuluncak'),
(622, '31', 'Kumlu'),
(623, '7', 'Kumluca'),
(624, '52', 'Kumru'),
(625, '18', 'Kurşunlu'),
(626, '56', 'Kurtalan'),
(627, '74', 'Kurucaşile'),
(628, '9', 'Kuşadası'),
(629, '9', 'Kuyucak'),
(630, '34', 'Küçükçekmece'),
(631, '37', 'Küre'),
(632, '29', 'Kürtün'),
(633, '43', 'Kütahya'),
(634, '19', 'Laçin'),
(635, '55', 'Ladik'),
(636, '22', 'Lalapaşa'),
(637, '17', 'Lapseki'),
(638, '21', 'Lice'),
(639, '39', 'Lüleburgaz'),
(640, '61', 'Maçka'),
(641, '23', 'Maden'),
(642, '26', 'Mahmudiye'),
(643, '49', 'Malazgirt'),
(644, '59', 'Malkara'),
(645, '34', 'Maltepe'),
(646, '6', 'Mamak'),
(647, '7', 'Manavgat'),
(648, '10', 'Manyas'),
(649, '10', 'Marmara'),
(650, '59', 'Marmaraereğlisi'),
(651, '48', 'Marmaris'),
(652, '62', 'Mazgirt'),
(653, '47', 'Mazıdağı'),
(654, '19', 'Mecitözü'),
(655, '38', 'Melikgazi'),
(656, '35', 'Menderes'),
(657, '35', 'Menemen'),
(658, '14', 'Mengen'),
(659, '48', 'Menteşe'),
(660, '42', 'Meram'),
(661, '22', 'Meriç'),
(662, '20', 'Merkezefendi'),
(663, '5', 'Merzifon'),
(664, '52', 'Mesudiye'),
(665, '33', 'Mezitli'),
(666, '47', 'Midyat'),
(667, '26', 'Mihalgazi'),
(668, '26', 'Mihalıççık'),
(669, '48', 'Milas'),
(670, '40', 'Mucur'),
(671, '16', 'Mudanya'),
(672, '14', 'Mudurnu'),
(673, '65', 'Muradiye'),
(674, '59', 'Muratlı'),
(675, '7', 'Muratpaşa'),
(676, '8', 'Murgul'),
(677, '79', 'Musabeyli'),
(678, '16', 'Mustafakemalpaşa'),
(679, '49', 'Muş'),
(680, '33', 'Mut'),
(681, '13', 'Mutki'),
(682, '6', 'Nallıhan'),
(683, '35', 'Narlıdere'),
(684, '25', 'Narman'),
(685, '62', 'Nazımiye'),
(686, '9', 'Nazilli'),
(687, '50', 'Nevşehir'),
(688, '51', 'Niğde'),
(689, '60', 'Niksar'),
(690, '16', 'Nilüfer'),
(691, '27', 'Nizip'),
(692, '27', 'Nurdağı'),
(693, '46', 'Nurhak'),
(694, '47', 'Nusaybin'),
(695, '26', 'Odunpazarı'),
(696, '61', 'Of'),
(697, '27', 'Oğuzeli'),
(698, '19', 'Oğuzlar'),
(699, '25', 'Oltu'),
(700, '25', 'Olur'),
(701, '55', 'Ondokuzmayıs'),
(702, '46', 'Onikişubat'),
(703, '16', 'Orhaneli'),
(704, '16', 'Orhangazi'),
(705, '18', 'Orta'),
(706, '48', 'Ortaca'),
(707, '61', 'Ortahisar'),
(708, '68', 'Ortaköy'),
(709, '19', 'Ortaköy'),
(710, '19', 'Osmancık'),
(711, '11', 'Osmaneli'),
(712, '16', 'Osmangazi'),
(713, '80', 'Osmaniye'),
(714, '24', 'Otlukbeli'),
(715, '78', 'Ovacık'),
(716, '62', 'Ovacık'),
(717, '35', 'Ödemiş'),
(718, '47', 'Ömerli'),
(719, '65', 'Özalp'),
(720, '38', 'Özvatan'),
(721, '25', 'Palandöken'),
(722, '23', 'Palu'),
(723, '20', 'Pamukkale'),
(724, '54', 'Pamukova'),
(725, '25', 'Pasinler'),
(726, '4', 'Patnos'),
(727, '31', 'Payas'),
(728, '53', 'Pazar'),
(729, '60', 'Pazar'),
(730, '46', 'Pazarcık'),
(731, '43', 'Pazarlar'),
(732, '11', 'Pazaryeri'),
(733, '25', 'Pazaryolu'),
(734, '39', 'Pehlivanköy'),
(735, '34', 'Pendik'),
(736, '52', 'Perşembe'),
(737, '62', 'Pertek'),
(738, '56', 'Pervari'),
(739, '37', 'Pınarbaşı'),
(740, '38', 'Pınarbaşı'),
(741, '39', 'Pınarhisar'),
(742, '28', 'Piraziz'),
(743, '79', 'Polateli'),
(744, '6', 'Polatlı'),
(745, '75', 'Posof'),
(746, '1', 'Pozantı'),
(747, '6', 'Pursaklar'),
(748, '62', 'Pülümür'),
(749, '44', 'Pütürge'),
(750, '24', 'Refahiye'),
(751, '60', 'Reşadiye'),
(752, '31', 'Reyhanlı'),
(753, '53', 'Rize'),
(754, '78', 'Safranbolu'),
(755, '1', 'Saimbeyli'),
(756, '55', 'Salıpazarı'),
(757, '45', 'Salihli'),
(758, '31', 'Samandağ'),
(759, '2', 'Samsat'),
(760, '34', 'Sancaktepe'),
(761, '3', 'Sandıklı'),
(762, '54', 'Sapanca'),
(763, '59', 'Saray'),
(764, '65', 'Saray'),
(765, '57', 'Saraydüzü'),
(766, '66', 'Saraykent'),
(767, '20', 'Sarayköy'),
(768, '42', 'Sarayönü'),
(769, '26', 'Sarıcakaya'),
(770, '1', 'Sarıçam'),
(771, '45', 'Sarıgöl'),
(772, '36', 'Sarıkamış'),
(773, '66', 'Sarıkaya'),
(774, '38', 'Sarıoğlan'),
(775, '70', 'Sarıveliler'),
(776, '68', 'Sarıyahşi'),
(777, '34', 'Sarıyer'),
(778, '38', 'Sarız'),
(779, '45', 'Saruhanlı'),
(780, '72', 'Sason'),
(781, '10', 'Savaştepe'),
(782, '47', 'Savur'),
(783, '14', 'Seben'),
(784, '35', 'Seferihisar'),
(785, '35', 'Selçuk'),
(786, '42', 'Selçuklu'),
(787, '45', 'Selendi'),
(788, '36', 'Selim'),
(789, '32', 'Senirkent'),
(790, '54', 'Serdivan'),
(791, '7', 'Serik'),
(792, '20', 'Serinhisar'),
(793, '48', 'Seydikemer'),
(794, '37', 'Seydiler'),
(795, '42', 'Seydişehir'),
(796, '1', 'Seyhan'),
(797, '26', 'Seyitgazi'),
(798, '10', 'Sındırgı'),
(799, '56', 'Siirt'),
(800, '33', 'Silifke'),
(801, '34', 'Silivri'),
(802, '73', 'Silopi'),
(803, '21', 'Silvan'),
(804, '43', 'Simav'),
(805, '3', 'Sinanpaşa'),
(806, '6', 'Sincan'),
(807, '2', 'Sincik'),
(808, '57', 'Sinop'),
(809, '58', 'Sivas'),
(810, '64', 'Sivaslı'),
(811, '63', 'Siverek'),
(812, '23', 'Sivrice'),
(813, '26', 'Sivrihisar'),
(814, '12', 'Solhan'),
(815, '45', 'Soma'),
(816, '66', 'Sorgun'),
(817, '11', 'Söğüt'),
(818, '54', 'Söğütlü'),
(819, '9', 'Söke'),
(820, '71', 'Sulakyurt'),
(821, '34', 'Sultanbeyli'),
(822, '3', 'Sultandağı'),
(823, '34', 'Sultangazi'),
(824, '9', 'Sultanhisar'),
(825, '5', 'Suluova'),
(826, '60', 'Sulusaray'),
(827, '80', 'Sumbas'),
(828, '19', 'Sungurlu'),
(829, '21', 'Sur'),
(830, '63', 'Suruç'),
(831, '10', 'Susurluk'),
(832, '36', 'Susuz'),
(833, '58', 'Suşehri'),
(834, '59', 'Süleymanpaşa'),
(835, '22', 'Süloğlu'),
(836, '61', 'Sürmene'),
(837, '32', 'Sütçüler'),
(838, '18', 'Şabanözü'),
(839, '27', 'Şahinbey'),
(840, '61', 'Şalpazarı'),
(841, '43', 'Şaphane'),
(842, '58', 'Şarkışla'),
(843, '32', 'Şarkikaraağaç'),
(844, '59', 'Şarköy'),
(845, '8', 'Şavşat'),
(846, '28', 'Şebinkarahisar'),
(847, '66', 'Şefaatli'),
(848, '27', 'Şehitkamil'),
(849, '45', 'Şehzadeler'),
(850, '30', 'Şemdinli'),
(851, '25', 'Şenkaya'),
(852, '37', 'Şenpazar'),
(853, '6', 'Şereflikoçhisar'),
(854, '73', 'Şırnak'),
(855, '34', 'Şile'),
(856, '29', 'Şiran'),
(857, '56', 'Şirvan'),
(858, '34', 'Şişli'),
(859, '3', 'Şuhut'),
(860, '38', 'Talas'),
(861, '54', 'Taraklı'),
(862, '33', 'Tarsus'),
(863, '42', 'Taşkent'),
(864, '37', 'Taşköprü'),
(865, '4', 'Taşlıçay'),
(866, '5', 'Taşova'),
(867, '13', 'Tatvan'),
(868, '20', 'Tavas'),
(869, '43', 'Tavşanlı'),
(870, '15', 'Tefenni'),
(871, '55', 'Tekkeköy'),
(872, '25', 'Tekman'),
(873, '26', 'Tepebaşı'),
(874, '24', 'Tercan'),
(875, '77', 'Termal'),
(876, '55', 'Terme'),
(877, '56', 'Tillo'),
(878, '35', 'Tire'),
(879, '28', 'Tirebolu'),
(880, '60', 'Tokat'),
(881, '38', 'Tomarza'),
(882, '61', 'Tonya'),
(883, '80', 'Toprakkale'),
(884, '35', 'Torbalı'),
(885, '33', 'Toroslar'),
(886, '25', 'Tortum'),
(887, '29', 'Torul'),
(888, '37', 'Tosya'),
(889, '1', 'Tufanbeyli'),
(890, '62', 'Tunceli'),
(891, '45', 'Turgutlu'),
(892, '60', 'Turhal'),
(893, '65', 'Tuşba'),
(894, '2', 'Tut'),
(895, '4', 'Tutak'),
(896, '34', 'Tuzla'),
(897, '76', 'Tuzluca'),
(898, '42', 'Tuzlukçu'),
(899, '57', 'Türkeli'),
(900, '46', 'Türkoğlu'),
(901, '19', 'Uğurludağ'),
(902, '48', 'Ula'),
(903, '58', 'Ulaş'),
(904, '52', 'Ulubey'),
(905, '64', 'Ulubey'),
(906, '32', 'Uluborlu'),
(907, '73', 'Uludere'),
(908, '51', 'Ulukışla'),
(909, '74', 'Ulus'),
(910, '35', 'Urla'),
(911, '64', 'Uşak'),
(912, '25', 'Uzundere'),
(913, '22', 'Uzunköprü'),
(914, '34', 'Ümraniye'),
(915, '52', 'Ünye'),
(916, '50', 'Ürgüp'),
(917, '34', 'Üsküdar'),
(918, '24', 'Üzümlü'),
(919, '61', 'Vakfıkebir'),
(920, '49', 'Varto'),
(921, '55', 'Vezirköprü'),
(922, '63', 'Viranşehir'),
(923, '39', 'Vize'),
(924, '28', 'Yağlıdere'),
(925, '71', 'Yahşihan'),
(926, '38', 'Yahyalı'),
(927, '55', 'Yakakent'),
(928, '25', 'Yakutiye'),
(929, '42', 'Yalıhüyük'),
(930, '77', 'Yalova'),
(931, '32', 'Yalvaç'),
(932, '18', 'Yapraklı'),
(933, '48', 'Yatağan'),
(934, '27', 'Yavuzeli'),
(935, '31', 'Yayladağı'),
(936, '12', 'Yayladere'),
(937, '44', 'Yazıhan'),
(938, '12', 'Yedisu'),
(939, '17', 'Yenice'),
(940, '78', 'Yenice'),
(941, '14', 'Yeniçağa'),
(942, '66', 'Yenifakılı'),
(943, '6', 'Yenimahalle'),
(944, '9', 'Yenipazar'),
(945, '11', 'Yenipazar'),
(946, '32', 'Yenişarbademli'),
(947, '16', 'Yenişehir'),
(948, '21', 'Yenişehir'),
(949, '33', 'Yenişehir'),
(950, '66', 'Yerköy'),
(951, '38', 'Yeşilhisar'),
(952, '47', 'Yeşilli'),
(953, '15', 'Yeşilova'),
(954, '44', 'Yeşilyurt'),
(955, '60', 'Yeşilyurt'),
(956, '81', 'Yığılca'),
(957, '16', 'Yıldırım'),
(958, '58', 'Yıldızeli'),
(959, '61', 'Yomra'),
(960, '66', 'Yozgat'),
(961, '1', 'Yumurtalık'),
(962, '42', 'Yunak'),
(963, '45', 'Yunusemre'),
(964, '8', 'Yusufeli'),
(965, '30', 'Yüksekova'),
(966, '1', 'Yüreğir'),
(967, '58', 'Zara'),
(968, '34', 'Zeytinburnu'),
(969, '60', 'Zile'),
(970, '67', 'Zonguldak'),
(971, '8', 'Kemalpaşa'),
(972, '68', 'Sultanhanı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fault`
--

CREATE TABLE `fault` (
  `id` int(11) NOT NULL,
  `faultCustomer` int(11) NOT NULL,
  `fault` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `faultStatu` int(11) NOT NULL,
  `faultPersonel` int(11) NOT NULL,
  `faultMaterial` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `faultAmount` float NOT NULL,
  `faultBeginningDate` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `faultFinishDate` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `uye_profil_img` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_background_img` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_user` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_surname` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_mail` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_phone` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_slogan` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_meslek` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_facebook` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_twitter` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_instagram` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_youtube` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uye_github` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uye_codepen` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uye_web_site` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_password` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_sehir` int(11) DEFAULT NULL,
  `uye_ilce` int(11) DEFAULT NULL,
  `uye_dogum_gunu` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_statu` int(11) DEFAULT 1,
  `uye_mail_statu` int(11) DEFAULT 0,
  `uye_mail_code` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_role` int(11) DEFAULT NULL,
  `uye_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `member`
--

INSERT INTO `member` (`id`, `uye_profil_img`, `uye_background_img`, `uye_user`, `uye_surname`, `uye_mail`, `uye_phone`, `uye_slogan`, `uye_meslek`, `uye_facebook`, `uye_twitter`, `uye_instagram`, `uye_youtube`, `uye_github`, `uye_codepen`, `uye_web_site`, `uye_password`, `uye_sehir`, `uye_ilce`, `uye_dogum_gunu`, `uye_statu`, `uye_mail_statu`, `uye_mail_code`, `uye_role`, `uye_date`) VALUES
(1, '649eeeb7c5ff6.jpg', '649eefddb5ba1.jpg', 'Muhammed Eren', 'cennetkuşu', 'programcieren@hotmail.com', '05458667028', 'Merhabalar uzun soluklu bir forum blog ve sosyal medya dünyasına hoşgeldiniz', 'Web Desinger', 'eren cennetkuşu', 'erencennetku', 'erencennetkusu', 'yazilim guncesi', 'https://github.com/bubarses', 'https://codepen.io/erencennetkusu', 'www.yazilimguncesi.com.tr', '$2y$12$U9x4Yf4/5opT67L1rFiyY.iVsB0A9LqgIh8faYMhDxeY/rqcyr2Ai', 63, 442, '11/10/2001', 0, 1, '77775', 1, '2023-07-01 23:20:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ourTeam`
--

CREATE TABLE `ourTeam` (
  `id` int(11) NOT NULL,
  `ourTeamImg` varchar(500) NOT NULL,
  `ourTeamName` varchar(255) NOT NULL,
  `ourTeamTitle` varchar(255) NOT NULL,
  `ourTeamDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ourTeam`
--

INSERT INTO `ourTeam` (`id`, `ourTeamImg`, `ourTeamName`, `ourTeamTitle`, `ourTeamDate`) VALUES
(8, '64ac85e96eed9.png', 'Utku Can Temiz', 'Kurucu', '2023-07-10 22:27:53'),
(6, '64ad94c47c08d.jpg', 'Muhammed Eren Cennetkuşu', 'Full Stack Developer', '2023-07-11 17:43:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `outreferences`
--

CREATE TABLE `outreferences` (
  `id` int(11) NOT NULL,
  `referencesTitle` varchar(255) NOT NULL,
  `referencesImg` varchar(500) NOT NULL,
  `referencesUrl` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `outreferences`
--

INSERT INTO `outreferences` (`id`, `referencesTitle`, `referencesImg`, `referencesUrl`) VALUES
(1, 'deneme referans', '64a33a068a8e7.jpg', 'denemeurl');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `projectTitle` varchar(255) NOT NULL,
  `projectDescription` varchar(500) NOT NULL,
  `projectImg` varchar(500) NOT NULL,
  `projectUrl` varchar(500) NOT NULL,
  `projectCategory` int(11) NOT NULL,
  `projectDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `project`
--

INSERT INTO `project` (`id`, `projectTitle`, `projectDescription`, `projectImg`, `projectUrl`, `projectCategory`, `projectDate`) VALUES
(7, 'Kahve Firması', '   E-ticaret Web Tasarım -\r\nSosyal Medya İçerik Üretimi - Google Harita', '64ac89a66a047.png', 'www.code5coffee.com', 1, '2023-07-10 22:57:33'),
(8, 'Gümüş Takı', ' Web Tasarım - SEO Çalışması - Logo Çalışması - Google Haritalar', '64ac8c31650f9.png', 'www.divangumus.com', 1, '2023-07-10 22:54:41'),
(9, 'Otel Ekipmanları', ' SEO Hizmeti - Web Tasarım - Logo ', '64ac8dfe4fa65.png', 'www.otelterlikleriantalya.com', 1, '2023-07-10 23:02:22'),
(10, 'Mermer Fabrikası', ' Yurt dışı SEO - Web Tasarım', '64ac8f1c4be57.png', '', 1, '2023-07-10 23:07:08'),
(6, 'Minibar', ' Web Sayfası -\r\nSEO Hizmeti', '64ac8ae4359e0.png', 'www.antalyaminibar.com', 1, '2023-07-10 22:57:51'),
(11, 'Tur Firması', 'Web Tasarım ', '64ac910230945.png', '', 1, '2023-07-10 23:15:14'),
(12, 'Logo Tasarım', ' ', '64af11e19b135.png', '', 2, '2023-07-12 20:49:37'),
(13, 'Logo Tasarım', ' ', '64af121316f4c.png', '', 2, '2023-07-12 20:50:27'),
(14, 'Logo Tasarım', ' ', '64af1228bb71c.png', '', 2, '2023-07-12 20:50:48'),
(15, 'Logo Tasarım', ' ', '64af1240a11fb.png', '', 2, '2023-07-12 20:51:12'),
(16, 'Web Tasarım Yazılım', ' ', '64af12619e050.png', 'darkroyal.net', 1, '2023-07-12 20:51:45'),
(27, 'Logo Tasarım', ' ', 'logo – 14.png', '', 2, '2023-07-12 21:26:30'),
(32, 'Logo Tasarım', '  asdasdad', '3.jpg', 'www.google.com', 2, '2023-07-12 22:15:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projectCategory`
--

CREATE TABLE `projectCategory` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `projectCategory`
--

INSERT INTO `projectCategory` (`id`, `name`) VALUES
(1, 'Web Tasarım'),
(2, 'Grafik Tasarım'),
(3, 'Dijital Pazarlama'),
(4, 'Web Tabanlı Otomosyon Sistemleri'),
(5, 'Otomosyon Sistemleri');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyonkarahisar'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elâzığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkâri'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'Kahramanmaraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `author` varchar(255) NOT NULL,
  `icon` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `Title`, `description`, `keywords`, `author`, `icon`) VALUES
(1, 'GrandByte Digital | Geleceği Kodlayan Dijital Çözümler', 'GrandByte Digital olarak, müşterilerimize özelleştirilmiş yazılım çözümleri sunmak için yetenekli ve deneyimli bir ekip ile çalışıyoruz. İhtiyaçlarınızı anlamak, analiz etmek ve gelişmiş yazılım projeleriyle işletmenizin operasyonel verimliliğini artırmak için en son teknolojileri kullanıyoruz.', 'grandbytedigital.com, grandbyte, grandbyte digital, grandbyte dijital, grandbyte web tasarım, grandbyte web yazılım, grandbytediigital, grandbyte yazılım cözümleri', 'Muhammed Eren Cennetkuşu | Utku Can Temiz', '64a70fd9ba999.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `sliderTitle` varchar(500) NOT NULL,
  `sliderDescription` varchar(500) NOT NULL,
  `sliderImg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `sliderTitle`, `sliderDescription`, `sliderImg`) VALUES
(1, 'Geleceği Kodlayan Dijital Çözümler', 'Dijital Çözümlerle Geleceği Kodlayın, İnovasyonun Sınırlarını Aşın!', '64aa7c8114ca9.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `socialMediaPhone` varchar(255) NOT NULL,
  `socialMediaAdress` varchar(500) NOT NULL,
  `socialMediaMail` varchar(255) NOT NULL,
  `socialMediaFacebook` varchar(500) NOT NULL,
  `socialMediaInstagram` varchar(500) NOT NULL,
  `socialMediaTwitter` varchar(500) NOT NULL,
  `socialMediaLinkedin` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(155) COLLATE utf8_turkish_ci NOT NULL,
  `userSurname` varchar(155) COLLATE utf8_turkish_ci NOT NULL,
  `usersMail` varchar(155) COLLATE utf8_turkish_ci NOT NULL,
  `userPhone` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `userPasswordHash` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `userImage` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `userStatu` int(11) NOT NULL,
  `usersMailStatu` int(11) NOT NULL,
  `usersMailCode` int(11) NOT NULL,
  `userRole` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `userName`, `userSurname`, `usersMail`, `userPhone`, `userPasswordHash`, `userImage`, `userStatu`, `usersMailStatu`, `usersMailCode`, `userRole`, `date`) VALUES
(1, 'Eren', 'Cennetkuşu', 'programcieren@hotmail.com', '05458667028', '$2y$12$a3gZiuCu5VeN2qU7l7NHPuCRGpJJX.OieoX8UrGoin4B7/eqCmBVO', '6488dce9d1602.jpg', 1, 1, 339168, 1, '2023-07-01 23:14:45'),
(5, 'Ahmet', 'v', 'ahmetviran5@gmail.com', '05458667028', '$2y$12$x1Q32nJrb87Bfso4VKXi.OMCNrYhfQr1F1NDvBn58x6dkYirXnY6u', '6488dcddce806.jpg', 4, 0, 631155, 3, '2023-07-10 22:04:24'),
(10, 'efe', 'esen', 'efeesen123@gmail.com', '05458963562', '$2y$12$WNEaTcrcm5ehcolfJ9JABOBQ.6bmo12h/K5/O5H.aNCw2CPggMLjy', '6488de692b0d3.jpg', 4, 0, 0, 1, '2023-07-10 21:59:13'),
(12, 'Utku ', 'Can', 'utkucantmz@gmail.com', '05439276705', '$2y$12$0kTSozy0xxCTDos2QMidFO3aIrClVDOHFWmvbAlIzAqlqRA.r/Zka', '64adbd4c54f84.png', 4, 0, 23094, 1, '2023-07-11 20:38:04'),
(13, 'Utku', 'Can', 'utkucantemiz94@gmail.com', '05439276705', '$2y$12$KFAySfMsXz56iminOQpjxO3j9qU9alPDal4ojxcrmTT.16A3AeBtS', '64adbe118e737.png', 1, 0, 0, 1, '2023-07-11 20:39:45');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `adminmenuler`
--
ALTER TABLE `adminmenuler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `adminpermission`
--
ALTER TABLE `adminpermission`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `communication`
--
ALTER TABLE `communication`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `fault`
--
ALTER TABLE `fault`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ourTeam`
--
ALTER TABLE `ourTeam`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `outreferences`
--
ALTER TABLE `outreferences`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `projectCategory`
--
ALTER TABLE `projectCategory`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `adminmenuler`
--
ALTER TABLE `adminmenuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `adminpermission`
--
ALTER TABLE `adminpermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `communication`
--
ALTER TABLE `communication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `fault`
--
ALTER TABLE `fault`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ourTeam`
--
ALTER TABLE `ourTeam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `outreferences`
--
ALTER TABLE `outreferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `projectCategory`
--
ALTER TABLE `projectCategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
