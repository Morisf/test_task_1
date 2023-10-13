create database if not exists `parking` CHARACTER SET utf8mb4;

use `parking`;

create table if not exists parking_domain (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  domain_name_ace varchar(253) CHARACTER SET utf8mb4 NOT NULL,
  domain_name_idn varchar(253) CHARACTER SET utf8mb4 NOT NULL,
  customer_id int(10) unsigned DEFAULT NULL,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY UNIQUE_domain_name (domain_name_ace)
) ENGINE=InnoDB;

create table if not exists parking_related_link (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  related_link varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY UNIQUE_related_link (related_link)
) ENGINE=InnoDB;

create table if not exists parking_domain_has_related_link
(
    domain_id  int(10) unsigned                    not null,
    related_link_id int(10) unsigned               not null,
    created    timestamp default CURRENT_TIMESTAMP not null,
    constraint primary key (domain_id, related_link_id)
) ENGINE=InnoDB;
