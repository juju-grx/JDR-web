<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211162859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entity (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, element_id INT NOT NULL, user_id INT NOT NULL, statistical_id INT NOT NULL, class_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, size DOUBLE PRECISION NOT NULL, level INT NOT NULL, health INT NOT NULL, type VARCHAR(255) NOT NULL, strenght INT DEFAULT NULL, agility INT DEFAULT NULL, intelligence INT DEFAULT NULL, charisma INT DEFAULT NULL, constitution INT DEFAULT NULL, wisdom INT DEFAULT NULL, INDEX IDX_E2844686E59D40D (race_id), INDEX IDX_E2844681F1F2A24 (element_id), INDEX IDX_E284468A76ED395 (user_id), INDEX IDX_E284468D0DEC93B (statistical_id), INDEX IDX_E284468EA000B10 (class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity_job (entity_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_8557805F81257D5D (entity_id), INDEX IDX_8557805FBE04EA9 (job_id), PRIMARY KEY(entity_id, job_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, element_id INT DEFAULT NULL, type_class_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, level INT NOT NULL, value_test INT NOT NULL, type_test VARCHAR(255) NOT NULL, INDEX IDX_5E3DE4771F1F2A24 (element_id), INDEX IDX_5E3DE47727FF2CEC (type_class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE special_action (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, value_test INT NOT NULL, type_test VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality (id INT AUTO_INCREMENT NOT NULL, evolution_id INT DEFAULT NULL, special_action_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rate_physical_attack DOUBLE PRECISION NOT NULL, rate_magic_attack DOUBLE PRECISION NOT NULL, rate_physical_resistance DOUBLE PRECISION NOT NULL, rate_magic_resistance DOUBLE PRECISION NOT NULL, rate_physical_stamina DOUBLE PRECISION NOT NULL, rate_magic_stamina DOUBLE PRECISION NOT NULL, rate_speed DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, level INT DEFAULT NULL, max_size DOUBLE PRECISION DEFAULT NULL, min_size DOUBLE PRECISION DEFAULT NULL, INDEX IDX_F3D7A08ECDFF215A (evolution_id), INDEX IDX_F3D7A08EF3D94BB9 (special_action_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistical (id INT AUTO_INCREMENT NOT NULL, physical_attack INT NOT NULL, magic_attack INT NOT NULL, physical_resistance INT NOT NULL, magic_resistance INT NOT NULL, physical_stamina INT NOT NULL, magic_stamina INT NOT NULL, speed INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user (user_source INT NOT NULL, user_target INT NOT NULL, INDEX IDX_F7129A803AD8644E (user_source), INDEX IDX_F7129A80233D34C1 (user_target), PRIMARY KEY(user_source, user_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E2844686E59D40D FOREIGN KEY (race_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E2844681F1F2A24 FOREIGN KEY (element_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E284468A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E284468D0DEC93B FOREIGN KEY (statistical_id) REFERENCES statistical (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E284468EA000B10 FOREIGN KEY (class_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE entity_job ADD CONSTRAINT FK_8557805F81257D5D FOREIGN KEY (entity_id) REFERENCES entity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entity_job ADD CONSTRAINT FK_8557805FBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4771F1F2A24 FOREIGN KEY (element_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE47727FF2CEC FOREIGN KEY (type_class_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE speciality ADD CONSTRAINT FK_F3D7A08ECDFF215A FOREIGN KEY (evolution_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE speciality ADD CONSTRAINT FK_F3D7A08EF3D94BB9 FOREIGN KEY (special_action_id) REFERENCES special_action (id)');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A803AD8644E FOREIGN KEY (user_source) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A80233D34C1 FOREIGN KEY (user_target) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entity_job DROP FOREIGN KEY FK_8557805F81257D5D');
        $this->addSql('ALTER TABLE entity_job DROP FOREIGN KEY FK_8557805FBE04EA9');
        $this->addSql('ALTER TABLE speciality DROP FOREIGN KEY FK_F3D7A08EF3D94BB9');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E2844686E59D40D');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E2844681F1F2A24');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E284468EA000B10');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4771F1F2A24');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE47727FF2CEC');
        $this->addSql('ALTER TABLE speciality DROP FOREIGN KEY FK_F3D7A08ECDFF215A');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E284468D0DEC93B');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E284468A76ED395');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A803AD8644E');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A80233D34C1');
        $this->addSql('DROP TABLE entity');
        $this->addSql('DROP TABLE entity_job');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE special_action');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE statistical');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_user');
    }
}
