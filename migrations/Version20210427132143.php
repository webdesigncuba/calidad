<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427132143 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE area (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento (id INT AUTO_INCREMENT NOT NULL, area_id INT DEFAULT NULL, tipo_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, fechadoc DATE NOT NULL, estado TINYINT(1) NOT NULL, fichero VARCHAR(255) NOT NULL, INDEX IDX_B6B12EC7BD0F409C (area_id), INDEX IDX_B6B12EC7A9276E6C (tipo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documentos (id INT AUTO_INCREMENT NOT NULL, tipo_id INT DEFAULT NULL, area_id INT DEFAULT NULL, fecha DATE NOT NULL, nombre VARCHAR(255) NOT NULL, documento VARCHAR(255) NOT NULL, estado TINYINT(1) NOT NULL, update_at DATETIME NOT NULL, INDEX IDX_1EB82936A9276E6C (tipo_id), INDEX IDX_1EB82936BD0F409C (area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_doc (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC7BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC7A9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo (id)');
        $this->addSql('ALTER TABLE documentos ADD CONSTRAINT FK_1EB82936A9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo_doc (id)');
        $this->addSql('ALTER TABLE documentos ADD CONSTRAINT FK_1EB82936BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documento DROP FOREIGN KEY FK_B6B12EC7BD0F409C');
        $this->addSql('ALTER TABLE documentos DROP FOREIGN KEY FK_1EB82936BD0F409C');
        $this->addSql('ALTER TABLE documento DROP FOREIGN KEY FK_B6B12EC7A9276E6C');
        $this->addSql('ALTER TABLE documentos DROP FOREIGN KEY FK_1EB82936A9276E6C');
        $this->addSql('DROP TABLE area');
        $this->addSql('DROP TABLE documento');
        $this->addSql('DROP TABLE documentos');
        $this->addSql('DROP TABLE tipo');
        $this->addSql('DROP TABLE tipo_doc');
        $this->addSql('DROP TABLE user');
    }
}
