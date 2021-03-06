# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.1.0                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          MEUBANCOCERTO2.dez                              #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2019-11-26 22:01                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Drop foreign key constraints                                           #
# ---------------------------------------------------------------------- #
ALTER TABLE `usuario` DROP FOREIGN KEY `cidade_usuario`;
ALTER TABLE `agenda` DROP FOREIGN KEY `cardapioFinalizado_agenda`;
ALTER TABLE `agenda` DROP FOREIGN KEY `usuario_agenda`;
ALTER TABLE `cardapiopronto_ingredientes` DROP FOREIGN KEY `cardapioPronto_cardapiopronto_ingredientes`;
ALTER TABLE `cardapiopronto_ingredientes` DROP FOREIGN KEY `ingredientes_cardapiopronto_ingredientes`;
ALTER TABLE `cardapio` DROP FOREIGN KEY `cardapioPronto_cardapio`;
ALTER TABLE `cardapio` DROP FOREIGN KEY `cardapioFinalizado_cardapio`;

# ---------------------------------------------------------------------- #
# Drop table "agenda"                                                    #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #
ALTER TABLE `agenda` MODIFY `age_codigo` INTEGER NOT NULL;

# Drop constraints #
ALTER TABLE `agenda` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `agenda`;

# ---------------------------------------------------------------------- #
# Drop table "usuario"                                                   #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #
ALTER TABLE `usuario` MODIFY `usu_codigo` INTEGER NOT NULL;

# Drop constraints #
ALTER TABLE `usuario` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `usuario`;

# ---------------------------------------------------------------------- #
# Drop table "cardapio"                                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #
ALTER TABLE `cardapio` MODIFY `car_codigo` INTEGER NOT NULL;

# Drop constraints #
ALTER TABLE `cardapio` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `cardapio`;

# ---------------------------------------------------------------------- #
# Drop table "cardapiopronto_ingredientes"                               #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #
ALTER TABLE `cardapiopronto_ingredientes` MODIFY `cpi_codigo` INTEGER NOT NULL;

# Drop constraints #
ALTER TABLE `cardapiopronto_ingredientes` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `cardapiopronto_ingredientes`;

# ---------------------------------------------------------------------- #
# Drop table "cardapioFinalizado"                                        #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #
ALTER TABLE `cardapioFinalizado` MODIFY `cf_codigo` INTEGER NOT NULL;

# Drop constraints #
ALTER TABLE `cardapioFinalizado` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `cardapioFinalizado`;

# ---------------------------------------------------------------------- #
# Drop table "ingredientes"                                              #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #
ALTER TABLE `ingredientes` MODIFY `ing_codigo` INTEGER NOT NULL;

# Drop constraints #
ALTER TABLE `ingredientes` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `ingredientes`;

# ---------------------------------------------------------------------- #
# Drop table "cardapioPronto"                                            #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #
ALTER TABLE `cardapioPronto` MODIFY `cp_codigo` INTEGER NOT NULL;

# Drop constraints #
ALTER TABLE `cardapioPronto` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `cardapioPronto`;

# ---------------------------------------------------------------------- #
# Drop table "cidade"                                                    #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #
ALTER TABLE `cidade` MODIFY `cid_codigo` INTEGER NOT NULL;

# Drop constraints #
ALTER TABLE `cidade` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `cidade`;
