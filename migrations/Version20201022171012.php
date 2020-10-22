<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201022171012 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exercise (id INT AUTO_INCREMENT NOT NULL, unit_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, question LONGTEXT DEFAULT NULL, answer LONGTEXT DEFAULT NULL, INDEX IDX_AEDAD51CF476E05C (unit_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, course INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, subject_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, text LONGTEXT DEFAULT NULL, INDEX IDX_DCBB0C536ED75F8F (subject_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51CF476E05C FOREIGN KEY (unit_id_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C536ED75F8F FOREIGN KEY (subject_id_id) REFERENCES subject (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unit DROP FOREIGN KEY FK_DCBB0C536ED75F8F');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51CF476E05C');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE unit');
    }
}
