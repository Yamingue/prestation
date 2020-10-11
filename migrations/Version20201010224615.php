<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201010224615 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_2694D7A5ED5CA9E6');
        $this->addSql('DROP INDEX IDX_2694D7A5A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__demande AS SELECT id, user_id, service_id, tel, email, commentaire FROM demande');
        $this->addSql('DROP TABLE demande');
        $this->addSql('CREATE TABLE demande (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, service_id INTEGER DEFAULT NULL, tel INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL COLLATE BINARY, commentaire CLOB NOT NULL, CONSTRAINT FK_2694D7A5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_2694D7A5ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO demande (id, user_id, service_id, tel, email, commentaire) SELECT id, user_id, service_id, tel, email, commentaire FROM __temp__demande');
        $this->addSql('DROP TABLE __temp__demande');
        $this->addSql('CREATE INDEX IDX_2694D7A5ED5CA9E6 ON demande (service_id)');
        $this->addSql('CREATE INDEX IDX_2694D7A5A76ED395 ON demande (user_id)');
        $this->addSql('DROP INDEX IDX_9366A3BA76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__demande_r AS SELECT id, user_id, nombre, type, tel, mail, titre, commentaire FROM demande_r');
        $this->addSql('DROP TABLE demande_r');
        $this->addSql('CREATE TABLE demande_r (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, nombre INTEGER NOT NULL, type VARCHAR(255) NOT NULL COLLATE BINARY, tel VARCHAR(255) NOT NULL COLLATE BINARY, mail VARCHAR(255) NOT NULL COLLATE BINARY, titre VARCHAR(255) NOT NULL COLLATE BINARY, commentaire CLOB NOT NULL COLLATE BINARY, CONSTRAINT FK_9366A3BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO demande_r (id, user_id, nombre, type, tel, mail, titre, commentaire) SELECT id, user_id, nombre, type, tel, mail, titre, commentaire FROM __temp__demande_r');
        $this->addSql('DROP TABLE __temp__demande_r');
        $this->addSql('CREATE INDEX IDX_9366A3BA76ED395 ON demande_r (user_id)');
        $this->addSql('DROP INDEX IDX_BE34A09CA76ED395');
        $this->addSql('DROP INDEX IDX_BE34A09C7FEA59C0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__rapport AS SELECT id, suivi_id, user_id, titre, commentaire FROM rapport');
        $this->addSql('DROP TABLE rapport');
        $this->addSql('CREATE TABLE rapport (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, suivi_id INTEGER NOT NULL, user_id INTEGER DEFAULT NULL, titre VARCHAR(255) NOT NULL COLLATE BINARY, commentaire CLOB NOT NULL COLLATE BINARY, CONSTRAINT FK_BE34A09C7FEA59C0 FOREIGN KEY (suivi_id) REFERENCES suivi (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_BE34A09CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO rapport (id, suivi_id, user_id, titre, commentaire) SELECT id, suivi_id, user_id, titre, commentaire FROM __temp__rapport');
        $this->addSql('DROP TABLE __temp__rapport');
        $this->addSql('CREATE INDEX IDX_BE34A09CA76ED395 ON rapport (user_id)');
        $this->addSql('CREATE INDEX IDX_BE34A09C7FEA59C0 ON rapport (suivi_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_2694D7A5A76ED395');
        $this->addSql('DROP INDEX IDX_2694D7A5ED5CA9E6');
        $this->addSql('CREATE TEMPORARY TABLE __temp__demande AS SELECT id, user_id, service_id, tel, email, commentaire FROM demande');
        $this->addSql('DROP TABLE demande');
        $this->addSql('CREATE TABLE demande (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, service_id INTEGER DEFAULT NULL, tel INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL, commentaire VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO demande (id, user_id, service_id, tel, email, commentaire) SELECT id, user_id, service_id, tel, email, commentaire FROM __temp__demande');
        $this->addSql('DROP TABLE __temp__demande');
        $this->addSql('CREATE INDEX IDX_2694D7A5A76ED395 ON demande (user_id)');
        $this->addSql('CREATE INDEX IDX_2694D7A5ED5CA9E6 ON demande (service_id)');
        $this->addSql('DROP INDEX IDX_9366A3BA76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__demande_r AS SELECT id, user_id, nombre, type, tel, mail, titre, commentaire FROM demande_r');
        $this->addSql('DROP TABLE demande_r');
        $this->addSql('CREATE TABLE demande_r (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, nombre INTEGER NOT NULL, type VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, commentaire CLOB NOT NULL)');
        $this->addSql('INSERT INTO demande_r (id, user_id, nombre, type, tel, mail, titre, commentaire) SELECT id, user_id, nombre, type, tel, mail, titre, commentaire FROM __temp__demande_r');
        $this->addSql('DROP TABLE __temp__demande_r');
        $this->addSql('CREATE INDEX IDX_9366A3BA76ED395 ON demande_r (user_id)');
        $this->addSql('DROP INDEX IDX_BE34A09C7FEA59C0');
        $this->addSql('DROP INDEX IDX_BE34A09CA76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__rapport AS SELECT id, suivi_id, user_id, titre, commentaire FROM rapport');
        $this->addSql('DROP TABLE rapport');
        $this->addSql('CREATE TABLE rapport (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, suivi_id INTEGER NOT NULL, user_id INTEGER DEFAULT NULL, titre VARCHAR(255) NOT NULL, commentaire CLOB NOT NULL)');
        $this->addSql('INSERT INTO rapport (id, suivi_id, user_id, titre, commentaire) SELECT id, suivi_id, user_id, titre, commentaire FROM __temp__rapport');
        $this->addSql('DROP TABLE __temp__rapport');
        $this->addSql('CREATE INDEX IDX_BE34A09C7FEA59C0 ON rapport (suivi_id)');
        $this->addSql('CREATE INDEX IDX_BE34A09CA76ED395 ON rapport (user_id)');
    }
}
