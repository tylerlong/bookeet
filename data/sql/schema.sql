CREATE TABLE article (id BIGINT AUTO_INCREMENT, is_activated TINYINT(1) DEFAULT '1' NOT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, html_description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE book (id BIGINT AUTO_INCREMENT, is_activated TINYINT(1) DEFAULT '1' NOT NULL, user_id BIGINT NOT NULL, title VARCHAR(255) NOT NULL UNIQUE, author VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE chapter (id BIGINT AUTO_INCREMENT, is_activated TINYINT(1) DEFAULT '1' NOT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, html_description TEXT, translation_id BIGINT NOT NULL, number BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, UNIQUE INDEX translation_id_title_UNIQUE_idx (translation_id, title), INDEX translation_id_idx (translation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE edition (id BIGINT AUTO_INCREMENT, is_activated TINYINT(1) DEFAULT '1' NOT NULL, user_id BIGINT NOT NULL, book_id BIGINT NOT NULL, version VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, UNIQUE INDEX book_id_version_UNIQUE_idx (book_id, version), INDEX book_id_idx (book_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE item (id BIGINT AUTO_INCREMENT, is_activated TINYINT(1) DEFAULT '1' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE language (id BIGINT AUTO_INCREMENT, code VARCHAR(2) NOT NULL UNIQUE, name VARCHAR(63) NOT NULL UNIQUE, localized_name VARCHAR(63) NOT NULL UNIQUE, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE section (id BIGINT AUTO_INCREMENT, is_activated TINYINT(1) DEFAULT '1' NOT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, html_description TEXT, chapter_id BIGINT NOT NULL, number BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, UNIQUE INDEX chapter_id_title_UNIQUE_idx (chapter_id, title), INDEX chapter_id_idx (chapter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE translation (id BIGINT AUTO_INCREMENT, is_activated TINYINT(1) DEFAULT '1' NOT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, html_description TEXT, user_id BIGINT NOT NULL, edition_id BIGINT NOT NULL, language_id BIGINT NOT NULL, url VARCHAR(255) UNIQUE, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, UNIQUE INDEX edition_id_language_id_UNIQUE_idx (edition_id, language_id), INDEX edition_id_idx (edition_id), INDEX language_id_idx (language_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE book ADD CONSTRAINT book_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE chapter ADD CONSTRAINT chapter_translation_id_translation_id FOREIGN KEY (translation_id) REFERENCES translation(id) ON DELETE CASCADE;
ALTER TABLE edition ADD CONSTRAINT edition_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE edition ADD CONSTRAINT edition_book_id_book_id FOREIGN KEY (book_id) REFERENCES book(id);
ALTER TABLE section ADD CONSTRAINT section_chapter_id_chapter_id FOREIGN KEY (chapter_id) REFERENCES chapter(id) ON DELETE CASCADE;
ALTER TABLE translation ADD CONSTRAINT translation_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE translation ADD CONSTRAINT translation_language_id_language_id FOREIGN KEY (language_id) REFERENCES language(id);
ALTER TABLE translation ADD CONSTRAINT translation_edition_id_edition_id FOREIGN KEY (edition_id) REFERENCES edition(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
