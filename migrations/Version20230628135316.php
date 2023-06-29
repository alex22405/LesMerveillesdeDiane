<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230628135316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', CHANGE email email VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76E7927C74 ON admin (email)');
        $this->addSql('ALTER TABLE message ADD admin_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FDF6E65AD FOREIGN KEY (admin_id_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FDF6E65AD ON message (admin_id_id)');
        $this->addSql('ALTER TABLE products ADD admin_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5ADF6E65AD FOREIGN KEY (admin_id_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5ADF6E65AD ON products (admin_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP INDEX UNIQ_880E0D76E7927C74 ON admin');
        $this->addSql('ALTER TABLE admin DROP roles, CHANGE email email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FDF6E65AD');
        $this->addSql('DROP INDEX IDX_B6BD307FDF6E65AD ON message');
        $this->addSql('ALTER TABLE message DROP admin_id_id');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5ADF6E65AD');
        $this->addSql('DROP INDEX IDX_B3BA5A5ADF6E65AD ON products');
        $this->addSql('ALTER TABLE products DROP admin_id_id');
    }
}
