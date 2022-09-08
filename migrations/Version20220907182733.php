<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220907182733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users_settings (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date_filter_from DATE DEFAULT NULL, date_filter_to DATE DEFAULT NULL, company VARCHAR(255) DEFAULT NULL, filter_sort_by VARCHAR(255) DEFAULT NULL, filter_sort_order_asc TINYINT(1) DEFAULT NULL, number_of_entries_per_page SMALLINT DEFAULT NULL, UNIQUE INDEX UNIQ_9E048B1FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_settings ADD CONSTRAINT FK_9E048B1FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE companies CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE divisions CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE division division VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_divisions');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_professions');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_companies');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_roles');
        $this->addSql('DROP INDEX ix_jobs_date_published ON jobs');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC556007A49');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_divisions');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC538B53C32');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC588987678');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_professions');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5452BDD64');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_companies');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY fk_jobs_roles');
        $this->addSql('ALTER TABLE jobs CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE company_id company_id INT NOT NULL, CHANGE profession_id profession_id INT NOT NULL, CHANGE division_id division_id INT NOT NULL, CHANGE role_id role_id INT NOT NULL, CHANGE refkey refkey VARCHAR(32) DEFAULT NULL');
        $this->addSql('DROP INDEX ix_jobs_company_id ON jobs');
        $this->addSql('CREATE INDEX IDX_A8936DC5979B1AD6 ON jobs (company_id)');
        $this->addSql('DROP INDEX ix_jobs_profession_id ON jobs');
        $this->addSql('CREATE INDEX IDX_A8936DC5FDEF8996 ON jobs (profession_id)');
        $this->addSql('DROP INDEX ix_jobs_division_id ON jobs');
        $this->addSql('CREATE INDEX IDX_A8936DC541859289 ON jobs (division_id)');
        $this->addSql('DROP INDEX ix_jobs_role_id ON jobs');
        $this->addSql('CREATE INDEX IDX_A8936DC5D60322AC ON jobs (role_id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC556007A49 FOREIGN KEY (division_id) REFERENCES divisions (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_divisions FOREIGN KEY (division_id) REFERENCES divisions (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC538B53C32 FOREIGN KEY (company_id) REFERENCES companies (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC588987678 FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_professions FOREIGN KEY (profession_id) REFERENCES professions (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5452BDD64 FOREIGN KEY (profession_id) REFERENCES professions (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_companies FOREIGN KEY (company_id) REFERENCES companies (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_roles FOREIGN KEY (role_id) REFERENCES roles (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE professions CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE profession profession VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE roles CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE role role VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_settings DROP FOREIGN KEY FK_9E048B1FA76ED395');
        $this->addSql('DROP TABLE users_settings');
        $this->addSql('ALTER TABLE companies CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE divisions CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE division division VARCHAR(255) DEFAULT \'\' NOT NULL');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5979B1AD6');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5FDEF8996');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC541859289');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5D60322AC');
        $this->addSql('ALTER TABLE jobs CHANGE id id CHAR(36) NOT NULL, CHANGE company_id company_id INT UNSIGNED NOT NULL, CHANGE profession_id profession_id INT UNSIGNED NOT NULL, CHANGE division_id division_id INT UNSIGNED NOT NULL, CHANGE role_id role_id INT UNSIGNED NOT NULL, CHANGE refkey refkey CHAR(32) DEFAULT NULL');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_divisions FOREIGN KEY (division_id) REFERENCES divisions (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_professions FOREIGN KEY (profession_id) REFERENCES professions (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_companies FOREIGN KEY (company_id) REFERENCES companies (id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT fk_jobs_roles FOREIGN KEY (role_id) REFERENCES roles (id) ON UPDATE CASCADE');
        $this->addSql('CREATE INDEX ix_jobs_date_published ON jobs (date_published)');
        $this->addSql('DROP INDEX idx_a8936dc5fdef8996 ON jobs');
        $this->addSql('CREATE INDEX ix_jobs_profession_id ON jobs (profession_id)');
        $this->addSql('DROP INDEX idx_a8936dc541859289 ON jobs');
        $this->addSql('CREATE INDEX ix_jobs_division_id ON jobs (division_id)');
        $this->addSql('DROP INDEX idx_a8936dc5d60322ac ON jobs');
        $this->addSql('CREATE INDEX ix_jobs_role_id ON jobs (role_id)');
        $this->addSql('DROP INDEX idx_a8936dc5979b1ad6 ON jobs');
        $this->addSql('CREATE INDEX ix_jobs_company_id ON jobs (company_id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5979B1AD6 FOREIGN KEY (company_id) REFERENCES companies (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5FDEF8996 FOREIGN KEY (profession_id) REFERENCES professions (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC541859289 FOREIGN KEY (division_id) REFERENCES divisions (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5D60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE professions CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE profession profession VARCHAR(255) DEFAULT \'\' NOT NULL');
        $this->addSql('ALTER TABLE roles CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE role role VARCHAR(255) DEFAULT \'\' NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
