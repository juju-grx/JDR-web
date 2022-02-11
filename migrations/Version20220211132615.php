<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211132615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE caracter');
        $this->addSql('DROP TABLE mob');
        $this->addSql('DROP TABLE pnj');
        $this->addSql('ALTER TABLE entity ADD user_id INT NOT NULL, ADD statistical_id INT NOT NULL, ADD class_id INT NOT NULL, ADD type VARCHAR(255) NOT NULL, ADD strenght INT DEFAULT NULL, ADD agility INT DEFAULT NULL, ADD intelligence INT DEFAULT NULL, ADD charisma INT DEFAULT NULL, ADD constitution INT DEFAULT NULL, ADD wisdom INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E284468A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E284468D0DEC93B FOREIGN KEY (statistical_id) REFERENCES statistical (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E284468EA000B10 FOREIGN KEY (class_id) REFERENCES speciality (id)');
        $this->addSql('CREATE INDEX IDX_E284468A76ED395 ON entity (user_id)');
        $this->addSql('CREATE INDEX IDX_E284468D0DEC93B ON entity (statistical_id)');
        $this->addSql('CREATE INDEX IDX_E284468EA000B10 ON entity (class_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caracter (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, statistical_id INT NOT NULL, class_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, size DOUBLE PRECISION NOT NULL, level INT NOT NULL, health INT NOT NULL, strenght INT NOT NULL, agility INT NOT NULL, intelligence INT NOT NULL, charisma INT NOT NULL, constitution INT NOT NULL, wisdom INT NOT NULL, INDEX IDX_28D5DAC4A76ED395 (user_id), INDEX IDX_28D5DAC4EA000B10 (class_id), UNIQUE INDEX UNIQ_28D5DAC4D0DEC93B (statistical_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mob (id INT AUTO_INCREMENT NOT NULL, statistical_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, size DOUBLE PRECISION NOT NULL, level INT NOT NULL, health INT NOT NULL, UNIQUE INDEX UNIQ_FE97F67DD0DEC93B (statistical_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pnj (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, size DOUBLE PRECISION NOT NULL, level INT NOT NULL, health INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE caracter ADD CONSTRAINT FK_28D5DAC4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE caracter ADD CONSTRAINT FK_28D5DAC4D0DEC93B FOREIGN KEY (statistical_id) REFERENCES statistical (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE caracter ADD CONSTRAINT FK_28D5DAC4EA000B10 FOREIGN KEY (class_id) REFERENCES speciality (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE mob ADD CONSTRAINT FK_FE97F67DD0DEC93B FOREIGN KEY (statistical_id) REFERENCES statistical (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E284468A76ED395');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E284468D0DEC93B');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E284468EA000B10');
        $this->addSql('DROP INDEX IDX_E284468A76ED395 ON entity');
        $this->addSql('DROP INDEX IDX_E284468D0DEC93B ON entity');
        $this->addSql('DROP INDEX IDX_E284468EA000B10 ON entity');
        $this->addSql('ALTER TABLE entity DROP user_id, DROP statistical_id, DROP class_id, DROP type, DROP strenght, DROP agility, DROP intelligence, DROP charisma, DROP constitution, DROP wisdom, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE job CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE skill CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type_test type_test VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE special_action CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type_test type_test VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE speciality CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE username username VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
