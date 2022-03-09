<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220131010538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE registrations (id INT AUTO_INCREMENT NOT NULL, course_id INT NOT NULL, student_id INT NOT NULL, user_id INT NOT NULL, date DATE NOT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_53DE51E7591CC992 (course_id), INDEX IDX_53DE51E7CB944F1A (student_id), INDEX IDX_53DE51E7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E7591CC992 FOREIGN KEY (course_id) REFERENCES courses (id)');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E7CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE registrations ADD CONSTRAINT FK_53DE51E7A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE registrations');
    }
}
