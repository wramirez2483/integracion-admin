-- liquibase formatted sql

-- changeset FabricaSoftware:1711205627004-27
alter table seeds
    add tipe_program text not null after id;
-- changeset FabricaSoftware:1711205627004-28
alter table seeds
    add formation_level text not null after tipe_program;
-- changeset FabricaSoftware:1711205627004-29
alter table seeds
    modify modality text charset utf8mb4 not null after formation_level;
-- changeset FabricaSoftware:1711205627004-30
alter table seeds
    add code bigint not null after modality;
-- changeset FabricaSoftware:1711205627004-31

alter table seeds
    change code id_seed text charset utf8mb4 not null;
-- changeset FabricaSoftware:1711205627004-32

alter table seeds
    add name_prog text not null;
-- changeset FabricaSoftware:1711205627004-33

alter table seeds
    add design_version int null;
-- changeset FabricaSoftware:1711205627004-34

alter table seeds
    add seed_version int not null;
-- changeset FabricaSoftware:1711205627004-35

alter table seeds
    add current_version text not null;
-- changeset FabricaSoftware:1711205627004-36
alter table seeds
    add status_seed text not null;

