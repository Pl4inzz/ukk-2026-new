-- create_transaksis_table

CREATE TABLE IF NOT EXISTS `transaksi` (
    id_parkir     INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_member     INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    waktu_masuk   DATETIME NOT NULL,
    waktu_keluar  DATETIME NOT NULL,
    id_tarif      INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    durasi_jam    INT(5) NOT NULL,
    biaya_total   DECIMAL(10,0) NOT NULL,
    status        ENUM('masuk', 'keluar', ","),
    id_user       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_area       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    created_at DATETIME NULL,
    updated_at DATETIME NULL

-- user
    CONSTRAINT fk_transaksi_user FOREIGN KEY (id)
    REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE 
-- tarif
    CONSTRAINT fk_transaksi_tarif FOREIGN KEY (id_tarif)
    REFERENCES tarif(id_tarif) ON DELETE CASCADE ON UPDATE CASCADE
-- area
    CONSTRAINT fk_transaksi_area FOREIGN KEY (id_area)
    REFERENCES area(id_area) ON DELETE CASCADE ON UPDATE CASCADE 
-- member
    CONSTRAINT fk_transaksi_member FOREIGN KEY (id_member)
    REFERENCES member(id_member) ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
