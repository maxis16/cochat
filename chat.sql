-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Nis 2014, 12:15:33
-- Sunucu sürümü: 5.6.14
-- PHP Sürümü: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `lol`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE IF NOT EXISTS `ayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `etiket` text COLLATE utf8_turkish_ci NOT NULL,
  `zgun` text COLLATE utf8_turkish_ci NOT NULL,
  `reklam` text COLLATE utf8_turkish_ci NOT NULL,
  `admin` text COLLATE utf8_turkish_ci NOT NULL,
  `sifre` text COLLATE utf8_turkish_ci NOT NULL,
  `bakim` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`id`, `baslik`, `aciklama`, `etiket`, `zgun`, `reklam`, `admin`, `sifre`, `bakim`) VALUES
(1, 'Bedava Mobil Chat, Mobil Sohbet, Cep Chat', 'Ücretsiz Mobil Chat, Mobil Sohbet, Telefondan Sohbet et', 'etiket1, etiiket2,chat', '0', '', 'admin', 'd9b1d7db4cd6e70935368a1efb10e377', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genel`
--

CREATE TABLE IF NOT EXISTS `genel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kim` text COLLATE utf8_turkish_ci NOT NULL,
  `kime` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `trh` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `guser`
--

CREATE TABLE IF NOT EXISTS `guser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` text COLLATE utf8_turkish_ci NOT NULL,
  `ip` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `guser`
--

INSERT INTO `guser` (`id`, `ad`, `ip`, `tarih`) VALUES
(1, 'xx', '', '22.04.2014'),
(2, 'rest', '', '22.04.2014');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `muzik`
--

CREATE TABLE IF NOT EXISTS `muzik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kim` text COLLATE utf8_turkish_ci NOT NULL,
  `kime` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `trh` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `muzik`
--

INSERT INTO `muzik` (`id`, `kim`, `kime`, `tarih`, `mesaj`, `trh`) VALUES
(1, 'xx', '', '22.04.2014 11:45', 'test', '22.04.2014');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oda`
--

CREATE TABLE IF NOT EXISTS `oda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` text COLLATE utf8_turkish_ci NOT NULL,
  `max` text COLLATE utf8_turkish_ci NOT NULL,
  `gad` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `oda`
--

INSERT INTO `oda` (`id`, `ad`, `max`, `gad`) VALUES
(1, 'Genel', '20', 'genel'),
(2, 'Müzik', '20', 'muzik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oda` text COLLATE utf8_turkish_ci NOT NULL,
  `ip` text COLLATE utf8_turkish_ci NOT NULL,
  `zmn` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `online`
--

INSERT INTO `online` (`id`, `oda`, `ip`, `zmn`) VALUES
(1, 'muzik', '127.0.0.1', '1398159897');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
