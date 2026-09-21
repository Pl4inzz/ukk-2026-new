-- create_members_table

CREATE TABLE IF NOT EXISTS `member` (
    id_member       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plat_nomor      VARCHAR(15) NOT NULL,
    jenis_kendaraan VARCHAR(20) NOT NULL,
    warna           VARCHAR(20) NOT NULL,
    pemilik         VARCHAR(20) NOT NULL,
    id_user         INT UNSIGNED NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL,

    CONSTRAINT fk_member_user FOREIGN KEY (id_user)
    REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
