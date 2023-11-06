<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106081127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement (id INT AUTO_INCREMENT NOT NULL, num_appart NUMERIC(10, 0) NOT NULL, superficie NUMERIC(10, 0) NOT NULL, descriptif VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, code_categorie NUMERIC(10, 0) NOT NULL, libelle_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble (id INT AUTO_INCREMENT NOT NULL, num_immeuble NUMERIC(10, 0) NOT NULL, nom_immeuble VARCHAR(255) NOT NULL, rue_immeuble VARCHAR(255) NOT NULL, cpimmeuble NUMERIC(10, 0) NOT NULL, ville_immeuble VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, num_reserv NUMERIC(10, 0) NOT NULL, date_reserv DATETIME NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, rue_client VARCHAR(255) NOT NULL, cpclient NUMERIC(10, 0) NOT NULL, ville_client VARCHAR(255) NOT NULL, tel_client NUMERIC(10, 0) NOT NULL, num_cheque_acompte NUMERIC(10, 0) NOT NULL, montant_accompte NUMERIC(10, 0) NOT NULL, etat_reserv VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, num_saison NUMERIC(10, 0) NOT NULL, libelle_saison VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semaine (id INT AUTO_INCREMENT NOT NULL, annee NUMERIC(10, 0) NOT NULL, num_semaine NUMERIC(10, 0) NOT NULL, date_debut DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE immeuble');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE semaine');
    }
}
