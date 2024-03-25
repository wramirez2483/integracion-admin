-- liquibase formatted sql

-- changeset FabricaSoftware:1711394576840-1
CREATE TABLE api_connection (id_api_connection INT NOT NULL, user VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, api_connection_url VARCHAR(60) NOT NULL, CONSTRAINT PK_API_CONNECTION PRIMARY KEY (id_api_connection));

-- changeset FabricaSoftware:1711394576840-2
CREATE TABLE audit (id INT AUTO_INCREMENT NOT NULL, events TEXT NOT NULL, date timestamp DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL, id_user BIGINT NOT NULL, CONSTRAINT PK_AUDIT PRIMARY KEY (id));

-- changeset FabricaSoftware:1711394576840-3
CREATE TABLE batch (id_batch INT AUTO_INCREMENT NOT NULL, integration_availabity BIT(1) NOT NULL, execution_schedule time NOT NULL, notifications_target LONGTEXT NOT NULL, user_id BIGINT NOT NULL, date_updated timestamp DEFAULT NOW() NOT NULL, CONSTRAINT PK_BATCH PRIMARY KEY (id_batch));

-- changeset FabricaSoftware:1711394576840-4
CREATE TABLE email_server (id_email_server INT AUTO_INCREMENT NOT NULL, email_server VARCHAR(60) NOT NULL, protocol VARCHAR(50) NOT NULL, port INT NOT NULL, user VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, user_id BIGINT NOT NULL, CONSTRAINT PK_EMAIL_SERVER PRIMARY KEY (id_email_server));

-- changeset FabricaSoftware:1711394576840-5
CREATE TABLE events_without_sync (id INT AUTO_INCREMENT NOT NULL, modality ENUM('V', 'A', 'P') NOT NULL, training ENUM('2', '6') NOT NULL, seed_code VARCHAR(50) NOT NULL, date_created timestamp DEFAULT NOW() NOT NULL, status_event TINYINT(3) DEFAULT 1 NOT NULL, events TEXT NOT NULL, user_id BIGINT NOT NULL, CONSTRAINT PK_EVENTS_WITHOUT_SYNC PRIMARY KEY (id));

-- changeset FabricaSoftware:1711394576840-6
CREATE TABLE histories (id INT AUTO_INCREMENT NOT NULL, user_id BIGINT NOT NULL, event TEXT NOT NULL, previous_state TEXT NOT NULL, new_state VARCHAR(100) NOT NULL, date timestamp DEFAULT NOW() NOT NULL, CONSTRAINT PK_HISTORIES PRIMARY KEY (id));

-- changeset FabricaSoftware:1711394576840-7
CREATE TABLE josso (id_josso INT AUTO_INCREMENT NOT NULL, url_service_gateway VARCHAR(60) NOT NULL, maximun_time_response_socket INT NOT NULL, maximun_time_response_webservice INT NOT NULL, name_plataforma VARCHAR(50) NOT NULL, user_id BIGINT NOT NULL, CONSTRAINT PK_JOSSO PRIMARY KEY (id_josso));

-- changeset FabricaSoftware:1711394576840-8
CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, url_web_service TEXT NOT NULL, user TEXT NOT NULL, password TEXT NOT NULL, sync_notes TINYINT(3) NULL, default_letter TEXT NOT NULL, CONSTRAINT PK_NOTE PRIMARY KEY (id));

-- changeset FabricaSoftware:1711394576840-9
CREATE TABLE platform_status (id INT AUTO_INCREMENT NOT NULL, name_platform TEXT NOT NULL, status TINYINT(3) NOT NULL, date timestamp DEFAULT NOW() NOT NULL, CONSTRAINT PK_PLATFORM_STATUS PRIMARY KEY (id));

-- changeset FabricaSoftware:1711394576840-10
CREATE TABLE reporte_batch (id_subprocess INT AUTO_INCREMENT NOT NULL, Id_details_batch INT NOT NULL, start_date timestamp DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL, end_date datetime NOT NULL, state ENUM('Finalizado', 'Fallido') NOT NULL, CONSTRAINT PK_REPORTE_BATCH PRIMARY KEY (id_subprocess));

