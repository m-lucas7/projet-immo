<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106081533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement_reservation (appartement_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_359C0B21E1729BBA (appartement_id), INDEX IDX_359C0B21B83297E7 (reservation_id), PRIMARY KEY(appartement_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appartement_reservation ADD CONSTRAINT FK_359C0B21E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appartement_reservation ADD CONSTRAINT FK_359C0B21B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE immeuble ADD situer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE immeuble ADD CONSTRAINT FK_467D53F9AAAFB46C FOREIGN KEY (situer_id) REFERENCES appartement (id)');
        $this->addSql('CREATE INDEX IDX_467D53F9AAAFB46C ON immeuble (situer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement_reservation DROP FOREIGN KEY FK_359C0B21E1729BBA');
        $this->addSql('ALTER TABLE appartement_reservation DROP FOREIGN KEY FK_359C0B21B83297E7');
        $this->addSql('DROP TABLE appartement_reservation');
        $this->addSql('ALTER TABLE immeuble DROP FOREIGN KEY FK_467D53F9AAAFB46C');
        $this->addSql('DROP INDEX IDX_467D53F9AAAFB46C ON immeuble');
        $this->addSql('ALTER TABLE immeuble DROP situer_id');
    }
}
