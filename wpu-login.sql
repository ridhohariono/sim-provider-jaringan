/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.37-MariaDB : Database - wpu_login
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wpu_login` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wpu_login`;

/*Table structure for table `datel` */

DROP TABLE IF EXISTS `datel`;

CREATE TABLE `datel` (
  `id_datel` int(11) NOT NULL AUTO_INCREMENT,
  `nm_datel` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kakandatel` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id_datel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `datel` */

insert  into `datel`(`id_datel`,`nm_datel`,`lokasi`,`kakandatel`,`status`) values 
(1,'Datel Cirebon','Jl.Gatot Subroto No,89. Cirebon','Ridho Hariono','Aktif'),
(2,'Datel Indramayu','Jl.Kapten Sumarsono No,12. Indramayu','Hafis Mutakin','Aktif'),
(3,'Datel Kuningan','Jl.Gaperta Ujung No,27. Kuningan','Agus Irawan','Aktif'),
(4,'Datel Majalengka','Jl.Citarum Dusun II No,190. Majalengka','Idham Aulia','Aktif');

/*Table structure for table `denda` */

DROP TABLE IF EXISTS `denda`;

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL AUTO_INCREMENT,
  `lama_nunggak` varchar(50) NOT NULL,
  `denda` varchar(50) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `denda` */

/*Table structure for table `layanan` */

DROP TABLE IF EXISTS `layanan`;

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_layanan` varchar(100) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `nm_paket` varchar(100) NOT NULL,
  `kecepatan` varchar(50) NOT NULL,
  `harga` int(100) NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `layanan` */

insert  into `layanan`(`id_layanan`,`nm_layanan`,`paket`,`nm_paket`,`kecepatan`,`harga`) values 
(1,'Telp + Internet','Indihome','Dual Play','10 Mbps Mbps Mbps',285000),
(2,'wifi.id','Datin','Premium','100 Mbps',385000);

/*Table structure for table `lokasi` */

DROP TABLE IF EXISTS `lokasi`;

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `nm_odp` varchar(50) NOT NULL,
  `nm_odc` int(50) NOT NULL,
  `latitude` int(20) NOT NULL,
  `longtitude` int(20) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  `alamat` int(150) NOT NULL,
  `id_sto` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `lokasi` */

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_pelanggan` varchar(128) DEFAULT NULL,
  `speedy` varchar(50) NOT NULL,
  `voice` varchar(80) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `port` varchar(50) DEFAULT NULL,
  `id_layanan` int(11) DEFAULT NULL,
  `id_sto` int(11) DEFAULT NULL,
  `id_datel` int(11) DEFAULT NULL,
  `id_teknisi` int(11) DEFAULT NULL,
  `odp` varchar(128) DEFAULT NULL,
  `label` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `tgl_psb` date DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`nm_pelanggan`,`speedy`,`voice`,`alamat`,`port`,`id_layanan`,`id_sto`,`id_datel`,`id_teknisi`,`odp`,`label`,`status`,`tgl_psb`) values 
(1,'test','TPA5976136978','213677895','JL CIkarang No 29','1',1,1,1,1,'ODP-58754-6468-545','TEST','Aktif','2019-04-10');

/*Table structure for table `pemasangan_datin` */

DROP TABLE IF EXISTS `pemasangan_datin`;

CREATE TABLE `pemasangan_datin` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_layanan` int(11) DEFAULT NULL,
  `nm_pelanggan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL,
  `id_sto` int(11) DEFAULT NULL,
  `id_datel` int(11) DEFAULT NULL,
  `id_teknisi` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tgl_psb` date DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pemasangan_datin` */

/*Table structure for table `pemasangan_indihome` */

DROP TABLE IF EXISTS `pemasangan_indihome`;

CREATE TABLE `pemasangan_indihome` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_layanan` int(11) DEFAULT NULL,
  `nm_pelanggan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL,
  `id_sto` int(11) DEFAULT NULL,
  `id_datel` int(11) DEFAULT NULL,
  `id_teknisi` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tgl_psb` date DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pemasangan_indihome` */

/*Table structure for table `sto` */

DROP TABLE IF EXISTS `sto`;

CREATE TABLE `sto` (
  `id_sto` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sto` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `id_datel` int(11) NOT NULL,
  PRIMARY KEY (`id_sto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `sto` */

insert  into `sto`(`id_sto`,`nm_sto`,`lokasi`,`id_datel`) values 
(1,'Depok','Jl.Gatot Subroto No,89. Cirebon',1),
(2,'Jatibarang','Jl.Kapten Sumarsono No,12. Indramayu',2),
(3,'Cimahi','Jl.Gaperta Ujung No,27. Kuningan',3),
(4,'Jatiwangi','Jl.Citarum Dusun II No,190. Majalengka',4);

/*Table structure for table `teknisi` */

DROP TABLE IF EXISTS `teknisi`;

CREATE TABLE `teknisi` (
  `id_teknisi` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) DEFAULT NULL,
  `nik` varchar(60) NOT NULL,
  `nm_teknisi` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `team` varchar(50) NOT NULL,
  `id_datel` int(11) NOT NULL,
  PRIMARY KEY (`id_teknisi`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `teknisi` */

insert  into `teknisi`(`id_teknisi`,`email`,`nik`,`nm_teknisi`,`alamat`,`divisi`,`team`,`id_datel`) values 
(2,NULL,'3326161705931564','Agus Sandri','Jl.Gatot Subroto No.8 Cirebon','Perbaikan','Biru',1),
(3,NULL,'01126497531','Harfiansya Putra','Jl.Sudirman No,20 Kuningan','Pemasangan','Merah',1),
(15,NULL,'3326164107310001','Muhammad Fadilah','Jl Tanjung pura No.20 Majalengka','Pemasangan','Merah',1),
(16,NULL,'3326161705940041','Dedek Ariansya','Jl. Cipinang Kampung Manggis No.28 Indramayu','Perbaikan','Kuning',2),
(17,NULL,'3326166112900001','Irsyan Irawan','Jl.Bogor Sungai Deli, No.128','Pemasangan','Merah',1),
(18,'test@test.com','23423423423423','test','test','Pemasangan','Kuning',1),
(19,'ridho.shairin@gmail.com','432423423423423423','asdasda','asdasdasda','Perbaikan','Merah',3);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `image` varchar(120) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`image`,`password`,`role_id`,`is_active`,`date_created`) values 
(5,'Yusup','yusupvanpersie16@gmail.com','default.jpg','$2y$10$LZ8i4oOvhuHU3r5yomTzp.bQC2qpujqkwtq/Me9mVZ6bxEiQH6hLG',1,1,1553500889),
(6,'Saptoni','saptoni@gmail.com','default.jpg','$2y$10$iOjTODWGfZReyyZEr22jfupTZZrQYzZeoH40ftZBnljOvQ6wgcTBS',2,1,1553570646),
(7,'ridho hariono','admin@admin.com','default.jpg','$2y$10$kg3CJukn1c694ck8cH/Qhe2rh0rC9WU4nbDsZMQscHAhaVK8TutSG',1,1,1554280855),
(8,'test','test@test.com','default.jpg','$2y$10$SwatKgcAW7/rxOcxzCOHnu4hBLjeEuHwhr72hxdvpOYT6vv6k.ZfS',2,1,1554828682);

/*Table structure for table `user_access_menu` */

DROP TABLE IF EXISTS `user_access_menu`;

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user_access_menu` */

insert  into `user_access_menu`(`id`,`role_id`,`menu_id`) values 
(1,1,1),
(2,1,2),
(3,1,3),
(4,1,4),
(5,2,1),
(6,2,3),
(7,2,4);

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`menu`) values 
(1,'Administrator'),
(2,'Data Management'),
(3,'Transaksi'),
(4,'User');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`role`) values 
(1,'Administrator'),
(2,'Teknisi');

