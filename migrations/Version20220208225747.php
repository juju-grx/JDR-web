<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220208225747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caracter (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, statistical_id INT NOT NULL, class_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, size DOUBLE PRECISION NOT NULL, level INT NOT NULL, health INT NOT NULL, strenght INT NOT NULL, agility INT NOT NULL, intelligence INT NOT NULL, charisma INT NOT NULL, constitution INT NOT NULL, wisdom INT NOT NULL, INDEX IDX_28D5DAC4A76ED395 (user_id), UNIQUE INDEX UNIQ_28D5DAC4D0DEC93B (statistical_id), INDEX IDX_28D5DAC4EA000B10 (class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, evolution_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rate_physical_attack DOUBLE PRECISION NOT NULL, rate_magic_attack DOUBLE PRECISION NOT NULL, rate_physical_resistance DOUBLE PRECISION NOT NULL, rate_magic_resistance DOUBLE PRECISION NOT NULL, rate_physical_stamina DOUBLE PRECISION NOT NULL, rate_magic_stamina DOUBLE PRECISION NOT NULL, rate_speed DOUBLE PRECISION NOT NULL, level INT NOT NULL, UNIQUE INDEX UNIQ_41405E39CDFF215A (evolution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, element_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, size DOUBLE PRECISION NOT NULL, level INT NOT NULL, health INT NOT NULL, INDEX IDX_E2844686E59D40D (race_id), INDEX IDX_E2844681F1F2A24 (element_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity_job (entity_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_8557805F81257D5D (entity_id), INDEX IDX_8557805FBE04EA9 (job_id), PRIMARY KEY(entity_id, job_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mob (id INT AUTO_INCREMENT NOT NULL, statistical_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, size DOUBLE PRECISION NOT NULL, level INT NOT NULL, health INT NOT NULL, strenght INT NOT NULL, agility INT NOT NULL, intelligence INT NOT NULL, charisma INT NOT NULL, constitution INT NOT NULL, wisdom INT NOT NULL, UNIQUE INDEX UNIQ_FE97F67DD0DEC93B (statistical_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pnj (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, size DOUBLE PRECISION NOT NULL, level INT NOT NULL, health INT NOT NULL, strenght INT NOT NULL, agility INT NOT NULL, intelligence INT NOT NULL, charisma INT NOT NULL, constitution INT NOT NULL, wisdom INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rate_physical_attack DOUBLE PRECISION NOT NULL, rate_magic_attack DOUBLE PRECISION NOT NULL, rate_physical_resistance DOUBLE PRECISION NOT NULL, rate_magic_resistance DOUBLE PRECISION NOT NULL, rate_physical_stamina DOUBLE PRECISION NOT NULL, rate_magic_stamina DOUBLE PRECISION NOT NULL, rate_speed DOUBLE PRECISION NOT NULL, max_size DOUBLE PRECISION NOT NULL, min_size DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, element_id INT DEFAULT NULL, type_class_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, level INT NOT NULL, value_test INT NOT NULL, type_test VARCHAR(255) NOT NULL, INDEX IDX_5E3DE4771F1F2A24 (element_id), INDEX IDX_5E3DE47727FF2CEC (type_class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE special_action (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, value_test INT NOT NULL, type_test VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rate_physical_attack DOUBLE PRECISION NOT NULL, rate_magic_attack DOUBLE PRECISION NOT NULL, rate_physical_resistance DOUBLE PRECISION NOT NULL, rate_magic_resistance DOUBLE PRECISION NOT NULL, rate_physical_stamina DOUBLE PRECISION NOT NULL, rate_magic_stamina DOUBLE PRECISION NOT NULL, rate_speed DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistical (id INT AUTO_INCREMENT NOT NULL, physical_attack INT NOT NULL, magic_attack INT NOT NULL, physical_resistance INT NOT NULL, magic_resistance INT NOT NULL, physical_stamina INT NOT NULL, magic_stamina INT NOT NULL, speed INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_class (id INT AUTO_INCREMENT NOT NULL, special_action_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rate_physical_attack DOUBLE PRECISION NOT NULL, rate_magic_attack DOUBLE PRECISION NOT NULL, rate_physical_resistance DOUBLE PRECISION NOT NULL, rate_magic_resistance DOUBLE PRECISION NOT NULL, rate_physical_stamina DOUBLE PRECISION NOT NULL, rate_magic_stamina DOUBLE PRECISION NOT NULL, rate_speed DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_E3479E68F3D94BB9 (special_action_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE caracter ADD CONSTRAINT FK_28D5DAC4A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE caracter ADD CONSTRAINT FK_28D5DAC4D0DEC93B FOREIGN KEY (statistical_id) REFERENCES statistical (id)');
        $this->addSql('ALTER TABLE caracter ADD CONSTRAINT FK_28D5DAC4EA000B10 FOREIGN KEY (class_id) REFERENCES type_class (id)');
        $this->addSql('ALTER TABLE element ADD CONSTRAINT FK_41405E39CDFF215A FOREIGN KEY (evolution_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E2844686E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E2844681F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE entity_job ADD CONSTRAINT FK_8557805F81257D5D FOREIGN KEY (entity_id) REFERENCES entity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entity_job ADD CONSTRAINT FK_8557805FBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mob ADD CONSTRAINT FK_FE97F67DD0DEC93B FOREIGN KEY (statistical_id) REFERENCES statistical (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4771F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE47727FF2CEC FOREIGN KEY (type_class_id) REFERENCES type_class (id)');
        $this->addSql('ALTER TABLE type_class ADD CONSTRAINT FK_E3479E68F3D94BB9 FOREIGN KEY (special_action_id) REFERENCES special_action (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE element DROP FOREIGN KEY FK_41405E39CDFF215A');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E2844681F1F2A24');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4771F1F2A24');
        $this->addSql('ALTER TABLE entity_job DROP FOREIGN KEY FK_8557805F81257D5D');
        $this->addSql('ALTER TABLE entity_job DROP FOREIGN KEY FK_8557805FBE04EA9');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E2844686E59D40D');
        $this->addSql('ALTER TABLE type_class DROP FOREIGN KEY FK_E3479E68F3D94BB9');
        $this->addSql('ALTER TABLE caracter DROP FOREIGN KEY FK_28D5DAC4D0DEC93B');
        $this->addSql('ALTER TABLE mob DROP FOREIGN KEY FK_FE97F67DD0DEC93B');
        $this->addSql('ALTER TABLE caracter DROP FOREIGN KEY FK_28D5DAC4EA000B10');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE47727FF2CEC');
        $this->addSql('DROP TABLE caracter');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE entity');
        $this->addSql('DROP TABLE entity_job');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE mob');
        $this->addSql('DROP TABLE pnj');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE special_action');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE statistical');
        $this->addSql('DROP TABLE type_class');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON `user`');
        $this->addSql('ALTER TABLE `user` CHANGE username username VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
