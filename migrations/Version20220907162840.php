<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220907162840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE companies CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE company company VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE divisions CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE division division VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_professions');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_companies');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_roles');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_divisions');
        $this->addSql('DROP INDEX ix_jobs_date_published ON jobs');
        $this->addSql('ALTER TABLE jobs CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE company_id company_id INT NOT NULL, CHANGE profession_id profession_id INT NOT NULL, CHANGE division_id division_id INT NOT NULL, CHANGE role_id role_id INT NOT NULL, CHANGE job_ref job_ref VARCHAR(255) DEFAULT NULL, CHANGE date_published date_published DATE DEFAULT NULL, CHANGE refkey refkey VARCHAR(32) DEFAULT NULL');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5979B1AD6 FOREIGN KEY (company_id) REFERENCES companies (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5FDEF8996 FOREIGN KEY (profession_id) REFERENCES professions (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC541859289 FOREIGN KEY (division_id) REFERENCES divisions (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5D60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE jobs RENAME INDEX ix_jobs_company_id TO IDX_A8936DC5979B1AD6');
        $this->addSql('ALTER TABLE jobs RENAME INDEX ix_jobs_profession_id TO IDX_A8936DC5FDEF8996');
        $this->addSql('ALTER TABLE jobs RENAME INDEX ix_jobs_division_id TO IDX_A8936DC541859289');
        $this->addSql('ALTER TABLE jobs RENAME INDEX ix_jobs_role_id TO IDX_A8936DC5D60322AC');
        $this->addSql('ALTER TABLE professions CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE profession profession VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE roles CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE role role VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE companies CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE company company VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE divisions CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE division division VARCHAR(255) DEFAULT \'\'\'\'\'\' NOT NULL');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5979B1AD6');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5FDEF8996');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC541859289');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5D60322AC');
        $this->addSql('ALTER TABLE jobs CHANGE id id CHAR(36) NOT NULL, CHANGE company_id company_id INT UNSIGNED NOT NULL, CHANGE profession_id profession_id INT UNSIGNED NOT NULL, CHANGE division_id division_id INT UNSIGNED NOT NULL, CHANGE role_id role_id INT UNSIGNED NOT NULL, CHANGE job_ref job_ref VARCHAR(255) DEFAULT \'NULL\', CHANGE refkey refkey CHAR(32) DEFAULT \'NULL\', CHANGE date_published date_published DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_professions FOREIGN KEY (profession_id) REFERENCES professions (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_companies FOREIGN KEY (company_id) REFERENCES companies (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_roles FOREIGN KEY (role_id) REFERENCES roles (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_divisions FOREIGN KEY (division_id) REFERENCES divisions (id) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX ix_jobs_date_published ON jobs (date_published)');
        $this->addSql('ALTER TABLE jobs RENAME INDEX idx_a8936dc541859289 TO ix_jobs_division_id');
        $this->addSql('ALTER TABLE jobs RENAME INDEX idx_a8936dc5d60322ac TO ix_jobs_role_id');
        $this->addSql('ALTER TABLE jobs RENAME INDEX idx_a8936dc5979b1ad6 TO ix_jobs_company_id');
        $this->addSql('ALTER TABLE jobs RENAME INDEX idx_a8936dc5fdef8996 TO ix_jobs_profession_id');
        $this->addSql('ALTER TABLE professions CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE profession profession VARCHAR(255) DEFAULT \'\'\'\'\'\' NOT NULL');
        $this->addSql('ALTER TABLE roles CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE role role VARCHAR(255) DEFAULT \'\'\'\'\'\' NOT NULL');
    }
}
