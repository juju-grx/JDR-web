<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220218154104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE asset (id INT AUTO_INCREMENT NOT NULL, type_class_id INT DEFAULT NULL, element_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, cooldown INT NOT NULL, type VARCHAR(255) NOT NULL, use_type VARCHAR(255) DEFAULT NULL, level INT DEFAULT NULL, UNIQUE INDEX UNIQ_2AF5A5C5E237E06 (name), INDEX IDX_2AF5A5C27FF2CEC (type_class_id), INDEX IDX_2AF5A5C1F1F2A24 (element_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_type_class (skill_id INT NOT NULL, type_class_id INT NOT NULL, INDEX IDX_F6CE421A5585C142 (skill_id), INDEX IDX_F6CE421A27FF2CEC (type_class_id), PRIMARY KEY(skill_id, type_class_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, element_id INT NOT NULL, user_id INT NOT NULL, statistical_id INT NOT NULL, class_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, size DOUBLE PRECISION NOT NULL, level INT NOT NULL, health INT NOT NULL, type VARCHAR(255) NOT NULL, strenght INT DEFAULT NULL, agility INT DEFAULT NULL, intelligence INT DEFAULT NULL, charisma INT DEFAULT NULL, constitution INT DEFAULT NULL, wisdom INT DEFAULT NULL, INDEX IDX_E2844686E59D40D (race_id), INDEX IDX_E2844681F1F2A24 (element_id), INDEX IDX_E284468A76ED395 (user_id), INDEX IDX_E284468D0DEC93B (statistical_id), INDEX IDX_E284468EA000B10 (class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entity_job (entity_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_8557805F81257D5D (entity_id), INDEX IDX_8557805FBE04EA9 (job_id), PRIMARY KEY(entity_id, job_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_FBD8E0F85E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality (id INT AUTO_INCREMENT NOT NULL, evolution_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rate_physical_attack DOUBLE PRECISION NOT NULL, rate_magic_attack DOUBLE PRECISION NOT NULL, rate_physical_resistance DOUBLE PRECISION NOT NULL, rate_magic_resistance DOUBLE PRECISION NOT NULL, rate_physical_stamina DOUBLE PRECISION NOT NULL, rate_magic_stamina DOUBLE PRECISION NOT NULL, rate_speed DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, level INT DEFAULT NULL, max_size DOUBLE PRECISION DEFAULT NULL, min_size DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_F3D7A08E5E237E06 (name), INDEX IDX_F3D7A08ECDFF215A (evolution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistical (id INT AUTO_INCREMENT NOT NULL, physical_attack INT NOT NULL, magic_attack INT NOT NULL, physical_resistance INT NOT NULL, magic_resistance INT NOT NULL, physical_stamina INT NOT NULL, magic_stamina INT NOT NULL, speed INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user (user_source INT NOT NULL, user_target INT NOT NULL, INDEX IDX_F7129A803AD8644E (user_source), INDEX IDX_F7129A80233D34C1 (user_target), PRIMARY KEY(user_source, user_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asset ADD CONSTRAINT FK_2AF5A5C27FF2CEC FOREIGN KEY (type_class_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE asset ADD CONSTRAINT FK_2AF5A5C1F1F2A24 FOREIGN KEY (element_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE skill_type_class ADD CONSTRAINT FK_F6CE421A5585C142 FOREIGN KEY (skill_id) REFERENCES asset (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_type_class ADD CONSTRAINT FK_F6CE421A27FF2CEC FOREIGN KEY (type_class_id) REFERENCES speciality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E2844686E59D40D FOREIGN KEY (race_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E2844681F1F2A24 FOREIGN KEY (element_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E284468A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E284468D0DEC93B FOREIGN KEY (statistical_id) REFERENCES statistical (id)');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E284468EA000B10 FOREIGN KEY (class_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE entity_job ADD CONSTRAINT FK_8557805F81257D5D FOREIGN KEY (entity_id) REFERENCES entity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entity_job ADD CONSTRAINT FK_8557805FBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speciality ADD CONSTRAINT FK_F3D7A08ECDFF215A FOREIGN KEY (evolution_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A803AD8644E FOREIGN KEY (user_source) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user ADD CONSTRAINT FK_F7129A80233D34C1 FOREIGN KEY (user_target) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill_type_class DROP FOREIGN KEY FK_F6CE421A5585C142');
        $this->addSql('ALTER TABLE entity_job DROP FOREIGN KEY FK_8557805F81257D5D');
        $this->addSql('ALTER TABLE entity_job DROP FOREIGN KEY FK_8557805FBE04EA9');
        $this->addSql('ALTER TABLE asset DROP FOREIGN KEY FK_2AF5A5C27FF2CEC');
        $this->addSql('ALTER TABLE asset DROP FOREIGN KEY FK_2AF5A5C1F1F2A24');
        $this->addSql('ALTER TABLE skill_type_class DROP FOREIGN KEY FK_F6CE421A27FF2CEC');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E2844686E59D40D');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E2844681F1F2A24');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E284468EA000B10');
        $this->addSql('ALTER TABLE speciality DROP FOREIGN KEY FK_F3D7A08ECDFF215A');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E284468D0DEC93B');
        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E284468A76ED395');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A803AD8644E');
        $this->addSql('ALTER TABLE user_user DROP FOREIGN KEY FK_F7129A80233D34C1');
        $this->addSql('DROP TABLE asset');
        $this->addSql('DROP TABLE skill_type_class');
        $this->addSql('DROP TABLE entity');
        $this->addSql('DROP TABLE entity_job');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE statistical');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_user');
    }
}
