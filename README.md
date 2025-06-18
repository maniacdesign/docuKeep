# DocuKeep  Application Starter

## Apa itu DocuKeep?

DocuKeep adalah aplikasi web untuk memudahkan manajemen berkas rekam medis digital hasil scan dokumen rekam medis


## Database
CREATE TABLE `infodokumen` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`no_rm` INT(8) NOT NULL DEFAULT '0',
	`nama` VARCHAR(50) NULL DEFAULT '0' COLLATE 'utf8mb4_general_ci',
	`diagnosa` VARCHAR(50) NULL DEFAULT '0' COLLATE 'utf8mb4_general_ci',
	`tahun` VARCHAR(50) NULL DEFAULT '0' COLLATE 'utf8mb4_general_ci',
	`keterangan` VARCHAR(50) NULL DEFAULT '0' COLLATE 'utf8mb4_general_ci',
	`origin_file_name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`unique_file_name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`size` INT(11) NULL DEFAULT NULL,
	`created_at` DATETIME NULL DEFAULT NULL,
	`updated_at` DATETIME NULL DEFAULT NULL,
	`deleted_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=6
;

