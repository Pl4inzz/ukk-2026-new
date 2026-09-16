-- tarif

CREATE TABLE IF NOT EXISTS `tarif` (
    id_tarif         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    jenis_kendaraan  VARCHAR(50) NOT NULL,
    tarif_per_jam    DECIMAL(10,2) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
