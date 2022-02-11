<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211132350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caracter ADD CONSTRAINT FK_28D5DAC4EA000B10 FOREIGN KEY (class_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E2844686E59D40D FOREIGN KEY (race_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E2844681F1F2A24 FOREIGN KEY (element_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE mob DROP strenght, DROP agility, DROP intelligence, DROP charisma, DROP constitution, DROP wisdom');
        $this->addSql('ALTER TABLE pnj DROP strenght, DROP agility, DROP intelligence, DROP charisma, DROP constitution, DROP wisdom');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4771F1F2A24 FOREIGN KEY (element_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE47727FF2CEC FOREIGN KEY (type_class_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE speciality ADD evolution_id INT DEFAULT NULL, ADD special_action_id INT NOT NULL, ADD type VARCHAR(255) NOT NULL, ADD level INT DEFAULT NULL, ADD max_size DOUBLE PRECISION DEFAULT NULL, ADD min_size DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality ADD CONSTRAINT FK_F3D7A08ECDFF215A FOREIGN KEY (evolution_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE speciality ADD CONSTRAINT FK_F3D7A08EF3D94BB9 FOREIGN KEY (special_action_id) REFERENCES special_action (id)');
        $this->addSql('CREATE INDEX IDX_F3D7A08ECDFF215A ON speciality (evolution_id)');
        $this->addSql('CREATE INDEX IDX_F3D7A08EF3D94BB9 ON speciality (special_action_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caracter DROP FOREIGN KEY FK_28D5DAC4EA000B10');
        $this->addSql('ALTER TABLE caracter CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E2844686E59D40D');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E2844681F1F2A24');
        $this->addSql('ALTER TABLE entity CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE job CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE mob ADD strenght INT NOT NULL, ADD agility INT NOT NULL, ADD intelligence INT NOT NULL, ADD charisma INT NOT NULL, ADD constitution INT NOT NULL, ADD wisdom INT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE pnj ADD strenght INT NOT NULL, ADD agility INT NOT NULL, ADD intelligence INT NOT NULL, ADD charisma INT NOT NULL, ADD constitution INT NOT NULL, ADD wisdom INT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4771F1F2A24');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE47727FF2CEC');
        $this->addSql('ALTER TABLE skill CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type_test type_test VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE special_action CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type_test type_test VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE speciality DROP FOREIGN KEY FK_F3D7A08ECDFF215A');
        $this->addSql('ALTER TABLE speciality DROP FOREIGN KEY FK_F3D7A08EF3D94BB9');
        $this->addSql('DROP INDEX IDX_F3D7A08ECDFF215A ON speciality');
        $this->addSql('DROP INDEX IDX_F3D7A08EF3D94BB9 ON speciality');
        $this->addSql('ALTER TABLE speciality DROP evolution_id, DROP special_action_id, DROP type, DROP level, DROP max_size, DROP min_size, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE username username VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
