<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616162739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, numéro_comptable INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecriture (id INT AUTO_INCREMENT NOT NULL, compte_debiteur_id INT NOT NULL, compte_crediteur_id INT NOT NULL, date DATETIME NOT NULL, montant DOUBLE PRECISION NOT NULL, raison LONGTEXT DEFAULT NULL, descriptif LONGTEXT DEFAULT NULL, INDEX IDX_3098DEB47E72DF (compte_debiteur_id), INDEX IDX_3098DEB3E82C295 (compte_crediteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ecriture ADD CONSTRAINT FK_3098DEB47E72DF FOREIGN KEY (compte_debiteur_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE ecriture ADD CONSTRAINT FK_3098DEB3E82C295 FOREIGN KEY (compte_crediteur_id) REFERENCES compte (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ecriture DROP FOREIGN KEY FK_3098DEB47E72DF');
        $this->addSql('ALTER TABLE ecriture DROP FOREIGN KEY FK_3098DEB3E82C295');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE ecriture');
    }
}
