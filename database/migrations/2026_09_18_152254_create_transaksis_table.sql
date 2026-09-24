-- create_transaksis_table

CREATE TABLE IF NOT EXISTS `transaksi` (
    `id_parkir`     INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `id_user`       INT UNSIGNED NOT NULL,
    `id_tarif`      INT UNSIGNED NOT NULL,
    `id_area`       INT UNSIGNED NOT NULL,
    `id_kendaraan`  INT UNSIGNED NULL,
    `waktu_masuk`   DATETIME NOT NULL,
    `waktu_keluar`  DATETIME NULL,
    `durasi_jam`    INT NULL DEFAULT 0,
    `biaya_total`   DECIMAL(10,2) NULL DEFAULT 0.00,
    `status`        ENUM('masuk', 'keluar') NOT NULL DEFAULT 'masuk',
    `created_at`    DATETIME NULL,
    `updated_at`    DATETIME NULL,

    CONSTRAINT `fk_transaksi_user` 
        FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) 
        ON DELETE CASCADE ON UPDATE CASCADE,

    CONSTRAINT `fk_transaksi_tarif` 
        FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`) 
        ON DELETE CASCADE ON UPDATE CASCADE,

    CONSTRAINT `fk_transaksi_area` 
        FOREIGN KEY (`id_area`) REFERENCES `area_parkir` (`id_area`) 
        ON DELETE CASCADE ON UPDATE CASCADE,

    CONSTRAINT `fk_transaksi_member` 
        FOREIGN KEY (`id_kendaraan`) REFERENCES `member` (`id_member`) 
        ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;