/*Table structure for table `user_sub_menu` */

DROP TABLE IF EXISTS `user_sub_menu`;

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `icon` varchar(150) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `user_sub_menu` */

insert  into `user_sub_menu`(`id`,`menu_id`,`title`,`url`,`icon`,`is_active`) values 
(1,1,'Dashboard','user','fas fa-fw fa-tachometer-alt',1),
(2,2,'Datel','admin/datel','fas fa-fw fa-building',1),
(3,2,'STO','admin/sto','fas fa-fw fa-gopuram',1),
(4,2,'Teknisi','admin/teknisi','fas fa-fw fa-user-shield',1),
(5,2,'Lokasi Properti','#','fas fa-fw fa-map-marker-alt',1),
(6,2,'Layanan','admin/layanan','fas fa-fw fa-clipboard-list',1),
(7,2,'Pelanggan','admin/pelanggan','fas fa-fw fa-user-shield',1),
(8,2,'Denda','admin/denda','fas fa-fw fa-dollar-sign',1),
(9,3,'Pemasangan Indihome','#','fas fa-fw fa-plug',1),
(10,3,'Pemasangan Datin','#','fas fa-fw fa-plug',1),
(11,3,'Pencabutan Indihome','#','fas fa-fw fa-stream',1),
(12,3,'Pencabutan Datin','#','fas fa-fw fa-stream',1),
(13,4,'My Profile','#','fas fa-fw fa-user-tie',1),
(14,4,'Users','#','fas fa-fw fa-user-tie',1),
(15,4,'Logout','auth/logout','fas fa-fw fa-sign-out-alt',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