-- changeset FabricaSoftware:1711394576840-11
CREATE TABLE reporte_josso (id_subprocess INT NOT NULL, id_details_josso INT NOT NULL, name VARCHAR(50) NOT NULL, total_events INT NOT NULL, date_event date NOT NULL);

-- changeset FabricaSoftware:1711394576840-12
CREATE TABLE reports (id_event VARCHAR(60) NOT NULL, type VARCHAR(60) NOT NULL, element_audit VARCHAR(60) NOT NULL, inside_identifier INT NOT NULL, outdide_identifier INT NOT NULL, message VARCHAR(60) NOT NULL, status VARCHAR(60) NOT NULL);

-- changeset FabricaSoftware:1711394576840-13
CREATE TABLE seeds (id INT AUTO_INCREMENT NOT NULL, program_type VARCHAR(50) NOT NULL, education_level VARCHAR(50) NOT NULL, code BIGINT NOT NULL, id_seed VARCHAR(255) NOT NULL, prog_name VARCHAR(255) NOT NULL, design_version TINYINT(3) NOT NULL, seed_version TINYINT(3) NOT NULL, current_version BIT(1) NOT NULL, status CHAR(1) NOT NULL, modality VARCHAR(255) NOT NULL, deletion_date date NULL, CONSTRAINT PK_SEEDS PRIMARY KEY (id));

-- changeset FabricaSoftware:1711394576840-14
CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(60) NOT NULL, `role` ENUM('admin', 'reader') NOT NULL, tipe_id ENUM('cc', 'ti', 'ce', 'pep', 'ppt') NOT NULL, num_id BIGINT NOT NULL, password VARCHAR(100) NOT NULL, date_created timestamp DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL, date_updated datetime NULL, CONSTRAINT PK_USERS PRIMARY KEY (id), UNIQUE (num_id));

-- changeset FabricaSoftware:1711394576840-15
CREATE INDEX id_user ON audit(id_user);

-- changeset FabricaSoftware:1711394576840-16
CREATE INDEX user_id ON batch(user_id);

-- changeset FabricaSoftware:1711394576840-17
CREATE INDEX user_id ON email_server(user_id);

-- changeset FabricaSoftware:1711394576840-18
CREATE INDEX user_id ON events_without_sync(user_id);

-- changeset FabricaSoftware:1711394576840-19
CREATE INDEX user_id ON histories(user_id);

-- changeset FabricaSoftware:1711394576840-20
CREATE INDEX user_id ON josso(user_id);

-- changeset FabricaSoftware:1711394576840-21
ALTER TABLE audit ADD CONSTRAINT audit_ibfk_1 FOREIGN KEY (id_user) REFERENCES users (num_id) ON UPDATE CASCADE ON DELETE CASCADE;

-- changeset FabricaSoftware:1711394576840-22
ALTER TABLE batch ADD CONSTRAINT batch_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (num_id) ON UPDATE CASCADE ON DELETE CASCADE;

-- changeset FabricaSoftware:1711394576840-23
ALTER TABLE email_server ADD CONSTRAINT email_server_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (num_id) ON UPDATE CASCADE ON DELETE CASCADE;

-- changeset FabricaSoftware:1711394576840-24
ALTER TABLE events_without_sync ADD CONSTRAINT events_without_sync_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (num_id) ON UPDATE CASCADE ON DELETE CASCADE;

-- changeset FabricaSoftware:1711394576840-25
ALTER TABLE histories ADD CONSTRAINT histories_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (num_id) ON UPDATE CASCADE ON DELETE CASCADE;

-- changeset FabricaSoftware:1711394576840-26
ALTER TABLE josso ADD CONSTRAINT josso_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (num_id) ON UPDATE CASCADE ON DELETE CASCADE;

