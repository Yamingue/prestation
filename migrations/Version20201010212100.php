<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201010212100 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, service_id INTEGER DEFAULT NULL, tel INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL, commentaire VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_2694D7A5A76ED395 ON demande (user_id)');
        $this->addSql('CREATE INDEX IDX_2694D7A5ED5CA9E6 ON demande (service_id)');
        $this->addSql('CREATE TABLE demande_r (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, nombre INTEGER NOT NULL, type VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, commentaire CLOB NOT NULL)');
        $this->addSql('CREATE INDEX IDX_9366A3BA76ED395 ON demande_r (user_id)');
        $this->addSql('CREATE TABLE rapport (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, suivi_id INTEGER NOT NULL, user_id INTEGER DEFAULT NULL, titre VARCHAR(255) NOT NULL, commentaire CLOB NOT NULL)');
        $this->addSql('CREATE INDEX IDX_BE34A09C7FEA59C0 ON rapport (suivi_id)');
        $this->addSql('CREATE INDEX IDX_BE34A09CA76ED395 ON rapport (user_id)');
        $this->addSql('CREATE TABLE service (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE suivi (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cause VARCHAR(255) DEFAULT NULL, code INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE demande_r');
        $this->addSql('DROP TABLE rapport');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE suivi');
        $this->addSql('DROP TABLE user');
    }
}
