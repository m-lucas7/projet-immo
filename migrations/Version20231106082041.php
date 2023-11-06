<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106082041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE semaine_reservation (semaine_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_F3A573E1122EEC90 (semaine_id), INDEX IDX_F3A573E1B83297E7 (reservation_id), PRIMARY KEY(semaine_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE semaine_reservation ADD CONSTRAINT FK_F3A573E1122EEC90 FOREIGN KEY (semaine_id) REFERENCES semaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semaine_reservation ADD CONSTRAINT FK_F3A573E1B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appartement ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_71A6BD8DBCF5E72D ON appartement (categorie_id)');
        $this->addSql('ALTER TABLE semaine ADD saison_id INT NOT NULL');
        $this->addSql('ALTER TABLE semaine ADD CONSTRAINT FK_7B4D8BEAF965414C FOREIGN KEY (saison_id) REFERENCES saison (id)');
        $this->addSql('CREATE INDEX IDX_7B4D8BEAF965414C ON semaine (saison_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE semaine_reservation DROP FOREIGN KEY FK_F3A573E1122EEC90');
        $this->addSql('ALTER TABLE semaine_reservation DROP FOREIGN KEY FK_F3A573E1B83297E7');
        $this->addSql('DROP TABLE semaine_reservation');
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8DBCF5E72D');
        $this->addSql('DROP INDEX IDX_71A6BD8DBCF5E72D ON appartement');
        $this->addSql('ALTER TABLE appartement DROP categorie_id');
        $this->addSql('ALTER TABLE semaine DROP FOREIGN KEY FK_7B4D8BEAF965414C');
        $this->addSql('DROP INDEX IDX_7B4D8BEAF965414C ON semaine');
        $this->addSql('ALTER TABLE semaine DROP saison_id');
    }
}
