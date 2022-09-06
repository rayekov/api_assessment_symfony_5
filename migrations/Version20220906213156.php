<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220906213156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE companies (id INT AUTO_INCREMENT NOT NULL, company VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE divisions (id INT AUTO_INCREMENT NOT NULL, division VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobs (id VARCHAR(36) NOT NULL, company_id_id INT NOT NULL, profession_id_id INT NOT NULL, division_id_id INT NOT NULL, role_id_id INT NOT NULL, job VARCHAR(255) NOT NULL, job_ref VARCHAR(255) DEFAULT NULL, link VARCHAR(2000) NOT NULL, refkey VARCHAR(32) DEFAULT NULL, date_published DATE DEFAULT NULL, INDEX IDX_A8936DC538B53C32 (company_id_id), INDEX IDX_A8936DC5452BDD64 (profession_id_id), INDEX IDX_A8936DC556007A49 (division_id_id), INDEX IDX_A8936DC588987678 (role_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professions (id INT AUTO_INCREMENT NOT NULL, profession VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC538B53C32 FOREIGN KEY (company_id_id) REFERENCES companies (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5452BDD64 FOREIGN KEY (profession_id_id) REFERENCES professions (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC556007A49 FOREIGN KEY (division_id_id) REFERENCES divisions (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC588987678 FOREIGN KEY (role_id_id) REFERENCES roles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC538B53C32');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5452BDD64');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC556007A49');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC588987678');
        $this->addSql('DROP TABLE companies');
        $this->addSql('DROP TABLE divisions');
        $this->addSql('DROP TABLE jobs');
        $this->addSql('DROP TABLE professions');
        $this->addSql('DROP TABLE roles');
    }
}
