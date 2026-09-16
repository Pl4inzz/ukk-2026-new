-- create_area_parkirs_table

CREATE TABLE IF NOT EXISTS `area_parkir` (
    id_area    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_area  VARCHAR(50) NOT NULL,
    kapasitas  INT(5) NOT NULL,
    terisi     INT(5) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
