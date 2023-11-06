<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106082339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE saison_categorie (saison_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_7B6AE38EF965414C (saison_id), INDEX IDX_7B6AE38EBCF5E72D (categorie_id), PRIMARY KEY(saison_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE saison_categorie ADD CONSTRAINT FK_7B6AE38EF965414C FOREIGN KEY (saison_id) REFERENCES saison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saison_categorie ADD CONSTRAINT FK_7B6AE38EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saison ADD semaine_id INT NOT NULL');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D586122EEC90 FOREIGN KEY (semaine_id) REFERENCES semaine (id)');
        $this->addSql('CREATE INDEX IDX_C0D0D586122EEC90 ON saison (semaine_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE saison_categorie DROP FOREIGN KEY FK_7B6AE38EF965414C');
        $this->addSql('ALTER TABLE saison_categorie DROP FOREIGN KEY FK_7B6AE38EBCF5E72D');
        $this->addSql('DROP TABLE saison_categorie');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D586122EEC90');
        $this->addSql('DROP INDEX IDX_C0D0D586122EEC90 ON saison');
        $this->addSql('ALTER TABLE saison DROP semaine_id');
    }
}
